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
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($variant['Variant']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($variant['Variant']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($variant['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $variant['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($variant['Variant']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($variant['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $variant['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
