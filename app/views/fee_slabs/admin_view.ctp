<div class="feeSlabs view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('fee slab');?><?php echo ' - ' . $feeSlab['FeeSlab']['fee_slab_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $feeSlab['FeeSlab']['id'], 'copy_id' => $feeSlab['FeeSlab']['id'], 'delete_id' => $feeSlab['FeeSlab']['id'], 'delete_text' => ___('do you really want to delete this fee slab ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Fee Slab Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Fee Slab Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['fee_slab_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Membership Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($feeSlab['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $feeSlab['MembershipType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Frequency Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($feeSlab['Frequency']['frequency_name'], array('controller' => 'frequencies', 'action' => 'view', $feeSlab['Frequency']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Publication Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($feeSlab['PublicationType']['publication_type_name'], array('controller' => 'publication_types', 'action' => 'view', $feeSlab['PublicationType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Circulation From'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['circulation_from']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Circulation To'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['circulation_to']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Annual Expenditure From'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_expenditure_from']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Annual Expenditure To'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_expenditure_to']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Annual Turnover From'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_turnover_from']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Annual Turnover To'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_turnover_to']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Application Fee'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['application_fee']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Entrance Fee'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['entrance_fee']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Annual Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($feeSlab['FeeSlab']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($feeSlab['FeeSlab']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($feeSlab['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $feeSlab['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($feeSlab['FeeSlab']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($feeSlab['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $feeSlab['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
