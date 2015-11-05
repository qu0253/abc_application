<div class="membershipPayments view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('membership payment');?><?php echo !empty($membershipPayment['MembershipPayment']['id']) ? ' - ' . $membershipPayment['MembershipPayment']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('common_toolbar');
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Membership Payment Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['id']; ?>
		</td>
	</tr>
	<tr class="display_none">
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['Membership']['name']; //$this->Html->link($membershipPayment['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $membershipPayment['Membership']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Date Of Chque Dd No'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membershipPayment['MembershipPayment']['date_of_chque_dd_no']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Chque Dd No'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['chque_dd_no']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Amount'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['amount']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Bank Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['bank_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Branch Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['branch_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Comments If Any'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipPayment['MembershipPayment']['comments_if_any']; ?>
		</td>
	</tr>
	</table>
</div>
