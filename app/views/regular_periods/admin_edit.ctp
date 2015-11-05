<div class="regularPeriods form">

	<?php echo $this->AlaxosForm->create('RegularPeriod', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit regular period'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $regularPeriod['RegularPeriod']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Regular Period Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('regular_period_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Volume Number') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('volume_number', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('From Date') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('from_date', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('To Date') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('to_date', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Cut Off Date') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cut_off_date', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Grace Days Reminder 1') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('grace_days_reminder_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Grace Days Reminder 2') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('grace_days_reminder_2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Grace Days Reminder 3') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('grace_days_reminder_3', array('label' => false)); ?>
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
