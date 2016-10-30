<?php
session_start();
if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])) {
	header("Location: ./login.php");
	die();
}
if(isset($_POST['name'])) {
	include("view2.php"); 	
	die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=11; IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Publish Model</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/lumen.min.css">
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">Nobelium</a>
				</div>
			</div>
		</div>
		
		<div class="container">
		
			<form name="uploadform" method="POST">
				<span class="input-group-addon">Name</span>
				<input id="login_input_name" type="text" class="form-control" name="name">
				<br>
				<span class="input-group-addon">Description</span>
				<input id="login_input_desc" type="text" class="form-control" name="description">
				<br>
				<button type="submit" name="upload" class="btn btn-primary btn-block">Upload</button>
			</form>
		</div>
	</body>
</html>