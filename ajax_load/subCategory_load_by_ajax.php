<?php 

		require_once __DIR__ . '/../vendor/autoload.php';
		$category = new Category();
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$category->loadSubCategoryByCategoryId($_POST['id']);
		}
 ?>