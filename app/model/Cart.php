<?php 

if(!isset( $_SESSION)) session_start();
class Cart extends Database
{
	public function validation($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        //$data = mysql_real_escape_string($this->link,$data);
        return $data;

    }

	public function addProductToCart($p_id)
	{
		$session_id = session_id();
		$query = "SELECT * FROM temp_cart WHERE prod_id  = '$p_id' AND session_id = '$session_id'";
		$result = $this->select($query);
		if($result){
			foreach ($result as  $value) {
				$prod_quantity = $value['prod_quantity'];
			}
			$new_quantity = $prod_quantity+1;
			$query = "UPDATE temp_cart set  prod_quantity = '$new_quantity' where prod_id  = '$p_id' AND session_id = '$session_id'";
			$quantity_upadate = $this->update($query);
		}else{
			$query = "SELECT * FROM products WHERE product_id  = '$p_id'";
			$result = $this->select($query);
			if($result){
				foreach ($result as  $value) {
					$product_title = $value['product_title'];
					$product_price = $value['product_price'];
					$product_image = $value['product_image'];

					$query = "INSERT INTO temp_cart (prod_id,session_id,prod_name,prod_price,prod_quantity,prod_image)VALUES('$p_id','$session_id','$product_title','$product_price','1','$product_image')";
					$result = $this->insert($query);
					if($result){
						if(isset($_SERVER['HTTP_REFERER'])){
							$referer = $_SERVER['HTTP_REFERER'];
							header("Location: $referer");
						}
					}
				}
			}
		} 
	}


	public  function getCartProduct()
	{
		$session_id = session_id();
		$query = "SELECT * FROM temp_cart where session_id = '$session_id'";
		$result = $this->select($query);
		return $result;
	}

	public function updateCartQuantity($data)
	{
		$cart_id  = $this->validation($data['cart_id']);
		$cart_quantity = $this->validation($data['product_quantity']);

		$query = "UPDATE temp_cart SET prod_quantity = '$cart_quantity' WHERE cart_id = '$cart_id'";
		$result = $this->update($query);
		if($result){
			if(isset($_SERVER['HTTP_REFERER'])){
				$referer = $_SERVER['HTTP_REFERER'];
				header("Location: $referer");
			}
		}
	}

	public function deleteFroCart($cart_id)
	{
		$query = "DELETE FROM temp_cart WHERE cart_id = '$cart_id'";
		$result = $this->delete($query);
		Session::set("sum","");
		if($result){
			if(isset($_SERVER['HTTP_REFERER'])){
				$referer = $_SERVER['HTTP_REFERER'];
				header("Location: $referer");
			}
		}
	}




	public function getOrderedProduct($customer_id)
	{
		$select_query = "SELECT * FROM product_order WHERE customer_id = '$customer_id' and status = 'processing'";
		$selected_order = $this->select($select_query);
		if($selected_order){
			return $selected_order;
		}
	}

	public function getPrevipusOrderedShipedProduct($customer_id)
	{
		$select_query = "SELECT * FROM product_order WHERE customer_id = '$customer_id' and status = 'shiped'";
		$selected_order = $this->select($select_query);
		if($selected_order){
			return $selected_order;
		}
	}

	public function showOrder()
	{
		$query = "SELECT customer_id FROM product_order where status ='processing' group by customer_id";
		$select_product = $this->select($query);
		return $select_product;
	}

	public function showShipedOrder()
	{
		$query = "SELECT customer_id FROM product_order where status ='shiped' group by customer_id";
		$select_product = $this->select($query);
		return $select_product;
	}

	public function showOrderById($customer_id)
	{
		$query = "SELECT customers.*, product_order.* FROM product_order left join customers on customers.customer_id = product_order.customer_id where product_order.status ='processing' AND product_order.customer_id = '$customer_id'";
		$select_product = $this->select($query);
		return $select_product;
	}

	public function showShipedOrderById($customer_id)
	{
		$query = "SELECT customers.*, product_order.* FROM product_order left join customers on customers.customer_id = product_order.customer_id where product_order.status ='shiped' AND product_order.customer_id = '$customer_id'";
		$select_product = $this->select($query);
		return $select_product;
	}

	public function shipProduct($order_id)
	{
		$query = "UPDATE product_order SET status = 'shiped' where order_id = '$order_id'";
		$result = $this->update($query);
		if($result){
				header("Location: show_new_order.php");

		}
	}

	public function unShipProduct($order_id)
	{
		$query = "UPDATE product_order SET status = 'processing' where order_id = '$order_id'";
		$result = $this->update($query);
		if($result){
				header("Location: show_new_order.php");

		}
	}
	public function getCartByAjax($data)
	{	
		if(isset($data['cart_action'])){
			$session_id = session_id();
			$query = "SELECT prod_price,prod_quantity FROM temp_cart WHERE session_id = '$session_id'";
			$result = $this->select($query);
			if ($result) {
				$sum = 0;
				foreach ($result as  $value) {
					$taka = $value['prod_price']*$value['prod_quantity'];
					$sum = $sum+$taka;
				}
				echo $sum."টাকা";
			}else{
				echo "Empty";
			}
		}
	}

		//////////////////////////////////
		//store cusotmer shoping list

		public function storeCusotmerShopingList($data)
		{
			$customer_userName = $this->validation($data['name']);
			$customer_phone = $this->validation($data['phone']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');

	        $file_Name = $_FILES['list_image']['name'];
	        $file_Size = $_FILES['list_image']['size'];
	        $file_Temp = $_FILES['list_image']['tmp_name'];
	        $div = explode('.', $file_Name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	        $upload_image = "admin/list_image/".$unique_image;
	        $inserted_image = "list_image/".$unique_image;
	        $order_no = uniqid();


	        if($customer_phone == "" OR $customer_userName =="" OR $file_Name ==""){
           		Message::showMessage("Error!! All Input must be given");
	        }elseif(!in_array($file_ext, $permitted)) {
            	Message::showMessage("Error!! you can upload only :-" . implode(',', $permitted));
        	}elseif($file_Size1 > 20000000) {
           		Message::showMessage("Error!! Image should less than 2MB");
        	}else{

        		if(move_uploaded_file($file_Temp,$upload_image)){
        			$query = "INSERT INTO customer_shoping_list(order_no,name,phone,image)VALUES('$order_no','$customer_userName','$customer_phone','$inserted_image')";
        			$result = $this->insert($query);
        				if($result){
        					header("Location: index.php");
        				}
        		}
        		
        	}
		}

		public function showOrderListByImage()
		{
			$query = "SELECT * FROM customer_shoping_list where status = 0 order by id ASC";
			return $this->select($query);
		}

		public function getListOrderDetailsById($id)
		{
			$query = "SELECT * FROM customer_shoping_list WHERE id = '$id'";
			return $this->select($query);
		}

		public function changeShipmentStatus($id)
		{
			$query = "UPDATE customer_shoping_list SET status = 1 where id = '$id'";
			$result = $this->update($query);
			if($result){
				echo "<script>window.location = 'list_image_new_order_show.php';</script>";
				//header("Location: show_new_order_by_list_image.php");
			}
		}

		public function changeShipmentStatusToUnshiped($id)
		{
			$query = "UPDATE customer_shoping_list SET status = 0 where id = '$id'";
			$result = $this->update($query);
			if($result){
				echo "<script>window.location = 'list_image_new_order_show.php';</script>";
				//header("Location: show_new_order_by_list_image.php");
			}
		}


		public function showOrderListByImageShiped()
		{

			$query = "SELECT * FROM customer_shoping_list where status = 1 order by id ASC";
			return $this->select($query);	
		}


		public function deleteListImageOrder($deleteID)
		{
			$query = "SELECT * FROM customer_shoping_list WHERE id = '$deleteID'";
			$result = $this->select($query);
			foreach ($result as  $value) {
				$image = $value['image'];
				if(unlink($image)){
					$query = "DELETE FROM customer_shoping_list WHERE id = '$deleteID'";
					$result = $this->delete($query);
					if($result){
						Message::showMessage("Order deleted");
					}
				}
			}
		}

		public function checkCartMinimunRange($session_id)
		{
			$query = "SELECT * FROM temp_cart WHERE session_id = '$session_id'";
			$result = $this->select($query);
			$sum=0;
			foreach ($result as  $value) {
				$prod_quantity = $value['prod_quantity'];
				$prod_price = $value['prod_price'];
				$min_val = $prod_quantity*$prod_price;
				$sum = $sum+$min_val;
			}
			if($sum < 500){
				echo "low";
				}else{
					echo "ok";
					
				}
		}

		public function saveNewAddressToDeliverProduct($data)
		{
/*			$name = $this->validation($data['name']);
			$phone = $this->validation($data['phone']);
			$house = $this->validation($data['house']);
			$city = $this->validation($data['city']);
			$district = $this->validation($data['district']);
			$customer_id = $this->validation($data['customer_id']);

			$query = "SELECT * FROM product_order where customer_id = '$customer_id' order by id desc";
			$result = $this->select($query);
			if($result){
				foreach ($result as  $value) {
					$order_id = $value['order_id'];
					$id = $value['id'];
				}
				$query = "UPDATE product_order SET ship_another WHERE id = '$id' AND  customer_id = '$customer_id' AND order_id = '$order_id'";
				$update_shipment_place = $this->update($query);
				if($update_shipment_place){

				$query = "INSERT INTO cusotmer_new_shiped_address (customer_id,order_id,name,phone,house_name,city,district) VALUES ('$customer_id','$order_id','$name','$phone','$house','$city','$district')";
				$insert_new_shipment_address = $this->insert($query);
				if()
				}
			}*/

		}


}