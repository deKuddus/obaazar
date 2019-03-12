<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $brand = new Brand();

    if($_GET['deleteId']){
      $deleteID = $_GET['deleteId'];
      $deleteBrand = $brand->deleteBrandById($deleteID);
    }

    if(isset($_GET['actionIdForActive'])){
        $id = $_GET['actionIdForActive'];
        $statusActive = $brand->changeStatusActiveById($id);
    }

    if(isset($_GET['actionIdForDeactive'])){
        $id = $_GET['actionIdForDeactive'];
        $statusDeactive = $brand->changeStatusDeativeById($id);
    }

    $msg = Message::getMessage();

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      List of All new Applier
      </h1>
      <h2 class="text-center text-warning">
                  <?php echo "<div id='message'>$msg</div>"?> 
                </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Brand List</li>
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
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $brand->showBrand();
                    if($show){
                        foreach($show as $key=>$brands){ $key+=1;?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $brands['brand_name']; ?></td>
                        <td>
                           <?php if($brands['status']== 1) { ?>
                              <a class="btn btn-warning" href="?actionIdForDeactive=<?php echo $brands['brand_id'];?>">Active</a>
                           <?php }else{ ?>
                          <a class="btn btn-warning" href="?actionIdForActive=<?php echo $brands['brand_id'];?>">Deactive</a> 
                        <?php } ?>
                        </td>
                        <td>
                          <a class="btn btn-info" href="brand_edit.php?editId=<?php echo $brands['brand_id'];?>">Edit</a> 
                          <a class="btn btn-danger onclick="return confirm('are you sure to delete??');" href="?deleteId=<?php echo $brands['brand_id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
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