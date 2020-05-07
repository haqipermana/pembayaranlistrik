<?php
// Menampilkan pesan flashdata
	if ($this->session->flashdata('pesan')!=null) {
		echo $this->session->flashdata('pesan');;
	}
?>

<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Pelanggan</button>
<table class="table">
	<thead>
		<th>Nomor</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Daya</th>
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
			<td><?=$t->username?></td>
			<td><?=$t->daya?></td>
			<td>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate<?=$nomor?>">
						<span class="glyphicon glyphicon-pencil"></span>
				</button>
				<button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?=$nomor?>">
					<span class="glyphicon glyphicon-trash"></span>
				</button>	
			</td>
		</tr>

			<!-- Modal Tambah -->
			<div class="modal fade" id="modalUpdate<?=$nomor?>">
			  <div class="modal-dialog">
			    <div class="modal-content">
			    <form action="<?=BASE_URL()?>pelanggan/updatePelanggan/<?=$t->id_pelanggan?>" method="post" autocomplete="off">
			    	 <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title">Update Pelanggan</h4>
			      </div>
			      <div class="modal-body">
			       <div class="form-group">
			        <p>Nama</p>
			        <input type="hidden" name="id_admin" value="<?=$t->id_pelanggan?>">
			        <input type="text" name="nama" class="form-control" value="<?=$t->nama_pelanggan?>">
			       </div>
			       <div class="form-group">
			        <p>Username</p>
			        <input type="text" name="username" class="form-control" value="<?=$t->username?>">
			       </div>
			     	 <div class="form-group">
			        <p>Nomor KWH</p>
			        <input type="text" name="nomor" class="form-control" value="<?=$t->nomor_kwh?>">
			       </div>
			        <div class="form-group">
			        <p>Alamat</p>
			        <textarea class="form-control" rows="3" name="alamat" value="<?=$t->alamat?>"></textarea>
			       </div>
			        <div class="form-group">
			        <p>Level</p>
			        <select class="form-control" name="id_tarif">
			        	<?php
			       			foreach ($tarif as $b ):
			       		?>
			       			<option value="<?=$b->id_tarif?>"><?=$b->daya?></option>
			       		<?php endforeach;?>
	       			</select>
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
				        <a href="<?=BASE_URL()?>pelanggan/hapusPelanggan/<?=$t->id_pelanggan?>">
				        	<button type="button" class="btn btn-danger">Hapus</button>
				        </a>
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

<!-- Modal Tambah -->
	<div class="modal fade" id="modalTambah">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    <form action="<?=BASE_URL()?>pelanggan/addPelanggan" method="post" autocomplete="off">
	    	 <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title">Tambahkan Pelanggan</h4>
	      </div>
	      <div class="modal-body">
	       <div class="form-group">
	        <p>Nama</p>
	        <input type="text" name="nama" class="form-control">
	       </div>
	       <div class="form-group">
	        <p>Nomor KWH</p>
	        <input type="text" name="nomor" class="form-control">
	       </div>
	       <div class="form-group">
	        <p>Alamat</p>
	      <textarea class="form-control" rows="3" name="alamat"></textarea>

	       </div>
	       <div class="form-group">
	        <p>Username</p>
	        <input type="text" name="username" class="form-control">
	       </div>
	        <div class="form-group">
	        <p>Password</p>
	        <input type="Password" name="password" class="form-control">
	       </div>
	        <div class="form-group">
	        <p>Daya</p>
	        <select class="form-control" name="id_tarif">
	        	<?php
	       			foreach ($tarif as $b ):
	       		?>
	       			<option value="<?=$b->id_tarif?>"><?=$b->daya?></option>
	       		<?php endforeach;?>
	        </select>
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