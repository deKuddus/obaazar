<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $category = new Category();
   

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $category->upadateSUBCategoryInfo($_POST);
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
        <li class="active">update category</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        
        <?php 
          if(isset($_GET['editId'])){
          $sub_category_name = $_GET['editId'];
          $getSubcategoryName  = $category->getSubCategoryNameByName($sub_category_name);
          if($getSubcategoryName){
            foreach ($getSubcategoryName as $value) { } }  }  ?> 

        <div class="col-md-3"></div>
       <div class="col-md-6">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Update Sub Category</h2>
                <h2 class="text-center text-warning">
                  <?php echo "<div id='message'>$msg</div>"?> 
                </h2>
            </div>
            <form role="form" method="post" action="sub_category_edit.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="sub_category_name">Sub Category Name</label>
                  <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" value="<?php echo $value['sub_category_name'];?>">
                </div>

                 <div class="form-group">
                  <label for="category_id">Category Name</label>
                  <select  class="form-control" id="category_id" name="category_id">
                    <?php 
                      $getCategory = $category->showCategoryIfno();
                      if($getCategory){
                        foreach ($getCategory as  $data) {?>
                    <option value="<?php echo $value['category_id'];?>"
                      <?php if($value['category_id'] == $data['category_id']) echo "selected"; ?>
                      >
                      <?php echo $data['category_name'];?>
                      </option>
                       <?php  } }  ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sub_category_image">Sub Category Image</label>
                  <input type="file" class="form-control" id="sub_category_image" name="sub_category_image">
                </div>

                <div class="form-group">
                  <label for="sub_category_image">Previous Image</label><br>
                  <img src="<?php echo $value['sub_cat_image'];?>" height="80px" weight="90px">
                </div>
                  <input type="hidden" name="prev_category_name" value="<?php echo $value['sub_category_name'];?>"> 
                
          </div>
              <div class="box-footer">
                <button type="submit" name="category_brand" class="btn btn-primary form-control">Update</button>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>

      </div>
   </section>

<?php include "source/footer.php" ; ?>