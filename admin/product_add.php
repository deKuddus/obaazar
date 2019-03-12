<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;

    $prod = new Product();
    $category = new Category();
    $brand = new Brand();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $store = $prod->storeProductInfo($_POST);
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
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="product_titles">Additonal Titles</label>
                  <input type="text" class="form-control" id="product_titles" name="product_titles" placeholder="write products features..">
                </div>
                <div class="form-group">
                  <label for="product_slug">Product Slug</label>
                  <input type="text" class="form-control" id="product_slug" name="product_slug" placeholder="write products Slug..">
                </div>                
                <div class="form-group">
                  <label for="product_price">Product Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" placeholder="write products prices..">
                </div>
                <div class="form-group">
                  <label for="product_category">Product Category</label>
                  <select  class="form-control" id="product_category" name="product_category">
                    <?php 
                      $getCategory = $category->showCategoryIfno();
                      if($getCategory){
                        foreach ($getCategory as  $value) {?>
                            <option value="<?php echo $value['category_name'];?>"><?php echo $value['category_name'];?></option>
                        <?php } }?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="product_sub_category">Product Sub Category</label>
                  <select  class="form-control" id="product_sub_category" name="product_sub_category">
                    <?php 
                      $getSubCategory = $category->showSubCategoryIfno();
                      if($getSubCategory){
                        foreach ($getSubCategory as  $value) {?>
                            <option value="<?php echo $value['sub_category_name'];?>"><?php echo $value['sub_category_name'];?></option>
                        <?php } }?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="product_brand">Product Brand</label>
                  <select  class="form-control" id="product_brand" name="product_brand">
                      <?php 
                        $getBrand = $brand->showBrand();
                        if($getBrand){
                          foreach ($getBrand as  $value) {?>
                            <option value="<?php echo $value['brand_name'];?>"><?php echo $value['brand_name'];?></option>

                      <?php } }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="product_features">Additonal features</label>
                  <textarea class="form-control" id="product_features" rows="8" name="product_features" placeholder="write products features.."></textarea>
                </div>
                 <div class="form-group">
                  <label for="product_details">Product Details</label>
                  <textarea class="form-control" rows="8" id="product_details" name="product_details"> </textarea>
                </div> 
                <div class="form-group">
                  <label for="product_image">Product Image1</label>
                  <input type="file" class="form-control" id="product_image"  name="product_image" />
                  <input type="hidden" name="">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" name="add_product" class="btn btn-primary form-control">ADD</button>
              </div>

          </div>
            </form>
          </div>

          <div class="col-md-2"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>