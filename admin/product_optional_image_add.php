<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $product = new Product();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_prod_op_img'])){
      $store = $product->storeProductOptionalImage($_POST);
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
        <li class="active">add another image</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-3"></div>  
         <div class="col-md-6">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Add Product Optional Image</h2>
                <h2 class="text-center text-warning"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="product_id">Product Name</label>
                  <select  class="form-control" id="product_id" name="product_id">
                    <?php 
                      $getProductInfo = $product->getProductNameAndId();
                      if($getProductInfo){
                        foreach ($getProductInfo as  $value) { ?>
                    <option value="<?php echo $value['product_id'];?>"><?php echo $value['product_title']; ?></option>
                  <?php } } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="prod_optional_img1">product optional image1</label>
                  <input type="file" class="form-control" id="prod_optional_img1" name="prod_optional_img1">
                </div>
                 <div class="form-group">
                  <label for="prod_optional_img2">product optional image2</label>
                  <input type="file" class="form-control" id="prod_optional_img2" name="prod_optional_img2">
                </div>

                <div class="box-footer">
                <button type="submit" name="add_prod_op_img" class="btn btn-primary form-control">ADD</button>
              </div>
            </form>
          </div>
         </div>
        <div class="col-md-3"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>