<?php 

		require_once __DIR__ . '/../vendor/autoload.php';
		$brand = new Brand();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$brand->deleteAboutUsInfo($_POST['id']);
		}
 ?>