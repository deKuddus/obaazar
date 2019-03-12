<?php 
	include "sources/header.php";
	Session::checkLoginforCustomer();

 ?>

	<div class="banner-bootom-w3-agileits">
		<div class="container">
	 		<div class="col-md-12">
				<div class="col-md-6 pull-left">
					<div class="modal-content">
							<div class="modal-body modal-body-sub_agile">
								<div class="modal_body_left modal_body_left1">
									<h3 class="agileinfo_sign">Sign In </h3>

									
									<p>
										Sign In now, Let's start your Grocery Shopping. Don't have an account? Sign up now.
									</p>
									<form action="" method="post">
										<div class="styled-input agile-styled-input-top">
											<input type="text" placeholder="your phone number" name="customer_login_phone" required="">
										</div>
										<div class="styled-input">
											<input type="password" placeholder="Your Password" name="customer_login_password" required="">
										</div>
										<input type="submit" name="signin" value="Sign In">
									</form>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
					</div>
				</div>
			<div class="col-md-6 pull-right">
				<div class="modal-content">
					<div class="modal-body modal-body-sub_agile">
						<div class="modal_body_left modal_body_left1">
							<h3 class="agileinfo_sign">Sign Up</h3>
							<p>
								Come join the Obaazar! Let's set up your Account.
							</p>
							<form action="" method="post"">
								<p id="msg"></p>
								<div class="styled-input agile-styled-input-top">
									<input type="text" placeholder="Name" name="customer_name" id="customer_name" >
								</div>
								<div class="styled-input">
									<input type="text" placeholder="phone number" name="customer_phone" id="customer_phone" >
								</div>
								<div class="styled-input">
									<input type="password" placeholder="Password" name="customer_password" id="password1" >
								</div>
								<div class="styled-input">
									<input type="password" placeholder="Confirm Password" name="comfirm_pass" id="password2" >
								</div>
								<input  type="submit" name="signup" value="Sign Up">
							</form>
							<p>
								<a href="#">By clicking register, I agree to your terms</a>
							</p>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
</div>

<?php 
	include "sources/footer.php";
 ?>