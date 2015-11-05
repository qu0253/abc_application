<div class="frequencyTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('frequency type');?><?php echo ' - ' . $frequencyType['FrequencyType']['frequency_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $frequencyType['FrequencyType']['id'], 'copy_id' => $frequencyType['FrequencyType']['id'], 'delete_id' => $frequencyType['FrequencyType']['id'], 'delete_text' => ___('do you really want to delete this frequency type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Frequency Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $frequencyType['FrequencyType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Frequency Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $frequencyType['FrequencyType']['frequency_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Frequency Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($frequencyType['Frequency']['frequency_name'], array('controller' => 'frequencies', 'action' => 'view', $frequencyType['Frequency']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($frequencyType['FrequencyType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($frequencyType['FrequencyType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($frequencyType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $frequencyType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($frequencyType['FrequencyType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($frequencyType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $frequencyType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
