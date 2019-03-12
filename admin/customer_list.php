<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $customer = new Customer();

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      List of All Customer
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">cutomer</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $customer->showCustomerList();
                    if($show){
                        foreach($show as $key=>$customers){$key+=1;?>
                    <tr>
                        <td><?php echo $key;?></td>
                        <td><?php echo $customers['customer_name']; ?></td>
                        <td><?php echo $customers['customer_phone']; ?></td>
                        <td><a href="customer_details.php?customer_id=<?php echo $customers['customer_id']; ?>" class="btn btn-info">See Details</a></td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Acation</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


      </div>
   </section>
<?php include "source/footer.php" ; ?>