<?php
$statementANewsprint = $qualifyingCirculation['StatementANewsprint'];
?>
<div class="pagebreak"></div>
<div class="statementANewsprints form">

	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('statement a newsprint'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<table border="1" cellpadding="5" cellspacing="0" class="firstLastLeft" width="950">
            
	<tr>
        	<td colspan="7" class="ic-heading">
			<?php ___('A- Statement of Newsprint Stocks') ?>
		</td>
	</tr>      
        <tr>
                <th></th>
                <th></th>
                       		
		<th class="ic-heading">
			<?php ___('No. of Reels') ?>
		</th>
		
                        		
		<th class="ic-heading">
			<?php ___('Weight M.T.') ?>
		</th>
		
                        		
		<th class="ic-heading">
			<?php ___('No of reams') ?>
		</th>
		
                        		
		<th class="ic-heading">
			<?php ___('Weight M.T.') ?>
		</th>
		
                        		
		<th class="ic-heading">
			<?php ___('Remarks') ?>
		</th>
		
              
	</tr>
                                    
	<tr class="row0">
        		<td>
			<?php ___('Opening Stock As On Reels') ?> <?php echo DateTool :: sql_to_date($qualifyingCirculation['RegularPeriod']['from_date']); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['opening_stock_as_on_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['opening_stock_as_on_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['opening_stock_as_on_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['opening_stock_as_on_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_0']; ?>
		</td>
		
              
	</tr>
	<tr class="row1">
        		<td>
			<?php ___('By Imports Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['by_imports_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['by_imports_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['by_imports_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['by_imports_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_1']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row5">
        		<td>
			<?php ___('Purchase Of Newsprint Indegenious Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['purchase_of_newsprint_indegenious_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['purchase_of_newsprint_indegenious_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['purchase_of_newsprint_indegenious_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['purchase_of_newsprint_indegenious_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_2']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row10">
        		<td>
			<?php ___('Purchase Of Newsprint Imported Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['purchase_of_newsprint_imported_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['purchase_of_newsprint_imported_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['purchase_of_newsprint_imported_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['purchase_of_newsprint_imported_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_3']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row15">
        		<td>
			<?php ___('Other Units Branches Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['other_units_branches_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['other_units_branches_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['other_units_branches_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['other_units_branches_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_4']; ?>
		</td>
		
              
	</tr>
        <?php
        if ($statementANewsprint[0]['extra_1_text'] || $statementANewsprint[0]['extra_1_reels'] || $statementANewsprint[0]['extra_1_weight'] || $statementANewsprint[0]['extra_1_reams'] || $statementANewsprint[0]['extra_1_rweight']) {
        ?>
	<tr class="row20 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_1_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_1_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_1_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_1_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_1_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_5']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_2_text'] || $statementANewsprint[0]['extra_2_reels'] || $statementANewsprint[0]['extra_2_weight'] || $statementANewsprint[0]['extra_2_reams'] || $statementANewsprint[0]['extra_2_rweight']) {
        ?>
	<tr class="row25 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_2_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_2_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_2_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_2_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_2_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_6']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_3_text'] || $statementANewsprint[0]['extra_3_reels'] || $statementANewsprint[0]['extra_3_weight'] || $statementANewsprint[0]['extra_3_reams'] || $statementANewsprint[0]['extra_3_rweight']) {
        ?>
	<tr class="row30 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_3_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_3_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_3_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_3_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_3_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_7']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_4_text'] || $statementANewsprint[0]['extra_4_reels'] || $statementANewsprint[0]['extra_4_weight'] || $statementANewsprint[0]['extra_4_reams'] || $statementANewsprint[0]['extra_4_rweight']) {
        ?>
	<tr class="row35 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_4_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_4_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_4_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_4_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_4_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_8']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_5_text'] || $statementANewsprint[0]['extra_5_reels'] || $statementANewsprint[0]['extra_5_weight'] || $statementANewsprint[0]['extra_5_reams'] || $statementANewsprint[0]['extra_5_rweight']) {
        ?>
	<tr class="row40 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_5_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_5_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_5_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_5_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_5_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_9']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_6_text'] || $statementANewsprint[0]['extra_6_reels'] || $statementANewsprint[0]['extra_6_weight'] || $statementANewsprint[0]['extra_6_reams'] || $statementANewsprint[0]['extra_6_rweight']) {
        ?>
	<tr class="row45 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_6_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_6_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_6_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_6_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_6_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_10']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_7_text'] || $statementANewsprint[0]['extra_7_reels'] || $statementANewsprint[0]['extra_7_weight'] || $statementANewsprint[0]['extra_7_reams'] || $statementANewsprint[0]['extra_7_rweight']) {
        ?>
	<tr class="row50 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_7_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_7_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_7_weight'], 3)  ; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_7_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_7_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_11']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_8_text'] || $statementANewsprint[0]['extra_8_reels'] || $statementANewsprint[0]['extra_8_weight'] || $statementANewsprint[0]['extra_8_reams'] || $statementANewsprint[0]['extra_8_rweight']) {
        ?>
	<tr class="row55 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_8_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_8_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_8_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_8_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_8_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_12']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_9_text'] || $statementANewsprint[0]['extra_9_reels'] || $statementANewsprint[0]['extra_9_weight'] || $statementANewsprint[0]['extra_9_reams'] || $statementANewsprint[0]['extra_9_rweight']) {
        ?>
	<tr class="row60 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_9_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_9_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_9_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_9_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_9_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_13']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_10_text'] || $statementANewsprint[0]['extra_10_reels'] || $statementANewsprint[0]['extra_10_weight'] || $statementANewsprint[0]['extra_10_reams'] || $statementANewsprint[0]['extra_10_rweight']) {
        ?>
	<tr class="row65 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_10_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_10_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_10_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_10_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_10_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_14']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row70">
        		<td>
			<?php ___('Loans Received Back During The Period Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['Loans_received_back_during_the_period_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['Loans_received_back_during_the_period_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['Loans_received_back_during_the_period_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['Loans_received_back_during_the_period_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_15']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row75">
        		<td>
			<?php ___('Loans Obtained If Any During Period Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['loans_obtained_if_any_during_period_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['loans_obtained_if_any_during_period_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_obtained_if_any_during_period_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_obtained_if_any_during_period_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_16']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_1_text'] || $statementANewsprint[0]['extra_l_1_reels'] || $statementANewsprint[0]['extra_l_1_weight'] || $statementANewsprint[0]['extra_l_1_reams'] || $statementANewsprint[0]['extra_l_1_rweight']) {
        ?>
	<tr class="row80 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_1_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_1_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_1_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_1_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_1_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_17']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_2_text'] || $statementANewsprint[0]['extra_l_2_reels'] || $statementANewsprint[0]['extra_l_2_weight'] || $statementANewsprint[0]['extra_l_2_reams'] || $statementANewsprint[0]['extra_l_2_rweight']) {
        ?>
	<tr class="row85 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_2_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_2_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_2_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_2_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_2_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_18']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_3_text'] || $statementANewsprint[0]['extra_l_3_reels'] || $statementANewsprint[0]['extra_l_3_weight'] || $statementANewsprint[0]['extra_l_3_reams'] || $statementANewsprint[0]['extra_l_3_rweight']) {
        ?>
	<tr class="row90 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_3_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_3_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_3_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_3_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_3_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_19']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_4_text'] || $statementANewsprint[0]['extra_l_4_reels'] || $statementANewsprint[0]['extra_l_4_weight'] || $statementANewsprint[0]['extra_l_4_reams'] || $statementANewsprint[0]['extra_l_4_rweight']) {
        ?>
	<tr class="row95 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_4_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_4_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_4_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_4_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_4_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_20']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_3_text'] || $statementANewsprint[0]['extra_l_3_reels'] || $statementANewsprint[0]['extra_l_3_weight'] || $statementANewsprint[0]['extra_l_3_reams'] || $statementANewsprint[0]['extra_l_3_rweight']) {
        ?>
	<tr class="row100 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_3_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_5_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_5_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_5_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_5_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_21']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_6_text'] || $statementANewsprint[0]['extra_l_6_reels'] || $statementANewsprint[0]['extra_l_6_weight'] || $statementANewsprint[0]['extra_l_6_reams'] || $statementANewsprint[0]['extra_l_6_rweight']) {
        ?>
	<tr class="row105 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_6_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_6_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_6_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_6_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_6_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_22']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_7_text'] || $statementANewsprint[0]['extra_l_7_reels'] || $statementANewsprint[0]['extra_l_7_weight'] || $statementANewsprint[0]['extra_l_7_reams'] || $statementANewsprint[0]['extra_l_7_rweight']) {
        ?>
	<tr class="row110 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_7_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_7_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_7_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_7_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_7_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_23']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_8_text'] || $statementANewsprint[0]['extra_l_8_reels'] || $statementANewsprint[0]['extra_l_8_weight'] || $statementANewsprint[0]['extra_l_8_reams'] || $statementANewsprint[0]['extra_l_8_rweight']) {
        ?>
	<tr class="row115 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_8_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_8_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_8_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_8_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_8_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_24']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_9_text'] || $statementANewsprint[0]['extra_l_9_reels'] || $statementANewsprint[0]['extra_l_9_weight'] || $statementANewsprint[0]['extra_l_9_reams'] || $statementANewsprint[0]['extra_l_9_rweight']) {
        ?>
	<tr class="row120 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_9_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_9_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_9_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_9_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_9_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_25']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_l_10_text'] || $statementANewsprint[0]['extra_l_10_reels'] || $statementANewsprint[0]['extra_l_10_weight'] || $statementANewsprint[0]['extra_l_10_reams'] || $statementANewsprint[0]['extra_l_10_rweight']) {
        ?>
	<tr class="row125 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_l_10_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_10_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_l_10_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_10_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_l_10_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_26']; ?>
		</td>
		
              
	</tr>
        <?php } ?>
        <tr>
        	<td colspan="7">
			<?php ___('4. Less') ?>
		</td>
	</tr>
	<tr class="row130">
        		<td>
			<?php ___('Consumption During The Period Including Wastage Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['consumption_during_the_period_including_wastage_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['consumption_during_the_period_including_wastage_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['consumption_during_the_period_including_wastage_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['consumption_during_the_period_including_wastage_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_27']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row135">
        		<td>
			<?php ___('Loans Given If Any To Other Unit Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['loans_given_if_any_to_other_unit_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['loans_given_if_any_to_other_unit_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_given_if_any_to_other_unit_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_given_if_any_to_other_unit_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_28']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row140">
        		<td>
			<?php ___('Loans Returned To Other Publishers Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['loans_returned_to_other publishers_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['loans_returned_to_other publishers_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_returned_to_other publishers_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_returned_to_other publishers_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_29']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row145">
        		<td>
			<?php ___('Other Units Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['other_units_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['other_units_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['other_units_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['other_units_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_30']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row150">
        		<td>
			<?php ___('Other Consumption Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['other_consumption_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['other_consumption_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['other_consumption_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['other_consumption_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_31']; ?>
		</td>
		
              
	</tr>
        <?php
        if ($statementANewsprint[0]['extra_c_1_text'] || $statementANewsprint[0]['extra_c_1_reels'] || $statementANewsprint[0]['extra_c_1_weight'] || $statementANewsprint[0]['extra_c_1_reams'] || $statementANewsprint[0]['extra_c_1_rweight']) {
        ?>
	<tr class="row155 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_1_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_1_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_1_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_1_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_1_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_32']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_2_text'] || $statementANewsprint[0]['extra_c_2_reels'] || $statementANewsprint[0]['extra_c_2_weight'] || $statementANewsprint[0]['extra_c_2_reams'] || $statementANewsprint[0]['extra_c_2_rweight']) {
        ?>
	<tr class="row160 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_2_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_2_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_2_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_2_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_2_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_33']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_3_text'] || $statementANewsprint[0]['extra_c_3_reels'] || $statementANewsprint[0]['extra_c_3_weight'] || $statementANewsprint[0]['extra_c_3_reams'] || $statementANewsprint[0]['extra_c_3_rweight']) {
        ?>
	<tr class="row165 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_3_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_3_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_3_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_3_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_3_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_34']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_4_text'] || $statementANewsprint[0]['extra_c_4_reels'] || $statementANewsprint[0]['extra_c_4_weight'] || $statementANewsprint[0]['extra_c_4_reams'] || $statementANewsprint[0]['extra_c_4_rweight']) {
        ?>
	<tr class="row170 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_4_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_4_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_4_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_4_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_4_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_35']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_5_text'] || $statementANewsprint[0]['extra_c_5_reels'] || $statementANewsprint[0]['extra_c_5_weight'] || $statementANewsprint[0]['extra_c_5_reams'] || $statementANewsprint[0]['extra_c_5_rweight']) {
        ?>
	<tr class="row175 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_5_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_5_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_5_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_5_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_5_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_36']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_6_text'] || $statementANewsprint[0]['extra_c_6_reels'] || $statementANewsprint[0]['extra_c_6_weight'] || $statementANewsprint[0]['extra_c_6_reams'] || $statementANewsprint[0]['extra_c_6_rweight']) {
        ?>
	<tr class="row180 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_6_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_6_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_6_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_6_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_6_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_37']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_7_text'] || $statementANewsprint[0]['extra_c_7_reels'] || $statementANewsprint[0]['extra_c_7_weight'] || $statementANewsprint[0]['extra_c_7_reams'] || $statementANewsprint[0]['extra_c_7_rweight']) {
        ?>
	<tr class="row185 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_7_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_7_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_7_weight'], 3, '.', ''); ?>; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_7_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_7_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_38']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_8_text'] || $statementANewsprint[0]['extra_c_8_reels'] || $statementANewsprint[0]['extra_c_8_weight'] || $statementANewsprint[0]['extra_c_8_reams'] || $statementANewsprint[0]['extra_c_8_rweight']) {
        ?>
	<tr class="row190 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_8_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_8_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_8_weight'], 3, '.', ''); ?>; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_8_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_8_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_39']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_9_text'] || $statementANewsprint[0]['extra_c_9_reels'] || $statementANewsprint[0]['extra_c_9_weight'] || $statementANewsprint[0]['extra_c_9_reams'] || $statementANewsprint[0]['extra_c_9_rweight']) {
        ?>
	<tr class="row195 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_9_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_9_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_9_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_9_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_9_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_40']; ?>
		</td>
		
              
	</tr>
        <?php
        }
        if ($statementANewsprint[0]['extra_c_10_text'] || $statementANewsprint[0]['extra_c_10_reels'] || $statementANewsprint[0]['extra_c_10_weight'] || $statementANewsprint[0]['extra_c_10_reams'] || $statementANewsprint[0]['extra_c_10_rweight']) {
        ?>
	<tr class="row200 add_extra_row">
        		<td>
			<?php echo $statementANewsprint[0]['extra_c_10_text']; ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_10_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_10_weight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['extra_c_10_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['extra_c_10_rweight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_41']; ?>
		</td>
		
              
	</tr>
        <?php } ?>
	<tr class="row205">
        		<td>
			<?php ___('Closing Stock As On') ?> <?php echo DateTool :: sql_to_date($qualifyingCirculation['RegularPeriod']['to_date']); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['closing_stock_as_on_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['closing_stock_as_on_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['closing_stock_as_on_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['closing_stock_as_on_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_42']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row210">
        		<td>
			<?php ___('Loans Due From Other Publishers As On Reels') ?> <?php echo DateTool :: sql_to_date($qualifyingCirculation['RegularPeriod']['to_date']); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['loans_due_from_other_publishers_as_on_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['loans_due_from_other_publishers_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_due_from_other_publishers_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_due_from_other_publishers_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_43']; ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row215">
        		<td>
			<?php ___('Loans Outstanding To Other Publishers Reels') ?> <?php echo DateTool :: sql_to_date($qualifyingCirculation['RegularPeriod']['to_date']); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $statementANewsprint[0]['loans_outstanding_to_other_publishers_reels']; ?>
		</td>
		
                        		
		<td>
			<?php echo number_format($statementANewsprint[0]['loans_outstanding_to_other_publishers_weight'], 3, '.', ''); ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_outstanding_to_other_publishers_reams']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['loans_outstanding_to_other_publishers_rweight']; ?>
		</td>
		
                        		
		<td>
			<?php echo $statementANewsprint[0]['remarks_44']; ?>
		</td>
		
              
	</tr>
	</table>

</div>
