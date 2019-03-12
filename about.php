<?php 
	include "sources/header.php";

 ?>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- about page -->
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l logo_agile">Welcome to
					<a href="index.php">
						<span>O</span>baazar
					</a>
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			 <?php 
			 	$getAbout = $brand->getAboutInfo();
			 	if($getAbout){
			 		foreach ($getAbout as  $value) {?>
			<div class="w3l-welcome-info">
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="admin/<?php echo $value['about_img1']; ?>" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="col-sm-6 col-xs-6 welcome-grids">
					<div class="welcome-img">
						<img src="admin/<?php echo $value['about_img2']; ?>" class="img-responsive zoom-img" alt="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3l-welcome-text">
				<p><?php echo $value['about']; ?> </p>
			</div>
		<?php } } ?>
		</div>
	</div>
	<!-- //welcome -->
	<!-- video -->
	<div class="about">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Video
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="about-tp">
				<div class="col-md-8 about-agileits-w3layouts-left">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/1bdhDzRhcU4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="col-md-4 about-agileits-w3layouts-right">
					<h4>Obaazar Youtue</h4>
					<a href="https://www.youtube.com"><img src="resources/images/youtube.png" height="100px" weight="300px"></a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //video-->
	<!-- //about page -->
<?php 
	include "sources/footer.php";
 ?>