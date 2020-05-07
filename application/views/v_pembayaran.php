
<table class="table">
	<thead>
		<th>Nomor</th>
		<th>Tahun</th>
		<th>Bulan</th>
		<th>Meter Awal</th>
		<th>Meter Akhir</th>
		<th>Total Penggunaan</th>
		<th>Total Pembayaran</th>
		<th>Status</th>
		<th>Bukti</th>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			foreach ($pembayaran as $t):
			
		?>
		<tr>
			<td><?=$nomor?></td>
			<td><?=$t->tahun?></td>
			<td><?=$t->bulan?></td>
			<td><?=$t->meter_awal." kwH"?></td>
			<td><?=$t->meter_akhir." kwH"?></td>

			<td><?=($t->meter_akhir-$t->meter_awal)." kwH"?></td>
			<td><?="Rp".number_format((($t->meter_akhir-$t->meter_awal)*$t->tarifperkwh),2,".",",")?></td>
			<td>
				<span class="label label-<?=$label[$t->status]?>">
					<?=$status[$t->status]?>
				</span>
			</td>
			<td>
				<?php 
					if ($t->status==0) {
				?>
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpload<?=$nomor?>">Upload Bukti</button>
				<?php
					} elseif ($t->status==1) {
				?>
					<p>	Dalam Proses</p>
				<?php
					} else{
					?>
						<p>Terverifikasi</p>
				<?php	
					}
				?>
				
			</td>
		</tr>
		<!-- Modal Tambah -->
		<div class="modal fade" id="modalUpload<?=$nomor?>">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    <form action="<?=BASE_URL()?>pembayaran/uploadPembayaran" method="post" enctype="multipart/form-data">
		    	 <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Upload Bukti Pembayaran</h4>
		      </div>
		      <div class="modal-body">
		       		<p>Silahkan transfer dan upload bukti pembayaran transfer Anda disini.</p>
		       		<b>Nomor Rekening</b>
		       		<p>5555-5555-555-55 <br>a.n PT PLN</p>
		       		<b>Jumlah Pembayaran</b>
		       		<p><?="Rp".number_format((($t->meter_akhir-$t->meter_awal)*$t->tarifperkwh),2,".",",")?></p>
		       		<input type="hidden" name="id_penggunaan" value="<?=$t->id_penggunaan?>">
		       		<input type="hidden" name="total" value="<?=((($t->meter_akhir-$t->meter_awal)*$t->tarifperkwh)+2500)?>">
		       		<input type="file" name="gambar">
		       </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		       <input type="submit" name="submit" value="Tambahkan" class="btn btn-primary">
		        </a>
		      </div>
		    </form>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<?php 
			$nomor += 1;
			endforeach;
		 ?>
	</tbody>
</table>

