<div class="wasteRates form">

	<?php echo $this->AlaxosForm->create('WasteRate', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin add waste rate'); ?></h2>
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
			<?php ___('Average Rate In Waste Per Kg Prevalent In The Market Place') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('average_rate_in_waste_per_kg_prevalent_in_the_market_place', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Summary Reconciling Acquisition With Consumption') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('summary_reconciling_acquisition_with_consumption', array('label' => false)); ?>
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
