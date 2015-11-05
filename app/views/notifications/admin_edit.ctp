<div class="notifications form">

	<?php echo $this->AlaxosForm->create('Notification', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit notification'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $notification['Notification']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Title') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('title', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Interpretation') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('interpretation', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subject') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subject', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Html Email Content') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('html_email_content', array('label' => false, 'type' => 'textarea')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('CC') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cc', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('BCC') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('bcc', array('label' => false)); ?>
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
