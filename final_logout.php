<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logout | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="final_home_style.css">
</head>
<body>

	<div class="container-fluid" style="border-bottom: 10pt solid orange">
		<!-- HEADER -->
		<?php include 'nav.php'; ?>

		<div class="container-fluid">
			<div class="row">
				<h1 class="col-12 mt-4 mb-4">Logout</h1>
				<div class="col-12">You are now logged out.</div>
				<div class="col-12 mt-3">You can go to the <a href="../Final/home.php">home page</a> or <a href="final_login.php">log in</a> again.</div>

			</div> <!-- .row -->
		</div> <!-- .container -->
	</div>

</body>
</html>