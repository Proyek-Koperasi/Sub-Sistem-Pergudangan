 <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Transaksi
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li class="active">Transaksi Pembelian </li>
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
            <th>Supplier</th>
            <th>Tanggal Pembelian</th>
            <th>Total Pembelian</th>
            <th>Action</th>
            <!-- <td><a href="<?= site_url("c_pembelian/detail")."?t_detail_pembelian=".$details[$i]->id_detail_pembelian;?>" class="btn btn-success"><i class="glyphicon glyphicon-view icon-white"></i>  Lihat </a></td> -->
            <!-- <th>Keterangan</th> -->
            
        </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($pembelianlist); ++$i) { ?>
                <tr>
                    <td><?php echo ($i+1); ?></td>
                    <td><?php echo $pembelianlist[$i]->id_pembelian; ?></td>
                    <td><?php echo $pembelianlist[$i]->nama_admin; ?></td>
                    <td><?php echo $pembelianlist[$i]->nama_supplier; ?></td>
                    <td><?php echo $pembelianlist[$i]->tanggal_pembelian; ?></td>
                    <td><?php echo $pembelianlist[$i]->total_harga_pembelian; ?></td>
                    <?php if($pembelianlist[$i]->status == 0){ ?>
                    <td><a href="<?= site_url("c_pembelian/konfirmasi")."?t_pembelian=".$pembelianlist[$i]->id_pembelian;?>" class="btn btn-success"><i class="glyphicon glyphicon-view icon-white"></i>  Konfirmasi </a></td>
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