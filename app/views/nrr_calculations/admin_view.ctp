<div class="nrrCalculations view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('nrr calculation');?><?php echo !empty($nrrCalculation['NrrCalculation']['id']) ? ' - ' . $nrrCalculation['NrrCalculation']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $nrrCalculation['NrrCalculation']['id'], 'copy_id' => $nrrCalculation['NrrCalculation']['id'], 'delete_id' => $nrrCalculation['NrrCalculation']['id'], 'delete_text' => ___('do you really want to delete this nrr calculation ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Nrr Calculation Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($nrrCalculation['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $nrrCalculation['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price Of The Publication'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['cover_price_of_the_publication']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Trade Discount Offered To Trade'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['trade_discount_offered_to_trade']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Net Realisation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['net_realisation']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pages Per Issue Minimum'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_per_issue_minimum']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pages Per Issue Maximum'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_per_issue_maximum']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Waste Rate Per Kg'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_rate_per_kg']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Gsm'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['gsm']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Size Of The Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['size_of_the_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Weight Per Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['weight_per_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Value In Waste Per Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['value_in_waste_per_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Actual Weight Of The Copy Min'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['actual_weight_of_the_copy_min']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Actual Weight Of The Copy Max'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['actual_weight_of_the_copy_max']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Weight Net Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['weight_net_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pages Net Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_net_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Waste Price Per Issue Min'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_min']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Waste Price Per Issue Max'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_max']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Waste Price Per Issue Cutoff'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_cutoff']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($nrrCalculation['NrrCalculation']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($nrrCalculation['NrrCalculation']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($nrrCalculation['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $nrrCalculation['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($nrrCalculation['NrrCalculation']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($nrrCalculation['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $nrrCalculation['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
