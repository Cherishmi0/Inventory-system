  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>stock">Stock</a></li>
              <li class="breadcrumb-item active">Stock List</li>
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
            <h3 class="card-title">Stock List</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
            <table class="table table-bordered table-striped table-hover table-sm" id="dataTable">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Code</th>
                  <th>Quantity</th>
					<th>Unit</th>
                  <th>Price</th>
                  <th>Status</th>
					<th>Stock_Id</th>
					<th>Added_By</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($stocks as $stock)
              {?>
                <tr>
                  <td><?php echo $stock->title; ?></td>
                  <td><?php echo $stock->name; ?></td>
                  <td><?php echo $stock->code; ?></td>
                  <td><?php echo $stock->quantity; ?></td>
					<td><?php
						if($stock->unit == 1){
							echo "Each";
						}else if($stock->unit == 2){
							echo "Bottle";
						}else if($stock->unit == 3){
							echo "Box";
						}else if($stock->unit == 4){
							echo "Can";
						}else if($stock->unit == 5){
							echo "Pack";
						}else if($stock->unit == 6){
							echo "Other";
						}
						?></td>
                  <td>$<?php echo $stock->price; ?></td>
                  <td><?php 
                    if($stock->status == 0){
                      echo "Disable";
                    }else if($stock->status == 1){
                      echo "Enable";
                    }
                  ?></td>
					<td><?php echo $stock->stock_id; ?></td>
					<td><?php echo $stock->first_name.' '.$stock->last_name; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>stock/update?stock_id=<?php echo $stock->stock_id; ?>" class="btn btn-sm">
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
