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
                            <nav class="navbar navbar-default">
                <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Nama Barang</a>
                </div>
                <div class="clear-fix"></div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-left" action="<?php echo base_url(); ?>c_pembelian/addToCart" method="POST">
                            <!-- <div class="form-group">
                                <input class="form-control col-md-5" type="text" name="itemId" placeholder="Nama Barang">

                            </div> -->

                            <div class="form-group">
                                             <?php $attributes = 'class = "form-control col-md-5" style="width:300px" ';
                                            echo form_dropdown('itemId',$itemId,set_value('itemId'),$attributes);?>
                                        </div>

                            <div class="form-group">
                                <input class="form-control col-md-5" type="text" name="itemJumlah" placeholder="Jumlah">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Item</button>
                        </form>
                    </div><!-- /.navbar-collapse -->
                <!-- /.container-fluid -->
            </nav>


            <form action="<?php echo base_url() ?>c_pembelian/updateCart" method="POST">
                    <table class="table table-striped">
                        <!-- label table -->
                        <tr>
                            <th>Jumlah</th>
                            <th>Nama Barang</th>
                            <th style="text-align:right">Harga Satuan</th>
                            <th style="text-align:right">Sub Total</th>
                        </tr>

                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                            <div class="input-group">
                                <input type="hidden" name="<?php echo $i.'[rowid]' ?>" value="<?php echo $items['rowid'] ?>">
                            </div>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class="col-md-2">
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>c_pembelian/removeItemFromCart/<?php echo $items['rowid'] ?>" ><i class="glyphicon glyphicon-remove-sign"></i> </a>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="<?php echo $i.'qty' ?>" value="<?php echo $items['qty'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $items['name']; ?></td>
                                <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                                <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <tr>
                            <!-- <td colspan="2"> </td>
                            <td class="right"><strong>Total</strong></td>
                            <td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td> -->
                        </tr>
                    </table>
                    
                    <input type="submit" name="submit" value="Update Cart" class="btn btn-info">
                    <a href="<?php echo base_url(); ?>c_pembelian/pembayaran" class="btn btn-success"><i class="glyphicon glyphicon-check icon-white"></i> Selesai</a>
                </form>

<br></br>
                <div class="col-md-4">
            <div class="col-md-12">
              <?php $username = $this->session->userdata('username_admin');?>

                <p class="pull-right">Operator : <i><?php echo $username; ?></i></p>
            </div>
            <div class="jumbotron">
                <h2>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h2>
            </div>

            <!-- <input type="text" name=""> -->
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