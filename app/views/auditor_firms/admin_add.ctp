<div class="auditorFirms form">

	<?php echo $this->AlaxosForm->create('AuditorFirm', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin add auditor firm'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Auditor Firm Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('auditor_firm_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Auditor Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('auditor_type_id', array('label' => false)); ?>
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
			<?php ___('Registration Number') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('registration_number', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Date Of Establishment') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('date_of_establishment', array('label' => false)); ?>
		</td>
	</tr>
<!--        <tr>
		<td>
			<?php ___('Head Office') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('auditor_branch_id', array('label' => false)); ?>
		</td>
	</tr>-->
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
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
