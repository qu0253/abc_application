<div class="auditorFirms view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('auditor firm');?><?php echo ' - ' . $auditorFirm['AuditorFirm']['auditor_firm_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $auditorFirm['AuditorFirm']['id'], 'copy_id' => $auditorFirm['AuditorFirm']['id'], 'delete_id' => $auditorFirm['AuditorFirm']['id'], 'delete_text' => ___('do you really want to delete this auditor firm ?', true), 
            'additional_buttons' => array(
                    _('Add Auditor Branch') => $this->Html->link('<span class="toolbar-button" title="' . _('Add Auditor Branch') . '">' . _('Add Auditor Branch') . '</span>', array('controller' => 'auditor_branches', 'action'=>'add'), array('title' => _('Add Auditor Branch'), 'class' => 'sub_form', 'escape' => false)),
                    _('List Auditor Branch') => $this->Html->link('<span class="toolbar-button" title="' . _('List Auditor Branch') . '">' . _('List Auditor Branch') . '</span>', array('controller' => 'auditor_branches', 'action'=>'index'), array('title' => _('List Auditor Branch'), 'class' => 'sub_form', 'escape' => false)),
                )));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Auditor Firm Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorFirm['AuditorFirm']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Firm Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorFirm['AuditorFirm']['auditor_firm_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorFirm['AuditorType']['auditor_type_name'], array('controller' => 'auditor_types', 'action' => 'view', $auditorFirm['AuditorType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Company Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorFirm['CompanyType']['company_type_name'], array('controller' => 'company_types', 'action' => 'view', $auditorFirm['CompanyType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Registration Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $auditorFirm['AuditorFirm']['registration_number']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Date Of Establishment'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorFirm['AuditorFirm']['date_of_establishment']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Head Office'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorFirm['AuditorBranch']['auditor_branch_name'], array('controller' => 'auditor_branches', 'action' => 'view', $auditorFirm['AuditorBranch']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($auditorFirm['AuditorFirm']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorFirm['AuditorFirm']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorFirm['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $auditorFirm['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($auditorFirm['AuditorFirm']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($auditorFirm['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $auditorFirm['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
