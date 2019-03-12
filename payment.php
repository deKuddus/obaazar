<?php 
	include "sources/header.php";

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ship_customer_address'])){
		$customer->updateCustomerInfo($_POST);
	}

		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_new_address'])){
		$customer->storeNewAddressToSendOrderByCustomer($_POST);
	}
 ?>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Payment</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Payment
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="col-md-12">
				<div class="col-md-6">
								<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul class="resp-tabs-list hor_1">
						<li>Cash on delivery (COD)</li>
						<li>Credit/Debit</li>
						<!-- <li>Net Banking</li>
						<li>Paypal Account</li> -->
					</ul>
					<div class="resp-tabs-container hor_1">

						<div>
							<div class="vertical_post check_box_agile">
								<h5>COD</h5>
								<div class="checkbox">
									<div class="check_box_one cashon_delivery">
										<label class="anim">
											<span> We accept only cash on delivery now.</span>
										</label>
									</div>
								</div>
								<button onclick="check_cart_limit();" class="btn btn-lg btn-success">
									Confirm Order
								</button>
							</div>
						</div>
						<div>
							<form action="#" method="post" class="creditly-card-form agileinfo_form">
								<div class="creditly-wrapper wthree, w3_agileits_wrapper">
									<div class="credit-card-wrapper">
										<div class="first-row form-group">
											<h2 style="color: black;">Not Available now</h2>
											<!-- <div class="controls">
												<label class="control-label">Name on Card</label>
												<input class="billing-address-name form-control" type="text" name="name" placeholder="John Smith">
											</div>
											<div class="w3_agileits_card_number_grids">
												<div class="w3_agileits_card_number_grid_left">
													<div class="controls">
														<label class="control-label">Card Number</label>
														<input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number"
														    autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
													</div>
												</div>
												<div class="w3_agileits_card_number_grid_right">
													<div class="controls">
														<label class="control-label">CVV</label>
														<input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;">
													</div>
												</div>
												<div class="clear"> </div>
											</div>
											<div class="controls">
												<label class="control-label">Expiration Date</label>
												<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY">
											</div> -->
										</div>
										<!-- <button class="submit">
											<span>Make a payment </span>
										</button> -->
									</div>
								</div>
							</form>

						</div>
		<!-- 				<div>
							<div class="vertical_post">
								<form action="#" method="post">
									<h5>Select From Popular Banks</h5>
									<div class="swit-radio">
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio" checked="">
													<i></i>Syndicate Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>Bank of Baroda</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>Canara Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>ICICI Bank</label>
											</div>
										</div>
										<div class="check_box_one">
											<div class="radio_one">
												<label>
													<input type="radio" name="radio">
													<i></i>State Bank Of India</label>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<h5>Or Select Other Bank</h5>
									<div class="section_room_pay">
										<select class="year">
											<option value="">=== Other Banks ===</option>
											<option value="ALB-NA">Allahabad Bank NetBanking</option>
										</select>
									</div>
									<input type="submit" value="PAY NOW">
								</form>
							</div>
						</div>
						<div>
							<div id="tab4" class="tab-grid" style="display: block;">
								<div class="row">
									<div class="col-md-6">
										<img class="pp-img" src="resources/images/paypal.png" alt="Image Alternative text" title="Image Title">
										<p>Important: You will be redirected to PayPal's website to securely complete your payment.</p>
										<a class="btn btn-primary">Checkout via Paypal</a>
									</div>
									<div class="col-md-6 number-paymk">
										<form class="cc-form">
											<div class="clearfix">
												<div class="form-group form-group-cc-number">
													<label>Card Number</label>
													<input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text">
													<span class="cc-card-icon"></span>
												</div>
												<div class="form-group form-group-cc-cvc">
													<label>CVV</label>
													<input class="form-control" placeholder="xxxx" type="text">
												</div>
											</div>
											<div class="clearfix">
												<div class="form-group form-group-cc-name">
													<label>Card Holder Name</label>
													<input class="form-control" type="text">
												</div>
												<div class="form-group form-group-cc-date">
													<label>Valid Thru</label>
													<input class="form-control" placeholder="mm/yy" type="text">
												</div>
											</div>
											<div class="checkbox checkbox-small">
												<label>
													<input class="i-check" type="checkbox" checked="">Add to My Cards</label>
											</div>
											<input type="submit" class="submit" value="Proceed Payment">
										</form>
									</div>
								</div>

							</div>
						</div> -->

					</div>
				</div>
				<!--Plug-in Initialisation-->
			</div>
				</div>
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
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$customer_id = Session::get("customer_id");
								$getCartValue = $cart->getOrderedProduct($customer_id);
								if(isset($getCartValue)){
									$sum = 0;
                                    $quantity = 0;
									foreach ($getCartValue as $key =>$value) {			
										?>
										<tr class="rem1">
											<td class="invert"><?php echo $key+1;?></td>
											<td class="invert"><?php echo $value['product_name']; ?></td>
											<td class="invert"><?php echo $value['product_quantity']; ?></td>
											<td class="invert">
												<?php echo $value['product_price']; ?>
													
												</td>
											<td class="invert">
												<?php 
													$total = $value['product_price']*$value['product_quantity'];
													echo $total;
												?>
											</td>
											<td class="invert">
												<?php  if($value['status'] == "processing")echo "Processing";
												else echo "shiped"; ?></td>
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
	<!-- //payment page -->
<?php include "sources/footer.php"; ?>