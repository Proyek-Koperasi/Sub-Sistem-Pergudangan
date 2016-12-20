 <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Supplier
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Beranda</a>
                </li>
                <li class="active">Data Supplier </li>
            </ul>
        </div>
        <!-- page heading end-->

         <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Data Supplier
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
            <a href="<?php echo base_url();?>c_supplier/tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
        <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>No.</th>
            <th>ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Telepon Supplier</th>            
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($supplier_list as $supplier) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $supplier->id_supplier; ?></td>
            <td><?php echo $supplier->nama_supplier; ?></td>
            <td><?php echo $supplier->alamat_supplier; ?></td>
            <td><?php echo $supplier->telp_supplier; ?></td>
            <td>
                <a href="<?php echo base_url() ?>c_supplier/edit/<?php echo $supplier->id_supplier; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit icon-white"></i>  Ubah </a>
                <a href="<?php echo base_url() ?>c_supplier/delete/<?php echo $supplier->id_supplier; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i> Hapus</a>
            </td>
        </tr>
        <?php $no++;} ?>

        </tbody>
        </tfoot>
        </table>

        </div>
        </div>
        </section>
        </div>
        </div>