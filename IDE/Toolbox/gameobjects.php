<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=IE7">
	<title>Toolbox</title>
	<link rel="stylesheet" href="toolboxg.css"></script>
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
		<option selected>Game Objects</option>
		<option>Weapons</option>
		<option>Free Models</option>
	</select>
	<div id="container">
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('20')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Lua script.png" border="0" alt="Vote to Kick Player Script" title="Vote to Kick Player Script">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('21')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Yellow Flag Stand.png" border="0" alt="Yellow Flag Stand" title="Yellow Flag Stand">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('14')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Green Flag Stand.png" border="0" alt="Green Flag Stand" title="Green Flag Stand">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('12')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Blue Flag Stand.png" border="0" alt="Blue Flag Stand" title="Blue Flag Stand">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('18')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Red Flag Stand.png" border="0" alt="Red Flag Stand" title="Red Flag Stand">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('17')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Neutral Spawn.png" border="0" alt="Neutral Spawn Location" title="Neutral Spawn Location">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('15')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Green Team Spawn.png" border="0" alt="Green Team Spawn" title="Green Team Spawn">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('22')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Yellow Team Spawn.png" border="0" alt="Yellow Team Spawn" title="Yellow Team Spawn">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('13')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Blue Team Spawn.png" border="0" alt="Blue Team Spawn" title="Blue Team Spawn">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('19')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Red Team Spawn.png" border="0" alt="Red Team Spawn" title="Red Team Spawn" >
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('16')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="GameObjects/Lua script.png" border="0" alt="Leaderboard" title="Leaderboard">
			</a>
		</span>
	</div>
	<i>shhh...</i>
	<i><b>don't leak our hard work, </b></i>
	<i><b>this is a preview</b></i>
</body>
</html>