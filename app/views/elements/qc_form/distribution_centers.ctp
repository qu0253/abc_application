<?php
$distributionCenters = $qualifyingCirculation['DistributionCenter'];
?><div class="distributionCenters index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('distribution centers');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<table border="1" cellspacing="0" cellpadding="0" width="950">
	
	<tr class="sortHeader">
		<th width="465"><?php echo __('Distribution Center Name', true);?></th>
		<th width="20">&nbsp;</th>
<!--		<th><?php echo __('Name Address', true);?></th>-->
		<th width="465"><?php echo __('Approx Average No Of Copies Supplied', true);?></th>		
	</tr>
		
	<?php
	$i = 0;
	foreach ($distributionCenters as $distributionCenter):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
                $distributionCenter['DistributionCenter'] = $distributionCenter;
	?>
	<tr<?php echo $class;?>>
		<td width="465">
			<?php echo $distributionCenter['DistributionCenter']['distribution_center_name']; ?>
		</td>
		<td width="20">&nbsp;</td>
<!--		<td>
			<?php echo $distributionCenter['DistributionCenter']['name_address']; ?>
		</td>-->
		<td width="465" class="number-align">
			<?php echo $distributionCenter['DistributionCenter']['approx_average_no_of_copies_supplied']; ?>
		</td>		
	</tr>
<?php endforeach; ?>
	</table>
</div>