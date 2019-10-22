<?php

require '../Final/final_config.php';

if ( !isset($_POST['name']) || empty($_POST['name'])
	|| !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['password']) || empty($_POST['password']) ) {
	$error = "Please fill out all required fields.";
}
else {
	// Create our new user!
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	// Check that the user's email is not already taken.
	$sql_registered = "SELECT * FROM users
						WHERE email = '" . $_POST['email'] . "';";

	$results_registered = $mysqli->query($sql_registered);
	if(!$results_registered) {
		echo $mysqli->error;
		exit();
	}

	// If we get ANY result back, it means the username or email has already been taken
	// var_dump($results_registered);
	if($results_registered->num_rows > 0) {
		$error = "Username or email has already been taken. Please choose another one.";
	}
	else {

		// Add this new user to the DB
		// Hash our password
		$password = hash('sha256', $_POST['password']);

		// Run our SQL query
		$sql = "INSERT INTO users(name, email, password) 
				VALUES('" . $_POST['name'] . "','" .  $_POST['email'] . "','". $password . "');";

		$results = $mysqli->query($sql);

		if(!$results) {
			echo $mysqli->error;
			exit();
		}


	}

	$mysqli->close();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RoadGame</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="final_home_style.css">
</head>
<body>
	<div class="container-fluid" style="border-bottom: 10pt solid orange">
		<!-- HEADER -->
		<div class="row mt-0 justify-content-center" id="header">
			<div class="col-12 justify-content-center" id="logo">
				<h1>RoadGame</h1>
			</div>
			<div class="col-12 justify-content-center" id="nav">
				<ul class="nav nav-tabs justify-content-center">
				  	<li class="nav-item">
				    	<a class="nav-link active" href="home.html">Home</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="my_courts.html">My Courts</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="home.html">Profile</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="final_login.php">Sign In</a>
				  	</li>
				</ul>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<h1 class="col-12 mt-4">User Registration</h1>
			</div> <!-- .row -->
		</div> <!-- .container -->

		<div class="container-fluid">

			<div class="row mt-4">
				<div class="col-12">
					<?php if ( isset($error) && !empty($error) ) : ?>
						<div class="text-danger"><?php echo $error; ?></div>
					<?php else : ?>
						<div class="text-success">ttrojan was successfully registered.</div>
					<?php endif; ?>
			</div> <!-- .col -->
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<div class="col-12 justify-content-center">
				<a href="final_login.php" role="button" class="btn btn-warning">Login</a>
				<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
			</div> <!-- .col -->
		</div> <!-- .row -->

		</div> <!-- .container -->
	</div>

</body>
</html>