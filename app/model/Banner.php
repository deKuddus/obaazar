<?php  
	
	class Banner extends Database
	{
		public  function validation($data)
	    {

	        $data = trim($data);
	        $data = stripcslashes($data);
	        $data = htmlspecialchars($data);
	        return $data;

	    }
		
		public function getProductSlug()
		{
			$query = "SELECT product_slug FROM products order by product_id desc";
			$result = $this->select($query);
			return $result;
		}		

		public function storeBannerInfo($data)
		{
			$banner_caption = $this->validation($data['banner_caption']);
			$product_slug = $this->validation($data['product_slug']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

	        $file_Name = $_FILES['banner_image']['name'];
	        $file_Size = $_FILES['banner_image']['size'];
	        $file_Temp = $_FILES['banner_image']['tmp_name'];
	        $div = explode('.', $file_Name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
	        $upload_image = "banner_images/" . $unique_image;

	        $cap_len = strlen($banner_caption);
	        $slug_len = strlen($product_slug);

	        if($banner_caption =="" OR $file_Name ==""){
	        	Message::showMessage("input can not be empty");
	        }elseif(!in_array($file_ext, $permitted)){
            	Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
	        }elseif($cap_len >30){
	        	Message::showMessage("Error! banner caption size less than 30 characters");
	        }elseif($slug_len > 30){
	        	Message::showMessage("Error! product slug size less than 30 characters");
	        }elseif($file_Size > 20000000){
	        	Message::showMessage("Error! image size must be less than 300 kb");
	        }else{
	            if(move_uploaded_file($file_Temp, $upload_image)){            
	  				$query = "INSERT INTO banners(banner_caption,product_slug,banner_image)VALUES('$banner_caption','$product_slug','$upload_image')";
	  				$result = $this->insert($query);
	  				if($result){
	  					Message::showMessage("Success! Banner info added");
	  				}else{
	  					Message::showMessage("Error! info not added");
	  				}
	            }
	        }
		}

		public function showActiveBanner()
		{
			$query= "SELECT * FROM banners where status = 1 order by id desc";
			return $result = $this->select($query);
		}


		public function showDeactiveBanner()
		{
			$query= "SELECT * FROM banners where status = 0 order by id desc";
			return $result = $this->select($query);
		}

		public function deleteBannerById($deleteID)
		{
			$query =  "DELETE FROM banners where id = '$deleteID'";
			$this->delete($query);
			if(isset($_SERVER['HTTP_REFERER'])){
				$referer = $_SERVER['HTTP_REFERER'];
				header("Location: $referer");
			}
		}

		public function changeStatusDeativeById($id)
		{
			$sqlQuery = "UPDATE banners SET status = 0 WHERE id ='$id'";;
        	$result = $this->update($sqlQuery);
        	if($result){
		    	Message::showMessage("ok");
		    }else{
		    	Message::showMessage("no");
		    }
		}


		public function changeStatusActiveById($id)
		{
			$sqlQuery = "UPDATE banners SET status = 1 WHERE id = '$id'";
		    $result = $this->update($sqlQuery);
		    if($result){
		    	Message::showMessage("ok");
		    }else{
		    	Message::showMessage("no");
		    }
		}

		//front end
		public function loadBannerDynamically()
		{
			$query= "SELECT * FROM banners where status = 1 order by id desc limit 4";
			return $result = $this->select($query);
		}


	}