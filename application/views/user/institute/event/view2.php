<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Event Management
        <small>View Events</small>
      </h1>
    </section>
    
    <section class="content">

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
                    <td><a href="<?php echo base_url();?>event/edit_event/<?php echo $row->event_id; ?>" class="glyphicon glyphicon-edit"></a><a href="<?php echo base_url();?>event/delete_event/<?php echo $row->event_id; ?>" class="glyphicon glyphicon-trash"></a></td>
                    <td><a href="<?php echo base_url();?>event/post_event"><button type="button" class="btn btn-block btn-primary ">Post</button></a></td>
                    
                 
             </tr>
                <?php endforeach; ?>

               
                 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->

    </section>
    </div>

  
    <script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>
  <?php $this->load->view('template/institute/footer');?>