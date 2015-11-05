<?php if (isset($outgoingCertificates) && is_array($outgoingCertificates) && count($outgoingCertificates) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($outgoingCertificates, 'Outgoing Certificates List');
    exit;
}
?><div class="page-title">
        <h2><?php ___('outgoing certificates');?></h2>        
</div>
<div class="outgoingCertificates index">
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => array('model_name' => 'OutgoingCertificate', 'total_records' => $outgoingCertificates), 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('OutgoingCertificate', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
          
        <div class="table-responsive">
	        <table class="administration table table-striped table-bordered table-hover">
                <thead>
                    <tr class="sortHeader">
                        <th><li class="fa fa-minus-square-o"></li></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Id', true), 'OutgoingCertificate.id');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Publication Name', true), 'Publication.publication_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Language Name', true), 'Language.language_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Frequency Type Name', true), 'FrequencyType.frequency_type_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Regular Period Name', true), 'RegularPeriod.regular_period_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Certificate Status Name', true), 'CertificateStatus.certificate_status_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Address', true), 'OutgoingCertificate.address');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Published Printed', true), 'OutgoingCertificate.published_printed');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Copy', true), 'OutgoingCertificate.single_copy');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Copy', true), 'OutgoingCertificate.combo_copy');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Auditors', true), 'OutgoingCertificate.auditors');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Qualifying Sales', true), 'OutgoingCertificate.total_qualifying_sales');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Number Of Publishing Days', true), 'OutgoingCertificate.total_number_of_publishing_days');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Average Total Qualifying Sales', true), 'OutgoingCertificate.average_total_qualifying_sales');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 1 Regular Period Name', true), 'Previous1RegularPeriod.previous_1_regular_period_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 1 Circulations', true), 'OutgoingCertificate.previous_1_circulations');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 1 Issues', true), 'OutgoingCertificate.previous_1_issues');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 1 Note', true), 'OutgoingCertificate.previous_1_note');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 2 Regular Period Name', true), 'Previous2RegularPeriod.previous_2_regular_period_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 2 Circulations', true), 'OutgoingCertificate.previous_2_circulations');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 2 Issues', true), 'OutgoingCertificate.previous_2_issues');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Previous 2 Note', true), 'OutgoingCertificate.previous_2_note');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Ss Sa Single Copy Sales', true), 'OutgoingCertificate.ss_sa_single_copy_sales');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Ss Sa Combo Sales Copies', true), 'OutgoingCertificate.ss_sa_combo_sales_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Ss Sa Single Copy Subscription', true), 'OutgoingCertificate.ss_sa_single_copy_subscription');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Ss Sa Joint Subscription Copies', true), 'OutgoingCertificate.ss_sa_joint_subscription_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Ss Sa Institutional Subscription Copies', true), 'OutgoingCertificate.ss_sa_institutional_subscription_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Ss Sa Institutional Sale Copies', true), 'OutgoingCertificate.ss_sa_institutional_sale_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Ss Sa Average Monthly Qualifying Circulation 1', true), 'OutgoingCertificate.total_ss_sa_average_monthly_qualifying_circulation_1');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Date Issue', true), 'OutgoingCertificate.date_issue');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Circulation Notes', true), 'OutgoingCertificate.circulation_notes');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Nnr 10', true), 'OutgoingCertificate.single_nnr_10');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Nnr 20', true), 'OutgoingCertificate.single_nnr_20');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Nnr 100', true), 'OutgoingCertificate.single_nnr_100');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Nnr Below Nnr Within Qualifying', true), 'OutgoingCertificate.single_nnr_below_nnr_within_qualifying');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Single Nil', true), 'OutgoingCertificate.nss_incentive_single_nil');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Single 50', true), 'OutgoingCertificate.nss_incentive_single_50');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Single 100', true), 'OutgoingCertificate.nss_incentive_single_100');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Nnr 10', true), 'OutgoingCertificate.combo_nnr_10');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Nnr 20', true), 'OutgoingCertificate.combo_nnr_20');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Nnr 100', true), 'OutgoingCertificate.combo_nnr_100');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Nnr Below Nnr Within Qualifying', true), 'OutgoingCertificate.combo_nnr_below_nnr_within_qualifying');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Combo Nil', true), 'OutgoingCertificate.nss_incentive_combo_nil');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Combo 50', true), 'OutgoingCertificate.nss_incentive_combo_50');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Combo 100', true), 'OutgoingCertificate.nss_incentive_combo_100');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Instn Airlines', true), 'OutgoingCertificate.instn_airlines');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Instn Body Corporates', true), 'OutgoingCertificate.instn_body_corporates');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Instn Edu Inst', true), 'OutgoingCertificate.instn_edu_inst');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Instn Hotels', true), 'OutgoingCertificate.instn_hotels');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Instn Libraries', true), 'OutgoingCertificate.instn_libraries');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Instn Others', true), 'OutgoingCertificate.instn_others');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Corporates Average Monthly Qualifying Circulation', true), 'OutgoingCertificate.total_corporates_average_monthly_qualifying_circulation');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Instn Nil', true), 'OutgoingCertificate.nss_incentive_instn_nil');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Instn 50', true), 'OutgoingCertificate.nss_incentive_instn_50');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Nss Incentive Instn 100', true), 'OutgoingCertificate.nss_incentive_instn_100');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Non Qualifying Sales Other Than Nnr', true), 'OutgoingCertificate.single_non_qualifying_sales_other_than_nnr');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Non Qualifying Sales Other Than Nnr', true), 'OutgoingCertificate.combo_non_qualifying_sales_other_than_nnr');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Subscription Non Qualifying Sales Other Than Nnr', true), 'OutgoingCertificate.subscription_non_qualifying_sales_other_than_nnr');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Institutional Non Qualifying Sales Other Than Nnr', true), 'OutgoingCertificate.institutional_non_qualifying_sales_other_than_nnr');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Single Copy Sales', true), 'OutgoingCertificate.single_single_copy_sales');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Combo Sales Copies', true), 'OutgoingCertificate.combo_combo_sales_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Subscription Single Copy Subscription', true), 'OutgoingCertificate.subscription_single_copy_subscription');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Subscription Joint Subscription Copies', true), 'OutgoingCertificate.subscription_joint_subscription_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Institutional Institutional Subscription Copies', true), 'OutgoingCertificate.institutional_institutional_subscription_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Institutional Institutional Sale Copies', true), 'OutgoingCertificate.institutional_institutional_sale_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Free Copies Free Copies', true), 'OutgoingCertificate.free_copies_free_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Comments Title', true), 'OutgoingCertificate.comments_title');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Additional Notes1 Title', true), 'OutgoingCertificate.additional_notes1_title');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Additional Notes2 Title', true), 'OutgoingCertificate.additional_notes2_title');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Additional Notes3 Title', true), 'OutgoingCertificate.additional_notes3_title');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Active', true), 'OutgoingCertificate.active');?></th>
                                                                                                                                                
                        <th class="actions">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
	<tr class="searchHeader">
		<td>
			<?php
				echo $this->AlaxosForm->checkBox('OutgoingCertificate.select_all', array('class' => 'select_all')); ?>
		</td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id', array('placeholder' => __('Outgoing Certificate Id', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('publication_id', array('placeholder' => __('Publication Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('language_id', array('placeholder' => __('Language Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('frequency_type_id', array('placeholder' => __('Frequency Type Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('regular_period_id', array('placeholder' => __('Regular Period Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('certificate_status_id', array('placeholder' => __('Certificate Status Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('address', array('placeholder' => __('Address', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('published_printed', array('placeholder' => __('Published Printed', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_copy', array('placeholder' => __('Single Copy', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_copy', array('placeholder' => __('Combo Copy', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('auditors', array('placeholder' => __('Auditors', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_qualifying_sales', array('placeholder' => __('Total Qualifying Sales', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_number_of_publishing_days', array('placeholder' => __('Total Number Of Publishing Days', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('average_total_qualifying_sales', array('placeholder' => __('Average Total Qualifying Sales', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_1_regular_period_id', array('placeholder' => __('Previous 1 Regular Period Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_1_circulations', array('placeholder' => __('Previous 1 Circulations', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_1_issues', array('placeholder' => __('Previous 1 Issues', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_1_note', array('placeholder' => __('Previous 1 Note', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_2_regular_period_id', array('placeholder' => __('Previous 2 Regular Period Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_2_circulations', array('placeholder' => __('Previous 2 Circulations', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_2_issues', array('placeholder' => __('Previous 2 Issues', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('previous_2_note', array('placeholder' => __('Previous 2 Note', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_single_copy_sales', array('placeholder' => __('Ss Sa Single Copy Sales', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_combo_sales_copies', array('placeholder' => __('Ss Sa Combo Sales Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_single_copy_subscription', array('placeholder' => __('Ss Sa Single Copy Subscription', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_joint_subscription_copies', array('placeholder' => __('Ss Sa Joint Subscription Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_institutional_subscription_copies', array('placeholder' => __('Ss Sa Institutional Subscription Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('ss_sa_institutional_sale_copies', array('placeholder' => __('Ss Sa Institutional Sale Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_ss_sa_average_monthly_qualifying_circulation_1', array('placeholder' => __('Total Ss Sa Average Monthly Qualifying Circulation 1', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_issue', array('placeholder' => __('Date Issue', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('circulation_notes', array('placeholder' => __('Circulation Notes', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_10', array('placeholder' => __('Single Nnr 10', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_20', array('placeholder' => __('Single Nnr 20', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_100', array('placeholder' => __('Single Nnr 100', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_nnr_below_nnr_within_qualifying', array('placeholder' => __('Single Nnr Below Nnr Within Qualifying', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_single_nil', array('placeholder' => __('Nss Incentive Single Nil', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_single_50', array('placeholder' => __('Nss Incentive Single 50', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_single_100', array('placeholder' => __('Nss Incentive Single 100', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_10', array('placeholder' => __('Combo Nnr 10', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_20', array('placeholder' => __('Combo Nnr 20', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_100', array('placeholder' => __('Combo Nnr 100', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_nnr_below_nnr_within_qualifying', array('placeholder' => __('Combo Nnr Below Nnr Within Qualifying', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_combo_nil', array('placeholder' => __('Nss Incentive Combo Nil', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_combo_50', array('placeholder' => __('Nss Incentive Combo 50', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_combo_100', array('placeholder' => __('Nss Incentive Combo 100', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_airlines', array('placeholder' => __('Instn Airlines', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_body_corporates', array('placeholder' => __('Instn Body Corporates', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_edu_inst', array('placeholder' => __('Instn Edu Inst', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_hotels', array('placeholder' => __('Instn Hotels', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_libraries', array('placeholder' => __('Instn Libraries', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn_others', array('placeholder' => __('Instn Others', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_corporates_average_monthly_qualifying_circulation', array('placeholder' => __('Total Corporates Average Monthly Qualifying Circulation', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_instn_nil', array('placeholder' => __('Nss Incentive Instn Nil', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_instn_50', array('placeholder' => __('Nss Incentive Instn 50', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nss_incentive_instn_100', array('placeholder' => __('Nss Incentive Instn 100', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_non_qualifying_sales_other_than_nnr', array('placeholder' => __('Single Non Qualifying Sales Other Than Nnr', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_non_qualifying_sales_other_than_nnr', array('placeholder' => __('Combo Non Qualifying Sales Other Than Nnr', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_non_qualifying_sales_other_than_nnr', array('placeholder' => __('Subscription Non Qualifying Sales Other Than Nnr', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_non_qualifying_sales_other_than_nnr', array('placeholder' => __('Institutional Non Qualifying Sales Other Than Nnr', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_single_copy_sales', array('placeholder' => __('Single Single Copy Sales', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_combo_sales_copies', array('placeholder' => __('Combo Combo Sales Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_single_copy_subscription', array('placeholder' => __('Subscription Single Copy Subscription', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_joint_subscription_copies', array('placeholder' => __('Subscription Joint Subscription Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_institutional_subscription_copies', array('placeholder' => __('Institutional Institutional Subscription Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_institutional_sale_copies', array('placeholder' => __('Institutional Institutional Sale Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_free_copies', array('placeholder' => __('Free Copies Free Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('comments_title', array('placeholder' => __('Comments Title', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_notes1_title', array('placeholder' => __('Additional Notes1 Title', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_notes2_title', array('placeholder' => __('Additional Notes2 Title', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_notes3_title', array('placeholder' => __('Additional Notes3 Title', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('active', array('placeholder' => __('Active', true)));
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->button(___('search', true), array('class' => 'btn btn-default searchSubmit', 'type' => 'submit'));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset', 'class' => 'btn btn-default'));echo $this->AlaxosForm->end();?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('OutgoingCertificate', array('id' => 'chooseActionForm', 'url' => array('controller' => 'outgoingCertificates', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($outgoingCertificates as $outgoingCertificate):
		$i++;
        ?>
	<tr class="data" primary_key="<?php echo $outgoingCertificate['OutgoingCertificate']['id']; ?>">
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('OutgoingCertificate.' . $i . '.id', array('value' => $outgoingCertificate['OutgoingCertificate']['id']));
		?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $outgoingCertificate['Publication']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $outgoingCertificate['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['FrequencyType']['frequency_type_name'], array('controller' => 'frequency_types', 'action' => 'view', $outgoingCertificate['FrequencyType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $outgoingCertificate['RegularPeriod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['CertificateStatus']['certificate_status_name'], array('controller' => 'certificate_statuses', 'action' => 'view', $outgoingCertificate['CertificateStatus']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['address']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['published_printed']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_copy']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_copy']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['auditors']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['total_qualifying_sales']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['total_number_of_publishing_days']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['average_total_qualifying_sales']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['Previous1RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $outgoingCertificate['Previous1RegularPeriod']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['previous_1_circulations']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['previous_1_issues']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['previous_1_note']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['Previous2RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $outgoingCertificate['Previous2RegularPeriod']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['previous_2_circulations']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['previous_2_issues']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['previous_2_note']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['ss_sa_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['ss_sa_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['ss_sa_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['ss_sa_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['ss_sa_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['ss_sa_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['total_ss_sa_average_monthly_qualifying_circulation_1']; ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificate['OutgoingCertificate']['date_issue']); ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['circulation_notes']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_nnr_10']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_nnr_20']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_nnr_100']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_nnr_below_nnr_within_qualifying']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_single_nil']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_single_50']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_single_100']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_nnr_10']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_nnr_20']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_nnr_100']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_nnr_below_nnr_within_qualifying']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_nil']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_50']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_combo_100']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['instn_airlines']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['instn_body_corporates']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['instn_edu_inst']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['instn_hotels']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['instn_libraries']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['instn_others']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['total_corporates_average_monthly_qualifying_circulation']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_nil']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_50']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['nss_incentive_instn_100']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['subscription_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['institutional_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['single_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['combo_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['subscription_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['subscription_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['institutional_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['institutional_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['free_copies_free_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['comments_title']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['additional_notes1_title']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['additional_notes2_title']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificate['OutgoingCertificate']['additional_notes3_title']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($outgoingCertificate['OutgoingCertificate']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link('<i class="fa fa-list-alt"></i>', array('action' => 'view', $outgoingCertificate['OutgoingCertificate']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $outgoingCertificate['OutgoingCertificate']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link('<i class="fa fa-files-o"></i>', array('action' => 'copy', $outgoingCertificate['OutgoingCertificate']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link('<i class="fa fa-times"></i>', array('action' => 'delete', $outgoingCertificate['OutgoingCertificate']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $outgoingCertificate['OutgoingCertificate']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'input_actions' => true, 'paginator' => false, 'total_records' => $outgoingCertificates, 'container_class' => 'toolbar_container_list'));
?>
</div>
	
