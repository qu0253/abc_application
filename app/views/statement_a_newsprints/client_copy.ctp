<div class="statementANewsprints form">

	<?php echo $this->AlaxosForm->create('StatementANewsprint', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('client copy statement a newsprint'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $statementANewsprint['StatementANewsprint']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('By Imports Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('By Imports Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('By Imports Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('By Imports Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('by_imports_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Indegenious Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_indegenious_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Purchase Of Newsprint Imported Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('purchase_of_newsprint_imported_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 3') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_3', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Branches Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Branches Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Branches Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Branches Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_branches_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 4') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_4', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 1 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 1 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 1 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 1 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_1_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 5') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_5', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 2 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 2 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 2 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 2 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_2_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 6') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_6', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 3 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 3 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 3 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 3 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_3_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 7') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_7', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 4 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 4 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 4 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 4 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_4_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 8') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_8', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 5 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 5 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 5 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 5 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_5_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 9') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_9', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 6 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 6 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 6 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 6 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_6_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 7 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 7 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 7 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 7 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_7_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 11') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_11', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 8 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 8 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 8 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 8 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_8_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 12') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_12', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 9 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 9 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 9 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 9 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_9_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 13') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_13', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 10 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 10 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 10 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra 10 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_10_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 14') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_14', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Received Back During The Period Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('Loans_received_back_during_the_period_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 15') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_15', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Obtained If Any During Period Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_obtained_if_any_during_period_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 16') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_16', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 1 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 1 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 1 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 1 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_1_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 17') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_17', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 2 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 2 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 2 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 2 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_2_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 18') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_18', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 3 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 3 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 3 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 3 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_3_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 19') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_19', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 4 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 4 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 4 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 4 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_4_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 5 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 5 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 5 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 5 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_5_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 21') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_21', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 6 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 6 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 6 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 6 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_6_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 22') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_22', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 7 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 7 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 7 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 7 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_7_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 23') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_23', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 8 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 8 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 8 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 8 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_8_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 24') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_24', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 9 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 9 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 9 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 9 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_9_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 25') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_25', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 10 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 10 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 10 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra L 10 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_l_10_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 26') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_26', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Consumption During The Period Including Wastage Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('consumption_during_the_period_including_wastage_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 27') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_27', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Given If Any To Other Unit Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_given_if_any_to_other_unit_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 28') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_28', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Returned To Other Publishers Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_returned_to_other publishers_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 29') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_29', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Units Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_units_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 30') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_30', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Consumption Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Consumption Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Consumption Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Other Consumption Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('other_consumption_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 31') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_31', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 1 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 1 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 1 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 1 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_1_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 32') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_32', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 2 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 2 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 2 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 2 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_2_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 33') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_33', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 3 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 3 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 3 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 3 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_3_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 34') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_34', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 4 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 4 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 4 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 4 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_4_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 35') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_35', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 5 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 5 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 5 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 5 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_5_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 36') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_36', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 6 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 6 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 6 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 6 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_6_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 37') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_37', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 7 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 7 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 7 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 7 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_7_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 38') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_38', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 8 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 8 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 8 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 8 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_8_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 39') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_39', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 9 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 9 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 9 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 9 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_9_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 40') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_40', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 10 Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 10 Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 10 Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Extra C 10 Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('extra_c_10_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 41') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_41', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Closing Stock As On Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Closing Stock As On Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Closing Stock As On Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Closing Stock As On Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('closing_stock_as_on_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 42') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_42', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers As On Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_as_on_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Due From Other Publishers Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_due_from_other_publishers_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 43') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_43', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Reels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_reels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Weight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_weight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Reams') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_reams', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Loans Outstanding To Other Publishers Rweight') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('loans_outstanding_to_other_publishers_rweight', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks 44') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks_44', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___d('alaxos', 'copy', true)); ?> 		</td>
 	</tr>
	</table>

</div>
