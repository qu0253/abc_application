<div class="frequencies view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('frequency');?><?php echo ' - ' . $frequency['Frequency']['frequency_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $frequency['Frequency']['id'], 'copy_id' => $frequency['Frequency']['id'], 'delete_id' => $frequency['Frequency']['id'], 'delete_text' => ___('do you really want to delete this frequency ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Frequency Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $frequency['Frequency']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Frequency Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $frequency['Frequency']['frequency_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($frequency['Frequency']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($frequency['Frequency']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($frequency['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $frequency['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($frequency['Frequency']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($frequency['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $frequency['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
