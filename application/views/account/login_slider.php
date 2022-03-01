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

<div class="card-body" style="padding-left: 0% ; padding-right: 0% ; padding-top: 0%">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo base_url(); ?>dist/img/bs2.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url(); ?>dist/img/bluesky_logo.png" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url(); ?>dist/img/bs1.jpeg" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<div class="login-box" style="position: absolute; text-align: center">
	<div class="login-logo">
		<a href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>dist/img/bluesky_logo.png" alt="Blue Sky Services" class="brand-image" >
		</a>
	</div>
	<!-- /.login-logo -->
	<div class="card" >
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
						<div class="icheck-primary">
							<input type="checkbox" id="remember">
							<label for="remember">
								Remember Me
							</label>
						</div>
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

<div class="col-4" style="position: absolute; top: 5%; left: 65%;">
	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
		Inventory Request
	</button>
</div>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Make an Inventory Request</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>All fields are required to fill</p>

				<form action="<?php echo base_url(); ?>account/login" method="post">
					<div class="row">
					<div class="input-group mb-3">
						<input type="text" name="name" class="form-control" placeholder="Name">
					</div>
					<div class="input-group mb-3">
						<input type="text" name="company" class="form-control" placeholder="Company Name">
					</div>
						<div class="input-group mb-3">
							<input type="email" name="email" class="form-control" placeholder="E-mail">
						</div>
						<div class="input-group mb-3">
							<input type="text" name="phone" class="form-control" placeholder="Phone">
						</div>
						<div class="input-group mb-3">
							<input type="text" name="message" class="form-control" placeholder="Type your request">
						</div>

					</div>
				</form>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		Anything you want
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

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
</script>

</body>
</html>
