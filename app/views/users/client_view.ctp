<div class="users view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('user');?><?php echo ' - ' . $user['User']['username']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'edit_id' => $user['User']['id']));
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
	</table>
</div>
