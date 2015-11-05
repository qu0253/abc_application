<div class="companies view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('company');?><?php echo !empty($company['Company']['company_name']) ? ' - ' . $company['Company']['company_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $company['Company']['id'], 'copy_id' => $company['Company']['id'], 'delete_id' => $company['Company']['id'], 'delete_text' => ___('do you really want to delete this company ?', true)));
	?>

	<table border="0" class="view">
<!--	<tr>
		<td>
			<?php ___('Company Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $company['Company']['id']; ?>
		</td>
	</tr>-->
	<tr>
		<td>
			<?php ___('Company Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $company['Company']['company_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Company Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $company['CompanyType']['company_type_name']; //$this->Html->link($company['CompanyType']['company_type_name'], array('controller' => 'company_types', 'action' => 'view', $company['CompanyType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Membership Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $company['MembershipType']['membership_type_name']; //$this->Html->link($company['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $company['MembershipType']['id'])); ?>
		</td>
	</tr>
	<?php echo $this->element("address_view", array('address' => $company));?>	
	</table>
</div>
