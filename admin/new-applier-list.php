<?php 
    include "source/header.php" ;
    include "source/sidebar.php" ;
 

    require_once __DIR__.'/vendor/autoload.php';

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      List of All new Applier
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">new applier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
<script>

</script>

          
      <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title"></h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Form No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $showList = $app->show();
                    if($showList){
                        foreach($showList as $data){?>
                    <tr>
                        <td><?php echo $data->id ?></td>
                        <td><?php echo $data->p_form_no ; ?></td>
                        <td><?php echo $data->p_name ; ?></td>
                        <td><?php echo $data->p_email ; ?></td>
                        <td><?php echo $data->p_phone ; ?></td>
                        <td><a href="view-details.php?applierId=<?php echo $data->id;?>">View Details</a></td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Form No</th>
                  <th>Name</th>
                  <th>Email</th>
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