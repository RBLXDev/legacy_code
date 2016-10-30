<?php
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Toolbox</title>
	<link rel="stylesheet" href="toolboxg.css?fmv=1.12"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
$(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    }); 
		//<![CDATA[ 
		$(window).load(function() {
			$("select").on({
				"change": function() {
					choice = $(this).val();
					this.blur();
					setTimeout(function() {
						if(choice == "Weapons") {
							window.location.href = "weapons.php";
						}else if(choice == "Game Objects") {
							window.location.href = "gameobjects.php";
						}else if(choice == "Free Models") {
							window.location.href = "freemodels.php";
						}
					}, 0);
				}
			});
		}); //]]>
	</script>
</head>
<body>
	<select>
		<option>Game Objects</option>
		<option>Weapons</option>
		<option selected>Free Models</option>
	</select>
	<div id="container">
		<form method="get">
		<div id="ToolboxSearch">
			<input type="text" id="tbSearch" class="Search" name="search" onkeypress="return disableEnterKey(event)" value="<?php if(isset($_GET['search'])) { echo htmlspecialchars(trim($_GET['search'])); } ?>" autocomplete="toolbox-search-off">
			<div id="Button" class="ButtonText">Search</div>
		 </div>
		</form>
		<?php
			include("../../_incl/config.php");
			
			$dbcon = new PDO('mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8; SET time_zone = '-04:00'"));
			$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$dbcon->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			
			/* <span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;text-align:center;cursor:pointer;">
			<a onclick="insertContentURL('239')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<!-- <img src="GameObjects/Lua script.png" border="0" alt="239" title="239"> -->
				Thing
			</a>
		</span> */
		
			try {
							$search = "%%";
							if(isset($_GET['search'])) {
								$search = '%' . trim($_GET['search']) . '%';
							}
							// Find out how many items are in the table
							$total = $dbcon->prepare('SELECT COUNT(*) FROM assets WHERE forsale = 1 AND `type` = "model" AND id > 200 AND name LIKE ?;');
							$total->execute(array($search));
							$total = $total->fetchColumn();

							// How many items to list per page
							$limit = 8;

							// How many pages will there be
							$pages = ceil($total / $limit);

							// What page are we currently on?
							$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
								'options' => array(
									'default'   => 1,
									'min_range' => 1,
								),
							)));
							
							if($page > $pages) {
								die();
							}

							// Calculate the offset for the query
							$offset = ($page - 1)  * $limit;

							// Some information to display to the user
							$start = $offset + 1;
							$end = min(($offset + $limit), $total);

							// The "back" link
							$prevlink = ($page > 1) ? '<a href="?page=1" aria-label="First page"><span aria-hidden="true">&laquo;</span></a>
							<a href="?page=' . ($page - 1) . '" aria-label="Previous"><span aria-hidden="true">&lsaquo;</span></a>' : '';

							// The "forward" link
							$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" aria-label="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" aria-label="Last page">&raquo;</a>' : '';
							
							// Display the paging information
							echo '<nav>', $prevlink, ' <a>Page ', $page, ' of ', $pages, "</a> " . $nextlink, '</nav>';

							// Prepare the paged query
							$stmt = $dbcon->prepare('
								SELECT * FROM assets WHERE forsale = 1 AND `type` = "model" AND id > 200 AND name LIKE :search
								ORDER BY id DESC
								LIMIT
									:limit
								OFFSET
									:offset
							');

							// Bind the query params
							$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
							$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
							$stmt->bindParam(':search', $search, PDO::PARAM_STR);
							$stmt->execute();

							// Do we have any results?
							if ($stmt->rowCount() > 0) {
								// Define how we want to fetch the results
								$stmt->setFetchMode(PDO::FETCH_ASSOC);
								$iterator = new IteratorIterator($stmt);
								
								foreach ($iterator as $row) {
									
									echo'
						<span class="toolboxitem" onmouseover="this.style.borderStyle=\'outset\'" onmouseout="this.style.borderStyle=\'solid\'" style="display:inline-block;height:62px;width:60px;text-align:center;cursor:pointer;">
			<a onclick="insertContentURL(\'' . $row['id'] . '\')" style="display:block;height:62px;width:60px;cursor:pointer;">
				<img src="//assets.nobelium.xyz/GetItemThumb.php?id=' . $row['id'] . '" width="60px" height="60px" border="0" alt="' . $row['name'] . '" title="' . $row['name'] . '">
			</a>
		</span>
						';
								}
							} else {
								echo '<p>There were no results.</p>';
							}
			
		?>
	</div>
	<?php
		} catch (PDOException $e) {
			echo 'An error occurred.' . '<p>', $e->getMessage(), '</p>';
		}
	?>
	<i>shhh...</i>
	<i><b>don't leak our hard work</b></i>
	
	<script>
		$('#Button').click(function() {
			$('form').submit();
		});
	</script>
</body>
</html>