	<tr>
		<td height="60" colspan="3" align="center" valign="middle"><span class="bold13">Company / Proprietor Information</span></td>
	</tr>
	
	<?php
	foreach($holdingCompanies as $k => $v) {
	$holdingCompany['HoldingCompany'] = $v;
	$holdingCompany['Address'] = $v['Address'];
	$holdingCompany['Country'] = $v['Address']['Country'];
	$holdingCompany['Zone'] = $v['Address']['Zone'];
	$holdingCompany['State'] = $v['Address']['State'];
	$holdingCompany['District'] = $v['Address']['District'];
	$holdingCompany['City'] = $v['Address']['City'];
	?>
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
	<?php
    }
    ?>
