<div class="qualifyingCirculations view">
	<table border="1" cellspacing="0" cellpadding="0" class="add" width="950">
                <tr>
                <td rowspan="2" class="ic-heading-left" style="vertical-align:middle">
			<?php ___('Cover Price Details') ?></td>
        	<td>
			<?php ___('Single Copy') ?>
			</td>
			<td colspan="4">
				<?php echo $qualifyingCirculation['QualifyingCirculation']['single_copy']; ?>
			</td>
		</tr>

		<tr>
        	<td>
			<?php ___('Combo Copy') ?>
			</td>
			<td colspan="4">
				<?php echo $qualifyingCirculation['QualifyingCirculation']['combo_copy']; ?>
			</td>
		</tr>

		<!--tr>
			<td colspan="1" class="ic-heading-left">
			<?php ___('Printing Center Started Current Period?') ?>
			</td>
			<td>:</td>
			<td colspan="4" class="ic-heading-left">
				<?php //echo ($qualifyingCirculation['QualifyingCirculation']['flag_pc_started_current_period']) ? 'Yes' : 'No'; ?>
			</td>
		</tr-->
		<?php
			if ($qualifyingCirculation['QualifyingCirculation']['pc_started_current_period']) {
        ?>
        <tr>

			<td><?php ___('Please enter newly started printing center city and date') ?></td>
			<td>:</td>
			<td colspan="4">
				<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['pc_started_current_period']); ?>
			</td>
		</tr>
        <?php
        }
        ?>
        <tr>
        	<td colspan="6" class="ic-heading">
			<?php ___('CALCULATION OF AVERAGE QUALIFYING CIRCULATION') ?></td>
		</tr>
        <tr>
        	<td colspan="6" class="ic-heading-left">
			<?php ___('PARTICULARS') ?></td>
		</tr>
        <tr>
			<td colspan="3">&nbsp;</td>
			<td class="number-align bold13">
				<?php ___('Total Monthly Qualifying Circulation') ?>
			</td>

			<td class="number-align bold13">
				<?php ___('Number of publishing days') ?>
			</td>
			<td colspan="3" class="number-align bold13">
				<?php ___('Average monthly qualifying circulation') ?>
			</td>
		</tr>

		<tr class="row0">
			<td colspan="3">
				<?php ___('Total Month 1') ?>
			</td>
			<td class="number-align">
				<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_month_1']); ?>
			</td>

			<td class="number-align">
				<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_1']); ?>
			</td>

			<td class="number-align">
				<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row0']); ?>
		</td>
	</tr>
        <tr class="row1">
                <td colspan="3">
			<?php ___('Total Month 2') ?>
		</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_month_2']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_2']); ?>
		</td>
                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row1']); ?>
		</td>
	</tr>
	<tr class="row2">
                <td colspan="3">
			<?php ___('Total Month 3') ?>
		</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_month_3']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_3']); ?>
		</td>

                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row2']); ?>
		</td>
	</tr>



	<tr class="row3">
                <td colspan="3">
			<?php ___('Total Month 4') ?>
		</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_month_4']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_4']); ?>
		</td>

                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row3']); ?>
		</td>
	</tr>
	<tr class="row4">
        	<td colspan="3">
			<?php ___('Total Month 5') ?>
		</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_month_5']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_5']); ?>
		</td>

                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row4']); ?>
		</td>
	</tr>

	<tr class="row5">
        	<td colspan="3">
			<?php ___('Total Month 6') ?>
		</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_month_6']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_6']); ?>
		</td>

                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row5']); ?>
		</td>
	</tr>
    <tr class="rowTotal1">
            <td class="number-align bold13" colspan="3"><?php ___('Total of average qualifying circulation') ?></td>
            <td class="number-align ic-heading-left">
                <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_monthly_qualifying_circulation']); ?>
            </td>
            <td class="number-align ic-heading-left">
                <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_number_of_publishing_days']); ?>
            </td>
            <td class="number-align ic-heading-left">
                <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ft_average_monthly_qualifying_circulation']); ?>
            </td>
        </tr>
        <tr>
                <td colspan="6" class="ic-heading">
			<?php ___('NON SUBSCRIPTION SALES') ?>
		</td>
	</tr>
        <tr>
        	<td colspan="6" class="ic-heading-left">
			<?php ___('Single (Non Subscription) copies sold to the distribution trade above NRR') ?>
		</td>
	</tr>
    <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="ic-heading">
                        <?php ___('Single copy Sales') ?>
                </td>
                <td class="ic-heading">
                        <?php ___('Combo Copy Sales') ?>
                </td>
		<td class="ic-heading">
			<?php ___('INSTN Sales') ?><br/>
                        <?php ___('(upto 10% of qualifying circulation)') ?>
		</td>
		<td class="ic-heading">
                    <?php ___('Average monthly qualifying circulation') ?>
		</td>
	</tr>
        <tr class="ic-heading-left">
            <td colspan="6" >
                    <?php ___('Details of NRR') ?>
            </td>
	</tr>
	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr 10') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['single_nnr_10']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['combo_nnr_10']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_nnr_10']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row45']); ?>
		</td>
	</tr>

	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr 20') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['single_nnr_20']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['combo_nnr_20']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_nnr_20']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row48']); ?>
		</td>
	</tr>

	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr 100') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['single_nnr_100']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['combo_nnr_100']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_nnr_100']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row51']); ?>
		</td>
	</tr>

	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr Below Nnr Within Qualifying') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['single_nnr_below_nnr_within_qualifying']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['combo_nnr_below_nnr_within_qualifying']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_nnr_below_nnr_within_qualifying']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row54']); ?>
		</td>
	</tr>
	 <tr class="rowTotal3">
                    <td class="number-align bold13"><?php ___('Total categories') ?></td>
                                    <td>:</td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_single_nnr']); ?>
                    </td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_combo_nnr']); ?>
                    </td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_instn_nnr']); ?>
                    </td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_average_monthly_qualifying_circulation_nnr']); ?>
                    </td>
      </tr>

        <tr>
                <td colspan="6" class="ic-heading-left">
                        <?php ___('Break up of copies sold with / without incentives') ?>
                </td>
	</tr>
	<tr class="nss_incentive">
        		<td>
			<?php ___('Nss Incentive Single Nil') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_nil']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_nil']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_nil']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row57']); ?>
		</td>
	</tr>

	<tr class="nss_incentive">
        		<td>
			<?php ___('Nss Incentive Single 50') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_50']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_50']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_50']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row60']); ?>
		</td>
	</tr>
	<tr class="nss_incentive">
        		<td>
			<?php ___('Nss Incentive Single 100') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_single_100']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_combo_100']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['nss_incentive_instn_100']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row61']); ?>
		</td>
    </tr>
    <tr class="rowTotal4">
                    <td class="number-align bold13"><?php ___('Total incentives') ?></td>
                                    <td>:</td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_single']); ?>
                    </td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_combo']); ?>
                    </td>
                    <td class="number-align bold13"><?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_instn']); ?>
                    </td>
                    <td class="number-align bold13">
                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_nss_incentive_average_monthly_qualifying_circulation']); ?>
                    </td>
         </tr>
        <tr>
            <td colspan="6" class="ic-heading-left">
                    <?php ___('Institutional Sales') ?>
            </td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Airlines') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_airlines']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row63']); ?>
		</td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Body Corporates') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_body_corporates']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row66']); ?>
		</td>
	</tr>
	<tr class="non">
        		<td>
			<?php ___('Instn Edu Inst') ?>
		</td>
                <td>:</td>

		<td>
		</td>

		<td>
		</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_edu_inst']); ?>
		</td>

                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row67']); ?>
		</td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Hotels') ?>
		</td>
                <td>:</td>

		<td>
			<?php //echo number_format($qualifyingCirculation['QualifyingCirculation']['single_hotels']); ?>
		</td>


		<td>
			<?php //echo number_format($qualifyingCirculation['QualifyingCirculation']['combo_hotels']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_hotels']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row68']); ?>
		</td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Libraries') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_libraries']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row69']); ?>
		</td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Others') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['instn_others']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row75']); ?>
		</td>
	</tr>
	<tr class="rowTotal5">
                <td class="number-align bold13"><?php ___('Total') ?></td>
                                <td>:</td>
                <td>
                    <?php //echo number_format($qualifyingCirculation['QualifyingCirculation']['total_corporates_single', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir1_total_non highlighted')); ?>
                </td>
                <td>
                    <?php //echo number_format($qualifyingCirculation['QualifyingCirculation']['total_corporates_combo', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir2_total_non highlighted')); ?>
                </td>
                <td class="number-align bold13"><?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_corporates_instn']); ?>
                </td>
                <td class="number-align bold13">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_corporates_average_monthly_qualifying_circulation']); ?>
                </td>
     </tr>
</table>
	<table border="1" cellspacing="0" cellpadding="0" class="add" width="950">

     <tr>
        <td colspan="6" class="ic-heading-left">
                    <?php ___('trade terms');?>
            </div>
        </td>
    </tr>
        <tr>
                <td colspan="6">
                    <table width="100%" cellpadding="0"  cellspacing="0" cellpadding="0" >
                        <tr>
                            <td>
                                <?php $tempArr = Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=1]', $qualifyingCirculation); 
                                if (array_sum(Set::extract('/TradeTerm/copies_sold', $tempArr))) {
                                    echo $this->element('qc_form/trade_terms', array('subscription_type_id' => 1, 'sale_type_id' => 1, 'tradeTerms' => Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=1]', $qualifyingCirculation))); 
                                }?>
                            </td>
                            <td>
                                <?php $tempArr = Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=2]', $qualifyingCirculation); 
                                if (array_sum(Set::extract('/TradeTerm/copies_sold', $tempArr))) {
                                    echo $this->element('qc_form/trade_terms', array('subscription_type_id' => 1, 'sale_type_id' => 2, 'tradeTerms' => Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=2]', $qualifyingCirculation)));
                                }?>
                            </td>
                            <td>
                                <?php $tempArr = Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=3]', $qualifyingCirculation); 
                                if (array_sum(Set::extract('/TradeTerm/copies_sold', $tempArr))) {
                                    echo $this->element('qc_form/trade_terms', array('subscription_type_id' => 1, 'sale_type_id' => 3, 'tradeTerms' => Set::extract('/TradeTerm[subscription_type_id=1][sale_type_id=3]', $qualifyingCirculation)));
                                }?>
                            </td>
                        </tr>
                    </table>
                </td>
	</tr>
        <tr>
           <td colspan="6" class="ic-heading">
                   <?php ___('SUBSCRIPTION SALES') ?>
           </td>
	</tr>
        <tr>
           <td colspan="6" class="ic-heading-left">
                   <?php ___('Subscription categories') ?>
           </td>
	</tr>
    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="ic-heading">
                            <?php ___('Single Subscription') ?>
                    </td>
                    <td class="ic-heading">
                            <?php ___('Joint Subscription') ?>
                    </td>
    		<td class="ic-heading">
    			<?php ___('Institutional Subscription') ?><br/>
                            <?php ___('(upto 5% of qualifying circulation)') ?>
    		</td>
    		<td class="ic-heading">
                        <?php ___('Average monthly qualifying circulation') ?>
    		</td>
    	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single General') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_single_general']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_general']); ?>
		</td>


		<td class="number-align">
			<?php //echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_general']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row111']); ?>
		</td>
	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single School') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_single_school']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_school']); ?>
		</td>


		<td class="number-align">
			<?php //echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_school']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row114']); ?>
		</td>
	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single Institutional') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_single_institutional']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_institutional']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_institutional']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row117']); ?>
		</td>
	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single Others') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_single_others']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_joint_others']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_cat_institutional_others']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row120']); ?>
		</td>
	</tr>
    	<tr class="rowTotal7">
                                <td class="number-align bold13"><?php ___('Total subscription categories') ?></td>
                                                <td>:</td>
                                <td class="number-align bold13">
                                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_cat_single']); ?>
                                </td>
                                <td class="number-align bold13">
                                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_cat_joint']); ?>
                                <td class="number-align bold13">
									<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_cat_institutional']); ?>
                                </td>
                                <td class="number-align bold13">
                                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_cat_average_monthly_qualifying_circulation']); ?>
                                </td>
        </tr>
        <tr>
                <td colspan="6" class="ic-heading-left">
                        <?php ___('Break up of subscription copies sold with / without incentives') ?>
                </td>
	</tr>
	<tr class="ss_incentive">
        		<td>
			<?php ___('Ss Incentive Single Nil') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_nil']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_nil']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_nil']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row123']); ?>
		</td>
	</tr>

	<tr class="ss_incentive">
        		<td>
			<?php ___('Ss Incentive Single 50') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_50']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_50']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_50']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row126']); ?>
		</td>
	</tr>

	<tr class="ss_incentive">
        		<td>
			<?php ___('Ss Incentive Single 90') ?>
		</td>
                <td>:</td>

		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_single_90']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_joint_90']); ?>
		</td>


		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_incentive_institutional_90']); ?>
		</td>


                <td class="number-align">
                    <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_row129']); ?>
		</td>
	</tr>
    <tr class="rowTotal8">
                                    <td class="number-align bold13"><?php ___('Total breakup of subscription copies sold at various incentives') ?></td>
                                                    <td>:</td>
                                    <td class="number-align bold13">
                                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_single']); ?>
                                    </td>
                                    <td class="number-align bold13">
                                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_joint']); ?>
                                    </td>
                                    <td class="number-align bold13"><?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_institutional']); ?>
                                    </td>
                                    <td class="number-align bold13">
                                        <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_incentive_average_monthly_qualifying_circulation']); ?>
                                    </td>
            </tr>
            <tr>
                <td colspan="6">
                    <?php echo $this->element('qc_form/subscription_schemes', array('qualifyingQirculations' => $qualifyingCirculation)); ?>
                </td>
            </tr>
       <tr>
        <td colspan="6" class="ic-heading-left">
                    <?php ___('trade terms');?>
            </div>
        </td>
    </tr>
        <tr>
                <td colspan="6">
                    <table width="100%" cellpadding="0"  cellspacing="0" cellpadding="0" >
                        <tr>
                            <td>
                                <?php $tempArr = Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=1]', $qualifyingCirculation); 
                                if (array_sum(Set::extract('/TradeTerm/copies_sold', $tempArr))) {
                                    echo $this->element('qc_form/trade_terms', array('subscription_type_id' => 2, 'sale_type_id' => 1, 'tradeTerms' => Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=1]', $qualifyingCirculation))); 
                                }?>
                            </td>
                            <td>
                                <?php $tempArr = Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=2]', $qualifyingCirculation); 
                                if (array_sum(Set::extract('/TradeTerm/copies_sold', $tempArr))) {
                                    echo $this->element('qc_form/trade_terms', array('subscription_type_id' => 2, 'sale_type_id' => 2, 'tradeTerms' => Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=2]', $qualifyingCirculation)));
                                }?>
                            </td>
                            <td>
                                <?php $tempArr = Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=3]', $qualifyingCirculation); 
                                if (array_sum(Set::extract('/TradeTerm/copies_sold', $tempArr))) {
                                    echo $this->element('qc_form/trade_terms', array('subscription_type_id' => 2, 'sale_type_id' => 3, 'tradeTerms' => Set::extract('/TradeTerm[subscription_type_id=2][sale_type_id=3]', $qualifyingCirculation)));
                                }?>
                            </td>
                        </tr>
                    </table>
                </td>
	</tr>
        <tr>
            <td colspan="6" class="ic-heading">
                    <?php ___('QUALIFYING SALES - SUMMARY') ?>
            </td>
	</tr>
	<tr class="q_summary">
                <td colspan="5">
			<?php ___('Ss Sa Single Copy Sales') ?>
		</td>
		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_sales']); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td colspan="5">
			<?php ___('Ss Sa Combo Sales Copies'); ?>
		</td>
		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_sa_combo_sales_copies']); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td colspan="5">
			<?php ___('Ss Sa Single Copy Subscription'); ?>
		</td>
		<td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_sa_single_copy_subscription']); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td colspan="5">
			<?php ___('Ss Sa Joint Subscription Copies'); ?>
		</td>
                <td class="number-align ">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_sa_joint_subscription_copies']); ?>
		</td>
	<tr>
	</tr>

	<tr class="q_summary">
                <td colspan="5">
			<?php ___('Ss Sa Institutional Subscription Copies'); ?>
		</td>
                <td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_subscription_copies']); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td colspan="5">
			<?php ___('Ss Sa Institutional Sale Copies'); ?>
		</td>
                <td class="number-align">
			<?php echo number_format($qualifyingCirculation['QualifyingCirculation']['ss_sa_institutional_sale_copies']); ?>
		</td>
        </tr>
         <tr class="rowTotal9">
                        <td colspan="5"><?php ___('Total qualifying sales summary') ?></td>
                        <td class="number-align">
                            <?php echo number_format($qualifyingCirculation['QualifyingCirculation']['total_ss_sa_average_monthly_qualifying_circulation_1']); ?>
                        </td>
                    </tr>
         <tr class="rowTotal9">
             <td colspan="6">
                <?php 
                if ($qualifyingCirculation['Combo']) {
                    echo $this->element('qc_form/combos', array('combos' => $qualifyingCirculation));
                }
                ?>
             </td>
                    </tr>

	</table>
</div>
