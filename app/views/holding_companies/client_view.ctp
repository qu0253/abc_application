<div class="holdingCompanies view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ($this->Session->read('Auth.Membership.membership_type_id') == 5) ? ___('Company / Proprietor Name') : ___('Holding Company Name') ?><?php echo !empty($holdingCompany['HoldingCompany']['holding_company_name']) ? ' - ' . $holdingCompany['HoldingCompany']['holding_company_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
        echo $this->element('common_toolbar');
	?>

	<table border="0" class="view">
<!--	<tr>
		<td>
			<?php ($this->Session->read('Auth.Membership.membership_type_id') == 5) ? ___('Company / Proprietor Id') : ___('Holding Company Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $holdingCompany['HoldingCompany']['id']; ?>
		</td>
	</tr>-->
        <?php
        if(!empty($holdingCompany['Membership']['name'])) {
        ?>
	<tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $holdingCompany['Membership']['name']; //$this->Html->link($holdingCompany['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $holdingCompany['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ($this->Session->read('Auth.Membership.membership_type_id') == 5) ? ___('Company / Proprietor Name') : ___('Holding Company Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $holdingCompany['HoldingCompany']['holding_company_name']; ?>
		</td>
	</tr>
	<?php echo $this->element("address_without_mobile_email_view", array('address' => $holdingCompany));?>	
	</table>
</div>
