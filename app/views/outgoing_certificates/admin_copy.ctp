<div class="outgoingCertificates form">

	<?php echo $this->AlaxosForm->create('OutgoingCertificate', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('admin copy outgoing certificate'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $outgoingCertificate['OutgoingCertificate']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Publication Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('publication_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Language Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('language_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Frequency Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('frequency_type_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Regular Period Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('regular_period_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Certificate Status Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('certificate_status_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Address') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('address', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Published Printed') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('published_printed', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Copy') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_copy', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Copy') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_copy', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Auditors') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('auditors', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Qualifying Sales') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_qualifying_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Number Of Publishing Days') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_number_of_publishing_days', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Average Total Qualifying Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('average_total_qualifying_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 1 Regular Period Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_1_regular_period_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 1 Circulations') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_1_circulations', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 1 Issues') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_1_issues', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 1 Note') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_1_note', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 2 Regular Period Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_2_regular_period_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 2 Circulations') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_2_circulations', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 2 Issues') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_2_issues', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Previous 2 Note') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('previous_2_note', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Sa Single Copy Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_single_copy_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Sa Combo Sales Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_combo_sales_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Sa Single Copy Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_single_copy_subscription', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Sa Joint Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_joint_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Sa Institutional Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_institutional_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Sa Institutional Sale Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_institutional_sale_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Ss Sa Average Monthly Qualifying Circulation 1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_ss_sa_average_monthly_qualifying_circulation_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Date Issue') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('date_issue', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Circulation Notes') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('circulation_notes', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Nnr 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Nnr 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Nnr 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Nnr Below Nnr Within Qualifying') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_below_nnr_within_qualifying', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Single Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_nil', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Single 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Single 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Nnr 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Nnr 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Nnr 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Nnr Below Nnr Within Qualifying') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_below_nnr_within_qualifying', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Combo Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_nil', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Combo 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Combo 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Airlines') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_airlines', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Body Corporates') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_body_corporates', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Edu Inst') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_edu_inst', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Hotels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_hotels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Libraries') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_libraries', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Others') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_others', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Corporates Average Monthly Qualifying Circulation') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_corporates_average_monthly_qualifying_circulation', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Instn Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_nil', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Instn 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Nss Incentive Instn 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Non Qualifying Sales Other Than Nnr') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Non Qualifying Sales Other Than Nnr') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Non Qualifying Sales Other Than Nnr') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional Non Qualifying Sales Other Than Nnr') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Single Copy Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_single_copy_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Combo Sales Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_combo_sales_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Single Copy Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_single_copy_subscription', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Joint Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_joint_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional Institutional Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_institutional_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional Institutional Sale Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_institutional_sale_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies Free Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_free_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Comments Title') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('comments_title', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Notes1 Title') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_notes1_title', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Notes2 Title') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_notes2_title', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Notes3 Title') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_notes3_title', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Active') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('active', array('label' => false)); ?>
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
