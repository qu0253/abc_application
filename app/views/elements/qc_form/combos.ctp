<?php 
$combos = $qualifyingCirculation['Combo'];
?>

	<table border="1" cellspacing="0" cellpadding="0" class="add" width="950">
	
	<tr>
		<td class="bold13"><?php echo __('Combo Name', true);?></td>
		<td class="number-align bold13"><?php echo __('Cover Price', true);?></td>
		<td class="number-align bold13"><?php echo __('Combo', true);?></td>
	</tr>	
	<?php
	$i = 0;
        $comboTotal = 0;
	foreach ($combos as $combo):
                $combo['Combo'] = $combo;
	?>
	<tr>
		<td>
			<?php echo $combo['Combo']['combo_name']; ?>
		</td>
		<td class="number-align">
			<?php echo number_format($combo['Combo']['cover_price']); ?>
		</td>
		<td class="number-align">
			<?php echo number_format($combo['Combo']['combo']); $comboTotal += $combo['Combo']['combo']; ?>
		</td>
	</tr>
<?php endforeach; ?>
        <tr>
		<td colspan="2" class="number-align bold13">Total:
		</td>
		<td class="number-align bold13">
			<?php echo number_format($comboTotal); ?>
		</td>
	</tr>
	</table>