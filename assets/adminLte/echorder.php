
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Order Echo</title>
    <link rel="shorcut icon" href="dist/img/logo.ico"/>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
          -->
          <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">

          <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

          <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <?php include_once './layout/admin/navigation.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                              <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li ><a href="#activity" class="glyphicon glyphicon-list" data-toggle="tab"> Echo Tests</a></li>
                                    <li class="active"><a href="#addorder" class="glyphicon glyphicon-plus" data-toggle="tab"> Order echo for registered patient</a></li>
                                    <li><a href="#Unregistered" class="glyphicon glyphicon-plus" data-toggle="tab"> Order echo for unregistered patient</a></li>
                                    <li><a href="#addEcho" class="glyphicon glyphicon-plus" data-toggle="tab"> Add new echo</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class=" tab-pane" id="activity">

                                        <table id="echoOrders" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Echo Name</th>
                                                    <th>Description</th>
                                                    <th>Fee</th>
                                                    <th>Date Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div><!-- /.tab-pane -->
                                    <div class="active tab-pane" id="addorder">
                                        <form class="form-horizontal" method="post" action="<?php $_PHP_SELF?>" id="echoorderforregistered">
                                         <h4>Registered patient</h4>
                                         <div class="form-group">
                                            <label for="testNameLabel" class="col-sm-2 control-label">MRN</label>
                                            <div class="col-sm-4">
                                                <input type="text" onkeyup="showUser(this.value)" name="card" class="form-control" id="testNameLabel" autofocus="true" placeholder="Enter MRN Number here...">
                                            </div>
                                            <b> <span id="txtHint" color="red" class="col-sm-4 text-primary"><b>Person info will be listed here...</b></span></b>
                                        </div>                                        
                                        <div class="panel-group mailbox-messages" id="accordion">
                                            <div class='panel panel-default '>
                                                <div class='panel-heading' >
                                                    <h4 class="panel-title">
                                                        <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#labCatagory'> Echo Tests</a>
                                                    </h4>
                                                </div>
                                                <div id='labCatagory' class='panel-collapse collapse'>
                                                    <div class="panel-body">
                                                        <ul class="mailbox-messages">
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                                           

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary" title="Submit" id="sub" name="submit">Submit</button>
                                                <button type="reset" class="btn btn-warning" title="Reset form">Reset</button>                                                
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- /.tab-pane -->

                                <div class="tab-pane" id="Unregistered">
                                    <form class="form-horizontal" method="post" action="<?php $_PHP_SELF?>" id="echoOrderForm">
                                        
                                        <div class="panel panel-default"> 
                                            <div class="panel-body"><h4>Unregistered Patient</h4>

                                                <div class="form-group">
                                                    <label for="inputf" class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="fname" placeholder="Enter First Name Here..." id="inputf">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputl" class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="lname" placeholder="Enter Last Name Here..." id="inpitlinputl">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputm" class="col-sm-3 control-label">Mobile</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number Here..." id="inputm">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputSex" class="col-sm-3 control-label">Sex</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" name="sex" id="inputSex">
                                                            <option value="">Select Sex</option>
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputa" class="col-sm-3 control-label">Age</label>
                                                    <div class="col-sm-7">
                                                     
                                                        <input type="number" class="form-control" name="age" id="inputa" placeholder="Enter Age Here..." min="1">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputCity" class="col-sm-3 control-label">City</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" name="city" id="inputCity">
                                                            <option value="">Select City</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputSubcity" class="col-sm-3 control-label">Subcity</label>
                                                    <div class="col-sm-2">
                                                        <select class="form-control" name="subcity" id="inputSubcity">
                                                            <option value="">Select SubCity</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputWereda" class="col-sm-3 control-label">Wereda</label>
                                                    <div class="col-sm-7">
                                                        <input class="form-control" name="wereda" placeholder="Enter Wereda Here..." type="text" id="inputWereda">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputHouse" class="col-sm-3 control-label">House Number</label>
                                                    <div class="col-sm-7">
                                                        <input class="form-control" name="house" placeholder="Enter House Number Here..." type="text" id="inputHouse">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="panel-group mailbox-messages" id="accordion">
                                            <div class='panel panel-default '>
                                                <div class='panel-heading' >
                                                    <h4 class="panel-title">
                                                        <a class='glyphicon glyphicon-folder-open' data-toggle='collapse' data-parent='#accordion' href='#lab'> Echo Tests</a>
                                                    </h4>
                                                </div>
                                                <div id='lab'  class='panel-collapse collapse'>
                                                    <div class="panel-body">
                                                        <ul>
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                                           

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary" name="addunreg">Submit</button>
                                                <button type="reset" class="btn btn-warning" title="Reset form">Reset</button>
                                            </div>
                                        </div>

                                    </form>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="addEcho">
                                        <form class="form-horizontal" method="post" action="?" id="echoForm">
                                            <div class="form-group">
                                                <label for="serviceName" class="col-sm-2 control-label">Echo Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="echoName" class="form-control" id="serviceName" placeholder="Enter Echo Name Here..." required="" autofocus="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="col-sm-2 control-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFee" class="col-sm-2 control-label">Fee</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputFee" min="1" name="fee" placeholder="Enter Fee Here...">
                                                </div>
                                            </div>                                     
                                            <div class="form-group">
                                                <div class="col-md-offset-10 col-sm-10">
                                                    <button type="submit" name="addEcho" class="btn btn-primary">Submit</button>
                                                    <button type="reset"  class="btn btn-warning">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.nav-tabs-custom -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
              

            </section><!-- /.content -->

        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include_once './layout/footer.php';?>
        <!-- Control Sidebar -->
        <?php include_once './layout/sidebar.php';?>
            <!-- Add the sidebar's background. This div must be placed
               immediately after the control sidebar -->
               <div class="control-sidebar-bg"></div>
           </div><!-- ./wrapper -->

           <!-- REQUIRED JS SCRIPTS -->

           <!-- jQuery 2.1.4 -->
           <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
           <!-- Bootstrap 3.3.5 -->
           <script src="bootstrap/js/bootstrap.min.js"></script>
           <script src="plugins/datatables/jquery.dataTables.min.js"></script>
           <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
           <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
           <!-- FastClick -->
           <script src="plugins/fastclick/fastclick.min.js"></script>
           <!-- AdminLTE App -->
           <script src="dist/js/app.min.js"></script>
           <script src="dist/js/demo.js"></script>
           <script src="dist/js/generalScript.js"></script>
           <!-- iCheck -->
           <script src="plugins/iCheck/icheck.min.js"></script>
           <script src="dist/js/bootstrapValidator.min.js"></script>
           <script src="dist/js/adminGeneral.js"></script>

           

           


        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
             <script>
            
            $(document).ready(function () {              
                $('#echoOrders').DataTable();
                $('#echoOrderForm').bootstrapValidator({
                    message: 'This value is not valid',
                    fields: {
                        fname: {
                            message: 'First name  is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'First name is required and can\'t be empty'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 25,
                                    message: 'Lirst name must be more than 1 and less than 25 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z\.]+$/,
                                    message: 'The first name can only consist of alphabetical'
                                }
                            }
                        },
                        lname: {
                            message: 'Father name  is not valid',
                            validators: {
                                notEmpty: {
                                    message: 'Father name is required and can\'t be empty'
                                },
                                stringLength: {
                                    min: 1,
                                    max: 25,
                                    message: 'Father name must be more than 1 and less than 25 characters long'
                                },
                                different: {
                                    field: 'fname',
                                    message: 'Father name can\'t be the same as first name'
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z\.]+$/,
                                    message: 'Father name can only consist of alphabetical'
                                }
                            }
                        },
                        mobile: {
                            validators: {
                                notEmpty: {
                                    message: 'Phone number is required and can\'t be empty'
                                },
                                stringLength: {
                                    min: 9,
                                    max: 10,
                                    message: 'Mobile number must be more than 9 and less than 10 characters long'
                                },
                                digits: {
                                    message: 'Phone number value can contain only digits'
                                }
                            }
                        },
                        sex: {
                            validators: {
                                notEmpty: {
                                    message: 'Sex is required and can\'t be empty'
                                }
                            }
                        },
                        city: {
                            validators: {
                                notEmpty: {
                                    message: 'City is required and can\'t be empty'
                                }
                            }
                        },
                        age: {
                            validators: {
                                notEmpty: {
                                    message: 'Age is required and can\'t be empty'
                                }
                            }
                        }

                    }
                });
                       
              });



</script>

</body>
</html>