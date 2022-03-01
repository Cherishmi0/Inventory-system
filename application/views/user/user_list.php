  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>stock">User</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-secondary card-outline">
          <div class="card-header">
            <h3 class="card-title">User List</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p> 
            <table class="table table-bordered table-striped table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($users as $user)
              {?>
                <tr>
                  <td><?php echo $user->first_name; ?></td>
                  <td><?php echo $user->last_name; ?></td>
                  <td><?php echo $user->email; ?></td>
                  <td><?php echo $user->phone; ?></td>
                  <td><?php 
                    if($user->role == 1){
                      echo "Power Admin";
                    }else if($user->role == 2){
                      echo "Admin";
                    }else if($user->role == 3){
                      echo "Supervisor";
                    }
                  ?></td>
                  <td><?php 
                    if($user->status == 0){
                      echo "Disable";
                    }else if($user->status == 1){
                      echo "Enable";
                    }
                  ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>user/update?user_id=<?php echo $user->user_id; ?>" class="btn btn-sm">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                  </td>
                </tr>
                <?php
              }
              ?>
              </tbody>
            </table>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
