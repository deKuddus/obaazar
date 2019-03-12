	<!-- newsletter -->
	<div class="footer-top">
		<div class="container-fluid">
			<div class="col-xs-8 agile-leftmk">
				<h2>Get your Groceries delivered from local stores</h2>
				<p>Free Delivery on your first order!</p>
				<form action="#" method="post">
					<input type="email" placeholder="E-mail" name="email" required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="newsform-w3l">
					<span class="fa fa-envelope-o" aria-hidden="true"></span>
				</div>
			</div>
			<div class="col-xs-4 w3l-rightmk">
				<img src="resources/images/tab3.png" alt=" ">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //newsletter -->
	
<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer second section -->
			<div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Track Your Order</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Easy Shoping of daily life</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-location-arrow" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Ontime Product Delivery </h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- //footer second section -->
			<!-- footer third section -->
			<div class="footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-sm-3 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Categories</h3>
						<ul>
						<?php 
							$getCategory = $category->getAllCategoryListRandom();
							if($getCategory){
								foreach ($getCategory as  $value) {?>
							<li>
								<a href="product-category.php?category_name=<?php echo $value['category_name']; ?>"><?php echo $value['category_name']; ?></a>
							</li>
						<?php } } ?>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-sm-5 address-right">
					<div class="col-xs-6 footer-grids">
						<h3>Quick Links</h3>
						<ul>
							<li>
								<a href="about.php">About Us</a>
							</li>
							<li>
								<a href="contact.php">Contact Us</a>
							</li>
							<li>
								<a href="faqs.php">Faqs</a>
							</li>
							<li>
								<a href="terms.php">Terms of use</a>
							</li>
							<li>
								<a href="privacy.php">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-xs-6 footer-grids">
						<h3>Get in Touch</h3>
						<ul>
							<li>
								<i class="fa fa-map-marker"></i> 161, Sahadad Mansion,</li>
							<li>
								<i class="fa fa-mobile"></i>Sadargat Road, Chittagong 4500,Bangladesh. </li>
							<li>
								<i class="fa fa-phone"></i> +88 01813 630 438 </li>
							<li>
								<i class="fa fa-envelope-o"></i>
								<a href="mailto:obaazar@gmail.com"> obaazar@gmail.com</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- //quick links -->
				<!-- social icons -->
				<div class="col-sm-4 footer-grids  w3l-socialmk">
					<h3>Follow Us on</h3>
					<div class="social">
						<ul>
							<li>
								<a class="icon fb" href="#">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li>
								<a class="icon tw" href="#">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
							<li>
								<a class="icon gp" href="#">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="agileits_app-devices">
						<h5>Download the App</h5>
						<a href="#">
							<img src="resources/images/1.png" alt="">
						</a>
						<a href="#">
							<img src="resources/images/2.png" alt="">
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //social icons -->
				<div class="clearfix"></div>
			</div>
			<!-- //footer third section -->
			<!-- footer fourth section (text) -->
			<div class="agile-sometext">
				<div class="sub-some">
					<h5>Obaazar Online Grocery</h5>
					<p style="color:black">Order online. All your favourite products from the low price <span class="text-success">obaazar</span> grocery home delivery in Chittagong [coverege in whole citycorporation area].
					</p>
				</div>
				<!-- brands -->
				<div class="sub-some">
					<h5>Popular Brands</h5>
					<ul>
						<?php 
							$getBrand = $brand->getAllBrandListRandom();
							if($getBrand){
								foreach ($getBrand as  $value) {?>
						<li>
							<a href="product-by-bran.php?brand-name=<?php echo $value['brand_name']; ?>"><?php echo $value['brand_name']; ?></a>
						</li>
						<?php } } ?>
					</ul>
				</div>
				<!-- //brands -->
				<!-- payment -->
				<div class="sub-some child-momu">
					<h5>Payment Method</h5>
					<ul>
						<li>
							<img src="resources/images/pay8.png" alt="" height="80px" weight="130px">
						</li>
						<!-- <li>
							<img src="resources/images/pay2.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay5.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay1.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay4.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay6.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay3.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay7.png" alt="">
						</li>
						<li>
							<img src="resources/images/pay9.png" alt="">
						</li> -->
					</ul>
				</div>
				<!-- //payment -->
			</div>
			<!-- //footer fourth section (text) -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© <?php echo date("Y-"); ?> Obaazar Shop. All rights reserved.
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="resources/js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="resources/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->


	<!-- price range (top products) -->
	<script src="resources/js/jquery-ui.js"></script>

	<!-- product load by ajax -->

	<script>
		$(document).ready(function(){

		    filter_data();

		    function filter_data()
		    {
		        $('.filter_data').html('<div id="loading" style="" ></div>');
		        var action = 'fetch_data';
		        var minimum_price = $('#hidden_minimum_price').val();
		        var maximum_price = $('#hidden_maximum_price').val();
		        var brand = get_filter('brand');
		        var category = get_filter('category');
		        $.ajax({
		            url:"ajax_load/product_load_by_ajax.php",
		            method:"POST",
		            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand,category:category},
		            success:function(data){
		                $('.filter_data').html(data);
		            }
		        });
		    }

		    function get_filter(class_name)
		    {
		        var filter = [];
		        $('.'+class_name+':checked').each(function(){
		            filter.push($(this).val());
		        });
		        return filter;
		    }

		    $('.common_selector').click(function(){
		        filter_data();
		    });

			$("#slider-range").slider({
						range: true,
						min: 0,
						max: 100,
						values: [0, 100],
						stop: function (event, ui) {
						$("#amount").html("$" + ui.values[0] + " - $" + ui.values[1]);
			            $('#hidden_minimum_price').val(ui.values[0]);
			            $('#hidden_maximum_price').val(ui.values[1]);
			            filter_data();
		        		}
		    });

		});
	</script>
<!-- //product load by ajax  -->
<!-- cart load -->
<script type="text/javascript">
	$(document).ready(function(){
		loadCart();
		function loadCart(){
			var cart_action ="cart";
		  $.ajax({
		            url:"ajax_load/cart_load_by_ajax.php",
		            method:"POST",
		            data:{cart_action:cart_action},
		            success:function(data){
		                $('#cart_update').html(data);
		            }
		        });
		}
	});
</script>
<!-- //cart load -->

<!-- address toggle -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#address').hide();
		$('#new_address_button').click(function(){
			$('#address').toggle('slow');
		});
	});
</script>
<!-- //address toggle -->

<!-- add to cart -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#ddd").click(function(){
			var id = $("#prod_id_forCart").val();
			$.ajax({
		            url:"ajax_load/product_add_by_ajax.php",
		            method:"POST",
		            data:{id:id},
		            success:function(data){
		                
		            }
		        });
		});
	});
</script>
<!-- //add to cart -->
<!-- another product add to cart -->

<!-- //another product add to cart -->
	<!-- flexisel (for special offers) -->
	<script src="resources/js/jquery.flexisel.js"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="resources/js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="resources/js/move-top.js"></script>
	<script src="resources/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<script src="resources/js/easyResponsiveTabs.js"></script>

	<script>
		$(document).ready(function () {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!-- //easy-responsive-tabs -->

	<!-- for bootstrap working -->
	<script src="resources/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->


		<!-- imagezoom -->
	<script src="resources/js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
	<script src="resources/js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
<script type="text/javascript">
    jQuery(
        function($) {
            $('#message').fadeOut (1000);
            $('#message').fadeIn (1000);
            $('#message').fadeOut (1000);
            $('#message').fadeIn (1000);
            $('#message').fadeOut (1000);
        }
    )
    $(function () {
         $('#example1').DataTable();
     })
</script>
	<!-- credit-card -->
	<script src="resources/js/creditly.js"></script>

	<script>
		$(function () {
			var creditly = Creditly.initialize(
				'.creditly-wrapper .expiration-month-and-year',
				'.creditly-wrapper .credit-card-number',
				'.creditly-wrapper .security-code',
				'.creditly-wrapper .card-type');

			$(".creditly-card-form .submit").click(function (e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
					// Your validated credit card output
					console.log(output);
				}
			});
		});
	</script>
	<!-- //credit-card -->
	<!-- easy-responsive-tabs -->

</body>

</html>