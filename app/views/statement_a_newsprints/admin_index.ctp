<?php if (isset($statementANewsprints) && is_array($statementANewsprints) && count($statementANewsprints) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($statementANewsprints, 'Statement A Newsprints List');
    exit;
}
?><div class="statementANewsprints index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('statement a newsprints');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('StatementANewsprint', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Statement A Newsprint Id', true), 'StatementANewsprint.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('By Imports Reels', true), 'StatementANewsprint.by_imports_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('By Imports Weight', true), 'StatementANewsprint.by_imports_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('By Imports Reams', true), 'StatementANewsprint.by_imports_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('By Imports Rweight', true), 'StatementANewsprint.by_imports_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 1', true), 'StatementANewsprint.remarks_1');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Indegenious Reels', true), 'StatementANewsprint.purchase_of_newsprint_indegenious_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Indegenious Weight', true), 'StatementANewsprint.purchase_of_newsprint_indegenious_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Indegenious Reams', true), 'StatementANewsprint.purchase_of_newsprint_indegenious_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Indegenious Rweight', true), 'StatementANewsprint.purchase_of_newsprint_indegenious_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 2', true), 'StatementANewsprint.remarks_2');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Imported Reels', true), 'StatementANewsprint.purchase_of_newsprint_imported_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Imported Weight', true), 'StatementANewsprint.purchase_of_newsprint_imported_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Imported Reams', true), 'StatementANewsprint.purchase_of_newsprint_imported_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Purchase Of Newsprint Imported Rweight', true), 'StatementANewsprint.purchase_of_newsprint_imported_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 3', true), 'StatementANewsprint.remarks_3');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Branches Reels', true), 'StatementANewsprint.other_units_branches_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Branches Weight', true), 'StatementANewsprint.other_units_branches_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Branches Reams', true), 'StatementANewsprint.other_units_branches_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Branches Rweight', true), 'StatementANewsprint.other_units_branches_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 4', true), 'StatementANewsprint.remarks_4');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 1 Reels', true), 'StatementANewsprint.extra_1_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 1 Weight', true), 'StatementANewsprint.extra_1_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 1 Reams', true), 'StatementANewsprint.extra_1_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 1 Rweight', true), 'StatementANewsprint.extra_1_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 5', true), 'StatementANewsprint.remarks_5');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 2 Reels', true), 'StatementANewsprint.extra_2_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 2 Weight', true), 'StatementANewsprint.extra_2_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 2 Reams', true), 'StatementANewsprint.extra_2_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 2 Rweight', true), 'StatementANewsprint.extra_2_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 6', true), 'StatementANewsprint.remarks_6');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 3 Reels', true), 'StatementANewsprint.extra_3_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 3 Weight', true), 'StatementANewsprint.extra_3_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 3 Reams', true), 'StatementANewsprint.extra_3_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 3 Rweight', true), 'StatementANewsprint.extra_3_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 7', true), 'StatementANewsprint.remarks_7');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 4 Reels', true), 'StatementANewsprint.extra_4_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 4 Weight', true), 'StatementANewsprint.extra_4_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 4 Reams', true), 'StatementANewsprint.extra_4_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 4 Rweight', true), 'StatementANewsprint.extra_4_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 8', true), 'StatementANewsprint.remarks_8');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 5 Reels', true), 'StatementANewsprint.extra_5_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 5 Weight', true), 'StatementANewsprint.extra_5_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 5 Reams', true), 'StatementANewsprint.extra_5_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 5 Rweight', true), 'StatementANewsprint.extra_5_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 9', true), 'StatementANewsprint.remarks_9');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 6 Reels', true), 'StatementANewsprint.extra_6_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 6 Weight', true), 'StatementANewsprint.extra_6_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 6 Reams', true), 'StatementANewsprint.extra_6_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 6 Rweight', true), 'StatementANewsprint.extra_6_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 10', true), 'StatementANewsprint.remarks_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 7 Reels', true), 'StatementANewsprint.extra_7_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 7 Weight', true), 'StatementANewsprint.extra_7_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 7 Reams', true), 'StatementANewsprint.extra_7_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 7 Rweight', true), 'StatementANewsprint.extra_7_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 11', true), 'StatementANewsprint.remarks_11');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 8 Reels', true), 'StatementANewsprint.extra_8_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 8 Weight', true), 'StatementANewsprint.extra_8_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 8 Reams', true), 'StatementANewsprint.extra_8_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 8 Rweight', true), 'StatementANewsprint.extra_8_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 12', true), 'StatementANewsprint.remarks_12');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 9 Reels', true), 'StatementANewsprint.extra_9_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 9 Weight', true), 'StatementANewsprint.extra_9_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 9 Reams', true), 'StatementANewsprint.extra_9_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 9 Rweight', true), 'StatementANewsprint.extra_9_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 13', true), 'StatementANewsprint.remarks_13');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 10 Reels', true), 'StatementANewsprint.extra_10_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 10 Weight', true), 'StatementANewsprint.extra_10_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 10 Reams', true), 'StatementANewsprint.extra_10_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra 10 Rweight', true), 'StatementANewsprint.extra_10_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 14', true), 'StatementANewsprint.remarks_14');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Received Back During The Period Reels', true), 'StatementANewsprint.Loans_received_back_during_the_period_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Received Back During The Period Weight', true), 'StatementANewsprint.Loans_received_back_during_the_period_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Received Back During The Period Reams', true), 'StatementANewsprint.Loans_received_back_during_the_period_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Received Back During The Period Rweight', true), 'StatementANewsprint.Loans_received_back_during_the_period_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 15', true), 'StatementANewsprint.remarks_15');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Obtained If Any During Period Reels', true), 'StatementANewsprint.loans_obtained_if_any_during_period_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Obtained If Any During Period Weight', true), 'StatementANewsprint.loans_obtained_if_any_during_period_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Obtained If Any During Period Reams', true), 'StatementANewsprint.loans_obtained_if_any_during_period_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Obtained If Any During Period Rweight', true), 'StatementANewsprint.loans_obtained_if_any_during_period_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 16', true), 'StatementANewsprint.remarks_16');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 1 Reels', true), 'StatementANewsprint.extra_l_1_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 1 Weight', true), 'StatementANewsprint.extra_l_1_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 1 Reams', true), 'StatementANewsprint.extra_l_1_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 1 Rweight', true), 'StatementANewsprint.extra_l_1_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 17', true), 'StatementANewsprint.remarks_17');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 2 Reels', true), 'StatementANewsprint.extra_l_2_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 2 Weight', true), 'StatementANewsprint.extra_l_2_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 2 Reams', true), 'StatementANewsprint.extra_l_2_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 2 Rweight', true), 'StatementANewsprint.extra_l_2_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 18', true), 'StatementANewsprint.remarks_18');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 3 Reels', true), 'StatementANewsprint.extra_l_3_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 3 Weight', true), 'StatementANewsprint.extra_l_3_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 3 Reams', true), 'StatementANewsprint.extra_l_3_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 3 Rweight', true), 'StatementANewsprint.extra_l_3_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 19', true), 'StatementANewsprint.remarks_19');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 4 Reels', true), 'StatementANewsprint.extra_l_4_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 4 Weight', true), 'StatementANewsprint.extra_l_4_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 4 Reams', true), 'StatementANewsprint.extra_l_4_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 4 Rweight', true), 'StatementANewsprint.extra_l_4_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 20', true), 'StatementANewsprint.remarks_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 5 Reels', true), 'StatementANewsprint.extra_l_5_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 5 Weight', true), 'StatementANewsprint.extra_l_5_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 5 Reams', true), 'StatementANewsprint.extra_l_5_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 5 Rweight', true), 'StatementANewsprint.extra_l_5_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 21', true), 'StatementANewsprint.remarks_21');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 6 Reels', true), 'StatementANewsprint.extra_l_6_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 6 Weight', true), 'StatementANewsprint.extra_l_6_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 6 Reams', true), 'StatementANewsprint.extra_l_6_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 6 Rweight', true), 'StatementANewsprint.extra_l_6_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 22', true), 'StatementANewsprint.remarks_22');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 7 Reels', true), 'StatementANewsprint.extra_l_7_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 7 Weight', true), 'StatementANewsprint.extra_l_7_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 7 Reams', true), 'StatementANewsprint.extra_l_7_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 7 Rweight', true), 'StatementANewsprint.extra_l_7_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 23', true), 'StatementANewsprint.remarks_23');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 8 Reels', true), 'StatementANewsprint.extra_l_8_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 8 Weight', true), 'StatementANewsprint.extra_l_8_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 8 Reams', true), 'StatementANewsprint.extra_l_8_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 8 Rweight', true), 'StatementANewsprint.extra_l_8_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 24', true), 'StatementANewsprint.remarks_24');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 9 Reels', true), 'StatementANewsprint.extra_l_9_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 9 Weight', true), 'StatementANewsprint.extra_l_9_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 9 Reams', true), 'StatementANewsprint.extra_l_9_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 9 Rweight', true), 'StatementANewsprint.extra_l_9_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 25', true), 'StatementANewsprint.remarks_25');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 10 Reels', true), 'StatementANewsprint.extra_l_10_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 10 Weight', true), 'StatementANewsprint.extra_l_10_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 10 Reams', true), 'StatementANewsprint.extra_l_10_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra L 10 Rweight', true), 'StatementANewsprint.extra_l_10_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 26', true), 'StatementANewsprint.remarks_26');?></th>
		<th><?php echo $this->Paginator->sort(__('Consumption During The Period Including Wastage Reels', true), 'StatementANewsprint.consumption_during_the_period_including_wastage_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Consumption During The Period Including Wastage Weight', true), 'StatementANewsprint.consumption_during_the_period_including_wastage_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Consumption During The Period Including Wastage Reams', true), 'StatementANewsprint.consumption_during_the_period_including_wastage_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Consumption During The Period Including Wastage Rweight', true), 'StatementANewsprint.consumption_during_the_period_including_wastage_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 27', true), 'StatementANewsprint.remarks_27');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Given If Any To Other Unit Reels', true), 'StatementANewsprint.loans_given_if_any_to_other_unit_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Given If Any To Other Unit Weight', true), 'StatementANewsprint.loans_given_if_any_to_other_unit_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Given If Any To Other Unit Reams', true), 'StatementANewsprint.loans_given_if_any_to_other_unit_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Given If Any To Other Unit Rweight', true), 'StatementANewsprint.loans_given_if_any_to_other_unit_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 28', true), 'StatementANewsprint.remarks_28');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Returned To Other Publishers Reels', true), 'StatementANewsprint.loans_returned_to_other publishers_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Returned To Other Publishers Weight', true), 'StatementANewsprint.loans_returned_to_other publishers_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Returned To Other Publishers Reams', true), 'StatementANewsprint.loans_returned_to_other publishers_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Returned To Other Publishers Rweight', true), 'StatementANewsprint.loans_returned_to_other publishers_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 29', true), 'StatementANewsprint.remarks_29');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Reels', true), 'StatementANewsprint.other_units_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Weight', true), 'StatementANewsprint.other_units_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Reams', true), 'StatementANewsprint.other_units_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Units Rweight', true), 'StatementANewsprint.other_units_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 30', true), 'StatementANewsprint.remarks_30');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Consumption Reels', true), 'StatementANewsprint.other_consumption_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Consumption Weight', true), 'StatementANewsprint.other_consumption_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Consumption Reams', true), 'StatementANewsprint.other_consumption_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Consumption Rweight', true), 'StatementANewsprint.other_consumption_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 31', true), 'StatementANewsprint.remarks_31');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 1 Reels', true), 'StatementANewsprint.extra_c_1_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 1 Weight', true), 'StatementANewsprint.extra_c_1_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 1 Reams', true), 'StatementANewsprint.extra_c_1_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 1 Rweight', true), 'StatementANewsprint.extra_c_1_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 32', true), 'StatementANewsprint.remarks_32');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 2 Reels', true), 'StatementANewsprint.extra_c_2_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 2 Weight', true), 'StatementANewsprint.extra_c_2_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 2 Reams', true), 'StatementANewsprint.extra_c_2_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 2 Rweight', true), 'StatementANewsprint.extra_c_2_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 33', true), 'StatementANewsprint.remarks_33');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 3 Reels', true), 'StatementANewsprint.extra_c_3_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 3 Weight', true), 'StatementANewsprint.extra_c_3_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 3 Reams', true), 'StatementANewsprint.extra_c_3_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 3 Rweight', true), 'StatementANewsprint.extra_c_3_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 34', true), 'StatementANewsprint.remarks_34');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 4 Reels', true), 'StatementANewsprint.extra_c_4_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 4 Weight', true), 'StatementANewsprint.extra_c_4_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 4 Reams', true), 'StatementANewsprint.extra_c_4_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 4 Rweight', true), 'StatementANewsprint.extra_c_4_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 35', true), 'StatementANewsprint.remarks_35');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 5 Reels', true), 'StatementANewsprint.extra_c_5_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 5 Weight', true), 'StatementANewsprint.extra_c_5_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 5 Reams', true), 'StatementANewsprint.extra_c_5_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 5 Rweight', true), 'StatementANewsprint.extra_c_5_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 36', true), 'StatementANewsprint.remarks_36');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 6 Reels', true), 'StatementANewsprint.extra_c_6_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 6 Weight', true), 'StatementANewsprint.extra_c_6_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 6 Reams', true), 'StatementANewsprint.extra_c_6_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 6 Rweight', true), 'StatementANewsprint.extra_c_6_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 37', true), 'StatementANewsprint.remarks_37');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 7 Reels', true), 'StatementANewsprint.extra_c_7_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 7 Weight', true), 'StatementANewsprint.extra_c_7_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 7 Reams', true), 'StatementANewsprint.extra_c_7_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 7 Rweight', true), 'StatementANewsprint.extra_c_7_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 38', true), 'StatementANewsprint.remarks_38');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 8 Reels', true), 'StatementANewsprint.extra_c_8_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 8 Weight', true), 'StatementANewsprint.extra_c_8_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 8 Reams', true), 'StatementANewsprint.extra_c_8_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 8 Rweight', true), 'StatementANewsprint.extra_c_8_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 39', true), 'StatementANewsprint.remarks_39');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 9 Reels', true), 'StatementANewsprint.extra_c_9_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 9 Weight', true), 'StatementANewsprint.extra_c_9_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 9 Reams', true), 'StatementANewsprint.extra_c_9_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 9 Rweight', true), 'StatementANewsprint.extra_c_9_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 40', true), 'StatementANewsprint.remarks_40');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 10 Reels', true), 'StatementANewsprint.extra_c_10_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 10 Weight', true), 'StatementANewsprint.extra_c_10_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 10 Reams', true), 'StatementANewsprint.extra_c_10_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Extra C 10 Rweight', true), 'StatementANewsprint.extra_c_10_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 41', true), 'StatementANewsprint.remarks_41');?></th>
		<th><?php echo $this->Paginator->sort(__('Closing Stock As On Reels', true), 'StatementANewsprint.closing_stock_as_on_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Closing Stock As On Weight', true), 'StatementANewsprint.closing_stock_as_on_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Closing Stock As On Reams', true), 'StatementANewsprint.closing_stock_as_on_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Closing Stock As On Rweight', true), 'StatementANewsprint.closing_stock_as_on_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 42', true), 'StatementANewsprint.remarks_42');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Due From Other Publishers As On Reels', true), 'StatementANewsprint.loans_due_from_other_publishers_as_on_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Due From Other Publishers Weight', true), 'StatementANewsprint.loans_due_from_other_publishers_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Due From Other Publishers Reams', true), 'StatementANewsprint.loans_due_from_other_publishers_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Due From Other Publishers Rweight', true), 'StatementANewsprint.loans_due_from_other_publishers_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 43', true), 'StatementANewsprint.remarks_43');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Outstanding To Other Publishers Reels', true), 'StatementANewsprint.loans_outstanding_to_other_publishers_reels');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Outstanding To Other Publishers Weight', true), 'StatementANewsprint.loans_outstanding_to_other_publishers_weight');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Outstanding To Other Publishers Reams', true), 'StatementANewsprint.loans_outstanding_to_other_publishers_reams');?></th>
		<th><?php echo $this->Paginator->sort(__('Loans Outstanding To Other Publishers Rweight', true), 'StatementANewsprint.loans_outstanding_to_other_publishers_rweight');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks 44', true), 'StatementANewsprint.remarks_44');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'StatementANewsprint.active');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('by_imports_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('by_imports_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('by_imports_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('by_imports_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_indegenious_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_indegenious_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_indegenious_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_indegenious_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_imported_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_imported_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_imported_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('purchase_of_newsprint_imported_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_3');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_branches_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_branches_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_branches_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_branches_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_4');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_1_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_1_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_1_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_1_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_5');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_2_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_2_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_2_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_2_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_6');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_3_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_3_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_3_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_3_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_7');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_4_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_4_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_4_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_4_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_8');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_5_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_5_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_5_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_5_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_9');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_6_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_6_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_6_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_6_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_7_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_7_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_7_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_7_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_11');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_8_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_8_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_8_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_8_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_12');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_9_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_9_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_9_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_9_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_13');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_10_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_10_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_10_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_10_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_14');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('Loans_received_back_during_the_period_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('Loans_received_back_during_the_period_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('Loans_received_back_during_the_period_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('Loans_received_back_during_the_period_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_15');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_obtained_if_any_during_period_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_obtained_if_any_during_period_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_obtained_if_any_during_period_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_obtained_if_any_during_period_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_16');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_1_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_1_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_1_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_1_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_17');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_2_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_2_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_2_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_2_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_18');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_3_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_3_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_3_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_3_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_19');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_4_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_4_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_4_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_4_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_5_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_5_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_5_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_5_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_21');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_6_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_6_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_6_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_6_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_22');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_7_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_7_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_7_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_7_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_23');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_8_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_8_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_8_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_8_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_24');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_9_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_9_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_9_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_9_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_25');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_10_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_10_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_10_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_l_10_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_26');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('consumption_during_the_period_including_wastage_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('consumption_during_the_period_including_wastage_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('consumption_during_the_period_including_wastage_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('consumption_during_the_period_including_wastage_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_27');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_given_if_any_to_other_unit_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_given_if_any_to_other_unit_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_given_if_any_to_other_unit_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_given_if_any_to_other_unit_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_28');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_returned_to_other publishers_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_returned_to_other publishers_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_returned_to_other publishers_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_returned_to_other publishers_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_29');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_units_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_30');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_consumption_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_consumption_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_consumption_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_consumption_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_31');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_1_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_1_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_1_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_1_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_32');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_2_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_2_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_2_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_2_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_33');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_3_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_3_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_3_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_3_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_34');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_4_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_4_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_4_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_4_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_35');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_5_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_5_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_5_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_5_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_36');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_6_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_6_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_6_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_6_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_37');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_7_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_7_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_7_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_7_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_38');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_8_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_8_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_8_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_8_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_39');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_9_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_9_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_9_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_9_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_40');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_10_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_10_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_10_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('extra_c_10_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_41');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('closing_stock_as_on_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('closing_stock_as_on_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('closing_stock_as_on_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('closing_stock_as_on_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_42');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_due_from_other_publishers_as_on_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_due_from_other_publishers_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_due_from_other_publishers_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_due_from_other_publishers_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_43');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_outstanding_to_other_publishers_reels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_outstanding_to_other_publishers_weight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_outstanding_to_other_publishers_reams');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('loans_outstanding_to_other_publishers_rweight');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks_44');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('active');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('StatementANewsprint', array('id' => 'chooseActionForm', 'url' => array('controller' => 'statementANewsprints', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($statementANewsprints as $statementANewsprint):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('StatementANewsprint.' . $i . '.id', array('value' => $statementANewsprint['StatementANewsprint']['id']));
		?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($statementANewsprint['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $statementANewsprint['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_1']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_2']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_3']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_4']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_5']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_6']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_7']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_8']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_9']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_10']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_11']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_12']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_13']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_14']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_15']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_16']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_17']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_18']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_19']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_20']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_21']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_22']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_23']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_24']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_25']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_26']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_27']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_28']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_29']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_30']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_31']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_32']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_33']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_34']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_35']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_36']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_37']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_38']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_39']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_40']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_41']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_42']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_as_on_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_43']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_reels']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_weight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_reams']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_rweight']; ?>
		</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_44']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($statementANewsprint['StatementANewsprint']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $statementANewsprint['StatementANewsprint']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $statementANewsprint['StatementANewsprint']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $statementANewsprint['StatementANewsprint']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $statementANewsprint['StatementANewsprint']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $statementANewsprint['StatementANewsprint']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $this->AlaxosForm->input_actions_list();
	echo '&nbsp;';
	echo $this->AlaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
</div>
	<div class="select_rec_per_page">
            <?php

	$passedArgs = $this->passedArgs;
	unset($passedArgs['limit']);
	echo $this->AlaxosForm->create('StatementANewsprint', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
	echo 'Select Records Per page: ';
	$options = Configure::read('select_rec_per_page');
	$paginingParams = ($paginator->params) ? $paginator->params : array();
	$pagining = !empty($paginingParams) ? array_pop($paginingParams['paging']) : array();
	$value = (empty($pagining) && empty($pagining['options']) && empty($pagining['options']['limit'])) ? $pagining['defaults']['limit'] : $pagining['options']['limit'];
	echo $this->AlaxosForm->select('limit', $options, $value, array(
            'value'=>$value, 
            'default'=>20, 
            'empty' => FALSE, 
            'onChange'=>'update_limit(this); return false;', 
            'name'=>'limit'
            )
        );
	echo $this->AlaxosForm->end();
	?>
        </div>
