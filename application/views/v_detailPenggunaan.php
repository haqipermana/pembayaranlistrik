
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
	</thead>
	<tbody>
		<?php
			$nomor = 1;
			foreach ($detail as $t):
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
		</tr>

		<?php 
			$nomor += 1;
			endforeach;
		 ?>
	</tbody>
</table>

