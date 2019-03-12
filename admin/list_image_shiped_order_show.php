<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $cart = new Cart();

  if(isset($_GET['deleteId'])){
    $deleteID = $_GET['deleteId'];
    $cart->deleteListImageOrder($deleteID);
  }

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      List of All Shiped Order by List Image
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
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>View Order Details</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $cart->showOrderListByImageShiped();
                    if($show){
                        foreach($show as $key=>$order){$key+=1;?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><img src="<?php echo $order['image']; ?>" height="80px" weight="90px"></td>
                        <td><?php 
                          if($order['status'] == 0) echo "Processing";
                          else echo "Shiped";
                         ?></td>
                        <td>
                          <a class="btn btn-info" href="list_image_order_details_of_shiped.php?id=<?php echo $order['id']; ?>">View Details</a>
                          <a onclick="return confirm('Are you sure to delete??');" class="btn btn-danger" href="?deleteId=<?php echo $order['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Status</th>
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