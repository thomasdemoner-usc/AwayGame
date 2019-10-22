<?php
require '../Final/final_config.php';
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
	<div class="container-fluid"  style="border-bottom: 10pt solid orange">
		<!-- HEADER -->
		<?php include 'nav.php'; ?>

		<div class="container-fluid" >
			<div class="row mt-3 justify-content-center">
				<?php if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) : ?>
					<div class="col-7 text-center justify-content-center mb-2">
						<h3><a href="final_login.php">Sign In</a> to edit your profile.</h3>
					</div>
				<?php else : ?>

				<div class="col-8 text-center mb-4 mt-2 justify-content-center">
					<h2><?php echo $_SESSION['name']; ?></h2>
				</div>
				<div class="col-8 text-center mb-4 mt-2 justify-content-center">
					<h4>Editing your name</h4>
				</div>
				<div class="col-8 text-center justify-content-center" id="form-div">
					<form action="edit_name_confirmation.php" method="POST">
						<div class="col-12 text-center mb-4 justify-content-center">
							<input type="text" class="form-control" placeholder="Enter new name..." name="new-name"/>
						</div>
						<div class="col-12 text-center mb-2 justify-content-center">
							<button class="btn btn-warning col-6" type="submit">Change name</button>
						</div>
					</form>
					<div class="col-12 text-center mb-2 justify-content-center">
						<form action="final_user_profile.php">
							<div class="input-group-btn" id="edit-button-div">
				        		<button class="btn btn-outline-danger col-3" type="submit" id="edit-button">Cancel</button>
				    		</div>
						</form>
					</div>
				</div>
				<?php endif; ?>
			</div> <!-- .row -->
		</div> <!-- .container -->

		
	</div>

</body>
</html>