<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Away Game My Courts</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="final_home_style.css">
</head>

<body>
	<div class="container-fluid" style="border-bottom: 10pt solid orange">
		<!-- HEADER -->
		<?php include 'nav.php'; ?>
		<!-- end nav -->
		<div class="row pt-2 pl-2" id="greeting">
			<h6>Hello, username. Here are your starred courts.</h6>
		</div>
		<div class="row pt-2 justify-content-center">
			<div class="col-12 col-lg-6 col-md-9 justify-content-center" id="courts-container">		
				<img src="list_placeholder.png" alt="list placeholder image" style="max-height: 500px">	
			</div>
		</div>

	</div>
</body>
</html>