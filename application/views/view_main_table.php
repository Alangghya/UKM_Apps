<table>
		<tr>
			<th>NO</th>
			<th>Nama UKM</th>
			<th>Pembuat</th>
		</tr>
		<?php $tweet=0; foreach($asyik as $row){ ++$tweet; ?>
		<tr class="<?php if($tweet%2==0){echo "2";}else{echo "1";} ?>">
			<td>
				<input type="button" id="<?php echo $row->ID_UKM?>" value="<?php echo $row->ID_UKM?>" onclick="doEdit(<?php echo $row->ID_UKM?>)">
			</td>
			<td><?php echo $row->NamaUKM?></td>
			<td><?php echo $row->Nama?></td>
		</tr>
		<?php }?>
</table>