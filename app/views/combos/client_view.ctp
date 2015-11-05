<div class="combos view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('combo');?><?php echo !empty($combo['Combo']['combo_name']) ? ' - ' . $combo['Combo']['combo_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $combo['Combo']['id'], 'copy_id' => $combo['Combo']['id'], 'delete_id' => $combo['Combo']['id'], 'delete_text' => ___('do you really want to delete this combo ?', true)));
	?>

	<table border="0" class="view">
	<tr class="display_none">
		<td>
			<?php ___('Combo Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $combo['Combo']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $combo['Combo']['combo_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $combo['Combo']['cover_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $combo['Combo']['combo']; ?>
		</td>
	</tr>
	</table>
</div>
