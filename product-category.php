<?php 
	include "sources/header.php";
 ?>

 <?php 
 	if(isset($_GET['category_name'])){
		$category_name = $_GET['category_name'];
		$getProduct = $product->getProductByCategoryFromFooter($category_name);
  ?>


	<div class="ads-grid">
		<div class="container">
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-12">
				<div class="wrapper">
					<!-- all products -->
					<div class="product-sec1">
						<h3 class="heading-tittle"></h3>
						<?php if(isset($getProduct)){
							foreach ($getProduct as  $value) {?>
							<div class="col-md-4 product-men">
	                            <div class="men-pro-item simpleCart_shelfItem">
	                                <div class="men-thumb-item">
	                                    <img src="admin/<?php echo $value["product_image"];?>" height="160px" weight="130px" alt="">
	                                    <div class="men-cart-pro">
	                                        <div class="inner-men-cart-pro">
	                                            <a href="view_single.php?product_id=<?php echo $value["product_id"];?>" class="link-product-add-cart">Quick View</a>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="item-info-product ">
	                                    <h4><?php echo $value["product_title"]; ?></h4>
	                                    <div class="info-product-price">
	                                        <span class="item_price"><?php echo $value["product_price"]."Taka"; ?></span>
	                                    </div>
	                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
		                                        <input type="submit"  name="add_to_cart_from_category" class="btn btn-primary" value="Add TO Cart" onclick="product_add_tocart(<?php echo $value["product_id"]; ?>);">
	                                    </div>

	                                </div>
	                            </div>
	                        </div>
                   		 <?php  } } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
<?php } ?>
	<!-- //top products -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Category List
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
						$categoryList = $category->showCategoryIfno();
						if($categoryList){
							foreach ($categoryList as  $value) {?>		
						<li style="width: 300px;">
							<div class="w3l-specilamk">
								<div class="speioffer-agile">
									<a href="product_by_category.php?category_name=<?php echo $value['category_id'];?>">
										<img src="admin/<?php echo $value['category_image'];?>" height="100px" weight="250px" alt="">
										
									</a>
										<div class="product-name-w3l">
											<h4>
											<a href="product_by_category.php?category_name=<?php echo $value['category_id'];?>">
												<?php echo $value['category_name']; ?>
											</a>
											</h4>
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
<?php 
	include "sources/footer.php";
 ?>