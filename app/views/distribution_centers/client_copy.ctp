<div class="distributionCenters form">

	<?php echo $this->AlaxosForm->create('DistributionCenter', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('client copy distribution center'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $distributionCenter['DistributionCenter']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Distribution Center Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('distribution_center_name', array('label' => false)); ?>
		</td>
	</tr>
<!--                	<tr>
		<td>
			<?php ___('Name Address') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('name_address', array('label' => false)); ?>
		</td>
	</tr>-->
                	<tr>
		<td>
			<?php ___('Approx Average No Of Copies Supplied') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('approx_average_no_of_copies_supplied', array('label' => false)); ?>
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
