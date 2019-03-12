<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $brand = new Brand();

    if($_GET['deleteID']){
      $deleteID = $_GET['deleteID'];
      $deleteAboutUs = $brand->deleteAboutUsInfo($deleteID);
    }
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       About US
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">about us </li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">


      <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>About</th>
                  <th>Image 1</th>
                  <th>Image 2</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $brand->showAboutUs();
                    if($show){
                        foreach($show as $about){?>
                    <tr>
                        <td><?php echo $brand->validation($about['about']); ?></td>
                        <td><img src="<?php echo  $about['about_img1'];?>" height="80px" width="90px" >
                        </td>
                        <td><img src="<?php echo $about['about_img2'];?>" height="80px" width="90px" >
                        </td>
                        <td>
                          <a href="?deleteID=<?php echo $about['id'];?>" class="btn btn-danger" onclick="return onlcik('Are you sure to delete??')">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>About</th>
                  <th>Image 1</th>
                  <th>Image 2</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>


      </div>
   </section>
<?php include "source/footer.php" ; ?>