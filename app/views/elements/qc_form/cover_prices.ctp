<?php 
$coverPrices = $qualifyingCirculation['CoverPrice'];
?>
<div class="combos index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h3><?php ___('cover prices');?></h3>
	    </span>
        </div>
    
	<table cellspacing="0" cellpadding="0" width="950" border="1">
            <tr>
		<td class="number-align bold13"><?php echo __('Cover Price', true);?></td>
		<td class="number-align bold13"><?php echo __('No Of Publishing Days', true);?></td>
		<td class="number-align bold13"><?php echo __('Total Copies', true);?></td>
		<td class="number-align bold13"><?php echo __('Copies Per Publishing Day', true);?></td>
		<td class="bold13"><?php echo __('Single Combo Other Variant', true);?></td>
            </tr>
	<?php
	$i = 0;
	foreach ($coverPrices as $coverPrice):
                $coverPrice['CoverPrice'] = $coverPrice;
	?>
	<tr>
		<td class="number-align">
			<?php echo number_format($coverPrice['CoverPrice']['cover_price']); ?>
		</td>
		<td class="number-align">
			<?php echo number_format($coverPrice['CoverPrice']['no_of_publishing_days']); ?>
		</td>
		<td class="number-align">
			<?php echo number_format($coverPrice['CoverPrice']['total_copies']); ?>
		</td>
		<td class="number-align">
			<?php echo number_format($coverPrice['CoverPrice']['copies_per_publishing_day']); ?>
		</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['single_combo_other_variant']; ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>