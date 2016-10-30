<?php
session_start();
if(isset($_SESSION['user_name']) || !empty($_SESSION['user_name'])) {
	header("Location: ./");
	die();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Nobelium Login</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/css/lumen.min.css">
		<link rel="stylesheet" href="/css/main.css?v=2.0">
		<script src="/js/jquery-2.1.3.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/login.js"></script>
	</head>
	<body>
		<div class="panel panel-default" id="loginpanel" tabindex="-1" aria-labelledby="loginpanel">
			<div class="panel-dialog" id="loginform">
				<div class="panel-content">
					<h4 class="panel-header" id="mypanelLabel">Login</h4>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-7">
								<div>
									<div class="input-group">
										<span class="input-group-addon"><i>A</i></span>
										<input type="text" class="form-control" id="user_name" placeholder="Username or E-mail" required autofocus>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon">*</span>
										<input type="password" class="form-control" id="user_password" placeholder="Password" autocomplete="off" required>
									</div>
									<br>
									<div class="checkbox">
										<label>
											<input type="checkbox" id="user_rememberme" name="user_rememberme"> Remember me
										</label>
									</div>
							<button type="button" id="login" class="btn btn-primary">Login</button>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
							Please login.
					</div>
				</div>
			</div>
		</div>
		<script>
			$('.panel').show();
		</script>
	</body>
</html>