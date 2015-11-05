<div class="qualifyingCirculations form">

	<?php echo $this->AlaxosForm->create('QualifyingCirculation', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Printing Center Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_center_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Regular Period Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('regular_period_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
        	<td>
			<?php ___('Qualifying Circulation Status') ?>
		</td>
                <td>:</td>
                       		
		<td colspan="4">
			<?php echo $this->AlaxosForm->input('qualifying_circulation_status_id', array('label' => false)); ?>
		</td>                
	</tr>
	</tr>
        <tr>
        	<td>
			<?php ___('Hard Copy Received Date') ?>
		</td>
                <td>:</td>
                       		
		<td colspan="4">
			<?php echo $this->AlaxosForm->input('hard_copy_received_date', array('label' => false)); ?>
		</td>                
	</tr>
	</tr>
        <tr>
        	<td>
			<?php ___('Hard Copy Received Comments') ?>
		</td>
                <td>:</td>
                       		
		<td colspan="4">
			<?php echo $this->AlaxosForm->input('hard_copy_received_comments', array('label' => false)); ?>
		</td>                
	</tr>
        <tr>
        	<td>
			<?php ___('Recheck Auditor Branch') ?>
		</td>
                <td>:</td>
                       		
		<td colspan="4">
			<?php echo $this->AlaxosForm->input('recheck_auditor_branch_id', array('label' => false)); ?>
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
