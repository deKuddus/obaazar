<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $brand = new Brand();
   

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $brand->upadateBrandInfo($_POST);
    }
     $msg = Message::getMessage();
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
        <li class="active">add brand</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        
        <?php 
          if(isset($_GET['editId'])){
          $brand_id = $_GET['editId'];
          $getBrandName  = $brand->getBrandNameById($brand_id);
          if($getBrandName){
            foreach ($getBrandName as $value) { } }  }  ?> 

        <div class="col-md-3"></div>
       <div class="col-md-6">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Add Brand</h2>
                <h2 class="text-center text-warning">
                  <?php echo "<div id='message'>$msg</div>"?> 
                </h2>
            </div>
            <form role="form" method="post" action="brand_edit.php">
              <div class="form-group">
                  <label for="brand_name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php echo $value['brand_name'];?>">
                </div>
                  <input type="hidden" name="brand_id" value="<?php echo $value['brand_id'];?>"> 
                
          </div>
              <div class="box-footer">
                <button type="submit" name="add_brand" class="btn btn-primary form-control">Update</button>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>

      </div>
   </section>

<?php include "source/footer.php" ; ?>