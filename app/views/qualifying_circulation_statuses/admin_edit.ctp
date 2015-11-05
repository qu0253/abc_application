<div class="qualifyingCirculationStatuses form">

	<?php echo $this->AlaxosForm->create('QualifyingCirculationStatus', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit qualifying circulation status'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $qualifyingCirculationStatus['QualifyingCirculationStatus']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Qualifying Circulation Status Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_status_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Status Shown') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('status_shown', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Status Abbr') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('status_abbr', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Description') ?>
		</td>
		<td>:</td>
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
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
