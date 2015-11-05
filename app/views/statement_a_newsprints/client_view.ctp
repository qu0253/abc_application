<div class="statementANewsprints view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('statement a newsprint');?><?php echo !empty($statementANewsprint['StatementANewsprint']['id']) ? ' - ' . $statementANewsprint['StatementANewsprint']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $statementANewsprint['StatementANewsprint']['id'], 'copy_id' => $statementANewsprint['StatementANewsprint']['id'], 'delete_id' => $statementANewsprint['StatementANewsprint']['id'], 'delete_text' => ___('do you really want to delete this statement a newsprint ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Statement A Newsprint Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['QualifyingCirculation']['id']; //$this->Html->link($statementANewsprint['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $statementANewsprint['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('By Imports Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('By Imports Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('By Imports Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('By Imports Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['by_imports_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_indegenious_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['purchase_of_newsprint_imported_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 3'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_3']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Branches Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Branches Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Branches Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Branches Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_branches_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 4'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_4']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 1 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 1 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 1 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 1 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_1_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 5'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_5']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 2 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 2 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 2 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 2 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_2_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 6'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_6']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 3 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 3 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 3 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 3 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_3_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 7'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_7']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 4 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 4 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 4 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 4 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_4_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 8'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_8']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 5 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 5 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 5 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 5 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_5_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 9'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_9']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 6 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 6 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 6 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 6 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_6_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 7 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 7 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 7 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 7 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_7_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 11'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_11']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 8 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 8 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 8 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 8 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_8_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 12'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_12']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 9 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 9 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 9 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 9 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_9_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 13'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_13']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 10 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 10 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 10 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra 10 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_10_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 14'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_14']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['Loans_received_back_during_the_period_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 15'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_15']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_obtained_if_any_during_period_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 16'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_16']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 1 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 1 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 1 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 1 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_1_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 17'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_17']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 2 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 2 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 2 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 2 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_2_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 18'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_18']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 3 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 3 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 3 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 3 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_3_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 19'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_19']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 4 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 4 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 4 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 4 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_4_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 5 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 5 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 5 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 5 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_5_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 21'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_21']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 6 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 6 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 6 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 6 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_6_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 22'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_22']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 7 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 7 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 7 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 7 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_7_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 23'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_23']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 8 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 8 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 8 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 8 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_8_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 24'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_24']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 9 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 9 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 9 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 9 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_9_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 25'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_25']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 10 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 10 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 10 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra L 10 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_l_10_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 26'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_26']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['consumption_during_the_period_including_wastage_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 27'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_27']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_given_if_any_to_other_unit_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 28'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_28']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_returned_to_other publishers_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 29'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_29']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Units Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_units_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 30'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_30']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Consumption Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Consumption Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Consumption Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Consumption Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['other_consumption_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 31'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_31']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 1 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 1 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 1 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 1 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_1_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 32'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_32']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 2 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 2 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 2 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 2 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_2_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 33'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_33']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 3 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 3 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 3 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 3 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_3_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 34'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_34']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 4 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 4 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 4 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 4 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_4_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 35'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_35']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 5 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 5 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 5 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 5 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_5_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 36'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_36']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 6 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 6 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 6 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 6 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_6_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 37'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_37']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 7 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 7 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 7 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 7 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_7_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 38'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_38']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 8 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 8 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 8 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 8 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_8_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 39'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_39']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 9 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 9 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 9 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 9 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_9_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 40'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_40']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 10 Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 10 Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 10 Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Extra C 10 Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['extra_c_10_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 41'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_41']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Closing Stock As On Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Closing Stock As On Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Closing Stock As On Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Closing Stock As On Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['closing_stock_as_on_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 42'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_42']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers As On Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_as_on_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_due_from_other_publishers_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 43'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_43']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Reels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_reels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Weight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_weight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Reams'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_reams']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Rweight'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['loans_outstanding_to_other_publishers_rweight']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks 44'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementANewsprint['StatementANewsprint']['remarks_44']; ?>
		</td>
	</tr>
	</table>
</div>
