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

		<div class="container-fluid">
			<div class="row">
				<h1 class="col-12 mt-4 mb-4">User Registration</h1>
			</div> <!-- .row -->
		</div> <!-- .container -->

		<div class="container-fluid">

			<form action="final_registration_confirmation.php" method="POST">

				<div class="form-group row">
					<label for="username-id" class="col-sm-3 col-form-label text-sm-right">Name: <span class="text-danger">*</span></label>
					<div class="col-9 col-md-6 col-lg-4">
						<input type="text" class="form-control" id="name-id" name="name">
						<small id="username-error" class="invalid-feedback">Name is required.</small>
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<label for="email-id" class="col-sm-3 col-form-label text-sm-right">Email: <span class="text-danger">*</span></label>
					<div class="col-9 col-md-6 col-lg-4">
						<input type="email" class="form-control" id="email-id" name="email">
						<small id="email-error" class="invalid-feedback">Email is required.</small>
					</div>
				</div> <!-- .form-group -->	

				<div class="form-group row">
					<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label>
					<div class="col-9 col-md-6 col-lg-4">
						<input type="password" class="form-control" id="password-id" name="password">
						<small id="password-error" class="invalid-feedback">Password is required.</small>
					</div>
				</div> <!-- .form-group -->

				<div class="row">
					<div class="ml-auto col-sm-9">
						<span class="text-danger font-italic">* Required</span>
					</div>
				</div> <!-- .form-group -->

				<div class="form-group row">
					<div class="col-sm-3"></div>
					<div class="col-sm-9 mt-3">
						<button type="submit" class="btn btn-warning">Register</button>
						<a href="../Final/home.php" role="button" class="btn btn-light">Cancel</a>
					</div>
				</div> <!-- .form-group -->

				<div class="row">
					<div class="col-sm-9 ml-sm-auto">
						<a href="final_login.php">Already have an account</a>
					</div>
				</div> <!-- .row -->

			</form>
		</div> <!-- .container -->
	</div>
	
	<script>
		document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#name-id').value.trim().length == 0 ) {
				document.querySelector('#name-id').classList.add('is-invalid');
			} else {
				document.querySelector('#name-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#email-id').value.trim().length == 0 ) {
				document.querySelector('#email-id').classList.add('is-invalid');
			} else {
				document.querySelector('#email-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#password-id').value.trim().length == 0 ) {
				document.querySelector('#password-id').classList.add('is-invalid');
			} else {
				document.querySelector('#password-id').classList.remove('is-invalid');
			}

			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>
</body>
</html>