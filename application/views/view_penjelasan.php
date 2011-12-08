<table>
	<tr>
				<th>Nama UKM</th>
				<th>Pembuat</th>
	</tr>
			<?php foreach ($rows as $r){?>
	<tr>
				<td><input id="t_NamaUKM" type="text" value="<?php echo $r->NamaUKM?>"></td>
				<td id="l_namaPembuat"><?php echo $r->Nama?></td>
	</tr>
	<?php }?>
	<tr>
			<td>
				<input type='button' value="DETAIL" onclick="DetailIt(<?php echo $r->ID_UKM?>)">
			</td>
			<td>
				<?php if($r->Nama == strtolower($this->session->userdata('Nama'))){?>
				<input type='button' value="EDIT" onclick="EditIt(<?php echo $r->ID_UKM?>)">
				<?php } ?>
			</td>
			<input type='hidden' id='hide_UKM' value="<?php echo $id_ukm?>"/>
			
	</tr>
</table>