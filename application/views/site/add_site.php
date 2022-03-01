
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Add Site</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user">Site</a></li>
						<li class="breadcrumb-item active">Add Site</li>
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
					<h3 class="card-title">Add Sites</h3>
					<h3 class="card-title float-right">
						<a href="<?php echo base_url(); ?>user" class="btn-sm">
							Back
						</a>
					</h3>
				</div> <!-- /.card-body -->
				<div class="card-body">
					<div class="col-md-6">
						<!-- general form elements -->
						<form action="<?php echo base_url(); ?>site/add" role="form" method="post">
							<div class="form-group">
								<label>Site Name</label>
								<input type="text" name="site_name" class="form-control" value="<?php echo set_value('site_name'); ?>" placeholder="Site Name">
								<span class="text-danger"><?php echo form_error('site_name'); ?></span>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
								<span class="text-danger"><?php echo form_error('phone'); ?></span>
							</div>
							<div class="form-group">
								<label>Site Email</label>
								<input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email">
								<span class="text-danger"><?php echo form_error('email'); ?></span>
							</div>
							<div class="form-group">
								<label>Site Address : Street </label>
								<input type="text" name="street" class="form-control" value="<?php echo set_value('street'); ?>" placeholder="Street">
								<span class="text-danger"><?php echo form_error('street'); ?></span>
							</div>
							<div class="form-group">
								<label>Site Address : Suburb</label>
								<input type="text" name="suburb" class="form-control" value="<?php echo set_value('suburb'); ?>" placeholder="Suburb">
								<span class="text-danger"><?php echo form_error('suburb'); ?></span>
							</div>
							<div class="form-group">
								<label>Site Address : PostCode</label>
								<input type="text" name="post_code" class="form-control" value="<?php echo set_value('post_code'); ?>" placeholder="Post Code">
								<span class="text-danger"><?php echo form_error('post_code'); ?></span>
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
