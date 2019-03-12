<?php 

		require_once __DIR__ . '/../vendor/autoload.php';
		$cart = new Cart();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$loadCartByajax = $cart->getCartByAjax($_POST);
		}

 ?>