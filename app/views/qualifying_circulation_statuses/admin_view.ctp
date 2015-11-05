<div class="qualifyingCirculationStatuses view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('qualifying circulation status');?><?php echo !empty($qualifyingCirculationStatus['QualifyingCirculationStatus']['qualifying_circulation_status_name']) ? ' - ' . $qualifyingCirculationStatus['QualifyingCirculationStatus']['qualifying_circulation_status_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $qualifyingCirculationStatus['QualifyingCirculationStatus']['id'], 'copy_id' => $qualifyingCirculationStatus['QualifyingCirculationStatus']['id'], 'delete_id' => $qualifyingCirculationStatus['QualifyingCirculationStatus']['id'], 'delete_text' => ___('do you really want to delete this qualifying circulation status ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Qualifying Circulation Status Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculationStatus['QualifyingCirculationStatus']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Status Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculationStatus['QualifyingCirculationStatus']['qualifying_circulation_status_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Status Shown'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculationStatus['QualifyingCirculationStatus']['status_shown']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Status Abbr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculationStatus['QualifyingCirculationStatus']['status_abbr']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculationStatus['QualifyingCirculationStatus']['description']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($qualifyingCirculationStatus['QualifyingCirculationStatus']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($qualifyingCirculationStatus['QualifyingCirculationStatus']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($qualifyingCirculationStatus['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $qualifyingCirculationStatus['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($qualifyingCirculationStatus['QualifyingCirculationStatus']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($qualifyingCirculationStatus['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $qualifyingCirculationStatus['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
