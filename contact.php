<?php 
	include "sources/header.php";

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['contact'])){
		$customer->saveCustomerMessage($_POST);
	}
 ?>
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>contact Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Contact Us
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form action="" method="post">
							<div class="">
								<input type="text" name="name" placeholder="Name" required="">
							</div>
							<div class="">
								<input class="text" type="text" name="subject" placeholder="Subject" required="">
							</div>
							<div class="">
								<input class="email" type="text" name="phone" placeholder="Phone" required="">
							</div>
							<div class="">
								<textarea placeholder="Message" name="message" required=""></textarea>
							</div>
							<input type="submit" name="contact" value="Submit">
						</form>
					</div>
					<div class="contact-right wthree">
						<div class="col-xs-7 contact-text w3-agileits">
							<h4>GET IN TOUCH :</h4>
							<p>
								<i class="fa fa-map-marker"></i>161, Sahadad Mansion,Sadargat Road, Chittagong 4500,</p>
							<p>
								<i class="fa fa-phone"></i> 
								Telephone : +88 031 617360 ||
								Phone : +88 01813 630 438
							</p>
							<p>
								<i class="fa fa-envelope-o"></i> Email :
								<a href="mailto:contact@obaazar.com">contact@obaazar.com</a>
							</p>
						</div>
						<div class="col-xs-5 contact-agile">
							<img src="images/contact2.jpg" alt="">
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>
	<!-- map -->
	<div class="map w3layouts">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.7164829437284!2d91.79447424981355!3d22.364331685218122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8fc144e1a99%3A0x49d06fb254f9f4ac!2sShaun+Villa%2C+600%2F13H%2C+Hazi+Abdul+Hamid+Road%2C+Foy&#39;s+Lake%2C+Chittagong!5e0!3m2!1sen!2sbd!4v1550597477094" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<!-- //map -->
<?php include "sources/footer.php"; ?>