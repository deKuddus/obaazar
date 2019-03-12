<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;
    $brand = new Brand();

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add_about'])){
      $store = $brand->storeAboutInfo($_POST);
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
        <li class="active">add about</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
 
         <div class="col-md-12">
          <div class="box box-primary" style="padding: 10px;">
            <div class="box-header with-border">
              <h2 class="text-center">Add About Details</h2>
                <h2 class="text-center text-warning"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="editor1">About</label>
                  <textarea id="editor1" class="form-control" rows="10" cols="80" name="about" ></textarea>
                </div>
                <div class="form-group">
                  <label for="about_img1">About  image1</label>
                  <input type="file" class="form-control" id="about_img1" name="about_img1">
                </div>
                 <div class="form-group">
                  <label for="about_img2">About image2</label>
                  <input type="file" class="form-control" id="about_img2" name="about_img2">
                </div>

                <div class="box-footer">
                <button type="submit" name="add_about" class="btn btn-primary form-control">ADD</button>
              </div>
            </form>
          </div>
         </div>
      </div>
   </section>
<?php include "source/footer.php" ; ?>