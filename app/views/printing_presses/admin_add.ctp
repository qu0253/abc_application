<div class="printingPresses form">

	<?php echo $this->AlaxosForm->create('PrintingPress', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin add printing press'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
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
			<?php ___('Printing Press Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_press_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Address') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('address', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Std Code') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('std_code', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Phone Number 1') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('phone_number_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Fax Number') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('fax_number', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Dates On Which Publication Is Normally Sent For Printing') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('dates_on_which_publication_is_normally_sent_for_printing', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Normal Printing Schedule') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('normal_printing_schedule', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Normal Start Time') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('normal_start_time', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Normal Completion Time') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('normal_completion_time', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Sent For Printing') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('sent_for_printing', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Size Of Page') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('size_of_page', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Number Of Pages') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('number_of_pages', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Make Of Newprint Used') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('make_of_newprint_used', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Make Of Printing Machine') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('make_of_printing_machine', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Printing Capacity') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_capacity', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Printing Units') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_units', array('label' => false)); ?>
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
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
