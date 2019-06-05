<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Profile
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
              <li><a href="#settings" data-toggle="tab">Edit Event</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="box box-primary">
              <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Event Title</th>
                  <th>Image</th>
                  <th>Event description</th>
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
                    <td><a href="<?php echo base_url();?>event/edit_event" class="glyphicon glyphicon-edit"></a><a href="<?php echo base_url();?>event/delete_event" class="glyphicon glyphicon-trash"></a></td>
                    <td><a href="<?php echo base_url();?>event/post_event"><button type="button" class="btn btn-block btn-primary ">Post</button></a></td>
                    
                 
             </tr>
                <?php endforeach; ?>

               
                 
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
                <form class="form-horizontal" action="">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    
                  </div> -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Edit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
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