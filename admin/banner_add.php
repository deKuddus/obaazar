<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $banner = new Banner();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_banner'])){
      $store = $banner->storeBannerInfo($_POST);
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
        <li class="active">banner add</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-3"></div>  
         <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Add Banner</h2>
                <h2 class="text-center text-warning"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="banner_add.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="banner_caption">Banner Caption</label>
                  <input type="text" class="form-control" id="banner_caption" name="banner_caption" placeholder="brand name">
                </div>
                <div class="form-group">
                  <label for="product_slug">Product Slug</label>
                  <select class="form-control" name="product_slug" id="product_slug">
                    <?php 
                      $product_slug = $banner->getProductSlug();
                      if($product_slug){
                        foreach ($product_slug as  $value) {  ?>
                    <option value="<?php echo $value['product_slug'];?>"><?php echo $value['product_slug'];?></option>
                  <?php } } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="banner_image">Banner Image</label>
                  <input type="file" class="form-control" id="banner_image" name="banner_image">
                </div>
          </div>
              <div class="box-footer">
                <button type="submit" name="add_banner" class="btn btn-primary form-control">ADD BANNER</button>
              </div>
            </form>
          </div>

          <div class="col-md-3"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>