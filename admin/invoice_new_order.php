<?php 
	
	require_once __DIR__.'/../vendor/autoload.php';

	use Dompdf\Dompdf;


	$customer = new Customer();
	if(isset($_GET['customer_id'])){
		$customer_id = $_GET['customer_id'];
		$data = $customer->getCustomerProfileAndOrder($customer_id);
		$customer_address = "";
		$sl=1;
		foreach ($data as  $value) {}

			$usrName = $value['customer_name'];
			$full_name = $value['customer_full_name'];
			$phone = $value['customer_phone'];
			$house_name = $value['customer_house_name'];
			$city = $value['customer_city'];
			$district = $value['customer_district'];

	       $customer_address .= "<tr>";
	       $customer_address .= "<th > Bill To :  </th>";
	       $customer_address .= "<td > $full_name </td>";
	       $customer_address .= "</tr>";
	       $customer_address .= "<tr>";
	       $customer_address .= "<th > Phone :  </th>";
	       $customer_address .= "<td > $phone </td>";
	       $customer_address .= "</tr>";
	       $customer_address .= "<tr>";
	       $customer_address .= "<th > House :  </th>";
	       $customer_address .= "<td > $house_name </td>";
	       $customer_address .= "</tr>";
	       $customer_address .= "<tr>";
	       $customer_address .= "<th > City :  </th>";
	       $customer_address .= "<td > $city </td>";
	       $customer_address .= "</tr>";
	       $customer_address .= "<tr>";
	       $customer_address .= "<th > District :  </th>";
	       $customer_address .= "<td > $district </td>";
	       $customer_address .= "</tr>";

	       $products_details = "";
	       $sum = 0;
	       foreach ($data as  $value) {
	       	$order_id = $value['order_id'];
	       	$product_name = $value['product_name'];
	       	$product_price = $value['product_price'];
	       	$product_quantity = $value['product_quantity'];
	       	$total_price = $product_price*$product_quantity;

		 $products_details .= "<tr>";
		 $products_details .= "<td style='text-align: center;'> $sl </td>";
		 $products_details .= "<td style='text-align: center;'> $order_id </td>";
		 $products_details .= "<td style='text-align: center;'> $product_name </td>";
		 $products_details .= "<td style='text-align: center;'> $product_price </td>";
		 $products_details .= "<td style='text-align: center;'> $product_quantity </td>";
		 $products_details .= "<td style='text-align: center;'> $total_price </td>";
		 $products_details .= "</tr>";
	       $sl++; $sum = $sum+$total_price;}
	    $products_details .= "<tr>";
	    $products_details .= "<td colspan = '6' style='text-align: right;'> Total : $sum taka</td>";
	    $products_details .= "</tr>";

$html= <<<OBAAZAR
<head>
   <script src="resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="resource/bower_components/bootstrap/dist/css/bootstrap.min.css">
   <style>
table, th, td {
  
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
</style>
</head>

<body>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="col-md-2"></div>
		<div class="col-md-3">
			<img src="../resources/images/logo2.png" height="80px" weight="90px">
		</div>
		<div class="col-md-5">
			<h2 style="color: green">Obaazar Online Grocery Shop</h2>
			<address>
				161, Sahadad Mansion,
				Sadargat Road, Chattogram 4500,
				Bangladesh.
			</address>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="col-md-12">
<div style="border-top:2px solid black;margin: 5px;margin-bottom: 10px; "></div>
		<div class="col-md-1"></div>
		<div class="col-md-5">
				<table>
				<tbody>
					<tr>
						<th>Bill From :</th>
						<td>Obaazar Online Shop</td>
					</tr>
			
					<tr>
						<th>Shop :</th>
						<td>161, Sahadad Mansion,</td>
					</tr>
					<tr>
						<th>Road :</th>
						<td>Sadargat Road, Chattogram 4500,</td>
					</tr>
					<tr>
						<th></th>
						<td>Bangladesh</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-5" style="border-top:2px dotted black;">
			<table>
				<tbody>
					$customer_address;
				</tbody>
			</table>
		</div>
		<div class="col-md-1"></div>
	</div>
		<table class="table table-striped" style="border-top:2px dotted black;">
	       <thead>
	        <tr>
	            <th style="text-align: center;">Serial</th>
	            <th style="text-align: center;">Order ID</th>
	            <th style="text-align: center;">Product Name</th>
	            <th style="text-align: center;">Price</th>
	            <th style="text-align: center;">Quantity</th>
	            <th style="text-align: center;">Price of each Product</th>
	      	</tr>
	       </thead>
		   <tbody>
		 	$products_details;
		   </tbody>
		</table>
		<h4 class='text-right'>Cash on Delivery</h5>
		</br>
		</br>
		<h4 class='text-right'>...................</h5>
		</br>
		<h4 class='text-right'>Sign</h5>
	</div>
	</div>
</body>

OBAAZAR;

	}



	$dompdf = new Dompdf();
	$dompdf->loadHtml($html);

	$dompdf->setPaper('A4', 'potrait');

	
	$dompdf->render();

	
	$dompdf->stream($phone, array('Attachment' => $download));
?>
