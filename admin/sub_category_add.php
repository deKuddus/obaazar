<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $category = new Category();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_sub_category'])){
      $store = $category->storeSubCategoryInfo($_POST);
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
        <li class="active">add category</li>
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
              <h2 class="text-center">Add Sub Category</h2>
                <h2 class="text-center text-warning"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="sub_category_add.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="sub_category_name">Sub Category Name</label>
                  <input type="text" class="form-control" id="sub_category_name" name="sub_category_name">
                </div>
                 <div class="form-group">
                  <label for="category_id">Category Name</label>
                  <select  class="form-control" id="category_id" name="category_id">
                    <?php 
                      $getCategory = $category->showCategoryIfno();
                      if($getCategory){
                        foreach ($getCategory as  $value) {?>
                    <option value="<?php echo $value['category_id'];?>"><?php echo $value['category_name'];?></option>
                       <?php  } }  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sub_category_image">Category Name</label>
                  <input type="file" class="form-control" id="sub_category_image" name="sub_category_image">
                </div>
          </div>
              <div class="box-footer">
                <button type="submit" name="add_sub_category" class="btn btn-primary form-control">ADD</button>
              </div>
            </form>
          </div>

          <div class="col-md-3"></div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>