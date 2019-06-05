<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Event Management
        <small>Add event</small>
      </h1>
    </section>
    
    <section class="content">
    
    <form  action="<?php base_url('event/create') ?>" method="post">
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
    </section>
    
</div>

<?php $this->load->view('template/institute/footer');?>