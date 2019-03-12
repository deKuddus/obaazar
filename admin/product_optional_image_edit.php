<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $product = new Product();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_prod_op_img'])){
      $store = $product->storeProductOptionalImage($_POST);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update_prod_op_img'])){
      $update = $product->updateProductOptionalImage($_POST);
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

<!-- optional image update -->
<?php 
    if(isset($_GET['editId'])){
      $editId = $_GET['editId'];
      $editOptionalImage = $product->editProductOptionalImageById($editId);
 ?>

 <section class="content">
      <div class="row">

        <div class="col-md-3"></div>  
         <div class="col-md-6">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Add Product Optional Image</h2>
                <h2 class="text-center text-warning"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <?php if(isset($editOptionalImage)){
              foreach ($editOptionalImage as  $value) {?>
              <form role="form" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="product_id">Product Name</label>
                    <select  class="form-control" id="product_id" name="product_id">
                      <?php 
                        $getProductInfo = $product->getProductNameAndId();
                        if($getProductInfo){
                          foreach ($getProductInfo as  $data) { ?>
                      <option value="<?php echo $data['product_id'];?>"
                        <?php if($data['product_id'] == $value['product_id']) echo "selected"; ?>
                        ><?php echo $data['product_title']; ?></option>
                    <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="prod_optional_img1">product optional image1</label>
                    <input type="file" class="form-control" id="prod_optional_img1" name="prod_optional_img1">
                    <input type="hidden" name="prev_prod_id" value="<?php echo $value['product_id'];?>">
                  </div>
                   <div class="form-group">
                    <label for="prod_optional_img2">product optional image2</label>
                    <input type="file" class="form-control" id="prod_optional_img2" name="prod_optional_img2">
                  </div>
                  <div>
                  <div class="form-group pull-left" style="border:2px solid red;padding: 5px">
                    <label for="prod_optional_img1">previous product optional image1</label><br>
                    <img src="<?php echo $value['prod_another_image1'];?>" height="80px" width="90px">
                  </div>
                  <div class="form-group pull-right" style="border:2px solid red;padding: 5px">
                    <label for="prod_optional_img2">previous product optional image2</label><br>
                    <img src="<?php echo $value['prod_another_image2'];?>" height="80px" width="90px">
                  </div>
                </div>
                  <div class="box-footer">
                  <button type="submit" name="update_prod_op_img" class="btn btn-primary form-control">Update</button>
                </div>
              </form>
          <?php } } ?>
          </div>
         </div>
        <div class="col-md-3"></div>
      </div>
   </section>
<?php } ?>
<!-- //optional image update -->
<?php include "source/footer.php" ; ?>