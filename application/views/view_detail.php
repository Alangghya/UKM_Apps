<table>
	<tr>
			<th>ID Siswa</th>
			<th>Nama Siswa</th>
			<th>Tgl Terdaftar</th>
	</tr>
	
	<?php 	$flag=true; $adaIsi=false; $idUKM; foreach($fg as $rb){ $adaIsi=true; $idUKM=$rb->IDUKM?>
	<tr>
			<td><?php echo $rb->ID ?> </td>
			<td><?php echo $rb->Nama ?> </td>
			<td><?php echo $rb->TglRegis ?> </td>
			<?php if($rb->Nama == strtolower($this->session->userdata('Nama'))){
				$flag=false;
			}?>
	</tr>
	<?php }?>
	<tr>
			<td></td>
			<td>
				<?php if ($flag==true){?>
				<input type="button" value="registrasi" onclick="register_me('<?php echo $this->session->userdata('Nama') ?>')" />
				<?php }?>
			</td>
			<td>
				<?php if ($adaIsi==false && $permission==TRUE){?>
				<input type='button' value="DELETE" onclick="DeleteIt('<?php echo $id_ukm; ?>')">
				<?php }?>
			</td>
	</tr>
</table>