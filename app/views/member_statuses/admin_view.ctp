<div class="memberStatuses view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('member status');?><?php echo ' - ' . $memberStatus['MemberStatus']['member_status_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $memberStatus['MemberStatus']['id'], 'copy_id' => $memberStatus['MemberStatus']['id'], 'delete_id' => $memberStatus['MemberStatus']['id'], 'delete_text' => ___('do you really want to delete this member status ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Member Status Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $memberStatus['MemberStatus']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Member Status Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $memberStatus['MemberStatus']['member_status_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $memberStatus['MemberStatus']['description']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($memberStatus['MemberStatus']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($memberStatus['MemberStatus']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($memberStatus['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $memberStatus['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($memberStatus['MemberStatus']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($memberStatus['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $memberStatus['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
