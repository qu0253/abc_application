	<tr>
		<td height="60" colspan="3" align="center" valign="middle"><span class="bold13">Payment Information</span></td>
	</tr>
	<?php
	foreach($membership_payments as $k => $v) {
	$membershipPayment['MembershipPayment'] = $v;
	?>
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
	<?php
    }
    ?>
