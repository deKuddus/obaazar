<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
  $cart = new Cart();

  if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];
    $cart->changeShipmentStatus($id);
  }

 ?>
 <style type="text/css">
   .details_view{
    font-size: 25px;
    font-weight: bold;
   }
 </style>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <?php 
          if(isset($_GET['id'])){
            $id = $_GET['id'];
            $order_details = $cart->getListOrderDetailsById($id);
            if($order_details){
              foreach ($order_details as $order) {?>
                <div class="col-md-6">
                  <div class="box box-widget widget-user-2">
                    <div style="height: 80px;" class="widget-user-header bg-yellow">
                    <span  class="btn btn-success text-center pull-right"><a style="color: white;" href="list_image_new_order_show.php">GO BACK</a>
                    </span>
                    <span style="margin-right: 20px;"  class="btn btn-success text-center pull-right"><a onclick="return confirm('Are you sure to shipment it??')" style="color: white;" href="?status_id=<?php echo $order['id'];?>">Confirm Shipment</a>
                    </span>
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                      <li>
                        <a href="#" class="details_view">Order No : <span class="pull-right"><?php echo $order['order_no']; ?></span>
                        <a href="#" class="details_view">Name : <span class="pull-right"><?php echo $order['name']; ?></span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="details_view">Phone : <span class="pull-right"><?php echo $order['phone']; ?></span>
                        </a>
                      </li>
                      <li>
                        <a href="" class="details_view">Image :<br>
                        <img src="<?php echo $order['image'];?>" height="auto" weight="300px">
                        
                        </a>
                      </li>
                    </ul>
                    </div>
                  </div>
                </div>
        <?php } }} ?>
        <div class="col-md-3"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>