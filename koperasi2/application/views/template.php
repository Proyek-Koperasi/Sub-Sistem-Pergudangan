<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>e-Koperasi</title>

  <!--dynamic table-->
  <link href="<?php echo base_url(); ?>assets/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/data-tables/DT_bootstrap.css" />
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/icon.png">

<!--pickers initialization-->
<script src="<?php echo base_url(); ?>assets/js/pickers-init.js"></script>

  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

  <?php $username = $this->session->userdata('username_admin');?>

  <script type="text/javascript" src="<?php echo base_url();?>assets/jquery-1.7.1.min.js"></script>
</head>

<body>
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo" color="black">
            <a href="<?php echo base_url(); ?>c_login">
            <center><img src="<?php echo base_url(); ?>assets/images/login-logo.png" width='150px' height='150px'></p>
            </a></center>
        </div>

        <div class="logo-icon text-center">
            <a href="<?php echo base_url(); ?>c_login"><img src="<?php echo base_url(); ?>assets/images/login-logo.png" width='32px' height='32px'></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="" class="media-object">
                    <div class="media-body">
                        <h4><a href="#"><i class="icon-user icon-white"></i> <?php echo $username;?></a></h4>
                        <span></span>
                    </div>
                </div>

                
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="<?php echo base_url(); ?>c_login/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li style="background:#04b486"><a href="<?php echo base_url(); ?>c_login/"><span><b>E-Koperasi</b></span></a></li>

                <li><a href="<?php echo base_url(); ?>c_login/"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
                <li><a href="<?php echo base_url(); ?>c_barang"><i class="fa fa-file-text"></i> <span>Data Barang</span></a></li>

                <li><a href="<?php echo base_url(); ?>c_supplier"><i class="fa fa-file-text"></i> <span>Data Supplier</span></a></li>
                <li><a href="<?php echo base_url(); ?>c_pembelian/data"><i class="fa fa-file-text"></i> <span>Transaksi Pembelian</span></a></li>
                <li><a href="<?php echo base_url(); ?>c_laporan"><i class="fa fa-file-text"></i> <span>Laporan Pembelian</span></a></li>
                

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->

        <!--notification menu start -->
        <div class="menu-right">
            <ul class="notification-menu">
                    <li>
                        <!-- <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge" id="jumlah_data">4</span>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-head pull-right">
                            <!-- <h5 class="title">Notifikasi</h5>
                            <ul class="dropdown-list normal-list">
                                <?php
                                  $onclick = "";
                                  $lihat_data="";
                                ?>
                                <li class="new">
                                    <h3><span class="bold" id="jumlah_data_baru"></span></h3>
                                    <a href="<?php echo base_url();?>c_laporan_bencana"<?php echo $onclick;?> >
                                </li>
                                <li class="new"><a href="">See All Notifications</a></li>
                            </ul> -->
                        </div>
                    </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo $username;?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="<?php echo base_url(); ?>c_login/logout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!--notification menu end -->

        </div>
        <!-- header section end-->
        <?php echo $contents; ?>

