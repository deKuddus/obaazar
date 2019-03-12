<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;

  $brand = new Brand();
  $msg = Message::getMessage();
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $brand->storeBrandName($_POST);
  }

 ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Add Brand</h2>
                <h2 class="text-center text-warning">
                  <?php echo "<div id='message'>$msg</div>"?> 
                </h2>
              </div>
         <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="brand_name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="brand name">
                </div>
  
              
                <button type="submit" name="save_brand" class="btn btn-primary form-control">Submit</button>
              
              </div>
            </form>
            </div>
            </div>
    <div class="col-md-3"></div>
   </div>
  </section>
<?php include "source/footer.php" ; ?>