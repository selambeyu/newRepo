<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/adminLte/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/adminLte/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminLte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminLte/plugins/iCheck/all.css">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminLte/plugins/timepicker/bootstrap-timepicker.min.css">
    <link href="<?php echo base_url(); ?>assets/adminLte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/adminLte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/adminLte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>

    <script src="<?php echo base_url(); ?>assets/adminLte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminLte/plugins/datatables/jquery.dataTables.min.js"></script> 
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php //echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IN</b>TUT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>INSTITUTE</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu pull-left">
          <ul class="nav navbar-nav">
            <li ><a href="<?php echo base_url(); ?>event">Event<span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo base_url(); ?>punishment/">Punishment</a></li>
            <li><a href="<?php echo base_url(); ?>communityOrg">community services</a></li>
            <li>
              <a href="<?php echo base_url(); ?>profile" >
                <i class="glyphicon glyphicon-user"></i>
                <span>Profile</span>
              </a>
            </li>
            </ul>
           
        
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li>
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Event</span></i>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>event/create"><i class="fa fa-circle-o"></i> Create an Event</a></li>
                <li><a href="<?php echo base_url(); ?>event"><i class="fa fa-circle-o"></i> Manage an Event</a></li>
                
               <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Punishment</span></i>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>punishment/addAccused"><i class="fa fa-circle-o"></i> Add Accused </a></li>
                <li><a href="<?php echo base_url(); ?>punishment"><i class="fa fa-circle-o"></i> Manage Accused</a></li>
                <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> -->
              </ul>
            </li>
            
            
            <li>
              <a href="<?php echo base_url(); ?>communityOrg">
                <i class="fa fa-users"></i>
                <span>Community Services</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>profile" >
                <i class="glyphicon glyphicon-user"></i>
                <span>Profile</span>
              </a>
            </li>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>