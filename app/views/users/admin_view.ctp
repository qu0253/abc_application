<div class="users view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('user');?><?php echo ' - ' . $user['User']['username']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
        $additional_buttons = array(
        _('Membership') => $this->Html->link('Membership', array('action' => 'index', 'controller' => 'memberships', 'admin' => true), array('escape' => false, 'title' => 'Membership', 'class' => 'sub_form')),
        _('Change Password') => $this->Html->link('Change Password', array('action' => 'reset_password', 'controller' => 'Users', 'admin' => true, $user['User']['id']), array('escape' => false, 'title' => 'Change Password', 'class' => 'sub_form')),
        );
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $user['User']['id'], 'copy_id' => $user['User']['id'], 'delete_id' => $user['User']['id'], 'delete_text' => ___('do you really want to delete this user ?', true),
            'additional_buttons' => $additional_buttons));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('User Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $user['User']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Username'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $user['User']['username']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Email Address'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $user['User']['email_address']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('First Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $user['User']['first_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Last Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $user['User']['last_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Role Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($user['Role']['name'], array('controller' => 'roles', 'action' => 'view', $user['Role']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($user['User']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($user['User']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($user['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $user['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($user['User']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($user['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $user['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
