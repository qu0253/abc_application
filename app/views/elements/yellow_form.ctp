<h2><?php echo __('INCOMING CERTIFICATE', true) . ' - ' . $regularPeriodName; ?></h2>
<table width="100%" border="3" cellspacing="0" cellpadding="5">
	<tr>
		<td width="33%">
			<table class="dashboardTable">
				<tr>
					<td class="ic-heading-left">
							<?php ___('Publication'); ?>
					</td>
					<td>:</td>
					<td><?php echo $this->Session->read('Auth.Publication.publication_name'); ?></td>
				</tr>
				<tr>
						<td class="ic-heading-left">
								<?php ___('Edition'); ?>
						</td>
						<td>:</td>
						<td>
								<?php echo $this->Session->read('Auth.Edition.city_name'); ?>
						</td>
				</tr>
                                <?php
                                $RniDetail = $this->Session->read('Auth.RniDetail');
                                if($RniDetail[0]['rni_number'])  { ?>
                                <tr>
                                        <td class="ic-heading-left">
                                                <?php ___('Rni Number'); ?>
                                        </td>
                                        <td>:</td>
                                        <td>
                                                <?php echo $RniDetail[0]['rni_number']; ?>
                                        </td>
                                </tr>
                                <?php } ?>
				<tr>
						<td class="ic-heading-left">
								<?php ___('Printing Center'); ?>
						</td>
						<td>:</td>
						<td>
								<?php echo $city_name;  ?>
						</td>
				</tr>
				<tr>
						<td class="ic-heading-left">
								<?php ___('Name and Address of Auditor'); ?>
						</td>
						<td>:</td>
						<td>
                                                                <?php echo @$printing_Center_auditor_branches[0]['AuditorBranch']['AuditorFirm']['auditor_firm_name'] . ' ' . $printing_Center_auditor_branches[0]['AuditorBranch']['auditor_branch_name'];  ?>
						</td>
				</tr>
				<tr>
						<td colspan="3">                    
						</td>
				</tr>
				<?php
				if (!empty($qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation'])) {
					?>
				<tr>
						<td>
								<?php ___('Total of average qualifying circulation'); ?>
						</td>
						<td>:</td>
						<td>
								<?php echo $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']; ?>
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
				<tr>
						<td>
								<?php ___('Total qualifying sales summary'); ?>
						</td>
						<td>:</td>
						<td>
								<?php echo $qualifyingCirculation['QualifyingCirculation']['total_ss_sa_average_monthly_qualifying_circulation_1']; ?>
						</td>
				</tr>
				<?php
				}
				?>
			</table>
		</td>
                <?php
                if ($regularPeriodId > 0) {
    $clear_all_steps = 1;
    $subscriptionTypeIds = Set::extract('/TradeTerm/subscription_type_id', $qualifyingCirculation);
    $saleTypeIds = Set::extract('/TradeTerm/sale_type_id', $qualifyingCirculation);
    $tradeTermsCopiesSold11 = array_sum(Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=1]/copies_sold', $qualifyingCirculation));
    $tradeTermsCopiesSold12 = array_sum(Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=2]/copies_sold', $qualifyingCirculation));
    $tradeTermsCopiesSold13 = array_sum(Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=3]/copies_sold', $qualifyingCirculation));
    $tradeTermsCopiesSold21 = array_sum(Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=1]/copies_sold', $qualifyingCirculation));
    $tradeTermsCopiesSold22 = array_sum(Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=2]/copies_sold', $qualifyingCirculation));
    $tradeTermsCopiesSold23 = array_sum(Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=3]/copies_sold', $qualifyingCirculation));
    
    $comboDetails12 = array_sum(Set::extract('/Combo/combo', $qualifyingCirculation));
    $subscriptionSchemes1 = array_sum(Set::extract('/SubscriptionScheme[sale_type_id=1]/no_of_copies', $qualifyingCirculation));
    $subscriptionSchemes2 = array_sum(Set::extract('/SubscriptionScheme[sale_type_id=2]/no_of_copies', $qualifyingCirculation));
    $subscriptionSchemes3 = array_sum(Set::extract('/SubscriptionScheme[sale_type_id=3]/no_of_copies', $qualifyingCirculation));
    $nonQualifyingCirculationIds = Set::extract('/NonQualifyingCirculation/id', $qualifyingCirculation);
    $weekdaysSundayIds = Set::extract('/WeekdaysSunday/id', $qualifyingCirculation);
    $statementANewsprintIds = Set::extract('/StatementANewsprint/id', $qualifyingCirculation);
    $statementBNewsprintIds = Set::extract('/StatementBNewsprint/id', $qualifyingCirculation);
    $duplicateCopiesIds = Set::extract('/DuplicateCopy/id', $qualifyingCirculation);
    $wasteRateIds = Set::extract('/WasteRate/id', $qualifyingCirculation);

    $arrTotalWeekdayCopies = Set::extract('/WhiteForm/circulation', $qualifyingCirculation);
    $arrTotalSundayCopies = Set::extract('/WhiteForm/sunday', $qualifyingCirculation);
    $whiteFormTotalCopies = array_sum($arrTotalWeekdayCopies) + array_sum($arrTotalSundayCopies);
    
    $coverPriceTotalCopies = Set::extract('/CoverPrice/total_copies', $qualifyingCirculation);
    $comboTotalCopies = array_sum(Set::extract('/Combo/combo', $qualifyingCirculation));
    ?>
                <?php
    if (!empty($qualifyingCirculation['QualifyingCirculation'])) {
        $tempArr = Set::extract('/PrintingCenter[' . $this->Session->read('PrintingCenter.id') . ']', $this->Session->read('Auth'));
        $tempArr = Set::extract('/PrintingCenter/PrintedAt/city_name', $tempArr);
        if (!empty($tempArr)) {
            $city_name = $tempArr[0];
        }
?>
		
			<?php
				}
                                ?>
                <td width="33%">
                <?php
			if (empty($qualifyingCirculation['QualifyingCirculation']['qualifying_circulation_status_id'])) {
			?>
			<ul class="pending">  
				<li class="span_register"><label><b><?php echo __('Pending List', true); ?></b></label></li>
					<?php if (empty($qualifyingCirculation['QualifyingCirculation']['id'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Qualifying Circulations', true), array('action' => 'add', 'controller' => 'qualifying_circulations', 'client' => true, 'sub_div_view100' => 'regular_period-' . $regularPeriodId, 'sub_div_view101' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('class' => 'dashboard_links', 'escape' => false, 'title' => __('Add Qualifying Circulations', true))); ?></li>
					<?php } ?>        
					<ul class="pending">
						<?php
						if (!empty($qualifyingCirculation['QualifyingCirculation']) && !($tradeTermsCopiesSold11 == $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales'] && $tradeTermsCopiesSold12 == $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies'] &&  $tradeTermsCopiesSold13 == $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies'])) {
						?>
						<li><b>Non Subscription Sales</b></li>
						<?php
						}
						if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $tradeTermsCopiesSold11 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales']) {
							$clear_all_steps = 0;
							echo $this->Support->nssTradeTermsforSingle($qualifyingCirculation);
						?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Trade Terms for Single', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 1, 'sub_div_view102' => 'sale_type-' . 1), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Single', true))); ?></li>
						<?php }
						if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $tradeTermsCopiesSold12 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']) {
							$clear_all_steps = 0;
							echo $this->Support->nssTradeTermsforCombo($qualifyingCirculation);
						?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Trade Terms for Combo', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 1, 'sub_div_view102' => 'sale_type-' . 2), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Combo', true))); ?></li>
                                                <?php }
                                                if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $tradeTermsCopiesSold13 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies']) {
							$clear_all_steps = 0;
							echo $this->Support->nssTradeTermsforInstn($qualifyingCirculation);
						?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Trade Terms for Institutional', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 1, 'sub_div_view102' => 'sale_type-' . 3), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Institutional', true))); ?></li>
						<?php } ?>
						<?php
						if (!empty($qualifyingCirculation['QualifyingCirculation']) && !($tradeTermsCopiesSold21 == $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription'] && $tradeTermsCopiesSold22 == $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies'] && $tradeTermsCopiesSold23 == $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies'])) {
						?>
						<li><b>Subscription Sales</b></li>
						<?php
						}
						if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $tradeTermsCopiesSold21 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']) {
							$clear_all_steps = 0;
							echo $this->Support->ssTradeTermsforSingle($qualifyingCirculation);
						?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Trade Terms for Single', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 2, 'sub_div_view102' => 'sale_type-' . 1), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Single', true))); ?></li>
						<?php }
						if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $tradeTermsCopiesSold22 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']) {
							$clear_all_steps = 0;
							echo $this->Support->ssTradeTermsforCombo($qualifyingCirculation);
						?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Trade Terms for Combo', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 2, 'sub_div_view102' => 'sale_type-' . 2), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Combo', true))); ?></li>
						<?php }
						if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $tradeTermsCopiesSold23 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']) {
							$clear_all_steps = 0;
							echo $this->Support->ssTradeTermsforInstn($qualifyingCirculation);
						?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Trade Terms for Institutional', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 2, 'sub_div_view102' => 'sale_type-' . 3), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Institutional', true))); ?></li>
						<?php } ?>            
					</ul>
					<?php 
					if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $comboDetails12 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']) {
						$clear_all_steps = 0;
						echo $this->Support->comboDetails($qualifyingCirculation);
					?>
						<li class="span_register"><?php echo $this->Html->link(__('Add Combo Along Details', true), array('action' => 'index', 'controller' => 'combos', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Combo Along Details', true))); ?></li>
					<?php } ?>
					<?php
					$publication_type_id = $this->Session->read('Auth.Membership.publication_type_id');
					if ($this->Support->isNewspaper($publication_type_id) && !empty($qualifyingCirculation['QualifyingCirculation']['id']) && array_sum($coverPriceTotalCopies) != $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']) { 
						$clear_all_steps = 0;
						echo $this->Support->coverPriceLabel($qualifyingCirculation);
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Cover Prices for Qualifying Circulations', true), array('action' => 'index', 'controller' => 'cover_prices', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Cover Prices for Qualifying Circulations', true))); ?></li>
					<?php } ?>
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['NonQualifyingCirculation'])) { ?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Non Qualifying Circulations', true), array('action' => 'add', 'controller' => 'non_qualifying_circulations', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Non Qualifying Circulations', true))); ?></li>
					<?php }
					if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $subscriptionSchemes1 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']) {
						$clear_all_steps = 0;
						echo $this->Support->subscriptionSchemes1($qualifyingCirculation);
					?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Single Subscription Scheme', true), array('action' => 'index', 'controller' => 'subscription_schemes', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'sale_type-1'), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Single Subscription Scheme', true))); ?></li>
					<?php } 
					if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $subscriptionSchemes2 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']) {
						$clear_all_steps = 0;
						echo $this->Support->subscriptionSchemes2($qualifyingCirculation);
					?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Joint Subscription Scheme', true), array('action' => 'index', 'controller' => 'subscription_schemes', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'sale_type-2'), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Joint Subscription Scheme', true))); ?></li>
					<?php }
					if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && $subscriptionSchemes3 != $qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']) {
						$clear_all_steps = 0;
						echo $this->Support->subscriptionSchemes3($qualifyingCirculation);
					?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Institutional Subscription Scheme', true), array('action' => 'index', 'controller' => 'subscription_schemes', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'sale_type-3'), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Institutional Subscription Scheme', true))); ?></li>
					<?php } ?>
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['NrrCalculation'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add NRR Calculation', true), array('action' => 'index', 'controller' => 'nrr_calculations', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add NRR Calculation', true))); ?></li>
					<?php } ?>
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['StatementANewsprint'])) { 
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Statement A Newsprint', true), array('action' => 'add', 'controller' => 'statement_a_newsprints', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Statement A Newsprint', true))); ?></li>
					<?php } ?>
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['StatementBNewsprint'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Statement B Newsprint', true), array('action' => 'index', 'controller' => 'statement_b_newsprints', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Statement B Newsprint', true))); ?></li>
					<?php } ?>        
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['DistributionCenter'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Distribution Center', true), array('action' => 'index', 'controller' => 'distribution_centers', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Distribution Centers', true))); ?></li>
					<?php } ?>    
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['PrintingPress'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Printing Press', true), array('action' => 'add', 'controller' => 'printing_presses', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Printing Press', true))); ?></li>
					<?php } ?>            
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['DuplicateCopy'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Duplicate Copy Request', true), array('action' => 'add', 'controller' => 'duplicate_copies', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Duplicate Copy Request', true))); ?></li>
					<?php } ?>
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['WasteRate'])) {
						$clear_all_steps = 0;
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Waste Rate', true), array('action' => 'add', 'controller' => 'waste_rates', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Waste Rate', true))); ?></li>
					<?php }
					?>
					<?php if (strtolower($this->Session->read('Auth.FrequencyType.frequency_type_name')) == 'daily' && !empty($qualifyingCirculation['QualifyingCirculation']['id']) && empty($qualifyingCirculation['WeekdaysSunday'])) {
                                                if($this->Support->whiteFormSundayCalc($qualifyingCirculation)) {
                                                    $clear_all_steps = 0;
                                                }
						?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Weekdays Sunday', true), array('action' => 'add', 'controller' => 'weekdays_sundays', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Weekdays Sunday', true))); ?></li>
					<?php } ?>
					<?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && ($whiteFormTotalCopies != $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation'] || $this->Support->weekdaySundayCalc($qualifyingCirculation) != $this->Support->whiteFormSundayCalc($qualifyingCirculation))) {
						$clear_all_steps = 0;
						echo $this->Support->whiteFormLabel($qualifyingCirculation);
					?>
					<li class="span_register"><?php echo $this->Html->link(__('Add Distribution Statement Details', true), array('action' => 'index', 'controller' => 'white_forms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add White Form Details', true))); ?></li>
					<?php } ?>
			</ul>
		</td>

		

<?php
}
?>
<td width="33%">
<?php
if (empty($qualifyingCirculation['QualifyingCirculation']['qualifying_circulation_status_id']) && !(empty($qualifyingCirculation['QualifyingCirculation']['id']))) {
?>
<ul class="completed">  
    <li class="span_register"><label><b><?php echo __('Completed List', true); ?></b></label></li>
	<li class="span_register">&nbsp;</li>
    <li class="span_register">
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Edit Qualifying Circulations', true), array('action' => 'edit', 'controller' => 'qualifying_circulations', 'client' => true, $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links', 'escape' => false, 'title' => __('Edit Qualifying Circulations', true))); ?></li>
        <?php }?>     

        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && in_array(1, $subscriptionTypeIds)) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Trade Terms for Non Subscription Sales', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 1), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Trade Terms for Non Subscription Sales', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && in_array(2, $subscriptionTypeIds)) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Trade Terms for Subscription Sales', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id'], 'sub_div_view101' => 'subscription_type-' . 2), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Trade Terms for Subscription Sales', true))); ?></li>
        <?php }
        if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['Combo'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Combo details for Qualifying Circulations', true), array('action' => 'index', 'controller' => 'combos', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Combo details for Qualifying Circulations', true))); ?></li>
        <?php }
        if ($this->Support->isNewspaper($publication_type_id) && !empty($qualifyingCirculation['QualifyingCirculation']['id']) && array_sum($coverPriceTotalCopies) == $qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Cover Prices for Qualifying Circulations', true), array('action' => 'index', 'controller' => 'cover_prices', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Cover Prices for Qualifying Circulations', true))); ?></li>
        <?php } ?>              
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['NonQualifyingCirculation'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Edit Non Qualifying Circulations', true), array('action' => 'edit', 'controller' => 'non_qualifying_circulations', 'client' => true, $nonQualifyingCirculationIds[0], 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Edit Non Qualifying Circulations', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['SubscriptionScheme'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Subscription Scheme', true), array('action' => 'index', 'controller' => 'subscription_schemes', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Subscription Scheme', true))); ?></li>
        <?php } ?>          
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['NrrCalculation'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('NRR Calculation', true), array('action' => 'index', 'controller' => 'nrr_calculations', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('NRR Calculation', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['StatementANewsprint'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Edit Statement A Newsprint', true), array('action' => 'edit', 'controller' => 'statement_a_newsprints', 'client' => true, $statementANewsprintIds[0], 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Edit Statement A Newsprint', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['StatementBNewsprint'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('List Statement B Newsprint', true), array('action' => 'index', 'controller' => 'statement_b_newsprints', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Statement B Newsprint', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['DistributionCenter'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Distribution Center', true), array('action' => 'index', 'controller' => 'distribution_centers', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Distribution Centers', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['PrintingPress'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Printing Press', true), array('action' => 'index', 'controller' => 'printing_presses', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Printing Press', true))); ?></li>
        <?php } ?> 
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['DuplicateCopy'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Edit Duplicate Copy Request', true), array('action' => 'edit', 'controller' => 'duplicate_copies', 'client' => true, $duplicateCopiesIds[0], 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Edit Duplicate Copy Request', true))); ?></li>
        <?php }
        ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['WasteRate'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Edit Waste Rate', true), array('action' => 'edit', 'controller' => 'waste_rates', 'client' => true, $wasteRateIds[0], 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Edit Waste Rate', true))); ?></li>
        <?php }
        ?>
        <?php if (strtolower($this->Session->read('Auth.FrequencyType.frequency_type_name')) == 'daily' && !empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['WeekdaysSunday'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Edit Weekdays Sunday', true), array('action' => 'edit', 'controller' => 'weekdays_sundays', 'client' => true, $weekdaysSundayIds[0], 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Edit Weekdays Sunday', true))); ?></li>
        <?php } ?>
        <?php if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['WhiteForm'])) { ?>
        <li class="span_register"><?php echo $this->Html->link(__('Distribution Statement Details', true), array('action' => 'index', 'controller' => 'white_forms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('White Form Details', true))); ?></li>
        <?php } ?>
        
    
</ul>
<?php
}
?>
<ul class="completed">
    <?php
        if (isset($clear_all_steps) && $clear_all_steps == 1 && (empty($qualifyingCirculation['QualifyingCirculation']['qualifying_circulation_status_id']) || $qualifyingCirculation['QualifyingCirculation']['qualifying_circulation_status_id'] <= 1)) {
        ?>
        <li class="span_register">&nbsp;</li>
        <li class="span_register submit_link"><?php echo $this->Html->link('Submit For Approval', array('action' => 'submit_for_approval', 'controller' => 'qualifying_circulations', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Submit For Approval')); ?></li>
        <?php
        }
        if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && ($qualifyingCirculation['QualifyingCirculation']['qualifying_circulation_status_id'] > 2 || $clear_all_steps === 0 || $qualifyingCirculation['QualifyingCirculationStatus']['id'] == 0)) {
            ?>
            <li class="span_register"><?php echo $this->Html->link('Print Form / Review Form For Hard Copy', array('action' => 'print_for_approval', 'controller' => 'qualifying_circulations', 'client' => true, 'print' => 1, 'qualifying_circulation_id' => $qualifyingCirculation['QualifyingCirculation']['id']), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Print Form / Review Form For Hard Copy', 'target' => '_blank')); ?></li>
            <?php
        }
        if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['QualifyingCirculationStatus']['status_shown'])) {
        ?>          
            <li class="span_register"><?php echo $qualifyingCirculation['QualifyingCirculationStatus']['status_shown']; ?></b></li>
        <?php
        }
        else if (!empty($qualifyingCirculation['QualifyingCirculation']['id']) && !empty($qualifyingCirculation['QualifyingCirculationStatus']['id']))
        {
        ?>          
            <li class="span_register">Status: <?php echo $qualifyingCirculation['QualifyingCirculationStatus']['qualifying_circulation_status_name']; ?></b></li>
        <?php
        }
        ?>
</ul>
</td>
<?php
}
?>
	</tr>
</table>