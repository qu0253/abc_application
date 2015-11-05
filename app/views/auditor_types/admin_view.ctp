<div class="auditorTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('auditor type');?><?php echo ' - ' . $auditorType['AuditorType']['auditor_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $auditorType['AuditorType']['id'], 'copy_id' => $auditorType['AuditorType']['id'], 'delete_id' => $auditorType['AuditorType']['id'], 'delete_text' => ___('do you really want to delete this auditor type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Auditor Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorType['AuditorType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorType['AuditorType']['auditor_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($auditorType['AuditorType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorType['AuditorType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $auditorType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorType['AuditorType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $auditorType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
