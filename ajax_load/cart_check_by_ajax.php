<?php 

		require_once __DIR__ . '/../vendor/autoload.php';
		$cart = new Cart();

		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['session_id'])){
			$checkMinCartValue = $cart->checkCartMinimunRange($_POST['session_id']);
		}

 ?>