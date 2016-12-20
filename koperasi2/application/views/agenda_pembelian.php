<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Laporan Pembelian</title>
</head>

<body onload="window.print()">
	<center><b style="font-size: 20px">LAPORAN TRANSAKSI PEMBELIAN</b><br>
	Dari tanggal <b><?php echo $tgl_start."</b> sampai dengan tanggal <b>".$tgl_end."</b>"; ?>
	</center><br>
	
	<table border="1">
		<thead>
			<tr>
				<th width="3%">No</td>
				<th width="15%">Kode Transaksi</td>
				<th width="10%">Operator</td>
				<th width="20%">Supplier</td>
				<th width="20%">Tanggal Pembelian</td>
				<th width="17%">Total Pembelian</td>
				
			</tr>
		</thead>
		<tbody>
			<?php $total=0; 
			if (!empty($data)) {
				$no = 0;
				foreach ($data as $d) {
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->id_pembelian; ?></td>
				<td><?php echo $d->nama_admin; ?></td>
				<td><?php echo $d->nama_supplier; ?></td>
				<td><?php echo $d->tanggal_pembelian; ?></td>
				<td><?php echo $d->total_harga_pembelian; ?></td>
				
			</tr>
			<?php $no++; $total=$total+$d->total_harga_pembelian; } ?>
                <tr>
                <td colspan="5" align="right"><b>Total</b></td>
                <td align="right">Rp <?php echo $total;?>,00</td>
                </tr>  

			<?php 
				
			} else {
				echo "<tr><td style='text-align: center' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>

