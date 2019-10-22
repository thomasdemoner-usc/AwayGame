<?php
require '../Final/final_config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

$new_name = $_POST['new-name'];

$sql = "DELETE FROM users
					WHERE email = " . "'" . $_SESSION['email'] . "';";

// echo "<hr>" . $sql . "<hr>";

$results = $mysqli->query($sql);
if ( !$results ) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();
session_destroy();
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
	<div class="container-fluid">
		<!-- HEADER -->
		<?php include 'nav.php'; ?>

		<div class="container-fluid"  style="border-bottom: 1pt solid orange">
			<div class="row mt-3 justify-content-center">
				<div class="col-7 text-center justify-content-center mb-2">
					<h3 style="color: red">Your account has been deleted.</h3>
				</div>

				<div class="col-8 text-center mb-4 mt-2 justify-content-center">
					<h4>Click <a href="final_register_form.php">here</a> to register another account.</h4>
				</div>
				<div class="col-10 text-center mb-2 justify-content-center">
						<form action="home.php">
							<div class="input-group-btn" id="edit-button-div">
				        		<button class="btn btn-warning col-6" type="submit" id="edit-button">Return to home</button>
				    		</div>
						</form>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->

		
	</div>

</body>
</html>