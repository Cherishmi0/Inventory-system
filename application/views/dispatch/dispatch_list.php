  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dispatch</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dispatch">Dispatch</a></li>
              <li class="breadcrumb-item active">Dispatch List</li>
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
            <h3 class="card-title">Dispatch List</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
            <table class="table table-bordered table-striped table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th>Stock Title</th>
                  <th>Category</th>
                  <th>Code</th>
                  <th>Quantity</th>
					<th>Unit</th>
                  <th>Site</th>
                  <th>Description</th>
					<th>Dispatched Id</th>
                  <th>Login By</th>
					<th>Dispathced User</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($dispatches as $dispatch)
              {?>
                <tr>
                  <td><?php echo $dispatch->title; ?></td>
                  <td><?php echo $dispatch->c_name; ?></td>
                  <td><?php echo $dispatch->code; ?></td>
                  <td><?php echo $dispatch->quantity; ?></td>
					<td><?php
						if($dispatch->unit == 1){
							echo "Each";
						}else if($dispatch->unit == 2){
							echo "Bottle";
						}else if($dispatch->unit == 3){
							echo "Box";
						}else if($dispatch->unit == 4){
							echo "Can";
						}else if($dispatch->unit == 5){
							echo "Pack";
						}else if($dispatch->unit == 6){
							echo "Other";
						}
						?></td>


                  <td><?php echo $dispatch->site; ?></td>
                  <td><?php echo $dispatch->description; ?></td>
					<td><?php echo $dispatch->dispatch_id; ?></td>
                  <td><?php echo $dispatch->first_name.' '.$dispatch->last_name; ?></td>
					<td><?php echo $dispatch->dispatched_user; ?></td>
                  <td><?php echo $dispatch->date; ?></td>
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
