<div class="nonQualifyingCirculations form">

	<?php echo $this->AlaxosForm->create('NonQualifyingCirculation', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('client copy non qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $nonQualifyingCirculation['NonQualifyingCirculation']['id']));
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
			<?php ___('Single 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies 10') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_10', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies 20') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_20', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_100', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies 100') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_100', array('label' => false)); ?>
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
			<?php ___('Combo Single Copy Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_single_copy_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Single Copy Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_single_copy_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional Single Copy Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_single_copy_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies Single Copy Sales') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_single_copy_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Combo Sales Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_combo_sales_copies', array('label' => false)); ?>
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
			<?php ___('Subscription Combo Sales Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_combo_sales_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional Combo Sales Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_combo_sales_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies Combo Sales Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_combo_sales_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Single Copy Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_single_copy_subscription', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Single Copy Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_single_copy_subscription', array('label' => false)); ?>
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
			<?php ___('Institutional Single Copy Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_single_copy_subscription', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies Single Copy Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_single_copy_subscription', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Joint Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_joint_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Joint Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_joint_subscription_copies', array('label' => false)); ?>
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
			<?php ___('Institutional Joint Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_joint_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Free Copies Joint Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_joint_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Institutional Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_institutional_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Institutional Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_institutional_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Institutional Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_institutional_subscription_copies', array('label' => false)); ?>
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
			<?php ___('Free Copies Institutional Subscription Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_institutional_subscription_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Institutional Sale Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_institutional_sale_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Institutional Sale Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_institutional_sale_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Institutional Sale Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_institutional_sale_copies', array('label' => false)); ?>
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
			<?php ___('Free Copies Institutional Sale Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_institutional_sale_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Free Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_free_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Free Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_free_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Subscription Free Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_free_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Institutional Free Copies') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('institutional_free_copies', array('label' => false)); ?>
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
			<?php ___('Free Copies Non Qualifying Sales Other Than Nnr') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
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
