<?php
$statementBNewsprints = $qualifyingCirculation['StatementBNewsprint'];
?>
<div class="pagebreak"></div>
<div class="statementBNewsprints index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('statement b newsprints');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<table border="1" cellspacing="0" cellpadding="0" class="firstLastLeft" width="950">
	
	<tr class="sortHeader">
		<th><?php echo __('Name Of Publication', true);?></th>
		<th><?php echo __('Average No Of Pages Printed During The Period', true);?></th>
		<th><?php echo __('Actual No Of Pages Printed During The Period As Per Production', true);?></th>
		<th><?php echo __('Size Of The Page Sq Cm', true);?></th>
		<th><?php echo __('Act Consmp Of Ns Ppr Incl Waste', true);?></th>
		<th><?php echo __('Gsm', true);?></th>
		<th><?php echo __('Remarks', true);?></th>
		</tr>
	
	<?php
	$i = 0;
	foreach ($statementBNewsprints as $statementBNewsprint):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
                $statementBNewsprint['StatementBNewsprint'] = $statementBNewsprint;
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['name_of_publication']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['average_no_of_pages_printed_during_the_period']; ?>
		</td>
		<td>
			<?php echo number_format($statementBNewsprint['StatementBNewsprint']['actual_no_of_pages_printed_during_the_period_as_per_production']); ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['size_of_the_page_sq_cm']; ?>
		</td>
		<td>
			<?php echo number_format($statementBNewsprint['StatementBNewsprint']['act_consmp_of_ns_ppr_incl_waste']); ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['gsm']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['remarks']; ?>
		</td>		
	</tr>
<?php endforeach; ?>
	</table>
</div>
