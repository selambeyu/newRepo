

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Event Management
        <small>Edit Event</small>
      </h1>
    </section>
    
    <section class="content">
    
    <form action="<?php echo base_url('event/edit_event/')?><?php echo $event_data->event_id; ?>"  method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="event_name" placeholder="Event Title " value="<?php echo $event_data->event_name;?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        
        <input name="event_description"  class="form-control" rows="3" class="form-control" placeholder="Event Description" value="<?php echo $event_data->event_description;?>">
     
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group">
                
                <select class="form-control select2" data-placeholder="Select a State"value="<?php echo $event_data->event_type;?>">
                  <option>Private</option>
                  <option>Public</option>
                 </select>
              </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name ="address" placeholder="Address"value="<?php echo $event_data->address;?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
                <label>Event Starting and Ending Date</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="datetime"id="reservationtime"value="<?php echo $event_data->start_date;?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group has-feedback">
        <input type="text" class="form-control" name ="phone_no" placeholder="Phone_no"value="<?php echo $event_data->phone;?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      
              <div class="form-group">
                  <label for="exampleInputFile" class="fa  fa-file-image-o">Upload Image</label>
                  <input type="file" name="image" id="exampleInputFile" value="<?php echo $event_data->image;?>">

                 
                </div>

        <!-- /.col -->
        <div class="col-xs-2">
          <button type="submit" class="btn btn-primary btn-block ">edit event</button>
        </div>
        <div class="col-xs-2">
          <button type="submit" class="btn btn-primary btn-block ">Post event</button>
        </div>
        <div class="col-xs-2">
          <button type="submit" class="btn btn-primary btn-block btn-danger">Cancle</button>
        </div>
        /.col
      </div>
    </form>

    
</div>
    </section>
    
</div>


<?php $this->load->view('template/institute/footer');?>