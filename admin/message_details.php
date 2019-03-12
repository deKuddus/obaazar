<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
  $customer = new Customer();

 ?>
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
          if(isset($_GET['messageId'])){
            $messageId = $_GET['messageId'];
            $messageDetails = $customer->getMessageDetailsById($messageId);
            if($messageDetails){
              foreach ($messageDetails as $message) {?>
                <div class="col-md-6">
                  <div class="box box-widget widget-user-2">
                    <div class="widget-user-header bg-yellow">
                      <?php 
                        if(isset($_SERVER['HTTP_REFERER'])){
                          $referer = $_SERVER['HTTP_REFERER'];
                        }
                       ?>
                    <h3 class="btn btn-success text-center pull-right"><a style="color: white;" href="<?php echo $referer; ?>">GO BACK</a></h3>
                    <h3 class="widget-user-username"><?php echo $message['customer_name']; ?></h3>

                    </div>
                    <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                      <li><a href="#">Phone <span class="pull-right badge bg-blue"><?php echo $message['customer_phone']; ?></span></a></li>
                      <li><a href="">Subject <span class="pull-right badge bg-aqua"><?php echo $message['customer_subject']; ?></span></a></li>
                      <li><a href=""> Message: <br><br> <span style="text-align:justify;" class="pull-right"><?php echo $message['customer_message']; ?></span></a></li><br><br>
                    </ul>
                    </div><br><br>
                  </div>
                </div>
        <?php } }} ?>
        <div class="col-md-3"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>