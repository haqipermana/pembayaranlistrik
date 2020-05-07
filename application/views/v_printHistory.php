<!DOCTYPE html>
<html>
<head>
	<title><?=$judul?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=BASE_URL()?>assets/assets/css/demo.css">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=BASE_URL()?>assets/assets/img/apple-icon.png">
	 <link href="<?=BASE_URL()?>assets/assets/vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=BASE_URL()?>assets/assets/img/favicon.png">
</head>
<body>
	<div class="container">
		<span>
			<b style="font-size: 30px;text-align: center; margin-bottom: 40px">Print Laporan PPOB</b>
		</span>
		<div class="panel" style="margin-top: 40px">
			<table class="table exportable">
				<thead>
					<th>No</th>
					<th>Nama</th>
				 	<th>Daya</th>
					<th>Tahun Bulan</th>
					<th>Tanggal Bayar</th>
					<th>Total Penggunaan</th>
					<th>Total Pembayaran</th>
					<th>Status</th>
				</thead>
				<tbody>
					<?php
						$nomor = 1;
						foreach ($history as $t):
					?>
					<tr>
						<td><?=$nomor?></td>
						<td><?=$t->nama_pelanggan?></td>
						<td><?=$t->daya?></td>
						<td><?=$t->tahun." ".$t->bulan?></td>
						<td><?=$t->tanggal_pembayaran?></td>
						<td><?=number_format(($t->meter_akhir-$t->meter_awal),0,",",".")?></td>
						<td><?="Rp".number_format((($t->meter_akhir-$t->meter_awal)*$t->tarifperkwh),2,",",".")?></td>
						<td>
							<span class="label label-<?=$label[$t->status]?>">
								<?=$status[$t->status]?>
							</span>
						</td>
					</tr>
					<?php 
						$nomor += 1;
						endforeach;
					 ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	// Print halaman
	window.print();
	// Redirect balik ke halaman history
	window.location.href="<?=BASE_URL()?>/history";
</script>
</html>