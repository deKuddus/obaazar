<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apply online admission</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="resource/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resource/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="resource/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="resource/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="resource/bower_components/select2/dist/css/select2.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .formDivNew{
      border: 1px solid gray;
      padding: 5px;
      margin:5px;
      opacity: .8;
     font-family: serif;
     text-align: justify;
    }
  </style>
</head>
<body>

<?php 

        require_once __DIR__.'/vendor/autoload.php';
        $app = new Applier();

        if($_SERVER['REQUEST_METHOD'] == "POST"){
          $student_info = $app->storInfo($_POST);
        }

        $msg = Message::getMessage();

        

    

 ?>
    <section class="content" style="margin:0 auto;">
      <div class="row">
        <div class="col-md-12">
          <img src="resource/img/ss2.jpg" height="300px" width="100%">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class=" text-center font-weight-bold">Write Your Required Information Below Form</h3>
                <h2 class="text-center text-danger"><?php echo "<div id='message'> $msg</div>"?> </h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="form_number">Form Number :</label>
                  <!-- assigningn auto form number start -->
                  <?php
                    $getFormNumber = $app->getAutoFormNumber();
                    
                    if($getFormNumber == ""){ $getFormNumber = 101;?>  
                      <input type="text" class="form-control" id="form_number" name="form_number" readonly="readonly" value="<?php echo $getFormNumber;?>">                    
                    <?php }else{ $getFormNumber += 1;?>  
                      <input type="text" class="form-control" id="form_number" name="form_number" readonly="readonly" value="<?php echo $getFormNumber;?>">
                    <?php } ?>
                    <!-- assigningn auto form number end -->
                </div>
                <div class="form-group">
                  <label for="student_image">Your Image</label>
                  <input type="file" class="form-control" id="student_image" name="student_image" placeholder="write your Name in Block letter e.g. MD AKBOR">
                </div>
                <div class="form-group">
                  <label for="select_department">Select Department:</label>
                  <select   class="form-control" id="select_department" name="select_department" >
                    <option value="cse">CSE</option>
                    <option value="eee">EEE</option>
                    <option value="ete">ETE</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="student_name">Your Name</label>
                  <input type="text" class="form-control" id="student_name" name="student_name" placeholder="write your Name in Block letter e.g. MD AKBOR">
                </div>
                <div class="form-group">
                  <label for="student_email">Your Email</label>
                  <input type="email" class="form-control" id="student_email" name="student_email" placeholder="write your valid email">
                </div>
                <div class="form-group">
                  <label for="student_phone">Your Phone</label>
                  <input type="text" class="form-control" id="student_phone" name="student_phone" placeholder="write your valid phone">
                </div>
                 <div class="form-group">
                  <label for="father_name">Fathers Name and Occupation</label>
                  <input type="text" class="form-control" id="fater_name" name="father_name" placeholder="write your Fathers name and Occupation">
                </div>
                 <div class="form-group">
                  <label for="mother_name">Mothers Name and and Occupation</label>
                  <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="write your mother name and Occupation">
                </div>
                 <div class="form-group">
                  <label for="gardians_name">Gardians Name</label>
                  <input type="text" class="form-control" id="gardians_name" name="gardians_name" placeholder="write your gardians name">
                </div> 
                <div class="form-group">
                  <label for="rel_with_gardian">Relation with Gardian</label>
                  <input type="text" class="form-control" id="rel_with_gardian" name="rel_with_gardian" placeholder="write your relation with your gardian">
                </div>
                 <div class="form-group">
                  <label for="present_address">Present Address</label>
                  <input type="text" class="form-control" id="present_address" name="present_address" placeholder="write your present addres">
                </div> 
                <div class="form-group">
                  <label for="permanent_address">Permanent Address</label>
                  <input type="text" class="form-control" id="permanent_address" name="permanent_address" placeholder="Enter text">
                </div>
               <div class="form-group">
                <label>Date of Birth:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date_of_birth" class="form-control" id="datepicker">
                </div>
              </div>
                 <div class="form-group">
                  <label for="nationality">Nationality</label>
                  <input type="text" class="form-control" id="nationality" name="nationality" placeholder="write your nationality">
                </div>
                 <div class="form-group">
                  <label for="religion">Religion</label>
                  <input type="text" class="form-control" id="religion" name="religion" placeholder="write your religion">
                </div>
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title font-weight-bold" style="color:green;">Academic Qualification</h3>
                  </div>
                  <!-- /.box-header -->
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
                      <tr>
                        <td>
                          <input type="text" name="ssc_examination" class="form-control" placeholder=" SSC">
                        </td>
                        <td>
                          <input type="text" name="ssc_board" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="ssc_year" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="ssc_school_college" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="ssc_divition_grade" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="ssc_cgpa" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="ssc_subject" class="form-control">
                        </td>
                      </tr>
                       <tr>
                        <td>
                          <input type="text" name="hsc_examination" class="form-control" placeholder=" HSC">
                        </td>
                        <td>
                          <input type="text" name="hsc_board" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="hsc_year" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="hsc_school_college" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="hsc_divition_grade" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="hsc_cgpa" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="hsc_subject" class="form-control">
                        </td>
                      </tr>
                       <!-- <tr>
                        <td>
                          <input type="text" name="" class="form-control" placeholder="Diploma">
                        </td>
                        <td>
                          <input type="text" name="" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="" class="form-control">
                        </td>
                        <td>
                          <input type="text" name="" class="form-control">
                        </td>
                      </tr> -->
                    </table>
                  </div>
              </div>
            <div class="form-group">
              <label for="break_of_study">Break of Study (if any)</label>
              <input type="text" class="form-control" id="break_of_study" name="break_of_study" placeholder="yes/no. if yes when?">
            </div>
             <!-- <div>
               <div class="col-md-6 pull-left">
               
                <div class="formDivNew">
                 <h4>Decleration of the Applicant</h4>
                   <p>A quick brown fox jumps over the lazy dog.A quick brown fox jumps over the lazy dog.A quick brown fox jumps over the lazy dog.A quick brown fox jumps over the lazy dogA quick brown fox jumps over the lazy dogA quick brown fox jumps over the lazy dogA quick brown fox jumps over the lazy dog 
                   </p> 
                </div>
               </div>
               <div class="col-md-6 pull-right">
                 <div class="formDivNew">
                   <h4>Decleration of the Gardian</h4>
                   <p>A quick brown fox jumps over the lazy dog.A quick brown fox jumps over the lazy dog.A quick brown fox jumps over the lazy dog.A quick brown fox jumps over the lazy dogA quick brown fox jumps over the lazy dogA quick brown fox jumps over the lazy dogA quick brown fox jumps over the lazy dog 
                   </p>
                </div>
               </div>
             </div><br><br><br>
 -->
          </div>
              <div class="box-footer">
                <button type="submit" name="save_info" class="btn btn-primary form-control">Submit</button>
              </div>
            </form>
          </div>

        </div>
        <div class="col-md-2"></div>
      </div>
      <!-- /.row -->
    </section>



<!-- jQuery 3 -->
<script src="resource/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="resource/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- date-range-picker -->
<script src="resource/bower_components/moment/min/moment.min.js"></script>
<!-- bootstrap datepicker -->
<script src="resource/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
      $('.select2').select2()
      //Date picker
      $('#datepicker').datepicker({
         autoclose: true
    })
     })
</script>
<script>
    jQuery(
        function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        }
    )
</script>

</body>
</html>
