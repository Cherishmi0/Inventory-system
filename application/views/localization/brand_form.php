
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>brand">Brand</a></li>
              <li class="breadcrumb-item active">Add Brand</li>
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
            <h3 class="card-title">Add Brand</h3>
            <h3 class="card-title float-right">
              <a href="<?php echo base_url(); ?>brand" class="btn-sm">
                Back
              </a>
            </h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <div class="col-md-6">
              <!-- general form elements -->
              <form action="<?php echo base_url(); ?>brand/add" role="form" method="post">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" placeholder="Name">
                  <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>
                <div class="form-group">
                  <label>Code</label>
                  <input type="text" name="code" class="form-control" value="<?php echo set_value('code'); ?>" placeholder="Code">
                  <span class="text-danger"><?php echo form_error('code'); ?></span>                
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="0" <?php echo set_value('status')==0?"selected":""; ?>>Disable</option>
                    <option value="1" <?php echo set_value('status')==1?"selected":""; ?>>Enable</option>
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
