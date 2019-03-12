

	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<!-- <div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form >
						<input type="search" class="common_selector search" placeholder="Product name..." id="search_name" required="">
					</form>
				</div> -->
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<p id="amount">0 - 5000</p>
							<input type="hidden" id="hidden_minimum_price" value="0" />
                   			<input type="hidden" id="hidden_maximum_price" value="5000" />
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!-- food preference -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Brand List</h3>
					<ul>
						<?php 
							$getBrand = $brand->showBrand();
							if($getBrand){
								foreach ($getBrand as  $value) { ?>
								<li>
									<form>
									<input type="checkbox" class="checked common_selector brand" value="<?php echo $value['brand_name']; ?>">
									<span class="span"><?php echo $value['brand_name']; ?></span>
									</form>
								</li>
								<?php } } ?>
					</ul>
				</div>
				<div class="left-side">
					<h3 class="agileits-sear-head">Category List</h3>
					<ul>
						<?php 
							$getCategory = $category->showCategoryIfno();
							if($getCategory){
								foreach ($getCategory as  $value) { ?>
						<li>
							<form>
							<input type="checkbox" class="checked common_selector category"  value="<?php echo $value['category_name']; ?>">
							<span class="span"> <?php echo $value['category_name']; ?></span>
							</form>
						</li>
						<?php } } ?>
					</ul>
				</div>
	
			</div>