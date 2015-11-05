<div class="qualifyingCirculations form">

	<?php echo $this->AlaxosForm->create('QualifyingCirculation', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('client copy qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $qualifyingCirculation['QualifyingCirculation']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Printing Center Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_center_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Regular Period Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('regular_period_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Month 1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_month_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Pub Days Month 1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Month 2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_month_2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Pub Days Month 2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Month 3') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_month_3', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Pub Days Month 3') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_3', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Month 4') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_month_4', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Pub Days Month 4') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_4', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Month 5') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_month_5', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Pub Days Month 5') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_5', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Month 6') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_month_6', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Pub Days Month 6') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_6', array('label' => false)); ?>
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
			<?php ___('Combo Nnr 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Nnr 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_10', array('label' => false)); ?>
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
			<?php ___('Combo Nnr 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Nnr 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_20', array('label' => false)); ?>
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
			<?php ___('Combo Nnr 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Nnr 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_100', array('label' => false)); ?>
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
			<?php ___('Combo Nnr Below Nnr Within Qualifying') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_below_nnr_within_qualifying', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Instn Nnr Below Nnr Within Qualifying') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_below_nnr_within_qualifying', array('label' => false)); ?>
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
			<?php ___('Nss Incentive Combo Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_nil', array('label' => false)); ?>
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
			<?php ___('Nss Incentive Single 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_50', array('label' => false)); ?>
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
			<?php ___('Nss Incentive Instn 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Airlines') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_airlines', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Airlines') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_airlines', array('label' => false)); ?>
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
			<?php ___('Single Body Corporates') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_body_corporates', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Body Corporates') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_body_corporates', array('label' => false)); ?>
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
			<?php ___('Single Hotels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_hotels', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Hotels') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_hotels', array('label' => false)); ?>
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
			<?php ___('Single Libraries') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_libraries', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Libraries') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_libraries', array('label' => false)); ?>
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
			<?php ___('Single Others') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_others', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Others') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_others', array('label' => false)); ?>
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
			<?php ___('Ss Cat Single General') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_general', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Joint General') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_general', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Institutional General') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_institutional_general', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Single School') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_school', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Joint School') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_school', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Institutional School') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_institutional_school', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Single Institutional') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_institutional', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Joint Institutional') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_institutional', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Institutional Institutional') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_institutional_institutional', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Single Others') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_others', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Joint Others') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_others', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Cat Institutional Others') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_institutional_others', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Single Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_single_nil', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Joint Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_joint_nil', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Institutional Nil') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_institutional_nil', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Single 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_single_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Joint 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_joint_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Institutional 50') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_institutional_50', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Single 90') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_single_90', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Joint 90') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_joint_90', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Ss Incentive Institutional 90') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_institutional_90', array('label' => false)); ?>
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
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___d('alaxos', 'copy', true)); ?> 		</td>
 	</tr>
	</table>

</div>
