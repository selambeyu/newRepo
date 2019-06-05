<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Home</title>
    <link rel="shorcut icon" href="dist/img/logo.ico"/>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
          -->
          <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue fixed  sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <?php include_once './layout/admin/navigation.php';?>
            <div class="content-wrapper">
                <section class="content">
                   
                    <div class = "row">
                       <div class = "col-sm-6 col-md-3">
                        <a href = "addPatient.php" class = "btn btn-primary" style="padding: 0px; border: 0px; " role = "button">
                            <div class = "thumbnail">
                                <img src = "images/pat.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Patient </p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "add_assignmet.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/assignment.png" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Assignment </p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "consultation.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/doc.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Consultation</p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "addDrug.php" class = "btn btn-primary" style="padding: 0px; border: 0px; " role = "button">
                            <div class = "thumbnail">
                                <img src = "images/dru.png" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Pharmacy </p>
                        </a>
                    </div>
                    <div class = "col-sm-12 col-md-12">
                        <h1></h1>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "addbed.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/roo.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Ward</p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "paymentorder.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/paa.png" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Payment </p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "addOrgan.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/org.png" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Organization</p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "employee.php" class = "btn btn-primary" style="padding: 0px; border: 0px; " role = "button">
                            <div class = "thumbnail">
                                <img src = "images/ds.png" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Employees </p>
                        </a>
                    </div>
                    <div class = "col-sm-12 col-md-12">
                        <h1></h1>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "#" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/repp.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>

                            <p>Report</p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "laborder.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/labs.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Laboratory </p>
                        </a>
                    </div>
                    <div class = "col-sm-6 col-md-3">
                        <a href = "employee.php#setting" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/sch.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>


                            <p>Schedule </p>

                        </a>
                    </div>
                    
                    <div class = "col-sm-6 col-md-3">
                        <a href = "setAppointment.php" class = "btn btn-primary" style="padding: 0px; border: 0px;" role = "button">
                            <div class = "thumbnail">
                                <img src = "images/ap.jpg" style="border:0px; height: 80px; width:130px;"  alt = "Generic placeholder thumbnail">
                            </div>
                            <p>Appointment</p>
                        </a>
                    </div>
                </div> 
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!-- Main Footer -->
    <?php include'./layout/footer.php'; ?>
    <!-- Control Sidebar -->
    <?php include './layout/sidebar.php'; ?><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
       <div class="control-sidebar-bg"></div>
   </div><!-- ./wrapper -->

   <!-- REQUIRED JS SCRIPTS -->

   <!-- jQuery 2.1.4 -->
   <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
   <!-- Bootstrap 3.3.5 -->
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <script src="dist/js/bootstrapValidator.min.js"></script>
   <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- AdminLTE App -->
   <script src="dist/js/app.min.js"></script>
   <script src="dist/js/demo.js"></script>
   <script src="dist/js/adminGeneral.js"></script>

   <script>
    $(function () {
        $('#altMsg').fadeOut(5000);
    });
    ;

</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
 </body>
 </html>