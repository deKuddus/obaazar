
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php 
				$get_banner = $banner->loadBannerDynamically();
				if($get_banner){
					$i = 0;
					foreach ($get_banner as  $value) {?>
						<style type="text/css">
							<?php if($i==0) {?>
							.carousel .item
							<?php }elseif($i == 1){ ?>
								.carousel .item.item2
								<?php }elseif($i == 2){ ?>
									.carousel .item.item3
									<?php }elseif($i == 3){ ?>
										.carousel .item.item4 <?php } ?>{    
							background:-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?php echo "admin/".$value['banner_image'] ?>) no-repeat;
							background:-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?php echo "admin/".$value['banner_image'] ?>) no-repeat;
							background:-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?php echo "admin/".$value['banner_image'] ?>) no-repeat; 
							background:linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(<?php echo "admin/".$value['banner_image'] ?>) no-repeat;
							background-size:cover;	 
						}				
						</style>
			<?php if($i ==0){ ?>
			<div class="item active">
			<?php }elseif($i == 1){ ?>
				<div class="item item2">
			<?php }elseif ($i==2) {?>
				<div class="item item3">
			<?php }elseif ($i==3) {?>
				<div class="item item4">
			<?php }?>
				<div class="container">
					<div class="carousel-caption">
						<h3><?php echo $value['banner_caption']; ?>
							<span>new</span>
						</h3>
						<a class="button2" href="view_single.php?product_id=<?php echo $value['product_id'];?>">Shop Now </a>
					</div>
				</div>
			</div>
		<?php $i++;} } ?>
			<!-- // -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->