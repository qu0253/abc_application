<div class="membershipTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('membership type');?><?php echo ' - ' . $membershipType['MembershipType']['membership_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $membershipType['MembershipType']['id'], 'copy_id' => $membershipType['MembershipType']['id'], 'delete_id' => $membershipType['MembershipType']['id'], 'delete_text' => ___('do you really want to delete this membership type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Membership Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipType['MembershipType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Membership Type Code'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipType['MembershipType']['membership_type_code']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Membership Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipType['MembershipType']['membership_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipType['MembershipType']['description']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($membershipType['MembershipType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membershipType['MembershipType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membershipType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $membershipType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membershipType['MembershipType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membershipType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $membershipType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
