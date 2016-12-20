 <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Transaksi
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li class="active">Transaksi Penjualan </li>
            </ul>
        </div>
        <!-- page heading end-->

         <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Transaksi Penjualan
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
            <!-- <a href="<?php echo base_url();?>c_pembelian" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a> -->
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>No.</th>
            <th>Kode Transaksi</th>
            <th>Operator</th>
            <th>Tanggal Penjualan</th>
            <th>Total Penjualan</th>
            <th>Action</th>
            
            
        </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($penjualanlist); ++$i) { ?>
                <tr>
                    <td><?php echo ($i+1); ?></td>
                    <td><?php echo $penjualanlist[$i]->id_penjualan; ?></td>
                    <td><?php echo $penjualanlist[$i]->id_admin; ?></td>
                    
                    <td><?php echo $penjualanlist[$i]->tanggal_penjualan; ?></td>
                    <td><?php echo $penjualanlist[$i]->total_harga_penjualan; ?></td>
                    <?php if($penjualanlist[$i]->status_pjl == 0){ ?>
                    <td><a href="<?= site_url("c_penjualan/konfirmasi")."?t_penjualan=".$penjualanlist[$i]->id_penjualan;?>" class="btn btn-success"><i class="glyphicon glyphicon-view icon-white"></i>  Konfirmasi </a></td>
                    <?php }else{ ?>
                    <td><a class="btn btn-success"><i class="glyphicon glyphicon-view icon-white"></i>  Terkonfirmasi </a></td>
                    <?php } ?>
                    
                </tr>
                <?php } ?>
        </tbody>
        </tfoot>
        </table>

        </div>
        </div>
        </section>
        </div>
        </div>