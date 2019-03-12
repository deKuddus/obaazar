<?php 
  include "source/header.php" ;
  include "source/sidebar.php" ;

  require_once __DIR__.'/vendor/autoload.php';
    $app = new Applier();
    $msg = Message::getMessage();
    $std = new Students();

    if(isset($_GET['applierId'])){
        $id = $_GET['applierId'];
       $getSingleView = $app->showSingle($id);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $student_data = $std->makeStudent($_POST);
    } 

 ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <h2 class="text-center text-danger"><?php echo "<div id='message'> $msg</div>"?> </h2>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      
    </section>

    <section class="content">
      <div class="row">
         <div class="col-md-2"></div>
            <div class="col-md-8">
          
                <style>
                    .font-sizeD{
                        font-size:20px;
                    }
                    .font_sizeD{
                        font-size:20px;
                    }
                </style>
                <?php 
                    if(isset($getSingleView)){
                    foreach($getSingleView as $view){  ?>
                    
                    <div class="box box-widget widget-user-2">
                    <div class="widget-user-header bg-green">
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo $view->p_image;?>" alt="User Avatar">
                        <h3 class="widget-user-username"><?php echo strtoupper($view->p_name);?></h3>
                        <br>
                    </div>
                    </div>
                    <div class="box-footer no-padding">
                     <ul class="nav nav-stacked">
                            <li class="font-sizeD"><a href="#">Form ID : <span class="pull-right "><?php echo $view->p_form_no;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Email : <span class="pull-right "><?php echo $view->p_email;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Apply for Department : <span class="pull-right "><?php echo $view->p_adm_dept;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Fathers Name : <span class="pull-right "><?php echo $view->p_father_name;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Mothers Name : <span class="pull-right "><?php echo $view->p_mother_name;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Gardian Name : <span class="pull-right "><?php echo $view->p_guardian_name;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Relation with Gargian : <span class="pull-right "><?php echo $view->p_guard_relation;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Prensent Address : <span class="pull-right "><?php echo $view->p_per_address;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Permanent Address : <span class="pull-right "><?php echo $view->p_pre_address;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Date Of Birth :  <span class="pull-right "><?php echo $view->p_dob;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Nationality : <span class="pull-right "><?php echo $view->p_nationality;?></span></a></li>
                            <li class="font-sizeD" ><a href="#">Religion : <span class="pull-right "><?php echo $view->p_religion;?></span></a></li>
                        </ul>
                        <hr>
                        <div class="box">
                            <div class="box-body">
                            <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">Examination</th>
                                <th style="width: 25px">Board</th>
                                <th style="width: 10px">Year</th>
                                <th style="width: 25px">School/College</th>
                                <th style="width: 10px">Divition Grade</th>
                                <th style="width: 10px">CGPA</th>
                                <th style="width: 10px">Subject</th>
                            </tr>
                                <tr class="font_sizeD">
                                <td><?php echo $view->p_ac_ssc_exam; ?></td>
                                <td><?php echo $view->p_ac_ssc_board; ?></td>
                                <td><?php echo $view->p_ac_ssc_year; ?></td>
                                <td><?php echo $view->p_ac_college_ssc_school; ?></td>
                                <td><?php echo $view->p_ac_div_ssc_grade; ?></td>
                                <td><?php echo $view->p_ac_ssc_cgpa; ?></td>
                                <td><?php echo $view->p_ac_ssc_subject; ?></td>
                                
                            </tr>
                            </tr>
                                <tr class="font_sizeD">
                                <td><?php echo $view->p_ac_hsc_exam; ?></td>
                                <td><?php echo $view->p_ac_hsc_board; ?></td>
                                <td><?php echo $view->p_ac_hsc_year; ?></td>
                                <td><?php echo $view->p_ac_college_hsc_school; ?></td>
                                <td><?php echo $view->p_ac_div_hsc_grade; ?></td>
                                <td><?php echo $view->p_ac_hsc_cgpa; ?></td>
                                <td><?php echo $view->p_ac_hsc_subject; ?></td>
                                
                            </tr>
                            </table>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body">
                            <form action="view-details.php" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="money_reciept_code">Money Reciept</label>
                                    <input type="text" class="form-control" id="money_reciept_code" name="money_reciept_code" placeholder="enter money reciept code">
                                </div>
                                <div class="form-group">
                                    <label for="reciept_image">Money Reciept</label>
                                    <input type="file" class="form-control" id="reciept_image" name="reciept_image">
                                </div>
                                <div class="form-group">
                                    <input type="hidden"   name="student_id" value="<?php echo $view->p_id;?>">
                                </div>
                            <button type="submit"  class="btn btn info" >make student</button>
                            </form>
                          </div>
                        </div>
                <?php } } ?>
            </div>
          </div>
        </div>

        <div class="col-md-2"></div>

      </div>
   </section>
<?php include "source/footer.php" ; ?>