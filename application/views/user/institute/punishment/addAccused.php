<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Accused Person Management
        <small>Add accused</small>
      </h1>
    </section>
    
    <section class="content">
    <form action="<?php echo base_url();?>punishment/uploadData" method="post" enctype="multipart/form-data">
    Upload excel file : 
    <input type="file" name="uploadFile" value="" /><br><br>
    <input type="submit" name="submit" value="Upload" />
</form>
 
    
    <form  action="<?php base_url('punishment/create') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Fist name" name="first_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Last name" name="last_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Phone nuber" name="phone_no">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Addres" name="address">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="datetime"id="reservationtime">
                  </div>
                <!-- /.input group -->
              <!-- </div> -->
                 
      </div>
      <div class="form-group has-feedback">
        <input type="number" class="form-control" placeholder="Age" name="age">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block ">Save accused</button>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block ">Send accused to the community</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
</div>
    </section>
    
</div>

<script src="<?php //echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<?php $this->load->view('template/institute/footer');?>