<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IMS | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="<?php echo base_url(); ?>account/logout">
          <i class="fas fa-power-off"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
      <img src="<?php echo base_url(); ?>dist/img/bluesky_logo.png" alt="Blue Sky Services" class="brand-image"
           >
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url(); ?>account/profile" class="d-block"><?php echo $this->session->userdata['name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?=($this->uri->segment(1)==='home' || $this->uri->segment(1)=='')?'menu-open':''?>">
            <a href="<?php echo base_url(); ?>home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?=($this->uri->segment(1)==='user')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>user" class="nav-link <?=($this->uri->segment(1)==='user' && $this->uri->segment(2)=='')?'active':''?>">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>user/add" class="nav-link <?=($this->uri->segment(1)==='user' && $this->uri->segment(2)==='add')?'active':''?>">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=($this->uri->segment(1)==='stock')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Stock Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>stock" class="nav-link <?=($this->uri->segment(1)==='stock' && $this->uri->segment(2)=='')?'active':''?>">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Stocks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>stock/add" class="nav-link <?=($this->uri->segment(1)==='stock' && $this->uri->segment(2)==='add')?'active':''?>">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>Add Stock</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=($this->uri->segment(1)==='dispatch')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Dispatch Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dispatch" class="nav-link <?=($this->uri->segment(1)==='dispatch' && $this->uri->segment(2)=='')?'active':''?>">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Dispatch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>dispatch/add" class="nav-link <?=($this->uri->segment(1)==='dispatch' && $this->uri->segment(2)==='add')?'active':''?>">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>Add Dispatch</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?=($this->uri->segment(1)==='report')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reporting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>report/request" class="nav-link <?=($this->uri->segment(1)==='report' && $this->uri->segment(2)==='request')?'active':''?>">
                  <i class="fa fa-gift nav-icon"></i>
                  <p>Inventory Request</p>
                </a>
              </li>
            </ul>
          </li>
    			<li class="nav-item has-treeview <?=($this->uri->segment(1)==='site')?'menu-open':''?>">
    				<a href="#" class="nav-link">
    					<i class="nav-icon fas fa-copy"></i>
    					<p>
    						Site Management
    						<i class="fas fa-angle-left right"></i>
    						<span class="badge badge-info right"></span>
    					</p>
    				</a>
    				<ul class="nav nav-treeview">
    					<li class="nav-item">
    						<a href="<?php echo base_url(); ?>site/add" class="nav-link <?=($this->uri->segment(1)==='site' && $this->uri->segment(2)==='add')?'active':''?>">
    							<i class="fa fa-cart-plus nav-icon"></i>
    							<p>Add Site</p>
    						</a>
    					</li>
    				</ul>
    			</li>
          <li class="nav-item has-treeview <?=($this->uri->segment(1)==='brand')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Localization
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>brand" class="nav-link <?=($this->uri->segment(1)==='brand' && $this->uri->segment(2)=='')?'active':''?>">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>brand/add" class="nav-link <?=($this->uri->segment(1)==='brand' && $this->uri->segment(2)==='add')?'active':''?>">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
