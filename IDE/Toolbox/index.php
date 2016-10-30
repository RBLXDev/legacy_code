<?php
	header("Location: gameobjects.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Toolbox</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		//<![CDATA[ 
		$(window).load(function() {
			window.location.href = "gameobjects.php";
		}); //]]>
	</script>
</head>
<body>
	<select>
		<option selected>Game Objects</option>
		<option>Weapons</option>
		<option>Free Models</option>
	</select>
	<br>
	Redirecting...
	<i>shhh...</i>
	<i><b>don't leak our hard work</b></i>
</body>
</html>