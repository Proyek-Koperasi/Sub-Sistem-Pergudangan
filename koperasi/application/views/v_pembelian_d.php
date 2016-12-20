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

            <div class="panel">
                <div class="panel-body invoice">
                    <div class="invoice-address">
                        <div class="row">
                            <div class="col-md-5 col-sm-5">
                            <?php foreach ($pembelianlist as $pb) { ?>
                                <h2 class="corporate-id">No.Nota : <?php echo $pb->id_pembelian; ?></h2>
                                <h2 class="corporate-id">Tanggal : <?php echo $pb->tanggal_pembelian; ?></h2>
                                <h2 class="corporate-id">Supplier: <?php echo $pb->nama_supplier; ?> </h2>
                                <?php } ?>
                            </div>
                            <div class="col-md-4 col-md-offset-3 col-sm-4 col-sm-offset-3">
                                <h1 class="t-due">TOTAL</h1>
                                <h2 class="amnt-value">Rp <?php echo $pb->total_harga_pembelian; ?>,00</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-invoice">
                    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
            
            
        </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($details); ++$i) { ?>
                <tr>
                    <td><?php echo ($i+1); ?></td>
                    <td><?php echo $details[$i]->id_detail_pembelian; ?></td>
                    <td><?php echo $details[$i]->nama_barang; ?></td>
                    <td><?php echo $details[$i]->jumlah_barang; ?></td>
                    <td><?php echo $details[$i]->harga_satuan; ?></td>
                    <td><?php echo $details[$i]->subtotal; ?></td>                    
                </tr>
                <?php } ?>
        </tbody>
                </table>
            </div>

        </div>
        </div>
        </section>
        </div>
        </div>