
<a href="<?=BASE_URL()?>history/print">
	<button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></button>
</a>
<table class="table exportable" style="margin-top: 20px">
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
