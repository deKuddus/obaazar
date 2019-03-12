<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $customer = new Customer();

  if(isset($_GET['customer_id'])){
    $customer_id = $_GET['customer_id'];
    $show = $customer->showCustomerProfileAndOrderDetailsById($customer_id);
  }


?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      List of All new Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">new Order</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
          <div class="box">
            <h2 class="text-center">Customer Details</h2>
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>user Name</th>
                    <th>Phone</th>
                    <th>House Name</th>
                    <th>City</th>
                    <th>District</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    
                    if(isset($show)){
                        foreach($show as $order){}?>
                   <tr>
                        <td><?php echo $order['customer_id']; ?></td>
                        <td><?php echo $order['customer_full_name']; ?></td>
                        <td><?php echo $order['customer_name']; ?></td>
                        <td><?php echo $order['customer_phone']; ?></td>
                        <td><?php echo $order['customer_house_name']; ?></td>
                        <td><?php echo $order['customer_city']; ?></td>
                        <td><?php echo $order['customer_district']; ?></td>
                    </tr>

              <?php  } ?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        <div class="box">
          <h2 class="text-center">Order Details</h2>
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Status</th>
                    <th>Total Price</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($show)){
                      $sum = 0;
                        foreach($show as $key=>$order){$key+1;?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['product_name']; ?></td>
                        <td><?php echo $order['product_price']; ?></td>
                        <td><?php echo $order['product_quantity']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td>
                          <?php 
                            $total = $order['product_price']*$order['product_quantity'];
                            echo $total;
                          ?>
                        </td>  
                  <?php $sum = $sum+$total; ?> 
                </tr>
                
                <?php }?>  
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-size: 20px;font-weight: bold;">Total : <?php echo $sum;?> taka</td>

                  </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


      </div>
   </section>
<?php include "source/footer.php" ; ?>