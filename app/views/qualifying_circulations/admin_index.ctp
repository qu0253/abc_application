<?php if (isset($qualifyingCirculations) && is_array($qualifyingCirculations) && count($qualifyingCirculations) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($qualifyingCirculations, 'Qualifying Circulations List');
    exit;
}
?><div class="qualifyingCirculations index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('qualifying circulations');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => false, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('QualifyingCirculation', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Id', true), 'QualifyingCirculation.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Center Name', true), 'PrintingCenter.printing_center_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Regular Period Name', true), 'RegularPeriod.regular_period_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Recheck Auditor Branch Name', true), 'AuditorBranch.auditor_branch_name');?></th>
		<?php /*
                <th><?php echo $this->Paginator->sort(__('Month', true), 'QualifyingCirculation.month');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Copy', true), 'QualifyingCirculation.single_copy');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Copy', true), 'QualifyingCirculation.combo_copy');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Month 1', true), 'QualifyingCirculation.total_month_1');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pub Days Month 1', true), 'QualifyingCirculation.no_of_pub_days_month_1');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row0', true), 'QualifyingCirculation.total_row0');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Month 2', true), 'QualifyingCirculation.total_month_2');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pub Days Month 2', true), 'QualifyingCirculation.no_of_pub_days_month_2');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row1', true), 'QualifyingCirculation.total_row1');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Month 3', true), 'QualifyingCirculation.total_month_3');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pub Days Month 3', true), 'QualifyingCirculation.no_of_pub_days_month_3');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row2', true), 'QualifyingCirculation.total_row2');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Month 4', true), 'QualifyingCirculation.total_month_4');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pub Days Month 4', true), 'QualifyingCirculation.no_of_pub_days_month_4');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row3', true), 'QualifyingCirculation.total_row3');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Month 5', true), 'QualifyingCirculation.total_month_5');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pub Days Month 5', true), 'QualifyingCirculation.no_of_pub_days_month_5');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row4', true), 'QualifyingCirculation.total_row4');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Month 6', true), 'QualifyingCirculation.total_month_6');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pub Days Month 6', true), 'QualifyingCirculation.no_of_pub_days_month_6');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row5', true), 'QualifyingCirculation.total_row5');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Monthly Qualifying Circulation', true), 'QualifyingCirculation.total_monthly_qualifying_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Number Of Publishing Days', true), 'QualifyingCirculation.total_number_of_publishing_days');?></th>
		<th><?php echo $this->Paginator->sort(__('Ft Average Monthly Qualifying Circulation', true), 'QualifyingCirculation.ft_average_monthly_qualifying_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Nnr 10', true), 'QualifyingCirculation.single_nnr_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Nnr 10', true), 'QualifyingCirculation.combo_nnr_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Nnr 10', true), 'QualifyingCirculation.instn_nnr_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row45', true), 'QualifyingCirculation.total_row45');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Nnr 20', true), 'QualifyingCirculation.single_nnr_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Nnr 20', true), 'QualifyingCirculation.combo_nnr_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Nnr 20', true), 'QualifyingCirculation.instn_nnr_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row48', true), 'QualifyingCirculation.total_row48');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Nnr 100', true), 'QualifyingCirculation.single_nnr_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Nnr 100', true), 'QualifyingCirculation.combo_nnr_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Nnr 100', true), 'QualifyingCirculation.instn_nnr_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row51', true), 'QualifyingCirculation.total_row51');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Nnr Below Nnr Within Qualifying', true), 'QualifyingCirculation.single_nnr_below_nnr_within_qualifying');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Nnr Below Nnr Within Qualifying', true), 'QualifyingCirculation.combo_nnr_below_nnr_within_qualifying');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Nnr Below Nnr Within Qualifying', true), 'QualifyingCirculation.instn_nnr_below_nnr_within_qualifying');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row54', true), 'QualifyingCirculation.total_row54');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Single Nnr', true), 'QualifyingCirculation.total_single_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Combo Nnr', true), 'QualifyingCirculation.total_combo_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Average Monthly Qualifying Circulation Nnr', true), 'QualifyingCirculation.total_average_monthly_qualifying_circulation_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Single Nil', true), 'QualifyingCirculation.nss_incentive_single_nil');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Combo Nil', true), 'QualifyingCirculation.nss_incentive_combo_nil');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Instn Nil', true), 'QualifyingCirculation.nss_incentive_instn_nil');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row57', true), 'QualifyingCirculation.total_row57');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Single 50', true), 'QualifyingCirculation.nss_incentive_single_50');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Combo 50', true), 'QualifyingCirculation.nss_incentive_combo_50');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Instn 50', true), 'QualifyingCirculation.nss_incentive_instn_50');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row60', true), 'QualifyingCirculation.total_row60');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Single 100', true), 'QualifyingCirculation.nss_incentive_single_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Combo 100', true), 'QualifyingCirculation.nss_incentive_combo_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Nss Incentive Instn 100', true), 'QualifyingCirculation.nss_incentive_instn_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Nss Incentive Single', true), 'QualifyingCirculation.total_nss_incentive_single');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Nss Incentive Combo', true), 'QualifyingCirculation.total_nss_incentive_combo');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Nss Incentive Instn', true), 'QualifyingCirculation.total_nss_incentive_instn');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row61', true), 'QualifyingCirculation.total_row61');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Nss Incentive Average Monthly Qualifying Circulation', true), 'QualifyingCirculation.total_nss_incentive_average_monthly_qualifying_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Airlines', true), 'QualifyingCirculation.instn_airlines');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row63', true), 'QualifyingCirculation.total_row63');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Body Corporates', true), 'QualifyingCirculation.instn_body_corporates');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row66', true), 'QualifyingCirculation.total_row66');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Edu Inst', true), 'QualifyingCirculation.instn_edu_inst');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row67', true), 'QualifyingCirculation.total_row67');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Hotels', true), 'QualifyingCirculation.instn_hotels');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row68', true), 'QualifyingCirculation.total_row68');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Libraries', true), 'QualifyingCirculation.instn_libraries');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row69', true), 'QualifyingCirculation.total_row69');?></th>
		<th><?php echo $this->Paginator->sort(__('Instn Others', true), 'QualifyingCirculation.instn_others');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row75', true), 'QualifyingCirculation.total_row75');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Corporates Instn', true), 'QualifyingCirculation.total_corporates_instn');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Corporates Average Monthly Qualifying Circulation', true), 'QualifyingCirculation.total_corporates_average_monthly_qualifying_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Single General', true), 'QualifyingCirculation.ss_cat_single_general');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Joint General', true), 'QualifyingCirculation.ss_cat_joint_general');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Institutional General', true), 'QualifyingCirculation.ss_cat_institutional_general');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row111', true), 'QualifyingCirculation.total_row111');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Single School', true), 'QualifyingCirculation.ss_cat_single_school');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Joint School', true), 'QualifyingCirculation.ss_cat_joint_school');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Institutional School', true), 'QualifyingCirculation.ss_cat_institutional_school');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row114', true), 'QualifyingCirculation.total_row114');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Single Institutional', true), 'QualifyingCirculation.ss_cat_single_institutional');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Joint Institutional', true), 'QualifyingCirculation.ss_cat_joint_institutional');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Institutional Institutional', true), 'QualifyingCirculation.ss_cat_institutional_institutional');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row117', true), 'QualifyingCirculation.total_row117');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Single Others', true), 'QualifyingCirculation.ss_cat_single_others');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Joint Others', true), 'QualifyingCirculation.ss_cat_joint_others');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Cat Institutional Others', true), 'QualifyingCirculation.ss_cat_institutional_others');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row120', true), 'QualifyingCirculation.total_row120');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Cat Single', true), 'QualifyingCirculation.total_ss_cat_single');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Cat Joint', true), 'QualifyingCirculation.total_ss_cat_joint');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Cat Institutional', true), 'QualifyingCirculation.total_ss_cat_institutional');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Cat Average Monthly Qualifying Circulation', true), 'QualifyingCirculation.total_ss_cat_average_monthly_qualifying_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Single Nil', true), 'QualifyingCirculation.ss_incentive_single_nil');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Joint Nil', true), 'QualifyingCirculation.ss_incentive_joint_nil');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Institutional Nil', true), 'QualifyingCirculation.ss_incentive_institutional_nil');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row123', true), 'QualifyingCirculation.total_row123');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Single 50', true), 'QualifyingCirculation.ss_incentive_single_50');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Joint 50', true), 'QualifyingCirculation.ss_incentive_joint_50');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Institutional 50', true), 'QualifyingCirculation.ss_incentive_institutional_50');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row126', true), 'QualifyingCirculation.total_row126');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Single 90', true), 'QualifyingCirculation.ss_incentive_single_90');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Joint 90', true), 'QualifyingCirculation.ss_incentive_joint_90');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Incentive Institutional 90', true), 'QualifyingCirculation.ss_incentive_institutional_90');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Row129', true), 'QualifyingCirculation.total_row129');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Incentive Single', true), 'QualifyingCirculation.total_ss_incentive_single');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Incentive Joint', true), 'QualifyingCirculation.total_ss_incentive_joint');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Incentive Institutional', true), 'QualifyingCirculation.total_ss_incentive_institutional');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Incentive Average Monthly Qualifying Circulation', true), 'QualifyingCirculation.total_ss_incentive_average_monthly_qualifying_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Sa Single Copy Sales', true), 'QualifyingCirculation.ss_sa_single_copy_sales');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Sa Combo Sales Copies', true), 'QualifyingCirculation.ss_sa_combo_sales_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Sa Single Copy Subscription', true), 'QualifyingCirculation.ss_sa_single_copy_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Sa Joint Subscription Copies', true), 'QualifyingCirculation.ss_sa_joint_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Sa Institutional Subscription Copies', true), 'QualifyingCirculation.ss_sa_institutional_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Ss Sa Institutional Sale Copies', true), 'QualifyingCirculation.ss_sa_institutional_sale_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Ss Sa Average Monthly Qualifying Circulation 1', true), 'QualifyingCirculation.total_ss_sa_average_monthly_qualifying_circulation_1');?></th>                  
                 */
                ?>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Status Name', true), 'QualifyingCirculationStatus.qualifying_circulation_status_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'QualifyingCirculation.active');?></th>
		
		<th class="actions_100">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printing_center_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('regular_period_id');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('auditor_branch_id');
			?>
		</td>
		<?php
                /*                
                <td>
			<?php
				echo $this->AlaxosForm->filter_field('month');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_copy');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_copy');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_month_1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pub_days_month_1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row0');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_month_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pub_days_month_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_month_3');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pub_days_month_3');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_month_4');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pub_days_month_4');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row3');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_month_5');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pub_days_month_5');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row4');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_month_6');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pub_days_month_6');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row5');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_monthly_qualifying_circulation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_number_of_publishing_days');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ft_average_monthly_qualifying_circulation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_nnr_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row45');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_nnr_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row48');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_nnr_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row51');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_below_nnr_within_qualifying');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_below_nnr_within_qualifying');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_nnr_below_nnr_within_qualifying');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row54');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_single_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_combo_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_average_monthly_qualifying_circulation_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_single_nil');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_combo_nil');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_instn_nil');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row57');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_single_50');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_combo_50');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_instn_50');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row60');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_single_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_combo_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_instn_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_nss_incentive_single');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_nss_incentive_combo');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_nss_incentive_instn');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row61');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_nss_incentive_average_monthly_qualifying_circulation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_airlines');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row63');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_body_corporates');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row66');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_edu_inst');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row67');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_hotels');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row68');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_libraries');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row69');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_others');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row75');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_corporates_instn');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_corporates_average_monthly_qualifying_circulation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_single_general');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_joint_general');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_institutional_general');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row111');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_single_school');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_joint_school');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_institutional_school');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row114');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_single_institutional');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_joint_institutional');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_institutional_institutional');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row117');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_single_others');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_joint_others');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_cat_institutional_others');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row120');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_cat_single');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_cat_joint');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_cat_institutional');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_cat_average_monthly_qualifying_circulation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_single_nil');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_joint_nil');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_institutional_nil');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row123');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_single_50');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_joint_50');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_institutional_50');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row126');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_single_90');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_joint_90');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_incentive_institutional_90');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_row129');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_incentive_single');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_incentive_joint');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_incentive_institutional');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_incentive_average_monthly_qualifying_circulation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_single_copy_sales');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_combo_sales_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_single_copy_subscription');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_joint_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_institutional_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_institutional_sale_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_sa_average_monthly_qualifying_circulation_1');
			?>
		</td>
                */
                ?>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_status_id');
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
			echo $this->AlaxosForm->create('QualifyingCirculation', array('id' => 'chooseActionForm', 'url' => array('controller' => 'qualifyingCirculations', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($qualifyingCirculations as $qualifyingCirculation):
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
			<?php echo $qualifyingCirculation['QualifyingCirculation']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($printingCenters[$qualifyingCirculation['PrintingCenter']['id']], array('controller' => 'printing_centers', 'action' => 'view', $qualifyingCirculation['PrintingCenter']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($qualifyingCirculation['RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $qualifyingCirculation['RegularPeriod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($qualifyingCirculation['RecheckAuditorBranch']['auditor_branch_name'], array('controller' => 'auditor_branches', 'action' => 'view', $qualifyingCirculation['RecheckAuditorBranch']['id'])); ?>
		</td>
                <?php
                /*
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['month']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_copy']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_copy']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_1']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_1']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row0']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_2']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_2']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row1']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_3']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_3']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row2']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_4']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_4']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row3']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_5']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_5']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row4']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_6']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_6']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row5']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_number_of_publishing_days']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ft_average_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_10']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_10']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_10']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row45']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_20']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_20']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_20']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row48']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_100']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_100']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_100']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row51']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_below_nnr_within_qualifying']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_below_nnr_within_qualifying']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_below_nnr_within_qualifying']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row54']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_single_nnr']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_combo_nnr']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_average_monthly_qualifying_circulation_nnr']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_nil']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_nil']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_nil']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row57']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_50']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_50']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_50']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row60']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_100']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_100']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_100']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_single']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_combo']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_instn']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row61']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_average_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_airlines']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row63']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_body_corporates']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row66']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_edu_inst']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row67']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_hotels']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row68']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_libraries']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row69']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_others']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row75']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_corporates_instn']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_corporates_average_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_general']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_general']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_general']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row111']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_school']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_school']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_school']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row114']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_institutional']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_institutional']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_institutional']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row117']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_others']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_others']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_others']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row120']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_cat_single']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_cat_joint']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_cat_institutional']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_cat_average_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_nil']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_nil']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_nil']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row123']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_50']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_50']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_50']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row126']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_90']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_90']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_90']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_row129']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_single']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_joint']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_institutional']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_average_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_sa_average_monthly_qualifying_circulation_1']; ?>
		</td>
                */
                ?>
                <td>
			<?php echo $this->Html->link($qualifyingCirculation['QualifyingCirculationStatus']['qualifying_circulation_status_name'], array('controller' => 'qualifying_circulation_statuses', 'action' => 'view', $qualifyingCirculation['QualifyingCirculationStatus']['id'])); ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($qualifyingCirculation['QualifyingCirculation']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $qualifyingCirculation['QualifyingCirculation']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link('Login', array('action' => 'login_to_edit', $qualifyingCirculation['QualifyingCirculation']['id'], 'users', 'logout'), array('class' => 'to_detail', 'escape' => false, 'title' => 'Login')); ?>
                        <?php echo $this->Html->link('Generate Outgoing', array('controller' => 'outgoing_certificates', 'action' => 'generate', $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php
                        /*
                        <?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $qualifyingCirculation['QualifyingCirculation']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $qualifyingCirculation['QualifyingCirculation']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $qualifyingCirculation['QualifyingCirculation']['id'])); ?>
                        */
                        ?>
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
if($i > 0 && 1 && 0)
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
	echo $this->AlaxosForm->create('QualifyingCirculation', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
