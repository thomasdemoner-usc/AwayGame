		<!-- HEADER -->
		<div class="row mt-0 justify-content-center" id="header">
			<div class="col-12 justify-content-center" id="logo">
				<h1>RoadGame</h1>
			</div>
			<div class="col-12 justify-content-center" id="nav">
				<ul class="nav nav-tabs justify-content-center">
				  	<li class="nav-item">
				    	<a class="nav-link active" href="home.php">Home</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="my_courts.php">My Courts</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" href="final_user_profile.php">Profile</a>
				  	</li>
				  	<?php if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) : ?>

					<li class="nav-item">
				    	<a class="nav-link" href="../Final/final_login.php">Sign In</a>
				  	</li>

					<?php else : ?>

					<li class="nav-item">
				    	<a class="nav-link" href="../Final/final_logout.php">Sign Out</a>
				  	</li>
				  	<?php endif; ?>
				  	
				</ul>
			</div>
		</div>