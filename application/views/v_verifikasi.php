<table class="table">
	<thead>
		<th>Nomor</th>
		<th>Nama</th>
		<th>Tahun</th>
		<th>Bulan</th>
		<th>Tanggal Bayar</th>
		<th>Total Penggunaan</th>
		<th>Total Pembayaran</th>
		<th>Status</th>
		<th>Bukti</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			foreach ($verif as $t):
		?>
		<tr>
			<td><?=$nomor?></td>
			<td><?=$t->nama_pelanggan?></td>
			<td><?=$t->tahun?></td>
			<td><?=$t->bulan?></td>
			<td><?=$t->tanggal_pembayaran?></td>
			<td><?=($t->meter_akhir-$t->meter_awal)?></td>
			<td><?="Rp".number_format((($t->meter_akhir-$t->meter_awal)*$t->tarifperkwh),2,".",",")?></td>
			<td>
				<span class="label label-<?=$label[$t->status]?>">
					<?=$status[$t->status]?>
				</span>
			</td>
			<td>
				<a data-toggle="modal" data-target="#modalGambar<?=$nomor?>" role="button" href="#">
					<img src="<?=BASE_URL()?>uploads/<?=$t->bukti?>" class="img-rounded" width="200">
				</a>
			</td>
			<td>
				<div class="btn-group">
				    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				      Aksi
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu" role="menu">
				      <li><a href="<?=BASE_URL()?>verifikasi/gantiStatus/<?=$t->id_penggunaan?>/2/<?=$t->id_pembayaran?>">Lunas</a></li>
				      <li><a href="<?=BASE_URL()?>verifikasi/gantiStatus/<?=$t->id_penggunaan?>/0/<?=$t->id_pembayaran?>">Tidak Lunas</a></li>
				    </ul>
				  </div>
				</div>
			</td>
		</tr>

		<!-- Modal -->
		<div class="modal fade" id="modalGambar<?=$nomor?>">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Bukti</h4>
		      </div>
		      <div class="modal-body">
		       <img src="<?=BASE_URL()?>uploads/<?=$t->bukti?>" class="img-responsive">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?php 
			$nomor += 1;
			endforeach;
		 ?>
	</tbody>
</table>

