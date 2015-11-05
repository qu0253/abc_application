<div class="users form">

	<?php echo $this->AlaxosForm->create('User', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit user'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $user['User']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Username') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('username', array('label' => false)); ?>
		</td>
	</tr>
       	<tr>
		<td>
			<?php ___('Email Address') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('email_address', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('First Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('first_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Last Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('last_name', array('label' => false)); ?>
		</td>
	</tr>                	
        <tr>
		<td>
			<?php ___('Role Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('role_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Active') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('active', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
