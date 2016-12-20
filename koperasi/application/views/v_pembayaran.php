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
                Transaksi
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li class="active">Transaksi Pembelian</li>
            </ul>
        </div>
        <!-- page heading end-->

         <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Transaksi Pembelian
            <span class="tools pull-right">
                <a href="<?php echo base_url(); ?>javascript:;" class="fa fa-chevron-down"></a>
                <a href="<?php echo base_url(); ?>javascript:;" class="fa fa-times"></a>
             </span>
        </header>
                        <div class="panel-body">
                            
                    <div class="form" id="bs-example-navbar-collapse-1">
                        <form class="cmxform form-horizontal adminex-form" action="<?php echo base_url(); ?>c_pembelian/proses_pembayaran" method="POST">
                        
                        <!-- <div class="form-group ">
                                        <label for="nama_supplier" class="control-label col-lg-2">Nama Supplier</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="idSupplier" placeholder="Nama Supplier"   class="form-control" required">
                                        </div>
                                    </div> -->

                        <div class="form-group ">
                                        <label for="nama_supplier" class="control-label col-lg-2">Nama Supplier</label>
                                        <div class="col-lg-10">
                                             <?php $attributes = 'class = "form-control" style="width:865px" tabindex="6"';
                                            echo form_dropdown('id_supplier',$id_supplier,set_value('id_supplier'),$attributes);?>
                                        </div>
                                    
                                        </div>

                        <div class="form-group ">
                                        <label for="nama_supplier" class="control-label col-lg-2">Total Pembelian</label>
                                        <div class="col-lg-10">
                                            <b class="form-control"><?php echo $this->cart->total();?></b>
                                        </div>
                                    </div>
                        <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                        <input type="hidden" name="totalBayar" value="<?php echo $this->cart->total();?>"><br>
    <!-- jumlah bayar : <br> -->
    <input type="hidden" name="jumlahBayar">
    <!-- <input type="submit" name="submit" class="btn btn-success"> -->
                                            <input type="submit" name="submit" class="btn btn-success">
                                        </div>
                                    </div>

                        <!-- <div class="form-group">
                        Nama Supplier <br>
                            <input type="text" name="idSupplier"><br></div> -->
                        <!-- Total Pembelian : <br>
    <?php echo $this->cart->total();?> -->
    
</form>
                    </div><!-- /.navbar-collapse -->
                <!-- /.container-fluid -->
            </nav>

<br></br>
                


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