  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dispatched Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
              <li class="breadcrumb-item active">Dispatched Report</li>
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
            <h3 class="card-title">Dispatched Report</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
            <table class="table table-bordered table-striped table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Note</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($requests as $request)
              {?>
                <tr>
                  <td><?php echo $request->name; ?></td>
                  <td><?php echo $request->phone; ?></td>
                  <td><?php echo $request->email; ?></td>
                  <td><?php echo $request->note; ?></td>
                  <td><?php echo $request->created_at; ?></td>
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
