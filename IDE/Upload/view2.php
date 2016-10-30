<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Upload Model</title>
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
			<p id="textProgress">Uploading...</p>
			<progress value="0" max="100"></progress>
			<div id="done" style="display:none;">
				<br>
				<p><a href="#" class="btn btn-success btn-lg" onclick="window.close()">Finish</a></p>
			</div>
		</div>
		
		<script>
			var progressBar = $('progress'),
				width = 0;

			progressBar.val(width);

			var interval = setInterval(function() {
				width += 2.5;
				progressBar.val(width);

				if (width >= 100) {
					clearInterval(interval);
				}
			}, 800);
			
			var recurring = false;
			
			setTimeout(function() {
				// SaveUrl = Place
				recurring = window.external.WriteSelection().Upload('http://nobelium.xyz/IDEUpload/pubmodel.php?name=<?php echo rawurlencode(trim($_POST['name'])); ?>');
			}, 2000);
			
			var in2 = setInterval(function() {
				if(typeof recurring == "undefined") {
					$('#done').show();
					$('#textProgress').html('Done uploading.');
					width = 100;
					$('progress').val(100);
					clearInterval(in2);
				}
			}, 500);
		</script>
	</body>
</html>