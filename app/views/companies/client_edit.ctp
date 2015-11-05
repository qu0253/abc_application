<div class="companies form">

	<?php echo $this->AlaxosForm->create('Company', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client edit company'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $company['Company']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Company Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('company_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Company Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('company_type_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Membership Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_type_id', array('label' => false)); ?>
		</td>
	</tr>
                <?php echo $this->element("address_form");?>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
