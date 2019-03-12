<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $product = new Product();

    if($_GET['deleteId']){
      $deleteID = $_GET['deleteId'];
      $deleteOptionalImage = $product->deleteProductOptionalImageById($deleteID);
    }



?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      List of All Product Optional Images
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product optional image </li>
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
                  <th>Product Id</th>
                  <th>Image 1</th>
                  <th>Image 2</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $product->showProductOptionalImages();
                    if($show){
                        foreach($show as $productImages){?>
                    <tr>
                        <td><?php echo $productImages['product_id']; ?></td>
                        <td><img src="<?php echo  $productImages['prod_another_image1'];?>" height="80px" width="90px" >
                        </td>
                        <td><img src="<?php echo $productImages['prod_another_image2'];?>" height="80px" width="90px" >
                        </td>
                        <td>
                          <a class="btn btn-info" href="product_optional_image_edit.php?editId=<?php echo $productImages['product_id'];?>">Edit</a> 
                          <a class="btn btn-danger" onclick="return confirm('are you sure to delete??');" href="?deleteId=<?php echo $productImages['product_id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Product Id</th>
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