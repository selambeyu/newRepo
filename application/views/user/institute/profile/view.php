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
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <!-- <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
              <li><a href="#settings" data-toggle="tab">Add info</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="base_url();?>assets/adminLte/dist/img/avatar2.png" alt="User profile picture">

              <h3 class="profile-username text-center">MELKAM BEYENE</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Addres</b> <a class="pull-right">Bole Snan BLG 2nd Floor</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">institute@gmail.com</a>
                </li>
                <li class="list-group-item">
                  <b>phone number </b> <a class="pull-right">+2511234345</a>
                </li>
              </ul>

              <a href="" class="btn btn-primary btn-block"><b>Add other information</b></a>
              <a href="" class="btn btn-primary btn-block"><b>Edit Informatio</b></a>
            </div>
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

        <?php $this->load->view('template/institute/footer');?>