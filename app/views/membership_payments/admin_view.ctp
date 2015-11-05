<div class="membershipPayments view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('membership payment');?><?php echo !empty($membershipPayment['MembershipPayment']['id']) ? ' - ' . $membershipPayment['MembershipPayment']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $membershipPayment['MembershipPayment']['id'], 'copy_id' => $membershipPayment['MembershipPayment']['id'], 'delete_id' => $membershipPayment['MembershipPayment']['id'], 'delete_text' => ___('do you really want to delete this membership payment ?', true)));
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
			<?php echo $this->Html->link($membershipPayment['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $membershipPayment['Membership']['id'])); ?>
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
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($membershipPayment['MembershipPayment']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membershipPayment['MembershipPayment']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membershipPayment['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $membershipPayment['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membershipPayment['MembershipPayment']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membershipPayment['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $membershipPayment['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
