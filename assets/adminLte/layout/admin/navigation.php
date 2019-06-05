<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="admin.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">Rec.</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Receptionist Page</b> </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!--General Informatio-->

                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-gears"> General Information</i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li role="presentation"><a role="menuitem" data-toggle='modal' data-target='#titlemodal' tabindex="-1" href="#">Add Title</a></li>
                        <li role="presentation" class="divider"></li> 
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="test.php" >Lab Test</a></li>
                        <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="addProcedure.php">Procedure</a></li> 
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addEcho.php">Echo</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addX-ray.php">X-Ray</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addEcg.php">ECG</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addUltra.php">Ultra Sound</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addCT.php">CT Scan</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addsurgery.php">Surgery</a></li>-->

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="addcard.php">Card</a></li>
                        <li role="presentation"><a role="menuitem"  tabindex="-1" href="addspec.php">Specialization</a></li>
                        <!--<li role="presentation" class="divider"></li>
                         <li role="presentation"><a role="menuitem" data-toggle='modal' data-target='#billmodal' tabindex="-1" href="#">Bill Category</a></li>
                        <li role="presentation"><a role="menuitem" data-toggle='modal' data-target='#testcatgorymodal' tabindex="-1" href="#">Test Catagory</a></li> -->
                       <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" data-toggle='modal' data-target='#citymodal' tabindex="-1" href="#">Add City</a></li>
                        <li role="presentation"><a role="menuitem" data-toggle='modal' data-target='#subcitymodal' tabindex="-1" href="#">Add Sub City</a></li>
                       <!--  <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" data-toggle='modal' data-target='#departmentmodal' tabindex="-1" href="#">Add Department</a></li>
                        -->
                       	<li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem"  tabindex="-1" href="activationtime.php">Card Activation Period</a></li>
                        <li role="presentation" class="divider"></li>

                    </ul>
                </li><!--End of General Informatio Menu-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bar-chart"> Reports</i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="reports.php?id=hospitalActivityReport" target="_blank">Hospital Activity Report</a></li> -->
                        <li><a href="reports.php?id=creditSalesSummary" target="_blank">Credit Sales Summary</a></li>
                        <li><a href="reports.php?id=creditSalesDetail" target="_blank">Credit Sales Detail</a></li>
                        <li><a href="reports.php?id=doctorActivitySummary" target="_blank">Doctor Activity Summary</a></li>
                        <li><a href="reports.php?id=doctorActivityDetail" target="_blank">Doctor Activity Detail</a></li>
                        <li><a href="reports.php?id=receptionistActivitySummary" target="_blank">Receptionist Activity Summary</a></li>
                        <li><a href="reports.php?id=receptionistActivityDetail" target="_blank">Receptionist Activity Detail</a></li>
                        <li><a href="reports.php?id=receptionistActivitySummaryByTestCategory" target="_blank">Receptionist Summary Per Category</a></li>
                        <li><a href="reports.php?id=paymentOrderReport" target="_blank">Payment Order Report</a></li>
                        <li><a href="reports.php?id=assesmentReportSummary" target="_blank">Diagnose Report Summary </a></li>
                        <li><a href="reports.php?id=assesmentReportDetail" target="_blank">Diagnose Report Detail</a></li>                       
                        <li><a href="opdReport2.php" target="_blank">OPD Report</a></li>
                        <li><a href="reports.php?id=antenatalReportDetail" target="_blank">Antenatal Report</a></li> 
                        <li><a href="reports.php?id=fpReportDetail" target="_blank">FP Report</a></li> 
                    </ul>
                </li><!-- /.messages-menu -->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <span class="label label-success" id="totalLabel"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header" id="msgHeaderId"></li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu" id="messages-menu-id">

                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer">
                            <div class="pull-left">
                            <a href="privateMessage.php" target="_blank">See All Messages</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="msgIconLabel">Mark All As Read</a>
                            </div>
                        </li>
                    </ul>
                </li><!-- /.messages-menu -->


                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-bell"></i>
                        <span class="label label-warning" id="totalRemindCount"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header" id="totalRemindLabel">Today You have  Reminders</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu" id="notifications-menu-id">

                            </ul>
                        </li>
                        <li class="footer"><a href="reminder.php" target="_blank">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-flag"></i>
                        <span class="label label-danger" id="totalAssCount"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header" id="totalAssHeader">You have 0 Assignments today!</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu" id="ass-menu-id">

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#" data-toggle="control-sidebar">View all Assignments</a>
                        </li>
                    </ul>
                </li>

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="images/avata.jpg" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="" class="img-circle" alt="User Image">
                          
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">

                            </div><!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#"  data-toggle='modal' data-target='#updatePassword' class="btn btn-warning btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-danger btn-flat">Sign Out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" class="adminControlSidebar" data-toggle="control-sidebar"><i class="glyphicon glyphicon-wrench"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" style="width:50px;height:50px" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <a href="admin.php"><h4 class="hidden-xs"><?php echo ucwords($fullname); ?></h4>  </a>            
            </div>
        </div>

        <!-- search form (Optional) -->

        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menus</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class="fa fa-search"></i> <span>Investigation</span> <i class="glyphicon glyphicon-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="echorder.php">Echo Order</a></li>
                    <li><a href="laborder.php">Lab Test Order</a></li>
                    <li><a href="procedureorder.php">Procedure Order</a></li>
                    <li><a href="ecgorder.php">ECG Order</a></li>
                    <li><a href="ctorder.php">CT Scan Order</a></li>
                    <li><a href="xrayorder.php">X-ray Order</a></li>
                    <li><a href="ultraorder.php">Ultra Sound Order</a></li>
                    <li><a href="surgeryorder.php">Surgery Order</a></li>
                </ul>
            </li>
            <li ><a href="addPatient.php"><i class="fa fa-wheelchair"></i> <span>Registration</span></a></li>
            <li><a href="add_assignmet.php"><i class="fa fa-send"></i> <span>Assignment</span></a></li>
            <li><a href="consultation.php"><i class="fa fa-user-md"></i> <span>Consultation</span></a></li>
            <li><a href="familyPlanning.php" ><i class="fa fa-user"></i> <span>Family Planning</span></a></li>
            <li><a href="addbed.php" ><i class="fa fa-bed"></i> <span>Ward</span></a></li>
            <li><a href="material.php" ><i class="fa fa-object-group"></i> <span>Material</span></a></li>
            <li><a href="injection.php" ><i class="fa fa-thermometer"></i> <span>Injection</span></a></li>
            <li><a href="emergencyDrug.php" ><i class="fa fa-medkit"></i> <span>Emergency Medication</span></a></li>
            <li><a href="paymentorder.php"><i class="fa fa-credit-card"></i> <span>Payment Order</span></a></li>
            <li><a href="addDrug.php" ><i class="fa fa-plus-square"></i> <span>Pharmacy</span></a></li>
             <li><a href="addOrgan.php"><i class="fa fa-building"></i> <span>Organization</span></a></li>
             <li><a href="employee.php"><i class="fa fa-user"></i> <span>Employee</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-database"></i> <span>Database</span> <i class="glyphicon glyphicon-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="dbBackup.php">Database Backup</a></li>
                    <li><a href="#">Database Restore</a></li>                    
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
       
    </section>
    <!-- /.sidebar -->
</aside>
