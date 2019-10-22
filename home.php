<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Away Game</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="final_home_style.css">
</head>
<body>
	<div class="container-fluid">
		<!-- HEADER -->
		<?php include 'nav.php'; ?>
	
		
		<div class="row pt-2 justify-content-center" id="searchBar">
			<form action="" method="" class="col-12 justify-content-center" id="search-form">
				<div class="row justify-content-center">
				    <div class="col-10 col-lg-6 col-md-8">
				      	<div class="input-group mb-2">
				        	<input type="text" class="form-control" placeholder="E.g.: Santa Monica..." id="search-input"/>
				        	<div class="input-group-btn">
				          		<button class="btn btn-warning" type="submit">Search</button>
				        	</div>
				      </div>
				    </div>
				</div>
			</form>
		</div>
		<div class="clear"></div>









		<!-- end search -->
		<!-- CONTENT:  -->
		<div class="row white-content " id="results">
			<!-- LIST RESULTS -->
			<div class="col-12 col-md-4 col-lg-3  justify-content-center" id="list-results">
				<?php if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) : ?>
					<h6>Hello, <a href="final_login.php">Sign In</a> to save your courts.</h6>
				<?php else : ?>
					<h6>Hello, <?php echo $_SESSION['name'];?>.</h6>
				<?php endif; ?>
				<H3 style="color: brown; font-style: italic">Search an area for results!</H3>
				<!-- <img src="list_placeholder.png" alt="list placeholder image"> -->
			</div>
			<!-- MAP DIV -->
			<div class="col-12 col-md-8 col-lg-9 container-fluid" id="map">
				
				<!-- <img src="map_placeholder.png" alt="map placeholder image"> -->
			</div>
		</div>


	</div>


	<script src="mapScript.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDOnLq8-tIRSCIJdS1am1k2LtflvtEVMVI&libraries=places&callback=initMap"
    async defer></script>






</body>
</html>