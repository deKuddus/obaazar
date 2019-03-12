<?php

	require_once __DIR__.'/../../vendor/autoload.php';

	class Brand extends Database
	{
		

	    public  function validation($data)
	    {

	        $data = trim($data);
	        $data = stripcslashes($data);
	        //$data = htmlspecialchars($data);
	        return $data;

	    }

		public function storeBrandName($data)
		{
	
			$name = $this->validation($data['brand_name']);

			if($name == ""){
				Message::showMessage("Error! Brand name Can not be empty");
			}else{
				$query1 = "SELECT * FROM brands WHERE  brand_name = '$name'";
    			$result = $this->select($query1);
				if($result){
		        	Message::showMessage("Error!! brand name is already exits");
				}else{
		            $query = "INSERT INTO brands (brand_name)VALUES ('$name')";
		            $inserted_rows = $this->insert($query);
			        if($inserted_rows){
			        	echo "<script>window.location='brand_list.php';</script>";
			        }

				}

			
			}
		}

		public function showBrand()
		{
			$sqlSelectQuery = "SELECT * from brands order by brand_id desc";
			$result = $this->select($sqlSelectQuery);	
			return $result;
		}

		public function getAllBrandListRandom()
		{
			$sqlSelectQuery = "SELECT * from brands order by rand() limit 15";
			$result = $this->select($sqlSelectQuery);	
			return $result;
		}

		public function getBrandNameById($brand_id)
		{

			$sqlSelectQuery = "SELECT * from brands where brand_id = '$brand_id'";
			$result = $this->select($sqlSelectQuery);	
			return $result;
		}

		public function upadateBrandInfo($data)
		{
			$brand_id = $this->validation($data['brand_id']);
			$brand_name = $this->validation($data['brand_name']);



			if($brand_name == ""){
				Message::showMessage("Error! name can not be empty");
			}else{
				$sqlQuery = "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = '$brand_id'";
		        $result= $this->update($sqlQuery);
		        if($result){
		        	echo "<script>window.location = 'brand_list.php';</script>";
		        }else{
		        	Message::showMessage("Error!! Somethign went wrong");
		        }

			}
		}

		public function deleteBrandById($id)
		{
			$sqlQuery = "DELETE from brands WHERE brand_id ='$id'";
        	$result = $this->delete($sqlQuery);
        	if($result){
        		Message::showMessage("Success! Delete brand name");
        	}else{

        		Message::showMessage("Error! Failed to delete");
        	}

		}


		public function changeStatusDeativeById($id)
		{
			$sqlQuery = "UPDATE brands SET status = 0 WHERE brand_id ='$id'";;
        	$result = $this->update($sqlQuery);
        	if($result){
		    	Message::showMessage("ok");
		    }else{
		    	Message::showMessage("no");
		    }
		}


		public function changeStatusActiveById($id)
		{
			$sqlQuery = "UPDATE brands SET status = 1 WHERE brand_id = '$id'";
		    $result = $this->update($sqlQuery);
		    if($result){
		    	Message::showMessage("ok");
		    }else{
		    	Message::showMessage("no");
		    }
		}


		//////////////////////////////////
		///About us information  section
		////////////////////////////////


		public function storeAboutInfo($data)
		{
			$about = $this->validation($data['about']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

            $file_Name1 = $_FILES['about_img1']['name'];
            $file_Size1 = $_FILES['about_img1']['size'];
            $file_Temp1 = $_FILES['about_img1']['tmp_name'];
            $div1 = explode('.', $file_Name1);
            $file_ext1 = strtolower(end($div1));
            $unique_image1 = substr(md5(time()), 0, 10) . '.' . $file_ext1;
            $upload_image1 = "banner_images/" . $unique_image1;

            $file_Name2 = $_FILES['about_img2']['name'];
            $file_Size2 = $_FILES['about_img2']['size'];
            $file_Temp2 = $_FILES['about_img2']['tmp_name'];
            $div2 = explode('.', $file_Name2);
            $file_ext2 = strtolower(end($div2));
            $unique_image2 = substr(md5(time()), 0, 20) . '.' . $file_ext2;
            $upload_image2 = "banner_images/" . $unique_image2;

            if($about == "" OR $file_Name1 =="" OR $file_Name2 == ""){
            	Message::showMessage("Error! Input field can not be empty");
            }elseif($file_Size1 > 20000000 OR $file_Size2 > 20000000) {
                Message::showMessage("Error!! Image should less than 2MB");
            }elseif(!in_array($file_ext1,$permitted) OR !in_array($file_ext2,$permitted)){
            	Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
            }
            else{
            	 if(move_uploaded_file($file_Temp1, $upload_image1) && move_uploaded_file($file_Temp2, $upload_image2)){ 
            	 	$query = "INSERT INTO about_us(about,about_img1,about_img2)VALUES('$about','$upload_image1','$upload_image2')";
            	 	$result = $this->insert($query);
            	 	if($result){
            	 		Message::showMessage("Success!! About Info Added");
            	 	}
            	 }
            }

		}

		public function showAboutUs()
		{
			$query = "SELECT * FROM about_us";
			return $result = $this->select($query);
		}

		public function deleteAboutUsInfo($deleteID)
		{
			$query = "SELECT * FROM about_us WHERE id = '$deleteID'";
			$result = $this->select($query);
			foreach ($result as  $value) {
				$img1 = $value['about_img1'];
				$img2 = $value['about_img2'];
				if(unlink($img1) && unlink($img2)){
					$query = "DELETE FROM about_us WHERE id = '$deleteID'";
					$result = $this->delete($query);
					if($result){
						Message::showMessage("Deleted about");
					}
				}
			}
		}

		 public function getAboutInfo()
		{
			$query  = "SELECT * FROM about_us order by id desc limit 1";
			return $this->select($query);
		}

	}