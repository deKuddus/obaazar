<?php 
	include "sources/header.php";
	Session::checkCustomerSessionLog();

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['prof_update'])){
		$update_prof = $customer->updateCustomerProfile($_POST);	
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
					<li>profile</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Profile
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
				<div class="col-md-6">
						<?php 
							$id = Session::get("customer_id");
							$profile_data = $customer->getCustomerProfile($id);
							if($profile_data){
								foreach ($profile_data as  $data) {?>
							
				          <div class="box box-widget widget-user-2">
				              <h3 class="widget-user-username"><?php echo $data['customer_name'];?></h3>
				            <div class="box-footer no-padding">
				              <ul class="nav nav-stacked">
				                <li><a href="#">Your ID <span class="pull-right badge bg-blue"><?php echo "customer-".$data['customer_id'];?></span></a>
				                </li>
				                <li><a href="#">Full Name<span class="pull-right badge bg-aqua"><?php echo $data['customer_full_name'];?></span></a>
				                </li>
				                <li><a href="#">Your Phone<span class="pull-right badge bg-aqua"><?php echo $data['customer_phone'];?></span></a>
				                </li>
				                <li><a href="#">Your House Name and No<span class="pull-right badge bg-aqua"><?php echo $data['customer_house_name'];?></span></a>
				                </li>
				                <li><a href="#">Your City<span class="pull-right badge bg-aqua"><?php echo $data['customer_city'];?></span></a>
				                </li>
				                <li><a href="#">Your District<span class="pull-right badge bg-aqua"><?php echo $data['customer_district'];?></span></a>
				                </li>
				              </ul>
				            </div>	
				            <?php if(!isset($_GET['update_profile'])){ ?>
				              <h3 class="btn btn-success pull-right"><a href="?update_profile=update" style="color: white;">Update Profile</a></h3>
				          <?php } ?>
				          </div>
						<?php } } ?>
				</div>
				<div class="col-md-6">
					<?php if(isset($_GET['update_profile'])){?>
					<h4 class="text-center text-success" style="font-weight: bold;">Update your profile</h4><br>
					<form action="" method="post">
					<div class="form-group">
						<label for="full_name">Full Name</label>
						<input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $data['customer_full_name']; ?>">
					</div>
					<div class="form-group">
						<label for="house_name">Your House name and no</label>
						<input class="form-control" type="text" name="house_name" id="house_name" value="<?php echo $data['customer_house_name']; ?>"> 
					</div>
					<div class="form-group">
						<label for="city">Your City</label>
						<input type="text" class="form-control" name="city" id="city" value="<?php echo $data['customer_city']; ?>">
					</div>
					<div class="form-group">
						<label for="district">Your District</label>
						<input type="text" name="district" class="form-control" id="district" value="<?php echo $data['customer_district']; ?>">
					</div>

					<div class="form-group">
						<input type="hidden" name="cutomer_id" value="<?php echo $data['customer_id'];?>">
						<button type="submit" name="prof_update" class="btn btn-primary pull-right">Submit</button>
					</div>
					</form>
				<?php } ?>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Single Page -->
	<!-- prevoius shoped Product -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Prevoius Successfully Deliveried Order
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4>Your prevoius shopping cart contains:</h4>
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
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$customer_id = Session::get("customer_id");
								$getCartValue = $cart->getPrevipusOrderedShipedProduct($customer_id);
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
												<td class="invert"><?php echo date('F j, Y', strtotime($value['date'])) ; ?></td>
										</tr>
									<?php
	                                    $sum = $sum + $total;
	                              }	?>
	                              		<tr class="rem1">
											<td  colspan="7">
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

	<!-- //prevoius shoped product -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add More product To your cart
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
					<?php 
						$showRandomProduct = $product->getProductRandom(); 
						if($showRandomProduct){
							foreach ($showRandomProduct as $products) {?>
							
					<li>

						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="view_single.php?product_id=<?php echo $products['product_id'];?>">
									<img src="admin/<?php echo $products['product_image']; ?>" alt="" height="160px" weight="130px">
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="view_single.php?product_id=<?php echo $products['product_id'];?>"><?php echo $products['product_title']; ?>
									</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6><?php echo $products['product_price']; ?></h6>
								</div>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">	
								<input type="submit" class="btn btn-primary" value="Add TO Cart" onclick="product_add_tocart(<?php echo $products['product_id'] ?>);">
								</div>
							</div>
						</div>
					</li>
					<?php }	} ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->

<?php include "sources/footer.php"; ?>
