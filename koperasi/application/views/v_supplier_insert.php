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
                Supplier
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <a href="#">Data Supplier</a>
                <li class="active">Tambah Data Supplier</li>
            </ul>
        </div>
        <!-- page heading end-->

         <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Tambah Data Supplier
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
                                        <label for="nama_supplier" class="control-label col-lg-2">Nama Supplier</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="nama_supplier" placeholder="Nama Supplier"   class="form-control"  value="<?php echo set_value('nama_supplier'); ?>">
                                            <p class="help-block"><?php echo form_error('nama_supplier', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="alamat_supplier" class="control-label col-lg-2">Alamat Supplier</label>
                                        <div class="col-lg-10">
                                            <textarea type="text" name="alamat_supplier" placeholder="Alamat Supplier"   class="form-control" value="<?php echo set_value('alamat_supplier'); ?>" ></textarea>
                                            <p class="help-block"><?php echo form_error('alamat_supplier', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group ">
                                        <label for="telp_supplier" class="control-label col-lg-2">Telepon Supplier</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="telp_supplier" placeholder="Telepon Supplier"   class="form-control" value="<?php echo set_value('telp_supplier'); ?>">
                                            <p class="help-block"><?php echo form_error('telp_supplier', '<p class="text-danger">', '</span>'); ?></p>
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