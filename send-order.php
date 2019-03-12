<?php 
	include "sources/header.php";
 ?>

	<div class="banner-bootom-w3-agileits">
		<div class="container">
	 		<div class="col-md-3"></div>
				<div class="col-md-6 ">
			<div class="modal-content">
				<div class="modal-body modal-body-sub_agile">
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Add Required Information </h3>
					<p style="color:red;">Here you can send us your shoping list photo by usnig below form</p>
						<form action="" method="post" enctype="multipart/form-data">
						<div class="styled-input agile-styled-input-top">
							<input type="text" placeholder="Your Name" name="name"  id="name"
							<?php 

								$customer_login = Session::get("customerlogin");
								$customer_name = Session::get("customername");
								if($customer_login == true && $customer_name != ""){?>
									value="<?php echo $customer_name;?>"
								<?php }
							 ?>
							>
						</div>
						<div class="styled-input">
							<input type="text" placeholder="Phone" name="phone" id="phone"

								<?php 
									$customer_login = Session::get("customerlogin");
									$customer_phone = Session::get("customer_phone");
									if($customer_login == true && $customer_phone != ""){?> 
										value="<?php echo $customer_phone; ?>"
								<?php  } ?>
							>
						</div>
						<div class="styled-input">
							<input type="file"  name="list_image">
						</div><br>
						<button class="btn btn-primary" type="submit" name="send_list">SEND</button>
						</form>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	  </div>
	<div class="col-md-3"></div>
</div>
</div>

<?php 
	include "sources/footer.php";
 ?>