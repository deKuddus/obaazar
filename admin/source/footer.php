    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 
      <?php 
      $current = date('Y');

       echo $current ;
       echo " - ";
       echo $current+1;
      ?>
     <a href="https://adminlte.io">OBAZAAR</a>.</strong> All rights
    reserved.
  </footer>




</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="resource/bower_components/jquery/dist/jquery.min.js"></script>
<!-- message showing using jquery start -->

<!-- message showing using jquery end -->

<!-- jQuery UI 1.11.4 -->
<script src="resource/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="resource/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="resource/bower_components/raphael/raphael.min.js"></script>
<script src="resource/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="resource/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="resource/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="resource/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="resource/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="resource/bower_components/moment/min/moment.min.js"></script>
<script src="resource/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="resource/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="resource/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="resource/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="resource/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="resource/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="resource/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="resource/dist/js/demo.js"></script>
<script src="resource/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="resource/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()

    CKEDITOR.editorConfig = function( config ) {

   //   config.enterMode = 2; //disabled <p> completely
        config.enterMode = CKEDITOR.ENTER_BR // pressing the ENTER KEY input <br/>
        config.shiftEnterMode = CKEDITOR.ENTER_P; //pressing the SHIFT + ENTER KEYS input <p>
        config.autoParagraph = false; // stops automatic insertion of <p> on focus
    };
  })
</script>
<script>
    jQuery(
        function($) {
            $('#message').fadeOut (1000);
            $('#message').fadeIn (1000);
            $('#message').fadeOut (1000);
            $('#message').fadeIn (1000);
            $('#message').fadeOut (1000);
        }
    )
    $(function () {
         $('#example1').DataTable();
     })

</script>
</body>
</html>
