<div class="nrrCalculations form">

	<?php echo $this->AlaxosForm->create('NrrCalculation', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit nrr calculation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $nrrCalculation['NrrCalculation']['id']));
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
			<?php ___('Cover Price Of The Publication') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cover_price_of_the_publication', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Trade Discount Offered To Trade') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('trade_discount_offered_to_trade', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Net Realisation (Cover price - Trade Discount)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('net_realisation', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('No Of Pages Per Issue Minimum') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pages_per_issue_minimum', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('No Of Pages Per Issue Maximum') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pages_per_issue_maximum', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Waste Rate Per Kg') ?>
		</td>
		<td>*:</td>
		<td>
                    <?php echo $this->AlaxosForm->input('waste_rate_per_kg', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Gsm') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('gsm', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Size Of The Page') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('size_of_the_page', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Weight Per Page') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('weight_per_page', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Value In Waste Per Page') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('value_in_waste_per_page', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Actual Weight Of The Copy (At minimum pagination)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('actual_weight_of_the_copy_min', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Actual Weight Of The Copy (At maximum pagination)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('actual_weight_of_the_copy_max', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Weight of the copy at which net price to the trade and waste price are same.  i.e. cut off page level)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('weight_net_price', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('No. of pages at which net price to the trade and waste price are almost the same i.e. cut of page level)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pages_net_price', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Waste Price Per Issue (At Minimum Pagination)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('waste_price_per_issue_min', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Waste Price Per Issue (At Maximum Pagination)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('waste_price_per_issue_max', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Waste Price Per Issue (At Cut Off Pagination)') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('waste_price_per_issue_cutoff', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
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
