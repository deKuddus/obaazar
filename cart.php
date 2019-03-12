	<?php 
	include "sources/header.php"; 

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_cart']))
	{
		$cart->updateCartQuantity($_POST);
	}

	if(isset($_GET['cart_id_for_remove']))
	{
		$cart_id = $_GET['cart_id_for_remove'];
		$cart->deleteFroCart($cart_id);
	}
?>

<style type="text/css">
	.button_style{
		    height: 50px;
		    padding: 21px 38px 38px 32px;
		    margin-top: 18px;
		    font-size: 22px;
		    font-family: serif;
		    font-weight: bold;
	}
</style>
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>cart</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Cart
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4>Your shopping cart contains:</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Image</th>
								<th>Product Name</th>
								<th>Product Price</th>
								<th>Total price per product</th>
								<th>Quantity</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$getCartValue = $cart->getCartProduct();
								if($getCartValue){
									$sum = 0;
                                    $quantity = 0;
									foreach ($getCartValue as $key =>$value) {?>
										<tr class="rem1">
											<td class="invert"><?php echo $key+1;?></td>
											<td class="invert-image">
													<img src="admin/<?php echo $value['prod_image']; ?>" alt=" " height="80px" weight="90px">
											</td>
											<td class="invert"><?php echo $value['prod_name']; ?></td>
											<td class="invert"><?php echo $value['prod_price']; ?></td>
											<td class="invert">
												<?php 
													$total = $value['prod_price']*$value['prod_quantity'];
													echo $total;
												?>
											</td>
											<td class="invert">
												<form method="post" action="">
												<div style="margin: 10px">
														<input type="number" name="product_quantity" value="<?php echo $value['prod_quantity'];?>" style="width: 50px;">
														<input type="hidden" name="cart_id" value="<?php echo $value['cart_id'];?>">
														<input type="submit" name="update_cart" value="update">
												</div>
												</form>
											</td>
											<td class="invert">
												<div class="rem">
													<a href="?cart_id_for_remove=<?php echo $value['cart_id'];?>" onclick="return confirm('Are you sure to remove the product??')" style="font-size: 20px">X</a>
												</div>
											</td>
										</tr>
									<?php
	                                    $sum = $sum + $total;
	                                    $quantity = $quantity + $value['prod_quantity'];
	                                    Session::set("sum", $sum);
	                                    Session::set("quantity", $quantity);
	                              }	}else{?>
	                              	<tr>
	                              		<td colspan="7" style="color: red;font-weight: bold;font-size: 25px;">NO ITEM INTO CART, PLEASE SHOP SOME ITEM TO PROCEED</td>
	                              	</tr>
	                              <?php } ?>
						</tbody>
					</table>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="resources/images/shop.png" class="pull-left" alt="" style="height: 100px"/></a>
							<?php 
								if($getCartValue != ""){
							 ?>
							<div class="pull-right">
								<a href="shiping.php?gift" class="btn btn-warning button_style">Send Gift</a>
								<a href="shiping.php?ship" class="btn btn-warning button_style">Deliver To Me</a>
							</div>
						<?php } ?>
						</div><!-- 
						<div class="shopright">
						</div> -->
					</div>
				</div>
			</div>	
		</div>
	</div>
	<!-- //checkout page -->
 <?php include "sources/footer.php"; ?>