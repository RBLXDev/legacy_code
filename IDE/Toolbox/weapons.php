<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
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
		<option>Game Objects</option>
		<option selected>Weapons</option>
		<option>Free Models</option>
	</select>
	<div id="container">
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('Weapons/Trowel')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Trowel.png" border="0" alt="Trowel" title="Trowel">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a  onclick="insertContentURL('Weapons/Paintball Gun')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Paintball Gun.png" border="0" alt="Paintball Gun" title="Paintball Gun">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('Weapons/Rocket')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Rocket Launcher.png" border="0" alt="Rocket Launcher" title="Rocket Launcher">
			</a>
		</span><span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('Weapons/Slingshot')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Slingshot.png" border="0" alt="Slingshot" title="Slingshot">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('Weapons/Superball')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Superball.png" border="0" alt="Superball" title="Superball">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentFromDirectURL('http://nobelium.xyz/Asset/Weapons/Time Bomb')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Time Bomb.png" border="0" alt="Time Bomb" title="Time Bomb">
			</a>
		</span>
		<span class="toolboxitem" onmouseover="this.style.borderStyle='outset'" onmouseout="this.style.borderStyle='solid'" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
			<a onclick="insertContentURL('Weapons/Sword')" style="display:inline-block;height:62px;width:60px;cursor:pointer;">
				<img src="Weapons/Sword.png" border="0" alt="Sword" title="Sword">
			</a>
		</span>
	</div>
	<i>shhh...</i>
	<i><b>don't leak our hard work</b></i>
</body>
</html>