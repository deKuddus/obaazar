<?php 
	include "sources/header.php";
	include "sources/slider.php";
	include "sources/sidebar.php";

 ?>
 <style>
#loading
{
 text-align:center; 
 background: url('resources/images/loader.gif') no-repeat center; 
 height: 150px;
}
</style>

			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- all products -->
					<div class="product-sec1">
						<h3 class="heading-tittle">Recent Products</h3>
						<!-- product showing by ajax -->
						<div class="filter_data"></div>
						<!-- //product showing by ajax -->
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
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
						<li>
							<div class="w3l-specilamk">
								<div class="speioffer-agile">
									<a href="sub-cat-by-cat.php?category_id=<?php echo $value['category_id'];?>&&category_name=<?php echo $value['category_name'] ?>">
										<img src="admin/<?php echo $value['category_image'];?>" height="100px" weight="250px" alt="">
										
									</a>
										<div class="product-name-w3l">
											<h4>
											<a href="sub-cat-by-cat.php?category_id=<?php echo $value['category_id'];?>&&category_name=<?php echo $value['category_name'] ?>"">
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