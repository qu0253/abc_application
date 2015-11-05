<div class="auditorBranches view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('auditor branch');?><?php echo ' - ' . $auditorBranch['AuditorBranch']['auditor_branch_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $auditorBranch['AuditorBranch']['id'], 'copy_id' => $auditorBranch['AuditorBranch']['id'], 'delete_id' => $auditorBranch['AuditorBranch']['id'], 'delete_text' => ___('do you really want to delete this auditor branch ?', true),
            'additional_buttons' => array(
                _('Add Partner') => $this->Html->link('<span class="toolbar-button" title="' . _('Add Partner') . '">' . _('Add Partner') . '</span>', array('controller' => 'partners', 'action'=>'add'), array('title' => _('Add Partner'), 'class' => 'sub_form', 'escape' => false)),
                _('List Partner') => $this->Html->link('<span class="toolbar-button" title="' . _('List Partner') . '">' . _('List Partner') . '</span>', array('controller' => 'partners', 'action'=>'index'), array('title' => _('List Partner'), 'class' => 'sub_form', 'escape' => false)),
                )));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Auditor Branch Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorBranch['AuditorBranch']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Branch Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorBranch['AuditorBranch']['auditor_branch_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Firm Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorBranch['AuditorFirm']['auditor_firm_name'], array('controller' => 'auditor_firms', 'action' => 'view', $auditorBranch['AuditorFirm']['id'])); ?>
		</td>
	</tr>
	<?php echo $this->element("address_view", array('address' => $auditorBranch));?>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($auditorBranch['AuditorBranch']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorBranch['AuditorBranch']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorBranch['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $auditorBranch['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorBranch['AuditorBranch']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorBranch['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $auditorBranch['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
