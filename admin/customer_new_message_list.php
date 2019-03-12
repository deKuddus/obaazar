<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $customer = new Customer();

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
                  <th>Subject</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $customer->showNewMessageList();
                    if($show){
                        foreach($show as $key=>$message){ $key+=1;?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $message['customer_name']; ?></td>
                        <td><?php echo $message['customer_subject']; ?></td>
                        <td><?php echo $message['customer_phone']; ?></td>
                        <td>
                          <a class="btn btn-info" href="message_details.php?messageId=<?php echo $message['id'];?>">VIEW</a> 
                          <a class="btn btn-danger" onclick="return confirm('are you sure to delete??');" href="?deleteId=<?php echo $message['id'];?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Phone</th>
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