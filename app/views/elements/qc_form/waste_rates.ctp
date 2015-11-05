<?php
$wasteRate['WasteRate'] = $qualifyingCirculation['WasteRate'][0];
?>
<div class="wasteRates view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('waste rate');?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<table border="1" cellspacing="0" cellpadding="0" class="view" width="950">
	<tr>
		<td width="465">
			<?php ___('Average Rate In Waste Per Kg Prevalent In The Market Place'); ?>
		</td>
		<td width="20">:</td>
		<td width="465" align="right">
			<?php echo $wasteRate['WasteRate']['average_rate_in_waste_per_kg_prevalent_in_the_market_place']; ?>
		</td>
	</tr>
	<tr>
		<td width="465">
			<?php ___('Summary Reconciling Acquisition With Consumption'); ?>
		</td>
		<td>:</td>
		<td align="right" width="465">
			<?php echo $wasteRate['WasteRate']['summary_reconciling_acquisition_with_consumption']; ?>%
		</td>
	</tr>
	</table>
</div>

