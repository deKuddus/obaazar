<?php 
	include "sources/header.php"; 

	Session::checkCustomerSessionLog();


?>
<style type="text/css">
	input[type="text"]{
		color:black;
	}
</style>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>PENDING ORDER</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
<div class="col-md-12">

<?php if(isset($_GET['gift'])){?>
	<div class="col-md-3">
		<div class="checkout-left">
				<div class="address_form_agile">
					<h4>Your Address</h4>
					<?php 
						$customer_id = Session::get("customer_id");
						$getCusotmer= $customer->getCustomerProfile($customer_id);
						foreach ($getCusotmer as  $value) {}
					 ?>
					<form action="payment.php" method="post" class="creditly-card-form agileinfo_form" >
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
										<input class="billing-address-name" type="text" name="name" id="name_add" value="<?php echo $value['customer_full_name'];?>">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" name="phone" id="phone_add" value="<?php echo $value['customer_phone'];?>">

											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<input type="text" id="house_add"  name="house" value="<?php echo $value['customer_house_name'];?>">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									<div class="controls">
										<input type="text" id="city_add"  name="city" value="<?php echo $value['customer_city'];?>">
										<input type="hidden" 
										value="<?php 
											$customer_id = Session::get("customer_id");
											if($customer_id != "") echo $customer_id;
										?>"	 name="customer_id">
									
									</div>
									<div class="controls">
										<input type="text"  id="district_add" name="district" value="<?php echo $value['customer_district'];?>">
									</div>
								</div>
							</div>
						</div>
					
				</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="checkout-left">
			<div class="address_form_agile">
				<h4>Reciver Address</h4>
				
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<input class="billing-address-name" type="text" name="reciver_name" id="name_add" placeholder="Full Name" required="">
								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" placeholder="Mobile Number" name="reciver_phone" id="phone_add" required="">

										</div>
									</div>
									<div class="w3_agileits_card_number_grid_right">
										<div class="controls">
											<input type="text" id="house_add" placeholder="house name" name="reciver_house" required="">
										</div>
									</div>
									<div class="clear"> </div>
								</div>
								<div class="controls">
									<input type="text" id="city_add" placeholder="Town/City" name="reciver_city" required="">	 
								
								</div>
								<div class="controls">
									<input type="text" placeholder="district" id="district_add" name="reciver_district" required="">
								</div>
							</div>
							<button  class="submit check_out" type="submit" name="add_new_address">Proceed To Payment</button>
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php } ?>
	<?php if(isset($_GET['ship'])){ ?>
			<div class="col-md-6">
		<div class="checkout-left">
				<div class="address_form_agile">
					<h4>Your Address</h4>
					<?php 
						$customer_id = Session::get("customer_id");
						$getCusotmer= $customer->getCustomerProfile($customer_id);
						foreach ($getCusotmer as  $value) {}
					 ?>
					<form action="payment.php" method="post"  class="creditly-card-form agileinfo_form" >
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
										<input class="billing-address-name" type="text" name="name" id="name_add" value="<?php echo $value['customer_full_name'];?>">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" name="phone" id="phone_add" value="<?php echo $value['customer_phone'];?>">

											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<input type="text" id="house_add"  name="house" value="<?php echo $value['customer_house_name'];?>">
											</div>
										</div>
										<div class="clear"> </div>
									</div>
									<div class="controls">
										<input type="text" id="city_add"  name="city" value="<?php echo $value['customer_city'];?>">
										<input type="hidden" value="<?php 
											$customer_id = Session::get("customer_id");
											if($customer_id != "") echo $customer_id;
										?>"	 name="customer_id">
									
									</div>
									<div class="controls">
										<input type="text"  id="district_add" name="district" value="<?php echo $value['customer_district'];?>">
									</div>
								</div>

							<button  class="submit check_out" type="submit" name="ship_customer_address">Proceed To Payment</button>
							</div>
						</div>
					</form>
				</div>
				<div class="clearfix"> </div>
		</div>
	</div>
	<?php } ?>

	<div class="col-md-6">
		<div class="checkout-right">
				<h4>Your shopping cart contains:</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total Price Per Product</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$getCartValue = $cart->getCartProduct();
								if(isset($getCartValue)){
									$sum = 0;
                                    $quantity = 0;
									foreach ($getCartValue as $key =>$value) {			
										?>
										<tr class="rem1">
											<td class="invert"><?php echo $key+1;?></td>
											<td class="invert"><?php echo $value['prod_name']; ?></td>
											<td class="invert"><?php echo $value['prod_quantity']; ?></td>
											<td class="invert"><?php echo $value['prod_price']; ?></td>
											<td class="invert">
												<?php 
													$total = $value['prod_price']*$value['prod_quantity'];
													echo $total;
												?>
											</td>
										</tr>
									<?php
	                                    $sum = $sum + $total;
	                              }	?>
	                              		<tr class="rem1">
											<td  colspan="6">
												<span style="font-weight: bold;font-size: 20px;color: red"> Total = <?php echo $sum;?> টাকা </span>
											</td>
										</tr>
	                          <?php }?>
						</tbody>
					</table>
				</div>
			</div>	
	</div>
</div>

		</div>
	</div>
	<!-- //checkout page -->
 <?php include "sources/footer.php"; ?>