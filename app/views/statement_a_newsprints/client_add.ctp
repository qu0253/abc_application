<div class="statementANewsprints form">

	<?php echo $this->AlaxosForm->create('StatementANewsprint', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add statement a newsprint'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('yellow_form_toolbar');
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
            
	<tr class="display_none">
        		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
		
              
	</tr>
        <tr>
        	<td colspan="7" class="ic-heading">
			<?php ___('A- Statement of Newsprint Stocks') ?>
		</td>
	</tr>      
        <tr>
                <td></td>
                <td></td>
                       		
		<td class="ic-heading">
			<?php ___('No. of Reels') ?>
		</td>
		
                        		
		<td class="ic-heading">
			<?php ___('Weight M.T.') ?>
		</td>
		
                        		
		<td class="ic-heading">
			<?php ___('No of reams') ?>
		</td>
		
                        		
		<td class="ic-heading">
			<?php ___('Weight M.T.') ?>
		</td>
		
                        		
		<td class="ic-heading">
			<?php ___('Remarks') ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row0">
        		<td>
			<?php ___('Opening Stock As On Reels') ?> <?php echo DateTool :: sql_to_date($qualifyingCirculation['RegularPeriod']['from_date']); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('opening_stock_as_on_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('opening_stock_as_on_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('opening_stock_as_on_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('opening_stock_as_on_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_0', array('label' => false)); ?>
		</td>
		
              
	</tr>
	<tr class="row1">
        		<td>
			<?php ___('By Imports Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_1', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row5">
        		<td>
			<?php ___('Purchase Of Newsprint Indegenious Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_2', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row10">
        		<td>
			<?php ___('Purchase Of Newsprint Imported Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_3', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row15">
        		<td>
			<?php ___('Other Units Branches Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_4', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row20 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_1_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_5', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row25 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_2_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_6', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row30 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_3_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_7', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row35 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_4_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_8', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row40 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_5_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_9', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row45 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_6_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_10', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row50 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_7_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_11', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row55 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_8_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_12', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row60 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_9_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_13', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row65 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_10_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_14', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row70">
        		<td>
			<?php ___('Loans Received Back During The Period Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_15', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row75">
        		<td>
			<?php ___('Loans Obtained If Any During Period Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_16', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row80 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_17', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row85 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_18', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row90 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_19', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row95 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_20', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row100 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_21', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row105 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_22', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row110 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_23', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row115 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_24', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row120 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_25', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row125 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_reels', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_weight', array('label' => false, 'oper' => 'col2_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_reams', array('label' => false, 'oper' => 'col3_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_rweight', array('label' => false, 'oper' => 'col4_add')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_26', array('label' => false)); ?>
		</td>
		
              
	</tr>
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
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_27', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row135">
        		<td>
			<?php ___('Loans Given If Any To Other Unit Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_28', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row140">
        		<td>
			<?php ___('Loans Returned To Other Publishers Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_29', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row145">
        		<td>
			<?php ___('Other Units Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_units_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_30', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row150">
        		<td>
			<?php ___('Other Consumption Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_31', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row155 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_32', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row160 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_33', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row165 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_34', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row170 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_35', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row175 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_36', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row180 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_37', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row185 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_38', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row190 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_39', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row195 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_40', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row200 add_extra_row">
        		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_text', array('label' => false, 'oper' => 'col1_add')); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_41', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row205">
        		<td>
			<?php ___('Closing Stock As On') ?> <?php echo DateTool :: sql_to_date($qualifyingCirculation['RegularPeriod']['to_date']); ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_reels', array('label' => false, 'class' => 'highlighted subtotal', 'readonly' => 'readonly')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_weight', array('label' => false, 'class' => 'highlighted subtotal', 'readonly' => 'readonly')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_reams', array('label' => false, 'class' => 'highlighted subtotal', 'readonly' => 'readonly')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_rweight', array('label' => false, 'class' => 'highlighted subtotal', 'readonly' => 'readonly')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_42', array('label' => false, 'class' => 'highlighted subtotal', 'readonly' => 'readonly')); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row210">
        		<td>
			<?php ___('Loans Due From Other Publishers As On Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_as_on_reels', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_weight', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_reams', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_rweight', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_43', array('label' => false)); ?>
		</td>
		
              
	</tr>
                                    
	<tr class="row215">
        		<td>
			<?php ___('Loans Outstanding To Other Publishers Reels') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_reels', array('label' => false, 'oper' => 'col1_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_weight', array('label' => false, 'oper' => 'col2_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_reams', array('label' => false, 'oper' => 'col3_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_rweight', array('label' => false, 'oper' => 'col4_less')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('remarks_44', array('label' => false)); ?>
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
