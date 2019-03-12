<?php 

		require_once __DIR__ . '/../vendor/autoload.php';
		$product = new Product();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$loadProductByajax = $product->getProductByAjax($_POST);
		}

 ?>