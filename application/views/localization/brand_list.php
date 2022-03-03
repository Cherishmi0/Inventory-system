  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Brands</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>stock">Brand</a></li>
              <li class="breadcrumb-item active">Brand List</li>
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
            <h3 class="card-title">Brand List</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p> 
            <table class="table table-bordered table-striped table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th>Brand Name</th>
                  <th>Brand Code</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($brands as $brand)
              {?>
                <tr>
                  <td><?php echo $brand->name; ?></td>
                  <td><?php echo $brand->code; ?></td>
                  <td><?php 
                    if($brand->status == 0){
                      echo "Disable";
                    }else if($brand->status == 1){
                      echo "Enable";
                    }
                  ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>brand/update?brand_id=<?php echo $brand->brand_id; ?>" class="btn btn-sm">
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
