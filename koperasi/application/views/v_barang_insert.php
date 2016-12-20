<head>
    <!--pickers css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-datepicker/css/datepicker-custom.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-timepicker/css/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
</head>

<!-- page heading start-->
        <div class="page-heading">
            <h3>
                Barang
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li class="active">Data Barang</li>
            </ul>
        </div>
        <!-- page heading end-->

         <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Tambah Data Barang
            <span class="tools pull-right">
                <a href="<?php echo base_url(); ?>javascript:;" class="fa fa-chevron-down"></a>
                <a href="<?php echo base_url(); ?>javascript:;" class="fa fa-times"></a>
             </span>
        </header>
                        <div class="panel-body">
                            <div class="form">


                                <form class="cmxform form-horizontal adminex-form" id="" method="post" action="proses_tambah">
                                <?php echo form_open('proses_tambah') ?>
									

                                    <div class="form-group">
                                        <label for="nama_barang" class="control-label col-lg-2">Nama Barang</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="nama_barang" placeholder="Nama Barang"   class="form-control" tabindex="3"  value="<?php echo set_value('nama_barang'); ?>">
                                            <p class="help-block"><?php echo form_error('nama_barang', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="jumlah_barang" class="control-label col-lg-2">Jumlah Barang</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="jumlah_barang" placeholder="Jumlah Barang"   class="form-control" tabindex="5"  value="<?php echo set_value('jumlah_barang'); ?>">
                                            <p class="help-block"><?php echo form_error('jumlah_barang', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="tanggal_pembuatan_barang" class="control-label col-lg-2">Tanggal Pembuatan</label>
                                        <div class="col-lg-10">
                                            <input type="date" name="tanggal_pembuatan_barang"   class="form-control" tabindex="3"  value="<?php echo set_value('tanggal_pembuatan_barang'); ?>">
                                            <p class="help-block"><?php echo form_error('tanggal_pembuatan_barang', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="tanggal_kadaluarsa_barang" class="control-label col-lg-2">Tanggal Kadaluarsa</label>
                                        <div class="col-lg-10">
                                            <input type="date" name="tanggal_kadaluarsa_barang"   class="form-control" tabindex="3"  value="<?php echo set_value('tanggal_kadaluarsa_barang'); ?>">
                                            <p class="help-block"><?php echo form_error('tanggal_kadaluarsa_barang', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="max_persediaan_barang" class="control-label col-lg-2">Max Persediaan</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="max_persediaan_barang"  placeholder="Maksimal Persediaan" class="form-control" tabindex="3"  value="<?php echo set_value('max_persediaan_barang'); ?>">
                                            <p class="help-block"><?php echo form_error('max_persediaan_barang', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="min_persediaan_barang" class="control-label col-lg-2">Min persediaan</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="min_persediaan_barang"  placeholder="Minimal Persediaan" class="form-control" tabindex="3"  value="<?php echo set_value('min_persediaan_barang'); ?>">
                                            <p class="help-block"><?php echo form_error('min_persediaan_barang', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="isi_satuan" class="control-label col-lg-2">Satuan</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="isi_satuan" placeholder="Satuan"   class="form-control" tabindex="3"  value="<?php echo set_value('isi_satuan'); ?>">
                                            <p class="help-block"><?php echo form_error('isi_satuan', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="harga_beli" class="control-label col-lg-2">Harga Beli</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="harga_beli" placeholder="Harga Beli"  class="form-control" tabindex="3"  value="<?php echo set_value('harga_beli'); ?>">
                                            <p class="help-block"><?php echo form_error('harga_beli', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="harga_jual" class="control-label col-lg-2">Harga Jual</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="harga_jual" placeholder="Harga Jual"  class="form-control" tabindex="3"  value="<?php echo set_value('harga_jual'); ?>">
                                            <p class="help-block"><?php echo form_error('harga_jual', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button  type="submit" class="btn btn-success" name="submit" value="Simpan"><i class="icon icon-ok icon-white"></i> Simpan</button>                                            
                                        </div>
                                    </div>
                                    
                                </form> 
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->
<!--pickers plugins-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!--pickers initialization-->
<script src="<?php echo base_url();?>assets/js/pickers-init.js"></script>


<!--common scripts for all pages-->
<script src="<?php echo base_url();?>assets/js/scripts.js"></script>