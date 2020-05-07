<button class="btn btn-primary" style="margin-bottom: 16px" data-toggle="modal" data-target="#modalTambah">Tambah Admin</button>


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
		<th>Username</th>
		<th>Level</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			foreach ($admin as $t):
		?>
		<tr>
			<td><?=$nomor?></td>
			<td><?=$t->nama?></td>
			<td><?=$t->username?></td>
			<td><?=$t->level?></td>
			<td>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate<?=$nomor?>">
					<span class="glyphicon glyphicon-pencil"></span>
				</button>
				<button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete<?=$nomor?>">
					<span class="glyphicon glyphicon-trash"></span>
				</button>	
			</td>
		</tr>

			<!-- Modal Update -->
			<div class="modal fade" id="modalUpdate<?=$nomor?>">
			  <div class="modal-dialog">
			    <div class="modal-content">
			    <form action="<?=BASE_URL()?>admin/updateAdmin/<?=$t->id_admin?>" method="post" autocomplete="off">
			    	 <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title">Update Admin</h4>
			      </div>
			      <div class="modal-body">
			       <div class="form-group">
			        <p>Nama</p>
			        <input type="hidden" name="id_admin" value="<?=$t->id_admin?>">
			        <input type="text" name="nama" class="form-control" value="<?=$t->nama?>" required="on">
			       </div>
			       <div class="form-group">
			        <p>Username</p>
			        <input type="text" name="username" class="form-control" value="<?=$t->username?>">
			       </div>
			     
			        <div class="form-group">
			        <p>Level</p>
			        <select class="form-control" name="id_level">
			        	<?php
			       			foreach ($level as $b ):
			       		?>
			       			<option value="<?=$b->id_level?>"><?=$b->level?></option>
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
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <a href="<?=BASE_URL()?>admin/hapusAdmin/<?=$t->id_admin?>">
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
	    <form action="<?=BASE_URL()?>admin/addAdmin" method="post" autocomplete="off">
	    	 <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title">Tambahkan Admin</h4>
	      </div>
	      <div class="modal-body">
	       <div class="form-group">
	        <p>Nama</p>
	        <input type="text" name="nama" class="form-control">
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
	        <p>Level</p>
	        <select class="form-control" name="id_level">
	        	<?php
	       			foreach ($level as $b ):
	       		?>
	       			<option value="<?=$b->id_level?>"><?=$b->level?></option>
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