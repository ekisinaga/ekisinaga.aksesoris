<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ID-id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kurir</title>
  
    <link rel="stylesheet" href="<?php echo get_theme_uri('plugins/fontawesome-free/css/all.min.css', 'adminlte'); ?>">
    <link rel="stylesheet" href="<?php echo get_theme_uri('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', 'adminlte'); ?>">
    <link rel="stylesheet" href="<?php echo get_theme_uri('css/adminlte.min.css', 'adminlte'); ?>">
    <link rel="stylesheet" href="<?php echo get_theme_uri('plugins/toastr/toastr.min.css', 'adminlte'); ?>">
    <link rel="stylesheet" href="<?php echo get_theme_uri('plugins/air-datepicker/dist/css/datepicker.min.css', 'adminlte'); ?>">
    <link rel="stylesheet" href="<?php echo get_theme_uri('plugins/select2js/dist/css/select2.min.css', 'adminlte'); ?>">

    <link rel="icon" href="<?php echo base_url('assets/uploads/static/icon.png'); ?>" type="image/icon">

    <script src="<?php echo get_theme_uri('plugins/jquery/jquery.min.js', 'adminlte'); ?>"></script>
    <script src="<?php echo get_theme_uri('plugins/bootstrap/js/bootstrap.bundle.min.js', 'adminlte'); ?>"></script>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
    <!-- <form class="form-inline ml-3" action="<?php echo site_url('customer/orders/search'); ?>" method="GET">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" value="" name="query" placeholder="Cari order..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
            </div>
          </div>
        </form> -->
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url(); ?>" class="brand-link">
      <img src="<?php echo get_store_logo(); ?>" alt="<?php echo get_store_name(); ?> Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo get_store_name(); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <?php foreach ($kurir as $row) { ?>
    <p class="text-light"><?= $row->nama; ?></p>
    <?php } ?>
        <div class="info">
          <a href="" class="d-block"></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          <?php if ($page == 'Dashboard') { ?>
            <a href="<?php echo site_url('kurir/dashboard');?>" class="nav-link active">
              <?php } else { ?>
                <a href="<?php echo site_url('kurir/dashboard');?>" class="nav-link">
                <?php } ?>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
              <?php foreach ($kurir as $row) { ?>
                <?php if ($page == 'task') { ?>
                    <a href="<?php echo site_url('kurir/dashboard/task/'.$row->id);?>" class="nav-link active">
              <?php } else { ?>
                <a href="<?php echo site_url('kurir/dashboard/task/'.$row->id);?>" class="nav-link">
                <?php } ?>
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Misi
              </p>
            </a> 
            <?php } ?>
          </li>
        </ul>
      </nav>
     
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>