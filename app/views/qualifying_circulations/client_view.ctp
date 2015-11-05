<div class="qualifyingCirculations view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('qualifying circulation');?><?php echo !empty($qualifyingCirculation['QualifyingCirculation']['id']) ? ' - ' . $qualifyingCirculation['QualifyingCirculation']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos',
                'additional_buttons' => array(
                __('Add Cover Price', true) => $this->Html->link(__('Add Cover Price', true), array('action' => 'add', 'controller' => 'cover_prices', 'client' => true), array('class' => 'sub_form', 'escape' => false, 'title' => __('Add Cover Price', true))),
                __('List Cover Price', true) => $this->Html->link(__('List Cover Price', true), array('action' => 'index', 'controller' => 'cover_prices', 'client' => true), array('class' => 'sub_form', 'escape' => false, 'title' => __('List Cover Price', true))),
                __('Add Trade Terms', true) => $this->Html->link(__('Add Trade Terms', true), array('action' => 'add', 'controller' => 'trade_terms', 'client' => true), array('class' => 'sub_form', 'escape' => false, 'title' => __('Add Trade Terms', true))),
                __('List Trade Terms', true) => $this->Html->link(__('List Trade Terms', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true), array('class' => 'sub_form', 'escape' => false, 'title' => __('List Trade Terms', true))),
                ))); 
	?>

	<table border="0" class="view">
	<tr class="display_none">
		<td>
			<?php ___('Qualifying Circulation Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Center Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['PrintingCenter']['id']; //$this->Html->link($qualifyingCirculation['PrintingCenter']['id'], array('controller' => 'printing_centers', 'action' => 'view', $qualifyingCirculation['PrintingCenter']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Regular Period Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['RegularPeriod']['regular_period_name']; //$this->Html->link($qualifyingCirculation['RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $qualifyingCirculation['RegularPeriod']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Month 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pub Days Month 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Month 2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pub Days Month 2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Month 3'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_3']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pub Days Month 3'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_3']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Month 4'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_4']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pub Days Month 4'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_4']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Month 5'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_5']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pub Days Month 5'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_5']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Month 6'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['total_month_6']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Pub Days Month 6'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_6']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Nnr 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Nnr 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Nnr 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Nnr 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Nnr 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Nnr 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Nnr 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Nnr 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Nnr 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Nnr Below Nnr Within Qualifying'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_nnr_below_nnr_within_qualifying']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Nnr Below Nnr Within Qualifying'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_nnr_below_nnr_within_qualifying']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Nnr Below Nnr Within Qualifying'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_nnr_below_nnr_within_qualifying']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nss Incentive Single Nil'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_nil']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nss Incentive Combo Nil'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_nil']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nss Incentive Instn Nil'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_nil']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nss Incentive Single 50'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_50']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nss Incentive Combo 50'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_50']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nss Incentive Instn 50'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_50']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Airlines'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_airlines']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Airlines'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_airlines']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Airlines'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_airlines']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Body Corporates'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_body_corporates']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Body Corporates'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_body_corporates']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Body Corporates'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_body_corporates']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Hotels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_hotels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Hotels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_hotels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Hotels'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_hotels']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Libraries'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_libraries']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Libraries'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_libraries']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Libraries'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_libraries']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Others'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['single_others']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Others'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_others']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Instn Others'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['instn_others']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Single General'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_general']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Joint General'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_general']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Institutional General'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_general']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Single School'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_school']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Joint School'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_school']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Institutional School'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_school']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Single Institutional'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_institutional']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Joint Institutional'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_institutional']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Institutional Institutional'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_institutional']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Single Others'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_single_others']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Joint Others'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_others']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Cat Institutional Others'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_others']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Single Nil'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_nil']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Joint Nil'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_nil']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Institutional Nil'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_nil']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Single 50'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_50']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Joint 50'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_50']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Institutional 50'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_50']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Single 90'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_90']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Joint 90'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_90']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Incentive Institutional 90'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_90']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Sa Single Copy Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Sa Combo Sales Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Sa Single Copy Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Sa Joint Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Sa Institutional Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Ss Sa Institutional Sale Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies']; ?>
		</td>
	</tr>
	</table>
</div>
