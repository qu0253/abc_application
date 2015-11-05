<div class="membershipTypes form">

	<?php echo $this->AlaxosForm->create('MembershipType', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('admin copy membership type'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $membershipType['MembershipType']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Membership Type Code') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_type_code', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Membership Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_type_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Description') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('description', array('label' => false)); ?>
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
			<?php echo $this->AlaxosForm->end(___d('alaxos', 'copy', true)); ?> 		</td>
 	</tr>
	</table>

</div>
