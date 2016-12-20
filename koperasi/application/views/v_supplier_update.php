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
                <li>
                    <a href="#">Data Supplier</a>
                </li>
                <li class="active">Ubah Data Supplier</li>
            </ul>
        </div>
        <!-- page heading end-->

         <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Ubah Data Supplier
            <span class="tools pull-right">
                <a href="<?php echo base_url(); ?>javascript:;" class="fa fa-chevron-down"></a>
                <a href="<?php echo base_url(); ?>javascript:;" class="fa fa-times"></a>
             </span>
        </header>
                        <div class="panel-body">
                            <div class="form">

                                <form action="<?php echo base_url(); ?>c_supplier/proses_edit" method="POST" class="cmxform form-horizontal adminex-form">
                                
                                <?php foreach($supplier_list->result() as $supplier):?>
                                

                                    <div class="form-group ">
                                        <label for="id_supplier" class="control-label col-lg-2">ID Supplier</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="id_supplier" value="<?php echo $supplier->id_supplier ?>" class="form-control" id="focusedinput" placeholder="ID Supplier" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama_supplier" class="control-label col-lg-2">Nama Supplier</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="nama_supplier" value="<?php echo $supplier->nama_supplier ?>" class="form-control" id="focusedinput" placeholder="Nama Supplier">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="alamat_supplier" class="control-label col-lg-2">Alamat Supplier</label>
                                        <div class="col-lg-10">
                                            <textarea type="text" name="alamat_supplier" class="form-control" id="focusedinput" placeholder="Alamat Supplier" value=><?php echo $supplier->alamat_supplier ?></textarea>
                                        </div>
                                    </div>

                                    
                                     <div class="form-group ">
                                        <label for="telp_supplier" class="control-label col-lg-2">Telepon Supplier</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="telp_supplier" value="<?php echo $supplier->telp_supplier ?>" class="form-control" id="focusedinput" placeholder="Telepon Supplier">
                                            <p class="help-block"><?php echo form_error('telp_supplier', '<p class="text-danger">', '</span>'); ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input type="submit" name="submit" class="btn btn-success" value="Update">
                                        </div>
                                    </div>
                                    </div>
                                    <?php endforeach; ?>
                                    
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