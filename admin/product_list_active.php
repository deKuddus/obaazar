<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $product = new Product();

    if($_GET['deleteId']){
      $deleteID = $_GET['deleteId'];
      $deleteProduct = $product->deleteProductById($deleteID);
    }

    if(isset($_GET['actionIdForActive'])){
        $id = $_GET['actionIdForActive'];
        $statusActive = $product->changeStatusActiveById($id);
    }

    if(isset($_GET['actionIdForDeactive'])){
        $id = $_GET['actionIdForDeactive'];
        $statusDeactive = $product->changeStatusDeativeById($id);
    }

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      List of All new Applier
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">


      <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>SLug</th>
                    <th>Price</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Imgae</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $product->showActiveProducts();
                    if($show){
                        foreach($show as $key=>$products){ $key+=1;?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $products['product_title']; ?></td>
                        <td><?php echo $products['product_slug']; ?></td>
                        <td><?php echo $products['product_price']; ?></td>
                        <td><?php 
                            $getCategory = $product->getCategoryForEditProduct();
                            if($getCategory){
                            foreach ($getCategory as $data) {
                          if($products['product_category'] == $data['category_name']) echo $data['category_name']; 

                        }}?></td>
                        <td><?php 
                            $getBrand = $product->getBrandForEditProduct();
                            if($getBrand){
                            foreach ($getBrand as $data) {
                            if($products['product_brand'] == $data['brand_name']) echo $data['brand_name']; 

                          }}?></td>
                        <td><img src="<?php echo $products['product_image'];?>" height="80px" width="90px" ></td>
                        <td>
                           <?php if($products['status']== 1) { ?>
                              <a class="btn btn-warning" href="?actionIdForDeactive=<?php echo $products['product_id'];?>">Active</a>
                           <?php }else{ ?>
                          <a class="btn btn-warning" href="?actionIdForActive=<?php echo $products['product_id'];?>">Deactive</a> 
                        <?php } ?>
                        </td>
                        <td>
                          <a class="btn btn-info" href="product_edit.php?editId=<?php echo $products['product_id'];?>">Edit</a> 
                          <a class="btn btn-danger" onclick="return confirm('are you sure to delete??');" href="?deleteId=<?php echo $products['product_id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Title</th>
                  <th>SLug</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Imgae</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


      </div>
   </section>
<?php include "source/footer.php" ; ?>