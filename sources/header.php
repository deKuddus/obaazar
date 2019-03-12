<?php 
	require_once __DIR__ . '/../vendor/autoload.php';

	$product = new Product();
	$msg = Message::getMessage();
	$customer = new Customer();
	$brand = new Brand();
	$category = new Category();
	$cart = new Cart();
	$banner = new Banner();
	if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['signup'])){
		$customer_register = $customer->registerCustomer($_POST);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['signin'])){
		$customer_login = $customer->loginCustomer($_POST);
	}	

   	if(isset($_GET['logout'])){
   		Session::sessionDestroy();
   	}

   	if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST['send_list'])){
   		$storeShopingList = $cart->storeCusotmerShopingList($_POST);
   	}



 ?>
<!DOCTYPE html>
<html lang="en_US">
<head>
	<title>online Grocery  Home :: Obaazar</title>
	<!--/tags -->
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="resources/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="resources/css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="resources/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="resources/css/jquery-ui1.css">
	<link rel="stylesheet" href="resources/css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/creditly.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="resources/css/easy-responsive-tabs.css " />
	

	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
	<script type="text/javascript">
			function product_add_tocart(id)
			{
				$.ajax({
			            url:"ajax_load/product_add_by_ajax.php",
			            method:"POST",
			            data:{id:id},
			            success:function(data){
			               loadCart()
			            }
			        });
			}

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
		function showSubCategory(id)
		{
			$.ajax({
		            url:"ajax_load/subCategory_load_by_ajax.php",
		            method:"POST",
		            data:{id:id},
		            success:function(data){
		                $('#subCatshow').html(data);
		            }
		        });	
		}

		function check_cart_limit()
		{
			var session_id = "<?php echo session_id();?>" ;
			$.ajax({
		            url:"ajax_load/cart_check_by_ajax.php",
		            method:"POST",
		            data:{session_id:session_id},
		            success:function(data){
		               if(data == "low"){
		               	alert("Minimum order is 500tk");
		               }else if(data == "ok"){
		               	window.location = 'checkout.php';
		               }
		            }
		        });
		}


		/*function validate_newAddress(){
			var name = document.getElementById("name_add").value;
			var phone = document.getElementById("phone_add").value;
			var house = document.getElementById("houe_add").value;
			var city = document.getElementById("city_add").value;
			var district = document.getElementById("district_add").value;

			if(name == ""){
				document.getElementById("name_err").style.display = 'inline';
				document.getElementById("name_add").focus();
			}else if(phone == ""){
				document.getElementById("phone_err").style.display = 'inline';
				document.getElementById("phone_add").focus();
			}else if(house == ""){
				document.getElementById("house_err").style.display = 'inline';
				document.getElementById("house_add").focus();
			}else if(city == ""){
				document.getElementById("city_err").style.display = 'inline';
				document.getElementById("city_add").focus();
			}else if(district == ""){
				document.getElementById("district_err").style.display = 'inline';
				document.getElementById("district_add").focus();
			}else{
				return true;
			}
		}*/
	</script>
</head>

<body>
	<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.2'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="322847868356320">
</div>
<!-- //Load Facebook SDK for JavaScript -->

	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.php">
						<span>O</span>baazar
						<img src="resources/images/logo2.png" alt=" ">
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class="col-md-8 header">
				<!-- header lists -->
				<ul>
					<li>
						<a class="play-icon popup-with-zoom-anim">
							<span class="fa fa-map-marker" aria-hidden="true"></span>Chattogram</a>
					</li>
					<li>
						<span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
					</li>
					<?php 
						$customer_id = Session::get("customer_id");
						if($customer_id != ""){?>

							<li>
								<a href="profile.php?customer_id=<?php echo $customer_id;?>">
									<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Profile </a>
							</li>
							<li>
								<a href="?logout=logout">
									<span class="fa fa-unlock-alt" aria-hidden="true"></span>logout</a>
							</li>

						<?php }else{?>
					<li>
						<a href="signin.php">
							<span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
					</li>
					<li>
						<a href="signin.php">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
					</li>
				<?php } ?>

				</ul>
				<!-- //header lists -->
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="search_product" type="search" placeholder="serch by product name" required="">
					</form>
				</div>
				<!-- //search -->
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<button class="w3view-cart">
								
								<a href="cart.php" style="color: white;">
								<span id="cart_update"></span>
									<i class="fa fa-cart-arrow-down" style="font-size: 25px;" aria-hidden="true"></i></a>
							</button>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //header-bot -->
	<!-- navigation -->
	<div class="ban-top">
	<h2 class="text-center text-danger"><?php echo "<div id='message'> $msg</div>"?> </h2>
		<div class="container">
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="index.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="">
									<a class="nav-stylehead" href="about.php">About Us</a>
								</li>
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitchen
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Bakery</a>
													</li>
													<li>
														<a href="product.html">Baking Supplies</a>
													</li>
													<li>
														<a href="product.html">Coffee, Tea & Beverages</a>
													</li>
													<li>
														<a href="product.html">Dried Fruits, Nuts</a>
													</li>
													<li>
														<a href="product.html">Sweets, Chocolate</a>
													</li>
													<li>
														<a href="product.html">Spices & Masalas</a>
													</li>
													<li>
														<a href="product.html">Jams, Honey & Spreads</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<ul class="multi-column-dropdown">
													<li>
														<a href="product.html">Pickles</a>
													</li>
													<li>
														<a href="product.html">Pasta & Noodles</a>
													</li>
													<li>
														<a href="product.html">Rice, Flour & Pulses</a>
													</li>
													<li>
														<a href="product.html">Sauces & Cooking Pastes</a>
													</li>
													<li>
														<a href="product.html">Snack Foods</a>
													</li>
													<li>
														<a href="product.html">Oils, Vinegars</a>
													</li>
													<li>
														<a href="product.html">Meat, Poultry & Seafood</a>
													</li>
												</ul>
											</div>
											<div class="col-sm-4 multi-gd-img">
												<img src="resources/images/nav.png" alt="">
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li> -->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										Kitchen
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column columns-3">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<?php 
														$categoryList = $category->showCategoryIfno();
														if($categoryList){
															foreach ($categoryList as  $value) {?>
													<li>
														<a href="" onmouseover="showSubCategory(<?php echo $value['category_id'];?>)"><?php echo "=>".$value['category_name']; ?></a>
													</li>
												<?php } } ?>
												</ul>
											</div>
											<div class="col-sm-6 multi-gd-img">
												<ul class="multi-column-dropdown">
													<div id="subCatshow"></div>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
								<li class="">
									<a href="send-order.php" class="nav-stylehead">Send List</a>
								</li>
								<li class="dropdown">
									<a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">Pages
										<b class="caret"></b>
									</a>
									<ul class="dropdown-menu agile_short_dropdown">
										<li>
											<a href="icons.html">Web Icons</a>
										</li>
										<li>
											<a href="typography.html">Typography</a>
										</li>
									</ul>
								</li>
								<li class="">
									<a class="nav-stylehead" href="contact.php">Contact</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->