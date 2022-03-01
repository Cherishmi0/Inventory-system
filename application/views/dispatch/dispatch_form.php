<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dispatch Stock</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dispatch">Dispatch</a></li>
						<li class="breadcrumb-item active">Dispatch Stock</li>
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
					<h3 class="card-title">Dispatch Stocks</h3>
				</div> <!-- /.card-body -->
				<div class="card-body">
					<div class="col-md-6">
						<!-- general form elements -->
						<form action="<?php echo base_url(); ?>dispatch/add" role="form" method="post">
							<div class="form-group">
								<label>Stock</label>
								<select class="form-control" name="stock">
									<option value="">--Select Stock--</option>
									<?php foreach ($stocks as $stock){ ?>
									<option value="<?php echo $stock->stock_id ?>" <?php echo set_value('stock')==$stock->stock_id?"selected":""; ?>><?php echo $stock->title ?></option>
									<?php } ?>
								</select>
								<span class="text-danger"><?php echo form_error('stock'); ?></span>
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input type="text" name="quantity" class="form-control" value="<?php echo set_value('quantity')?>" placeholder="Quantity">
								<span class="text-danger"><?php echo form_error('quantity'); ?></span>
							</div>
							<div class="form-group">
								<label>Unit</label>
								<select class="form-control" name="unit">
									<option value="">--Select Unit--</option>
									<option value="1" <?php echo set_value('unit')==1?"selected":""; ?>>Each</option>
									<option value="2" <?php echo set_value('unit')==2?"selected":""; ?>>Bottle</option>
									<option value="3" <?php echo set_value('unit')==3?"selected":""; ?>>Box</option>
									<option value="4" <?php echo set_value('unit')==4?"selected":""; ?>>Can</option>
									<option value="5" <?php echo set_value('unit')==5?"selected":""; ?>>Pack</option>
									<option value="6" <?php echo set_value('unit')==6?"selected":""; ?>>Other</option>
								</select>
								<span class="text-danger"><?php echo form_error('unit'); ?></span>
							</div>
							<div class="form-group">
								<label>Site</label>
								<select class="form-control" name="site">
									<option value="">--Select Site--</option>
									<?php foreach ($sites as $site){ ?>
										<option value="<?php echo $site->siteId ?>" <?php echo set_value('site')==$site->siteId?"selected":""; ?>><?php echo $site->siteName ?></option>
									<?php } ?>
								</select>
								<span class="text-danger"><?php echo form_error('site'); ?></span>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description" rows="3" placeholder="Description"><?php echo set_value('description'); ?></textarea>
								<span class="text-danger"><?php echo form_error('description'); ?></span>
							</div>
							<div class="form-group">
								<label>Dispatched User</label>
								<input type="text" name="dispatched_user" class="form-control" value="<?php echo set_value('dispatched_user')?>" placeholder="Dispatched User">
								<span class="text-danger"><?php echo form_error('dispatched_user'); ?></span>
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
