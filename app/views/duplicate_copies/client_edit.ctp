<div class="duplicateCopies form">

	<?php echo $this->AlaxosForm->create('DuplicateCopy', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client edit duplicate copy'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('yellow_form_toolbar');
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr class="display_none">
		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Yellow Certificate') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('yellow_certificate', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('White Certificate') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('white_certificate', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Name Of Contact Person') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('name_of_contact_person', array('label' => false)); ?>
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
