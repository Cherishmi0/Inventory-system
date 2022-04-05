
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>account/profile">Account</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-secondary card-outline">
          <div class="card-header">
            <h3 class="card-title">Profile</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"><?php echo $this->session->userdata['name']; ?></h3>

                  <p class="text-muted text-center">administrator</p>
                  <p class="text-muted text-center">Date Added: <?php echo $profile->date_added; ?></p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right"><?php echo $profile->email; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <a class="float-right"><?php echo $profile->phone; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Role</b> <a class="float-right"><?php 
                      if($profile->role == 1){
                        echo "Power Admin";
                      }else if($profile->role == 2){
                        echo "Admin";
                      }else if($profile->role == 3){
                        echo "Supervisor";
                      } 
                    ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Status</b> <a class="float-right"><?php 
                      if($profile->status == 0){
                        echo "Disable";
                      }else if($profile->status == 1){
                        echo "Enable";
                      }
                      ?></a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->
