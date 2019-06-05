<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
    		<img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme"  width="140" height="140" border="0" class="img-circle center-block"/>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
            <li class="treeview" id="mainUserNav">
	            <a href="#">
	              <i class="fa fa-users"></i>
	              <span>Events</span>
	              <span class="pull-right-container">
	                <i class="fa fa-angle-left pull-right"></i>
	              </span>
	            </a>
	            <ul class="treeview-menu">

	            
	              <li><a href="<?php echo base_url('index.php/event/addEvent') ?>">Add Events</a></li>
	              <li><a href="<?php echo base_url('index.php/event') ?>">Manage Events</a></li>
	               

	              
	            </ul>
          </li>
          
           <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span>Punishmets</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                

		         <li><a href="<?php echo base_url('index.php/punishment/addAccused/') ?>">Add Accused</a></li>
		         <li><a href="<?php echo base_url('index.php/punishment/') ?>">Manage Accused</a></li>
		      </ul>
		  </li>
          


  		
           <li>
                  <a href="#">

                  <i class="fa fa-user fa-lg"></i><a href="<?php echo base_url('index.php/event/community') ?>" >Community Service</a>
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i><a href="<?php echo base_url('index.php/event/profile') ?>" > Profile</a>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> <a href="<?php echo base_url('index.php/home') ?>" > Comming Events</a>
                  </a>
                </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

</style>
