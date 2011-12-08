<table>
	<tr>
		<th>Nama UKM</th>
		<th>Tanggal Registrasi</th>
		<th>Tanggal Berhenti</th>
	</tr>
	<?php foreach($zz as $r){?>
	<tr>
		<td><?php echo $r->NamaUKM ?></td>
		<td><?php echo $r->Tanggal_Registrasi ?></td>
		<td><?php echo $r->Tanggal_Selesai ?></td>
	</tr>
	<?php }?>
</table>