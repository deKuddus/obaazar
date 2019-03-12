<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $cart = new Cart();



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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Order ID</th>
                    <th>Order Type</th>
                    <th>View Order Details</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $cart->showOrder();
                    if($show){
                        foreach($show as $key=>$order){$key+=1;?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $order['customer_id']; ?></td>
                        <td>New Order</td>
                        <td><a class="btn btn-info" href="order_details_view.php?customer_id=<?php echo $order['customer_id']; ?>">View Details</a></td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Order Type</th>
                    <th>View Order Details</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


      </div>
   </section>
<?php include "source/footer.php" ; ?>