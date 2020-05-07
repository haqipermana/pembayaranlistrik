<?php
// Menampilkan pesan flashdata
	if ($this->session->flashdata('pesan')!=null) {
		echo $this->session->flashdata('pesan');;
	}
?>
<table class="table">
	<thead>
		<th>Nomor</th>
		<th>Nama</th>
		<th>Nomor kWH</th>
		<th>Daya</th>
		<th>Alamat</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			foreach ($pelanggan as $t):
		?>
		<tr>
			<td><?=$nomor?></td>
			<td><?=$t->nama_pelanggan?></td>
			<td><?=$t->nomor_kwh?></td>
			<td><?=$t->daya." kwH"?></td>
			<td><?=$t->alamat?></td>
			<td>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah<?=$nomor?>">
					<span class="glyphicon glyphicon-plus"></span>
				</button>
				<a href="<?=BASE_URL()?>penggunaan/detail/<?=$t->id_pelanggan?>">
					<button class="btn btn-warning">
						<span class="glyphicon glyphicon-list-alt"></span>
					</button>
				</a>		
			</td>
		</tr>
		<!-- Modal Tambah -->
			<div class="modal fade" id="modalTambah<?=$nomor?>">
			  <div class="modal-dialog">
			    <div class="modal-content">
			    <form action="<?=BASE_URL()?>penggunaan/addPenggunaan" method="post" autocomplete="off">
			    	 <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title">Tambahkan Penggunaan</h4>
			      </div>
			      <div class="modal-body">
			       <div class="form-group">
			        <p>Nama</p>
			        <input type="hidden" name="id_pelanggan" value="<?=$t->id_pelanggan?>">
			        <h5><?=$t->nama_pelanggan?></h5>
			       </div>
			       <div class="form-group">
			        <p>Bulan</p>
			       	<select name="bulan" class="form-control">
			       		<?php
			       			foreach ($bulan as $b ):
			       		?>
			       			<option value="<?=$b?>"><?=$b?></option>
			       		<?php endforeach;?>
			       	</select>
			       </div>

			       <div class="form-group">
			       	<p>Tahun</p>
			       	<input type="text" name="tahun" class="form-control" value="<?=date("Y")?>">
			       </div>
			       <div class="form-group">
			       	<p>Meter Awal</p>
			       	<input type="text" name="mAwal" class="form-control">
			       </div>
			       <div class="form-group">
			       	<p>Meter Akhir</p>
			       	<input type="text" name="mAkhir" class="form-control">
			       </div>
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

