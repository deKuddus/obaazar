<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $cart = new Cart();

    if(isset($_GET['order_id_for_ship']))
    {
      $order_id = $_GET['order_id_for_ship'];

      $ship = $cart->shipProduct($order_id);
    }
    if(isset($_GET['order_id_for_unship']))
    {
      $order_id = $_GET['order_id_for_unship'];
      $cart->unShipProduct($order_id);
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
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Download Invoice</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($_GET['customer_id'])){
                    $customer_id = $_GET['customer_id'];
                    $show = $cart->showShipedOrderById($customer_id);
                    if($show){
                        foreach($show as $order){?>
                <?php  } ?>
                   <tr>
                        <td><?php echo $order['customer_id']; ?></td>
                        <td><?php echo $order['customer_name']; ?></td>
                        <td><?php echo $order['customer_phone']; ?></td>
                        <td><a class="btn btn-primary" href="invoice_old_order.php?customer_id=<?php echo $order['customer_id']; ?>">Download</a>
                        </td>
                    </tr>

              <?php }else{ ?> 
                  <td></td>
                  <td>NO DATA</td>
                  <td></td>
              <?php } } ?>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($_GET['customer_id'])){
                    $customer_id = $_GET['customer_id'];
                    $show = $cart->showShipedOrderById($customer_id);
                    if($show){
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
                  <td >
                    <?php 
                        if($order['status'] == "processing"){?> 
                          <a href="?order_id_for_ship=<?php echo $order['order_id']; ?>">DO SHIPMENT</a>
                        <?php }else{?>
                          <a href="?order_id_for_unship=<?php echo $order['order_id']; ?>">DO UNSHIPMENT</a>
                         <?php } }?>
                  </td>
                </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-size: 20px;font-weight: bold;">Sum : <?php echo $sum;?> taka</td>
                    <td></td>

                  </tr>
                <?php }else{ ?>
                     <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>NO DATA</td>
                    <td></td>
                    <td></td>
                    <td></td>

                  </tr>
                <?php } } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


      </div>
   </section>
<?php include "source/footer.php" ; ?>