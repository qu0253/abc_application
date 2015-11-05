<?php
$nrrCalculations = $qualifyingCirculation['NrrCalculation'];
?>
<div class="nrrCalculations index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h3><?php ___('nrr calculations');?></h3>
	    </span>
        <span class="h2-right"></span></div>
	
    
	<table cellspacing="0" class="administration number-align">
	
	<tr class="sortHeader">
		<th><?php echo __('Cover Price Of The Publication', true);?></th>
		<th><?php echo __('Trade Discount Offered To Trade', true);?></th>
		<th><?php echo __('Net Realisation', true);?></th>
		<th><?php echo __('No Of Pages Per Issue Minimum', true);?></th>
		<th><?php echo __('No Of Pages Per Issue Maximum', true);?></th>
		<th><?php echo __('Waste Rate Per Kg', true);?></th>
		<th><?php echo __('Gsm', true);?></th>
		<th><?php echo __('Size Of The Page');?></th>
		<th><?php echo __('Weight Per Page', true);?></th>
		<th><?php echo __('Value In Waste Per Page', true);?></th>
		<th><?php echo __('Actual Weight Of The Copy Min', true);?></th>
		<th><?php echo __('Actual Weight Of The Copy Max', true);?></th>
		<th><?php echo __('Weight Net Price', true);?></th>
		<th><?php echo __('No Of Pages Net Price', true);?></th>
		<th><?php echo __('Waste Price Per Issue Min', true);?></th>
		<th><?php echo __('Waste Price Per Issue Max', true);?></th>
		<th><?php echo __('Waste Price Per Issue Cutoff', true);?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($nrrCalculations as $nrrCalculation):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
                $nrrCalculation['NrrCalculation'] = $nrrCalculation;
	?>
	<tr<?php echo $class;?>>
<!--		<td>
		<?php
		echo $this->AlaxosForm->checkBox('NrrCalculation.' . $i . '.id', array('value' => $nrrCalculation['NrrCalculation']['id']));
		?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['id']; ?>
		</td>-->
		<td class="display_none">
			<?php echo $nrrCalculation['QualifyingCirculation']['id']; //$this->Html->link($nrrCalculation['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $nrrCalculation['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['cover_price_of_the_publication']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['trade_discount_offered_to_trade']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['net_realisation']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_per_issue_minimum']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_per_issue_maximum']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_rate_per_kg']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['gsm']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['size_of_the_page']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['weight_per_page']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['value_in_waste_per_page']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['actual_weight_of_the_copy_min']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['actual_weight_of_the_copy_max']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['weight_net_price']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_net_price']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_min']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_max']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_cutoff']; ?>
		</td>		
	</tr>
<?php endforeach; ?>
	</table>
</div>
