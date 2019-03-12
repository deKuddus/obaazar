<?php 
include "Session.php";
class Customer extends Database
{
	    public function validation($data)
	    {

	        $data = trim($data);
	        $data = stripcslashes($data);
	        $data = htmlspecialchars($data);
	        $data = str_replace('"', "", $data);
			$data = str_replace("'", "", $data);
	        //$data = mysql_real_escape_string($this->link,$data);
	        return $data;

	    }

	    public function registerCustomer($data)
	    {
	    	$customer_name = $this->validation($data['customer_name']);
	    	$customer_phone = $this->validation($data['customer_phone']);
	    	$customer_password = $this->validation($data['customer_password']);

	    	$phone_len = strlen($customer_phone);

	    	if($customer_name == "" OR $customer_phone =="" OR $customer_password ==""){
	    		Message::showMessage("All input must be provided to complete registration");
	    	}elseif($phone_len > 11 OR $phone_len < 11){
	    		Message::showMessage("phone number is incorrect, it should be 11 digit");
 			}else{
 				$query  = "select * from customers where customer_phone = '$customer_phone'";
 				$result = $this->select($query);
 				if($result){
 					Message::showMessage("Error! Phone number is already registered");
 				}else{
 					$customer_password = md5($customer_password.$customer_phone);
 					$query = "INSERT INTO customers(customer_name,customer_phone,customer_password)VALUES('$customer_name','$customer_phone','$customer_password')";
 					$result = $this->insert($query);
 					if($result){
 						$query  = "select * from customers where customer_phone = '$customer_phone'";
 						$result = $this->select($query);
 						$value = mysqli_fetch_array($result);
                		$row = mysqli_num_rows($result);
                		if($row){
 						Session::set("customerlogin", true);
                    	Session::set("customername", $value['customer_name']);
                    	Session::set("customer_id", $value['customer_id']);
                    	Session::set("customer_phone", $value['customer_phone']);

                    	if(isset($_SERVER['HTTP_REFERER'])){
	            		$data = ($_SERVER['HTTP_REFERER']); 
						$a = explode("/", $data);
						if($a[4] == "profile.php"){
							header("Location:profile.php");
						}elseif($a[4] == "index.php"){
							header("Location:index.php");
						}elseif($a[4] == "checkout.php"){
							header("Location:checkout.php");
						}else{
							header("Location:index.php");
						}
						
	            	}
 					}
 				}
 				}
 			}
 			
	    }

	    public function getCustomerProfile($id)
	    {
	    	$query = "SELECT * FROM customers where customer_id='$id'";
	    	$result  = $this->select($query);
	    	return $result;
	    }


	    public function loginCustomer($data)
	    {
	    	$customer_phone = $this->validation($data['customer_login_phone']);
	    	$customer_password = $this->validation($data['customer_login_password']);
	    	if($customer_phone == "" OR $customer_password =="" )
	    	{
	    		Message::showMessage("Error! Submit your info to complete login");
	    	}else{
		    	$customer_password = md5($customer_password.$customer_phone);

	 			$query  = "select * from customers where customer_phone = '$customer_phone' and customer_password = '$customer_password'";
				$result = $this->select($query);
				$value = mysqli_fetch_array($result);
	    		$row = mysqli_num_rows($result);
	    		if($row){
					Session::set("customerlogin", true);
		        	Session::set("customername", $value['customer_name']);
		        	Session::set("customer_id", $value['customer_id']);
		        	Session::set("customer_phone", $value['customer_phone']);
		        	header("Location:profile.php");
	            	
				}else{

					Message::showMessage("Error! Incorrect login informain");
				}
			}
	    }

	    public function saveCustomerMessage($data)
	    {
	    	$customerName = $this->validation($data['name']);
	    	$customerSubject = $this->validation($data['subject']);
	    	$customerPhone = $this->validation($data['phone']);
	    	$customerMessage = $this->validation($data['message']);

	    	$query = "INSERT INTO customer_messages (customer_name,customer_subject,customer_phone,customer_message)VALUES('$customerName','$customerSubject','$customerPhone','$customerMessage')";
	    	$result = $this->insert($query);
	    	if($result){
	    		Message::showMessage("Your message success fully send, we will contact you soon");
	    	}
	    }

	    public function showNewMessageList()
	    {
	    	$query = "SELECT * FROM customer_messages where status = 0 order by id desc";
	    	$result = $this->select($query);
	    	return $result;
	    }
		
		public function getMessageDetailsById($id)
		{
			$query = "UPDATE customer_messages set status = 1 where id = '$id'";
			$changeStatus = $this->update($query);
			if($changeStatus){
				$query = "SELECT * FROM customer_messages where id = '$id'";
		    	$result = $this->select($query);
			    return $result;	
			}
		      
		}

		public function deleteMessageById($deleteID)
		{
			$query = "DELETE FROM customer_messages where id = '$deleteID'";
			$result = $this->delete($query);
			if ($result) {
				Message::showMessage("Success! Message deleted succesfully");
			}
		}

		public function showOldMessageList()
	    {
	    	$query = "SELECT * FROM customer_messages where status = 1 order by id desc";
	    	$result = $this->select($query);
	    	return $result;
	    }

	    public function updateCustomerProfile($data)
	    {
	    	$customer_full_name = $this->validation($data['full_name']);
	    	$customer_house_name = $this->validation(trim($data['house_name'], "'"));
	    	$customer_city = $this->validation($data['city']);
	    	$customer_district = $this->validation($data['district']);
	    	$customer_id = $this->validation($data['cutomer_id']);


	    	$customer_full_name_len = strlen($customer_full_name);
	    	$customer_house_name_len = strlen($customer_house_name);
	    	$customer_city_len = strlen($customer_city);
	    	$customer_district_len = strlen($customer_district);

	    	if($customer_house_name =="" or $customer_city ==""){
	    		Message::showMessage("Please fillup your house and city name before update profile");
	    	}elseif($customer_full_name_len > 50){
	    		Message::showMessage("Full Name should less than 50 characters");
	    	}elseif($customer_house_name_len > 100){
	    		Message::showMessage("House Name and area name should less than 100 characters");
	    	}elseif($customer_city_len > 20){
	    		Message::showMessage("City Name should less than 20 characters");
	    	}elseif($customer_district_len > 25){
	    		Message::showMessage("District Name should less than 25 characters");
	    	}else{
	    		$query = "UPDATE customers SET
	    			customer_full_name = '$customer_full_name',
	    			customer_house_name = '$customer_house_name',
	    			customer_city = '$customer_city',
	    			customer_district = '$customer_district'
	    			where customer_id = '$customer_id'";

	    			$result = $this->update($query);
	    			if($result){
	    				Message::showMessage("Success! Your profile update");
	    			}else{
	    				Message::showMessage("Error! Your profile not update");
	    			}
	    	}
	    }

	    public function updateCustomerInfo($data)
	    {
	    	$customer_full_name = $this->validation($data['name']);
	    	$customer_phone = $this->validation($data['phone']);
	    	$customer_house_name = $this->validation($data['house']);
	    	$customer_city = $this->validation($data['city']);
	    	$customer_district = $this->validation($data['district']);
	    	$customer_id = $this->validation($data['cutomer_id']);


	    	$customer_full_name_len = strlen($customer_full_name);
	    	$customer_house_name_len = strlen($customer_house_name);
	    	$customer_city_len = strlen($customer_city);
	    	$customer_district_len = strlen($customer_district);

	    	if($customer_house_name =="" or $customer_city ==""){
	    		Message::showMessage("Please fillup your house and city name before update profile");
	    	}elseif($customer_full_name_len > 50){
	    		Message::showMessage("Full Name should less than 50 characters");
	    	}elseif($customer_house_name_len > 100){
	    		Message::showMessage("House Name and area name should less than 100 characters");
	    	}elseif($customer_city_len > 100){
	    		Message::showMessage("City Name should less than 100 characters");
	    	}elseif($customer_district_len > 25){
	    		Message::showMessage("District Name should less than 25 characters");
	    	}else{
	    		$query = "UPDATE customers SET
	    			customer_full_name = '$customer_full_name',
	    			customer_phone = '$customer_phone',
	    			customer_house_name = '$customer_house_name',
	    			customer_city = '$customer_city',
	    			customer_district = '$customer_district'
	    			where customer_id = '$customer_id'";

	    			$result = $this->update($query);
	    			if($result){
	    				$order_id = uniqid();
	    				$this->OrderTransferCartToOrderTable($customer_id,$order_id);
	    				header("Location:payment.php");
	    			}
	    	}
	    }

	public function OrderTransferCartToOrderTable($customer_id,$order_id)
	{
		$session_id = session_id();
		$query = "SELECT * FROM temp_cart WHERE session_id = '$session_id'";
		$result = $this->select($query);
		if($result){
			foreach ($result as $value) {
				$product_name = $value['prod_name'];
				$product_price = $value['prod_price'];
				$product_quantity = $value['prod_quantity'];
				$query = "INSERT INTO product_order (order_id, product_name,product_price,customer_id,product_quantity)VALUES('$order_id','$product_name','$product_price','$customer_id','$product_quantity')";
				$insert_prod = $this->insert($query);
			}
			$query = "DELETE FROM temp_cart WHERE session_id = '$session_id'";
			$result = $this->delete($query);			
		}
	}


		public function storeNewAddressToSendOrderByCustomer($data)
		{
			$customer_full_name = $this->validation($data['name']);
	    	$customer_phone = $this->validation($data['phone']);
	    	$customer_house_name = $this->validation($data['house']);
	    	$customer_city = $this->validation($data['city']);
	    	$customer_district = $this->validation($data['district']);
	    	$customer_id = $this->validation($data['customer_id']);

	    	$customer_full_name_len = strlen($customer_full_name);
	    	$customer_house_name_len = strlen($customer_house_name);
	    	$customer_city_len = strlen($customer_city);
	    	$customer_district_len = strlen($customer_district);

	    	$reciver_name =$this->validation($data['reciver_name']);
	    	$reciver_phone =$this->validation($data['reciver_phone']);
	    	$reciver_house =$this->validation($data['reciver_house']);
	    	$reciver_city =$this->validation($data['reciver_city']);
	    	$reciver_district =$this->validation($data['reciver_district']);

	    	$reciver_name_len =strlen($reciver_name);
	    	$reciver_phone_len =strlen($reciver_phone);
	    	$reciver_house_len =strlen($reciver_house);
	    	$reciver_city_len =strlen($reciver_city);
	    	$reciver_district_len =strlen($reciver_district);



	    	if($customer_house_name =="" or $customer_city ==""){
	    		Message::showMessage("Please fillup your house and city name before update profile");
	    	}elseif($customer_full_name_len > 50){
	    		Message::showMessage("Full Name should less than 50 characters");
	    	}elseif($customer_house_name_len > 100){
	    		Message::showMessage("House Name and area name should less than 100 characters");
	    	}elseif($customer_city_len > 100){
	    		Message::showMessage("City Name should less than 100 characters");
	    	}elseif($customer_district_len > 25){
	    		Message::showMessage("District Name should less than 25 characters");
	    	}elseif($reciver_name_len > 50){
	    		Message::showMessage("Full Name should less than 50 characters");
	    	}elseif($reciver_house_len > 100){
	    		Message::showMessage("House Name and area name should less than 100 characters");
	    	}elseif($reciver_city_len > 100){
	    		Message::showMessage("City Name should less than 100 characters");
	    	}elseif($reciver_district_len > 20){
	    		Message::showMessage("District Name should less than 25 characters");
	    	}else{
	    		$query = "UPDATE customers SET
	    			customer_full_name = '$customer_full_name',
	    			customer_phone = '$customer_phone',
	    			customer_house_name = '$customer_house_name',
	    			customer_city = '$customer_city',
	    			customer_district = '$customer_district'
	    			where customer_id = '$customer_id'";

	    			$result = $this->update($query);
	    			$order_id = uniqid();
	    			$query = "INSERT INTO product_shiped_new_address(customer_id,order_id,name,phone,house_name,city,district)VALUES('$customer_id','$order_id','$reciver_name','$reciver_phone','$reciver_house','$reciver_city','$reciver_district')";
	    			$insert_new_address = $this->insert($query);
	    			if($this->OrderTransferCartToOrderTable($customer_id,$order_id)){
	    				header("Location:payment.php");
	    			}else{
	    				header("Location:index.php");
	    			}
	    	}
		}


	    public function showCustomerList()
	    {
	    	$query = "SELECT * from customers order by customer_id desc";
	    	return $this->select($query);
	    }


	    public function showCustomerProfileAndOrderDetailsById($customer_id)
	    {
	    	$query = "SELECT customers.*, product_order.* from customers left join product_order on customers.customer_id = product_order.customer_id where customers.customer_id = '$customer_id'";
	    	return $this->select($query);
	    }


	    public function getCustomerProfileAndOrder($customer_id)
	    {
	    	$query = "SELECT customers.*, product_order.* FROM customers LEFT JOIN product_order on product_order.customer_id = customers.customer_id WHERE customers.customer_id = '$customer_id' AND product_order.status = 'processing'";
	    	return $this->select($query);
	    }

	    public function getCustomerProfileAndOrderOld($customer_id)
	    {
	    	$query = "SELECT customers.*, product_order.* FROM customers LEFT JOIN product_order on product_order.customer_id = customers.customer_id WHERE customers.customer_id = '$customer_id' AND product_order.status = 'shiped'";
	    	return $this->select($query);
	    }

}