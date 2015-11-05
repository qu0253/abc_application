<div class="partners form">

	<?php echo $this->AlaxosForm->create('Partner', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('admin copy partner'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $partner['Partner']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Partner Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('partner_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Registration Number') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('registration_number', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Auditor Branch Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('auditor_branch_id', array('label' => false)); ?>
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
			<?php echo $this->AlaxosForm->end(___d('alaxos', 'copy', true)); ?> 		</td>
 	</tr>
	</table>

</div>
