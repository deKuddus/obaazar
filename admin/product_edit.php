
<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;

    $product = new Product();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $update = $product->updateProductInfo($_POST);
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
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-2"></div>  
         <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h3 class=" text-center font-weight-bold">Add required product info</h3>
                <h2 class="text-center text-danger"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <!-- /.box-header -->
            <?php 
            	if(isset($_GET['editId'])){
            		$id = $_GET['editId'];
            	}
            	$getProduct = $product->getProductForEdit($id);
            	if($getProduct){
            		foreach ($getProduct as $products){
             ?>
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="product_titles">Additonal Titles</label>
                  <input type="text" class="form-control" id="product_titles" name="product_titles" value="<?php echo $products['product_title']; ?>">
                </div>
                <div class="form-group">
                  <label for="product_slug">Product Slug</label>
                  <input type="text" class="form-control" id="product_slug" name="product_slug" value="<?php echo $products['product_slug']; ?>">
                </div>                
                <div class="form-group">
                  <label for="product_price">Product Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $products['product_price']; ?>">
                </div>
                <div class="form-group">
                  <label for="product_category">Product Category</label>
                  <select  class="form-control" id="product_category" name="product_category">
                   <?php 
                    	$getCategory = $product->getCategoryForEditProduct();
                    	if($getCategory){
                    		foreach ($getCategory as $data) {
                    			?>
                    			<option value="<?php echo $data['category_name'];?>" <?php if($data['category_name'] == $products['product_category']) echo "selected" ?> >
                    				<?php echo $data['category_name'] ?>
                    			</option>
                    <?php }	} ?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label for="product_brand">Product Brand</label>
                    <select  class="form-control" id="product_brand" name="product_brand">
                    <?php 
                    	$getBrand = $product->getBrandForEditProduct();
                    	if($getBrand){
                    		foreach ($getBrand as $data) {
                    			?>
                    			<option value="<?php echo $data['brand_name'];?>" <?php if($data['brand_name'] == $products['product_brand']) echo "selected" ?> >
                    				<?php echo $data['brand_name'] ?>
                    			</option>
                    <?php }	} ?>
                  </select>
               
                </div>
                <div class="form-group">
                  <label for="product_features">Additonal features</label>
                  <textarea class="form-control" id="product_features" rows="8" name="product_features" ><?php echo $products['product_features']; ?></textarea>
                </div>
                 <div class="form-group">
                  <label for="product_details">Product Details</label>
                  <textarea class="form-control" rows="8" id="product_details" name="product_details"> <?php echo $products['product_details']; ?></textarea>
                </div> 
                <div class="col-md-3 pull-left">
	                <div class="form-group">
	                  <label for="product_image">Product Image</label>
	                  <input type="file" class="form-control" id="product_image"  name="product_image" />
	                  <input type="hidden" name="product_id" value="<?php echo $products['product_id'];?>">
	                </div>
                </div>
                <div class="col-md-3 pull-right">
                	<div class="form-group">
	                  <label for="product_image">Previous Image</label>
	                  <img src="<?php echo $products['product_image'];?>" height="80px" weight="90px">
	                </div>
                </div>
                	
                <button type="submit" name="update_product" class="btn btn-primary form-control">Update</button>
              </div>

             
             
          </div>
            </form>
        <?php }} ?>
          </div>

          <div class="col-md-2"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>