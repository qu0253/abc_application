<div class="variants view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('variant');?><?php echo !empty($variant['Variant']['variant_name']) ? ' - ' . $variant['Variant']['variant_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $variant['Variant']['id'], 'copy_id' => $variant['Variant']['id'], 'delete_id' => $variant['Variant']['id'], 'delete_text' => ___('do you really want to delete this variant ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Variant Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $variant['Variant']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Variant Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $variant['Variant']['variant_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Average Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $variant['Variant']['average_copies']; ?>
		</td>
	</tr>
	</table>
</div>
