<?php 

  include "source/header.php" ;
  include "source/sidebar.php" ;
    $category = new Category();

    if($_GET['deleteId']){
      $sub_category_name = $_GET['deleteId'];
      $deleteSubCategory = $category->deleteSubCategoryById($sub_category_name);
    }

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      List of All Sub Category
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">sub categoyr</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="box">
            <div class="box-body">
              <div class="text-center">
                <a href="sub_category_add.php" class="btn btn-primary">Create New  </a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Category Id</th>
                    <th>Name</th>
                    <th>Images</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $show = $category->showSubCategoryIfno();
                    if($show){
                        foreach($show as $key=>$sub_categories){$key+=1;?>
                    <tr>
                        <td><?php echo $sub_categories['category_id']; ?></td>
                        <td><?php echo $sub_categories['sub_category_name']; ?></td>
                        <td>
                          <img src="<?php echo $sub_categories['sub_cat_image']; ?>" height="80px" weight="90px">
                        </td>
                        <td>
                          <a class="btn btn-info" href="sub_category_edit.php?editId=<?php echo $sub_categories['sub_category_name'];?>">Edit</a> 
                          <a class="btn btn-danger" onclick="return confirm('are you sure to delete??');" href="?deleteId=<?php echo $sub_categories['sub_category_name'];?>">Delete</a>
                        </td>
                    </tr>
                <?php  } } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Category Id</th>
                    <th>Name</th>
                    <th>Images</th>
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