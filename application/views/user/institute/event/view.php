<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Event
        <small></small>
      </h1>
    </section>
    
    <section class="content">
    

<div class="tab-content">
<div class="">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">view Event</a></li>
              <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
              <li><a href="#settings" data-toggle="tab">create Event</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="box box-primary">
              <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>EventTitle</th>
                  <th>Image</th>
                  <th>description</th>
                  <th>Event type</th>
                  <th>Address</th>
                  <th>Starting date</th>
                  <th>Ending date</th>
                  <th>Phone number</th>
                  <th>Action</th>


                </tr>
                </thead>
                <tbody>
                <?php foreach($event as $row): ?>
                <tr>   
                    <td><?php echo $row->event_name; ?></td>
                    <td><?php echo $row->image; ?></td>
                    <td><?php echo $row->event_description; ?></td>
                    <td><?php echo $row->event_type; ?></td>
                    <td><?php echo $row->address; ?></td>
                    <td><?php echo $row->start_date; ?></td>
                    <td><?php echo $row->end_date; ?></td>
                    <td><?php echo $row->phone; ?></td>
                    <td><a href="<?php echo base_url();?>event/edit_event/<?php echo $row->event_id; ?>" class="glyphicon glyphicon-edit primary-btn"></a><a href="<?php echo base_url();?>event/delete_event/<?php echo $row->event_id; ?>" class="glyphicon glyphicon-trash danger-btn"></a></td>
                    <td><a href="<?php echo base_url();?>event/post_event"><button type="button" class="btn btn-block btn-primary ">Post</button></a></td>
                    
                 
             </tr>
                <?php endforeach; ?>

               </tbody>
                 
                
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
                <form class="form-horizontal" action="<?php base_url('event/create') ?>" method="post">
                <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="event name" name="event_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea name="event_description" id="inputevent_description" class="form-control" rows="3" required="required"></textarea>
         
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="event_type" id="select2">
        <option value="">select the event type</option>
        <option>public</option>
        <option >private</option>
        </select>
       
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Address" name="address">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
        <input type="text" class="form-control" placeholder="Phone number" name="phone_no">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group">
    <label for="exampleInputFile">image upload</label>
    <input type="file" id="exampleInputFile" name="image">
   
  </div>
      
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block ">Add accused</button>
        </div>
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