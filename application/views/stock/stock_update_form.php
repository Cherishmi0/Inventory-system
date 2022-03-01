
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Stock</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>stock">Stock</a></li>
              <li class="breadcrumb-item active">Update Stock</li>
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
            <h3 class="card-title">Update Stock</h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <!-- general form elements -->
                <form action="<?php echo base_url(); ?>stock/update?stock_id=<?php echo $stock_details->stock_id; ?>" role="form" method="post">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $stock_details->title; ?>" placeholder="Title">
                    <span class="text-danger"><?php echo form_error('title'); ?></span>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description"><?php echo $stock_details->description; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" value="<?php echo $stock_details->code; ?>" placeholder="Code">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo $stock_details->quantity; ?>" placeholder="Quantity">
                    <span class="text-danger"><?php echo form_error('quantity'); ?></span>
                  </div>
					<div class="form-group">
						<label>Unit</label>
						<select class="form-control" name="unit">
							<option value="">--Select Unit--</option>
							<option value="1" <?php echo $stock_details->unit==1?"selected":""; ?>>Each</option>
							<option value="2" <?php echo $stock_details->unit==2?"selected":""; ?>>Bottle</option>
							<option value="3" <?php echo $stock_details->unit==3?"selected":""; ?>>Box</option>
							<option value="4" <?php echo $stock_details->unit==4?"selected":""; ?>>Can</option>
							<option value="5" <?php echo $stock_details->unit==5?"selected":""; ?>>Pack</option>
							<option value="6" <?php echo $stock_details->unit==6?"selected":""; ?>>Other</option>
						</select>
						<span class="text-danger"><?php echo form_error('unit'); ?></span>
					</div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $stock_details->price; ?>" placeholder="Price">
                    <span class="text-danger"><?php echo form_error('price'); ?></span>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category">
                      <option value="">--Select Category--</option>
                      <?php foreach ($categories as $category){ ?>
                        <option value="<?php echo $category->category_id ?>" <?php echo $stock_details->category_id==$category->category_id?"selected":""; ?>><?php echo $category->name ?></option>
                      <?php } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('category'); ?></span>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="0" <?php echo $stock_details->status==0?"selected":""; ?>>Disable</option>
                      <option value="1" <?php echo $stock_details->status==1?"selected":""; ?>>Enable</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-outline-primary btn-sm float-right"> Submit </button>
                </form>
              </div>
              <div class="col-md-6">
                <div class="card card-secondary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Add New Quantity</h3>
                  </div>
                  <div class="card-body">
                    <p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <form action="<?php echo base_url(); ?>stock/updateQuantity?stock_id=<?php echo $stock_details->stock_id; ?>" role="form" method="post">
                      <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="q_quantity" class="form-control" value="<?php echo set_value('q_quantity'); ?>" placeholder="Quantity">
                        <span class="text-danger"><?php echo form_error('q_quantity'); ?></span>
                      </div>
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="q_price" class="form-control" value="<?php echo set_value('q_price'); ?>" placeholder="Price">
                        <span class="text-danger"><?php echo form_error('q_price'); ?></span>
                      </div>
                      <button type="submit" class="btn btn-outline-primary btn-sm float-right"> Submit </button>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="card card-secondary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Quantity History</h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="dataTable">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Type</th>
							<th>User</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach ($stock_histories as $stock_history)
                      {?>
                        <tr>
                          <td><?php echo $stock_history->date_added; ?></td>
                          <td><?php echo $stock_history->quantity; ?></td>
                          <td><?php echo $stock_history->price; ?></td>
                          <td><?php 
                            if($stock_history->type == 0){
                              echo "New";
                            }else if($stock_history->type == 1){
                              echo "Update";
                            }
                          ?></td>
							<td><?php echo $stock_history->first_name.' '.$stock_history->last_name;?></td>
                        </tr>
                        <?php
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
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
