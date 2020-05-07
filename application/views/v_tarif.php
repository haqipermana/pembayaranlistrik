<?php
// Menampilkan pesan flashdata
	if ($this->session->flashdata('pesan')!=null) {
		echo $this->session->flashdata('pesan');;
	}
?>


<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Tarif</button>
<table class="table">
	<thead>
		<th>Nomor</th>
		<th>Daya</th>
		<th>Tarif</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			foreach ($tarif as $t):
		?>
		<tr>
			<td><?=$nomor?></td>
			<td><?=$t->daya." kwH"?></td>
			<td><?="Rp".number_format($t->tarifperkwh,2,".",".")?></td>
			<td>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate<?=$nomor?>">	<span class="glyphicon glyphicon-pencil"></span></button>
				<button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?=$nomor?>">					<span class="glyphicon glyphicon-trash"></span>
</button>
			</td>
		</tr>
		
			<!-- Modal Delete -->
				<div class="modal fade" id="modalDelete<?=$nomor?>">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title">Apakah Anda Yakin?</h4>
				      </div>
				      <div class="modal-body">
				        <p>Menghapus ini dapat menyebabkan data lain ikut terhapus. Apakah Anda yakin?</p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <a href="<?=BASE_URL()?>tarif/deleteTarif/<?=$t->id_tarif?>">
				        	<button type="button" class="btn btn-danger">Hapus</button>
				        </a>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<!-- Modal Update -->
				<div class="modal fade"  id="modalUpdate<?=$nomor?>">
				  <div class="modal-dialog">
				    <div class="modal-content">
				    <form action="<?=BASE_URL()?>tarif/updateTarif" method="post">
				    	 <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title">Update Tarif</h4>
				      </div>
				      <div class="modal-body">
				       <div class="form-group">
				        <p>Daya</p>
				        <input type="hidden" name="id_tarif" value="<?=$t->id_tarif?>">
				        <input type="text" name="daya" class="form-control" value="<?=$t->daya?>">
				       </div>
				       <div class="form-group">
				        <p>Tarif</p>
				        <input type="text" name="tarif" class="form-control" value="<?=$t->tarifperkwh?>">
				       </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				       <input type="submit" name="submit" value="Update" class="btn btn-primary">
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

<!-- Modal Tambah -->
	<div class="modal fade" id="modalTambah">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    <form action="<?=BASE_URL()?>tarif/addTarif" method="post">
	    	 <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title">Tambahkan Tarif</h4>
	      </div>
	      <div class="modal-body">
	       <div class="form-group">
	        <p>Daya</p>
	        <input type="text" name="daya" class="form-control">
	       </div>
	       <div class="form-group">
	        <p>Tarif</p>
	        <input type="text" name="tarif" class="form-control">
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