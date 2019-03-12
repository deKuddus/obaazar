<?php
require_once __DIR__.'/../../vendor/autoload.php';

class Category extends Database
	{

	    public  function validation($data)
	    {

	        $data = trim($data);
	        $data = stripcslashes($data);
	        $data = htmlspecialchars($data);
	        return $data;

	    }

		public function storeCategoryInfo($data)
		{
			$name = $this->validation($data['category_name']);
			$category_slug = $this->validation($data['category_slug']);

			$category_slug_len = strlen($category_slug);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

	        $file_Name = $_FILES['category_image']['name'];
	        $file_Size = $_FILES['category_image']['size'];
	        $file_Temp = $_FILES['category_image']['tmp_name'];
	        $div = explode('.', $file_Name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
	        $upload_image = "category_images/" . $unique_image;

			if($name =="" OR $file_Name =="" OR $category_slug == ""){
				Message::showMessage("Error!! Category name, slug or image should be filled up");
			}elseif($category_slug_len > 20){
				Message::showMessage("Error!! Category slug should less than 20 characters");
			}else{
				$sqlSelectQuery = "SELECT category_name from categories where category_name = '$name' OR category_slug = '$category_slug'";
				$check_duplicate = $this->select($sqlSelectQuery);
				if($check_duplicate){
		        	Message::showMessage("Error!! Category name is already exist");
				}else{
					if(move_uploaded_file($file_Temp, $upload_image)){         
						$query = "INSERT INTO categories (category_name,category_slug,category_image)VALUES('$name','$category_slug','$upload_image')";
						$result = $this->insert($query);
				        if($result){
				        	Message::showMessage("Success! Category name added successfully");
				        }else{
				        	Message::showMessage("Error! Category Name can not be added,try again");
				        }
					}
				}

			}
		}

		public function showCategoryIfno()
		{
			$sqlSelectQuery = "SELECT * from categories order by category_id desc";
			$result = $this->select($sqlSelectQuery);	
			return $result;
		}

		public function getAllCategoryListRandom()
		{
			$sqlSelectQuery = "SELECT * from categories order by rand() limit 6";
			$result = $this->select($sqlSelectQuery);	
			return $result;
		}

		public function getCategoryNameById($category_id)
		{

			$sqlSelectQuery = "SELECT * from categories where category_id = '$category_id'";
			$result = $this->select($sqlSelectQuery);
			return $result;	
		}

		public function upadateCategoryInfo($data)
		{
			$category_id = $this->validation($data['category_id']);
			$category_name = $this->validation($data['category_name']);
			$category_slug = $this->validation($data['category_slug']);

			$category_slug_len = strlen($category_slug);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

	        $file_Name = $_FILES['category_image']['name'];
	        $file_Size = $_FILES['category_image']['size'];
	        $file_Temp = $_FILES['category_image']['tmp_name'];
	        $div = explode('.', $file_Name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
	        $upload_image = "category_images/" . $unique_image;

			if($category_name == "" OR 	$category_name== ""){
				Message::showMessage("Error! name or slug can not be empty");
			}elseif($category_slug_len > 20){
				Message::showMessage("Error!! Category slug should less than 20 characters");
			}else{
				$sqlSelectQuery = "SELECT category_name from categories where category_name = '$name' OR category_slug = '$category_slug'";
				$check_duplicate = $this->select($sqlSelectQuery);
				if($check_duplicate){
		        	Message::showMessage("Error!! Category name is already exist");
				}
				else{
					$query  = "SELECT * FROM categories WHERE category_id = '$category_id'";
					$result = $this->select($query);
					foreach ($result as  $value) {
						$image = $value['category_image'];
					}
					if($file_Name != "" && unlink($image))
					{
						if(move_uploaded_file($file_Temp, $upload_image)){
							$sqlQuery = "UPDATE categories SET 
							category_name = '$category_name',
							category_slug = '$category_slug',
							category_image = '$upload_image' 
							WHERE category_id = '$category_id'";
							$result = $this->update($sqlQuery);
					        if($result){
					        	echo "<script>window.location = 'category_list.php';</script>";
					        }else{
					        	Message::showMessage("Error!! Somethign went wrong");
					        }
						}
					}
					else{
						$sqlQuery = "UPDATE categories SET
						category_name = '$category_name',
						category_slug='$category_slug'
						WHERE category_id = '$category_id'";
						$result = $this->update($sqlQuery);
				        if($result){
				        	echo "<script>window.location = 'category_list.php';</script>";
				        }else{
				        	Message::showMessage("Error!! Somethign went wrong");
				        }
					}

			}
			}
		 }

		public function deleteCategoryById($id)
		{
			$sqlSelectQuery = "SELECT * from categories where category_id = '$id'";
			$result = $this->select($sqlSelectQuery);
			foreach ($result as  $value) {
			 	$image = $value['category_image'];
			 } 
			if($image && unlink($image)){
				$query = "DELETE FROM categories WHERE category_id = '$id'";
				$result = $this->delete($query);

	        	if($result){
	        		Message::showMessage("Success! Delete category name");
	        	}else{

	        		Message::showMessage("Error! Failed to delete");
	        	}
        	}

		}



		public function changeStatusDeativeById($id)
		{
			$sqlQuery = "UPDATE categories SET status = 0 WHERE category_id ='$id'";;
        	$result = $this->update($sqlQuery);
        	if($result){
		    	Message::showMessage("ok");
		    }else{
		    	Message::showMessage("no");
		    }
		}


		public function changeStatusActiveById($id)
		{
			$sqlQuery = "UPDATE categories SET status = 1 WHERE category_id = '$id'";
		    $result = $this->update($sqlQuery);
		    if($result){
		    	Message::showMessage("ok");
		    }else{
		    	Message::showMessage("no");
		    }
		}

		public function getSubCategoryNameByName($sub_category_name)
		{

			$sqlSelectQuery = "SELECT *  from sub_categories where sub_category_name = '$sub_category_name'";
			$result = $this->select($sqlSelectQuery);	
			return $result;	
		}

		public function storeSubCategoryInfo($data)
		{
			$sub_category_name = $this->validation($data['sub_category_name']);
			$category_id = $this->validation($data['category_id']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

	        $file_Name = $_FILES['sub_category_image']['name'];
	        $file_Size = $_FILES['sub_category_image']['size'];
	        $file_Temp = $_FILES['sub_category_image']['tmp_name'];
	        $div = explode('.', $file_Name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
	        $upload_image = "subcatimage/" . $unique_image;

	        $sub_cat_len = strlen($sub_category_name);
	        
	        if($sub_category_name == "" OR $file_Name ==""){
	        	Message::showMessage("Error! Input field can not be empty");
	        }elseif(!in_array($file_ext, $permitted)){
            	Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
	        }elseif($sub_cat_len >30){
	        	Message::showMessage("Error! banner caption size less than 30 characters");
	        }elseif($file_Size > 20000000){
	        	Message::showMessage("Error! image size must be less than 300 kb");
	        }else{
				$query = "SELECT * FROM sub_categories WHERE sub_category_name ='$sub_category_name'";
				$result = $this->select($query);
				if($result){
					Message::showMessage("Error! Sub category name is already");
				}else{
					if(move_uploaded_file($file_Temp, $upload_image)){         
						$query = "INSERT INTO sub_categories (category_id,sub_category_name,sub_cat_image)VALUES('$category_id','$sub_category_name','$upload_image')";
						$result = $this->insert($query);
						if($result){
							Message::showMessage("Success! sub category added");
						}else{
							Message::showMessage("Error! sub category not added");
						}
					}
				}
	        }
		}

		public function showSubCategoryIfno()
		{
			$sqlSelectQuery = "SELECT * from sub_categories order by category_id desc";
			$result = $this->select($sqlSelectQuery);	
			return $result;		
		}

		public function upadateSUBCategoryInfo($data)
		{
			$sub_category_name = $this->validation($data['sub_category_name']);
			$category_id = $this->validation($data['category_id']);
			$prev_category_name = $this->validation($data['prev_category_name']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

	        $file_Name = $_FILES['sub_category_image']['name'];
	        $file_Size = $_FILES['sub_category_image']['size'];
	        $file_Temp = $_FILES['sub_category_image']['tmp_name'];
	        $div = explode('.', $file_Name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
	        $upload_image = "subcatimage/" . $unique_image;

	        $sub_cat_len = strlen($sub_category_name);

	        if($sub_category_name == ""){
	        	Message::showMessage("Error! Sub category name can not be empty");
	        }elseif($sub_cat_len >30){
	        	Message::showMessage("Error! Sub category name must less than 30 characters");
	        }elseif($file_Name != ""){
	        	if(move_uploaded_file($file_Temp, $upload_image)){ 
		        	$query = "UPDATE sub_categories SET 
		        	category_id = '$category_id',
		        	sub_category_name = '$sub_category_name',
		        	sub_cat_image = '$upload_image'
		        	where sub_category_name = '$prev_category_name'";
		        	$result = $this->update($query);
		        	if($result){
		        		Message::showMessage("Success! sub category Updated");
		        	}
	        	}
	        }else{
	        	$query = "UPDATE sub_categories SET 
	        	category_id = '$category_id',
	        	sub_category_name = '$sub_category_name'
	        	where sub_category_name = '$prev_category_name'";
	        	$result = $this->update($query);
	        	if($result){
	        		Message::showMessage("Success! sub category Updated");
	        	}

	        }
		}

		public function deleteSubCategoryById($sub_category_name)
		{
			$sqlSelectQuery = "SELECT * from sub_categories where sub_category_name = '$sub_category_name'";
			$result = $this->select($sqlSelectQuery);
			foreach ($result as  $value) {
			 	$image = $value['sub_cat_image'];
			 }
			 if($image && unlink($image)){
				$query = "DELETE FROM sub_categories where sub_category_name = '$sub_category_name'";
				$this->delete($query);
			 }
		}

		public function showSubCategoryByCategory($category_id)
		{
			$query = "SELECT * FROM sub_categories where category_id = '$category_id'";
			$result = $this->select($query);

			return $result;
		}

		public function loadSubCategoryByCategoryId($id)
		{
			$query = "SELECT categories.*, sub_categories.* from categories left join sub_categories on sub_categories.category_id = categories.category_id WHERE categories.category_id = '$id'";
			$result = $this->select($query);
			if($result){
				foreach ($result as  $value) {
					echo '<li>
							<a href="product.php?sub_category_name='.$value["sub_category_name"].'">'.'=>'.$value["sub_category_name"].'</a>
						</li>';
				}
			}
		}

	}