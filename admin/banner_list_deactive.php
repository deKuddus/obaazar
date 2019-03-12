<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $banner = new Banner();

    if($_GET['deleteId']){
      $deleteID = $_GET['deleteId'];
      $deleteBanner = $banner->deleteBannerById($deleteID);
    }
    if(isset($_GET['actionIdForActive'])){
        $id = $_GET['actionIdForActive'];
        $statusActive = $banner->changeStatusActiveById($id);
    }

    if(isset($_GET['actionIdForDeactive'])){
        $id = $_GET['actionIdForDeactive'];
        $statusDeactive = $banner->changeStatusDeativeById($id);
    }

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      List of All new Applier
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">new applier</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-body">
              <div class="text-center">
                <a href="banner_add.php" class="btn btn-primary">Create New  </a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Product Slug</th>
                    <th>Images</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $banner->showDeactiveBanner();
                    if($show){
                        foreach($show as $key=>$value){$key+=1;?>
                    <tr>
                        <td><?php echo $key;?></td>
                        <td><?php echo $value['banner_caption']; ?></td>
                        <td><?php echo $value['product_slug']; ?></td>
                        <td><img src="<?php echo $value['banner_image']; ?>" height="80px" weight="90px"></td>
                        <td>
                           <?php if($value['status']== 1) { ?>
                              <a class="btn btn-warning" href="?actionIdForDeactive=<?php echo $value['id'];?>">Active</a>
                           <?php }else{ ?>
                          <a class="btn btn-warning" href="?actionIdForActive=<?php echo $value['id'];?>">Deactive</a> 
                        <?php } ?>
                      </td>
                        <td>
                          <a class="btn btn-danger" onclick="return confirm('are you sure to delete??');" href="?deleteId=<?php echo $value['id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Images</th>
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