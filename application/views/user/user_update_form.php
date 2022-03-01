
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user">User</a></li>
              <li class="breadcrumb-item active">Update User</li>
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
            <h3 class="card-title">Update User</h3>
            <h3 class="card-title float-right">
              <a href="<?php echo base_url(); ?>user" class="btn-sm">
                Back
              </a>
            </h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <div class="col-md-6">
              <!-- general form elements -->
              <form action="<?php echo base_url(); ?>user/update?user_id=<?php echo $user_details->user_id; ?>" role="form" method="post">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control" value="<?php echo $user_details->first_name; ?>" placeholder="First Name">
                  <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="<?php echo $user_details->last_name; ?>" placeholder="Last Name">
                  <span class="text-danger"><?php echo form_error('last_name'); ?></span>                
                </div>
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control" value="<?php echo $user_details->phone; ?>" placeholder="Phone">
                  <span class="text-danger"><?php echo form_error('phone'); ?></span>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role">
                    <option value="">--Select Role--</option>
                    <option value="1" <?php echo $user_details->role==1?"selected":""; ?>>Power Admin</option>
                    <option value="2" <?php echo $user_details->role==2?"selected":""; ?>>Director_Operation</option>
					  <option value="3" <?php echo $user_details->role==3?"selected":""; ?>>CSM</option>
					  <option value="4" <?php echo $user_details->role==4?"selected":""; ?>>Accountant</option>
					  <option value="5" <?php echo $user_details->role==5?"selected":""; ?>>Supervisor</option>
				  </select>
                  <span class="text-danger"><?php echo form_error('role'); ?></span>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $user_details->email; ?>" placeholder="Email" disabled>
                  <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="" placeholder="Password">
                  <span class="text-danger"><?php echo form_error('password'); ?></span>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control" value="" placeholder="Confirm Password">
                  <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="0" <?php echo $user_details->status==0?"selected":""; ?>>Disable</option>
                    <option value="1" <?php echo $user_details->status==1?"selected":""; ?>>Enable</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-sm float-right"> Submit </button>
              </form>
            </div>
          </div><!-- /.card-body -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
