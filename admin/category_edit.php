<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $category = new Category();
   

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $category->upadateCategoryInfo($_POST);
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
          $category_id = $_GET['editId'];
          $getcategoryName  = $category->getCategoryNameById($category_id);
          if($getcategoryName){
            foreach ($getcategoryName as $value) { } }  }  ?> 

        <div class="col-md-3"></div>
       <div class="col-md-6">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Update Brand</h2>
                <h2 class="text-center text-warning">
                  <?php echo "<div id='message'>$msg</div>"?> 
                </h2>
            </div>
            <form role="form" method="post" action="category_edit.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="category_name">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $value['category_name'];?>">
                </div>

                <div class="form-group">
                  <label for="category_slug">Category Slug</label>
                  <input type="text" class="form-control" id="category_slug" name="category_slug" value="<?php echo $value['category_slug'];?>">
                </div>

                <div class="form-group">
                  <label for="category_image">Category Image</label>
                  <input type="file" class="form-control" id="category_image" name="category_image">
                </div>

                 <div class="form-group">
                  <label for="category_image">Prvious Image</label><br>
                  <img src="<?php echo $value['category_image'];?>" height="80px" weight="90px">
                </div>
               
                
                  <input type="hidden" name="category_id" value="<?php echo $value['category_id'];?>"> 
                
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