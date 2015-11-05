<div class="representatives form">

	<?php echo $this->AlaxosForm->create('Representative', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit representative'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $representative['Representative']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr class="<?php echo empty($this->data['Membership']['name']) ? 'display_none' : '';?>">
		<td>
			<?php ___('Membership Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Representative Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('representative_type_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Prefix Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('prefix_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Representative Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('representative_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Designation') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('designation', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Details') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_details', array('label' => false)); ?>
		</td>
	</tr>
                <?php echo $this->element("address_form");?>
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
