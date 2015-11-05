<div class="companyTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('company type');?><?php echo ' - ' . $companyType['CompanyType']['company_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $companyType['CompanyType']['id'], 'copy_id' => $companyType['CompanyType']['id'], 'delete_id' => $companyType['CompanyType']['id'], 'delete_text' => ___('do you really want to delete this company type ?', true)));
	?>

	<table border="0" class="view">
	<!--tr>
		<td>
			<?php ___('Company Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $companyType['CompanyType']['id']; ?>
		</td>
	</tr-->
	<tr>
		<td>
			<?php ___('Company Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $companyType['CompanyType']['company_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($companyType['CompanyType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($companyType['CompanyType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($companyType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $companyType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($companyType['CompanyType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($companyType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $companyType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
