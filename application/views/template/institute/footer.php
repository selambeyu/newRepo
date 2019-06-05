<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>CodeInsect</b> Admin System | Version 1.5
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="<?php echo base_url(); ?>">CodeInsect</a>.</strong> All rights reserved.
    </footer>
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/datatables/jquery.dataTables.min.js"></script> 
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/adminLte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/dist/js/adminlte.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/dist/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/fastclick/fastclick.js" type="text/javascript"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
    <script>
  $(function () {
    $('#table1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>
<script>
  $(function () {
    //Initialize Select2 Elements
    

    
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
   
    $('.select2').select2()
    
  })


    </script>
    <script>
    $("#event_form").validate({
        onkeyup: false,
        rules:{
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email:{
                required: true,
                email: true
            },
            mobile_no:{
                required:true,
                minlength:10,
                maxlength:15
            },
            password:{
                required:true,
                minlength:6,
                normalizer: function(value){
                    return $.trim(value);
                },
                password_check: true
            },
            cpassword:{
                required:true,
                normalizer: function(value){
                    return $.trim(value);
                },
                equalTo: "#password",
            },
        },
        messages:{
            first_name:{
                required: "First Name cannot be blank.",
            },
            last_name:{
                required: "Last Name cannot be blank.",
            },
            email:{
                required: "Email cannot be blank.",
            },
            mobile_no:{
                required: "Mobile number cannot be blank",
                minlength: "Please enter minimum 10 digit number.",
                maxlength: "Contact Number not allow more then 15 digit."
            },
            password:{
                required: "Password cannot be blank.",
                minlength: "Password should be at least 6 character long."
            },
            cpassword:{
                required: "Confirm Password cannot be blank.",
                equalTo: "Password and Confirm Password must be same." 
            },
        },
    });

    jQuery.validator.addMethod('password_check', function(value,element)
    {
        var pattern = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{6,}$/);
        //
        if(pattern.test(value))
        {
            return true;
        }else{
           return false;
        }
    },"Password should be 6 character long, one special character, one uppercase, one lowercase letter and one digit.");

    function isNumber(evt)
    {
         evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 32 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;

    }
    </script>
  </body>
</html>