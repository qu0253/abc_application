<div class="surpriseChecks view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('surprise check');?><?php echo !empty($surpriseCheck['SurpriseCheck']['id']) ? ' - ' . $surpriseCheck['SurpriseCheck']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $surpriseCheck['SurpriseCheck']['id'], 'copy_id' => $surpriseCheck['SurpriseCheck']['id'], 'delete_id' => $surpriseCheck['SurpriseCheck']['id'], 'delete_text' => ___('do you really want to delete this surprise check ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Surprise Check Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $surpriseCheck['SurpriseCheck']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($surpriseCheck['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $surpriseCheck['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Branch Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($surpriseCheck['AuditorBranch']['auditor_branch_name'], array('controller' => 'auditor_branches', 'action' => 'view', $surpriseCheck['AuditorBranch']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Status'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_yes_no($surpriseCheck['SurpriseCheck']['status']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Comments'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $surpriseCheck['SurpriseCheck']['comments']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($surpriseCheck['SurpriseCheck']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($surpriseCheck['SurpriseCheck']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($surpriseCheck['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $surpriseCheck['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($surpriseCheck['SurpriseCheck']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($surpriseCheck['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $surpriseCheck['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
