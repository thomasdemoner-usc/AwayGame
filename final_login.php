<?php
//require 'final_config.php';
//session_destroy();

//session_start();
require '../Final/final_config.php';

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	// User Not Logged In.

	if ( isset($_POST['email']) && isset($_POST['password']) ) {
		// Form was submitted

		if ( empty($_POST['email']) || empty($_POST['password']) ) {
			// Missing username or password.
			
			$error = "Please enter email and password.";
			
			//  TO check if user has enetered the correct password, 
			// 1) get this user's record from the DB
			// 2) Run $_POST['password'] through the hash function
			// 3) Check that this hash matches the hash from the DB

		}

		$sql_registered = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "';";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$results_registered = $mysqli->query($sql_registered);
		//echo $results_registered->fetch_assoc();
		$row = $results_registered->fetch_assoc();

		if(!$results_registered) {
		 	echo $mysqli->error;
		 	exit();
		 	}
		else if($results_registered->num_rows == 0){
			$error = "This email is not yet registered.";
		}
		else if($results_registered->num_rows > 0) {
			//$error = "Username or email has already been taken. Please choose another one.";
			$enteredPassword = hash('sha256', $_POST['password']);
			if ($enteredPassword = $row['password'] ) {
			// Valid credentials. Log in the user.
				$_SESSION['logged_in'] = true;
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['name'] = $row['name'];
				//CHANGE THIS REDIRECT LOCATION TO HOME LINK BEFORE SUBMITTING
				header('Location: ../Final/home.php');
			}
			else {
				// Invalid credentials.
				$error = "Invalid username or password.";
			}
			 
		} 

	}

}
 else {
 	// User Already Logged In.
 	header('Location: ../Final/home.html');
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
		<?php include 'nav.php'; ?>

		<div class="container-fluid">
			<div class="row">
				<h1 class="col-12 mt-4 mb-4">Sign In</h1>
			</div> <!-- .row -->
		</div> <!-- .container -->

		<div class="container-fluid">

			<form action="final_login.php" method="POST">

				<div class="row mb-3">
					<div class="font-italic text-danger col-sm-9 ml-sm-auto">
						<!-- Show errors here. -->
						<?php
							if ( isset($error) && !empty($error) ) {
								echo $error;
							}
						?>
					</div>
				</div> <!-- .row -->
				

				<div class="form-group row">
					<label for="username-id" class="col-3 col-form-label text-sm-right">Email:</label>
					<div class="col-9 col-md-8 col-lg-6">
						<input type="text" class="form-control" id="email-id" name="email">
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<label for="password-id" class="col-3 col-form-label text-sm-right">Password:</label>
					<div class="col-9 col-md-8 col-lg-6">
						<input type="password" class="form-control" id="password-id" name="password">
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<div class="col-3"></div>
					<div class="col-sm-9 mt-2">
						<button type="submit" class="btn btn-warning">Login</button>
						<a href="home.php" role="button" class="btn btn-light">Cancel</a>
					</div>
				</div> <!-- .form-group -->
			</form>

			<div class="row">
				<div class="col-sm-9 ml-sm-auto">
					<a href="final_register_form.php">Create an account</a>
				</div>
			</div> <!-- .row -->

		</div> <!-- .container -->
	</div>
</body>
</html>