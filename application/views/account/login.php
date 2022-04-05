<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Blue Sky Services | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style type="text/css">
		.full-screen {
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}
		.card-body{
			width: 100%;
		}
	</style>
</head>
<body class="hold-transition login-page">

<div class="login-box" style="position: absolute; text-align: center; background:#fff">
	<div class="login-logo">
		<a href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>dist/img/bluesky_logo.png" alt="Blue Sky Services" class="brand-image" style="margin-top:10px;">
		</a>
	</div>
	<!-- /.login-logo -->
	<div class="card" style="margin-bottom: 0;">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session *</p>

			<form action="<?php echo base_url(); ?>account/login" method="post">
				<div class="input-group mb-3">
					<input type="email" name="email" class="form-control" placeholder="Email">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
							Inventory Request
						</button>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
			</form>



			<div class="social-auth-links text-center mb-3">
				<p></p>
				<?php
				if(isset($message))
					echo '<br><p class="text-danger" style="text-align: center;">'.$message.'.</p>';
				?>
				<p class="text-success"><?php echo $this->session->flashdata('success'); ?></p>
				
			</div>
			<!-- /.social-auth-links -->

			<!-- <p class="mb-1">
			  <a href="forgot-password.html">I forgot my password</a>
			</p>
			<p class="mb-0">
			  <a href="register.html" class="text-center">Register a new membership</a>
			</p> -->
		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<!-- /.login-box -->
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Make a Request</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo base_url(); ?>account/inventory_request" role="form" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo set_value('name'); ?>" placeholder="Name">
						<span class="text-danger"><?php echo form_error('name'); ?></span>
					</div>
					<div class="form-group">
						<label>Company</label>
						<input type="text" name="company" class="form-control" value="<?php echo set_value('company'); ?>" placeholder="Company">
						<span class="text-danger"><?php echo form_error('company'); ?></span>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
						<span class="text-danger"><?php echo form_error('phone'); ?></span>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email">
						<span class="text-danger"><?php echo form_error('email'); ?></span>
					</div>
					<div class="form-group">
						<label>Note</label>
						<textarea class="form-control" name="note" rows="3" placeholder="Note"><?php echo set_value('description'); ?></textarea>
						<span class="text-danger"><?php echo form_error('note'); ?></span>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-outline-primary btn-sm float-right" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-sm float-right"> Submit </button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>

<script type="text/javascript">
	var $item = $('.carousel-item');
	var $wHeight = $(window).height();
	$item.eq(0).addClass('active');
	$item.height($wHeight);
	$item.addClass('full-screen');

	$('.carousel img').each(function() {
		var $src = $(this).attr('src');
		var $color = $(this).attr('data-color');
		$(this).parent().css({
			'background-image' : 'url(' + $src + ')',
			'background-color' : $color
		});
		$(this).remove();
	});

	$(window).on('resize', function (){
		$wHeight = $(window).height();
		$item.height($wHeight);
	});

	$('.carousel').carousel({
		interval: 6000,
		pause: "false"
	});
<?php if(!$error_free){ ?>
	$("#modal-default").modal();
<?php } ?>
</script>

</body>
</html>
