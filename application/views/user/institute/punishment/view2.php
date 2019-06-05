<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Punishment Management
        <small>View Accused</small>
      </h1>
      <a href="<?php echo base_url('punishment/addAccused') ?>" class="btn btn-primary">Add accused</a>
          <br /> <br />
    </section>
    
    <section class="content">

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
                    <td><a href="<?php echo base_url();?>punishment/edit_accused" class="glyphicon glyphicon-edit"></a><a href="<?php echo base_url();?>event/delete" class="glyphicon glyphicon-trash"></a></td>
                    <td><a href="<?php echo base_url();?>punishment/send_accused"><button type="button" class="btn btn-block btn-primary ">Send</button></a></td>
                    
                 
             </tr>
                <?php endforeach; ?>

                </tbody>
                <tfoot>
               
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