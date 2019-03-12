<?php 
	include "sources/header.php";
	//include "sources/slider.php";
	global $category;

 ?>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Single Page</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Single Page -->
	<?php
	 	if(isset($_GET['product_id'])){
	 		$product_id = $_GET['product_id'];
	 		$getProduct_by_id = $product->getSinleProductByID($product_id);
	 		if($getProduct_by_id){
	 			foreach ($getProduct_by_id as  $value) { $category = $value['product_category'];
	 			?>
		<div class="banner-bootom-w3-agileits">
			<div class="container">
				<!-- tittle heading -->
				<h3 class="tittle-w3l">View Product Details
					<span class="heading-style">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</h3>
				<!-- //tittle heading -->
				<div class="col-md-5 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="admin/<?php echo $value['product_image'];?>">
									<div class="thumb-image">
										<img src="admin/<?php echo $value['product_image'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
								<li data-thumb="admin/<?php echo $value['prod_another_image1'];?>">
									<div class="thumb-image">
										<img src="admin/<?php echo $value['prod_another_image1'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
								<li data-thumb="admin/<?php echo $value['prod_another_image2'];?>">
									<div class="thumb-image">
										<img src="admin/<?php echo $value['prod_another_image2'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem">
					<h3><?php echo $value['product_title'];?></h3>
					<p>
						<span class="item_price"><?php echo $value['product_price'];?>taka</span>
					</p>
					<div class="single-infoagile">
						<ul>
							<?php 
								$product_features = explode('.', $value['product_features']);
								foreach ($product_features as  $data) {?>
							<li>
								<?php echo $data; ?>
							</li>
						<?php } ?>
						</ul>
					</div>
					<div class="product-single-w3l">
						<ul>
							<?php 
								$product_details = explode('.', $value['product_details']);
								foreach ($product_details as  $data) {?>
								<li>
									<?php echo $data; ?>
								</li>
						   <?php } ?>
						</ul>
						<p>
							<i class="fa fa-refresh" aria-hidden="true"></i>All food products are
							<label>non-returnable.</label>
						</p>
					</div>
					<div class="occasion-cart">
						<form>
						<input type="hidden" id="prod_id_forCart" value="<?php echo $value['product_id'];?>">
						<input type="button"  id="ddd" class="btn btn-primary" value="Add TO Cart">
						</form>
					</div>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	<?php } } } ?>
	<!-- //Single Page -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add More
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
					</li>
					

						<?php 
							$productBycategory = $product->getProductByCategory($category);
							if($productBycategory){
								foreach ($productBycategory as  $value) {?>
								<li>
								<div class="w3l-specilamk">
									<div class="speioffer-agile">
										<a href="?product_id=<?php echo $value['product_id'];?>">
											<img src="admin/<?php echo $value['product_image'];?>" alt="">
										</a>
									</div>
									<div class="product-name-w3l">
										<h4>
											<a href="?product_id=<?php echo $value['product_id'];?>">
												<?php echo $value['product_title']; ?>
											</a>
										</h4>
										<div class="w3l-pricehkj">
											<h6><?php echo $value['product_price']; ?>taka</h6>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<a href="?product_id=<?php echo $value["product_id"];?>" class="btn btn-primary">ADD TO CART</a>
										</div>
									</div>
								</div>
								</li>
						<?php } } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->

<?php include "sources/footer.php"; ?>

</body>

</html>