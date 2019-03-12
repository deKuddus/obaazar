<?php 
	include "sources/header.php";

	if(isset($_GET['product_id'])){
		$p_id = $_GET['product_id'];
		$addToCart = $cart->addProductToCart($p_id);
	}
 ?>
	<div class="ads-grid">
		<div class="container">
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-12">
				<div class="wrapper">
					<!-- all products -->
					<div class="product-sec1">
						<h3 class="heading-tittle">Sub category From <?php if(isset($_GET['category_name'])) echo $_GET['category_name']; ?></h3>
						<?php 
							if(isset($_GET['category_id'])){
								$category_id = $_GET['category_id'];
								$sub_cat_by_category_name = $category->showSubCategoryByCategory($category_id);
								if($sub_cat_by_category_name){
									foreach ($sub_cat_by_category_name as  $value) {?>
									<div class="col-md-4 product-men">
			                            <div class="men-pro-item simpleCart_shelfItem">
			                                <div class="men-thumb-item">
			                                    <img src="admin/<?php echo $value["sub_cat_image"]?>" height="100px" weight="90px" alt=""> 
			                                </div>
			                                <div class="item-info-product ">
			                                    <h4>
			                                        <?php echo $value["sub_category_name"]?>
			                                    </h4><br>
			                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
			                                        <a href="product.php?category_id=<?php echo $value["category_id"];?>&&sub_category_name=<?php echo $value['sub_category_name'];?>" class="btn btn-primary">Product From <?php echo $value['sub_category_name'] ?>
			                                    	</a>
			                                    </div>

			                                </div>
			                            </div>
			                        </div>
						<?php }  }  }	 ?>

						<?php 
							if(isset($_GET['product_brand'])){
								$product_brand = $_GET['product_brand'];
								$product_by_brand_name = $product->showProductByBrand($product_brand);
								if($product_by_brand_name){
									foreach ($product_by_brand_name as  $value) {?>
									<div class="col-md-4 product-men">
			                            <div class="men-pro-item simpleCart_shelfItem">
			                                <div class="men-thumb-item">
			                                    <img src="admin/<?php echo $value["product_image"]?>" height="160px" weight="130px" alt="">
			                                    <div class="men-cart-pro">
			                                        <div class="inner-men-cart-pro">
			                                            <a href="view_single.php?product_id=<?php echo $value["product_id"];?>" class="link-product-add-cart">Quick View</a>
			                                        </div>
			                                    </div>
			                                    <span class="product-new-top">New</span>
			                                </div>
			                                <div class="item-info-product ">
			                                    <h4>
			                                        <?php echo $value["product_title"]?>
			                                    </h4>
			                                    <div class="info-product-price">
			                                        <span class="item_price"><?php echo  $value["product_price"];?> টাকা</span>
			                                    </div>
			                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
			                                        <a href="?product_id=<?php echo $value["product_id"];?>" class="btn btn-primary">ADD TO CART</a>
			                                    </div>

			                                </div>
			                            </div>
			                        </div>
						<?php }  }  }	 ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->

<?php 
	include "sources/footer.php";
 ?>