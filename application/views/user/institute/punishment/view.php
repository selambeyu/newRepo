<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Punishment
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    

<div class="tab-content">
<div class="">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">ViewAccused</a></li>
              <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
              <li><a href="#settings" data-toggle="tab">AddAccused</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="box box-primary">
              <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>First name</th>
                  <th>last name</th>
                  <th>email</th>
                  <th>phone_no</th>
                  <th>address</th>
                  <th>start_date</th>
                  <th>end_date</th>
               <td>age</td>
               <td>action</td>
                </thead>
                <tbody>
                <?php foreach($accused_person as $row): ?>
                <tr>   
                    <td><?php echo $row->fist_name; ?></td>
                    <td><?php echo $row->last_name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->phone_no; ?></td>
                    <td><?php echo $row->address; ?></td>
                    <td><?php echo $row->start_date; ?></td>
                    <td><?php echo $row->end_date; ?></td>
                    <td><?php echo $row->age;?></td>
                    <div></div>
                    <td><a href="<?php echo base_url();?>punishment/edit_accused/<?php echo $row->accused_id;?>" class="glyphicon glyphicon-edit"></a><a href="<?php echo base_url();?>punishment/delete_accused/<?php echo $row->accused_id;?>" class="glyphicon glyphicon-trash"></a></td>
                    <td><a href="<?php echo base_url();?>punishment/send_accused"><button type="button" class="btn btn-block btn-primary ">Send</button></a></td>
                    
                 
             </tr>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            
            </div>
            <!-- /.box-body -->

            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              <div class="box box-primary">
              <div class="box-body">
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
        <!-- <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block ">Send accused to the community</button>
        </div> -->
        <!-- /.col -->
      </div>
    </form>

                </div>
                </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        </section>
        </div>

      
<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>
  <?php $this->load->view('template/institute/footer');?>