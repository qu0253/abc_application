<div class="configurations view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('configuration');?><?php echo ' - ' . $configuration['Configuration']['name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $configuration['Configuration']['id'], 'copy_id' => $configuration['Configuration']['id'], 'delete_id' => $configuration['Configuration']['id'], 'delete_text' => ___('do you really want to delete this configuration ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Configuration Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $configuration['Configuration']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $configuration['Configuration']['name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Value'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $configuration['Configuration']['value']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($configuration['Configuration']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($configuration['Configuration']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($configuration['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $configuration['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($configuration['Configuration']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($configuration['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $configuration['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
