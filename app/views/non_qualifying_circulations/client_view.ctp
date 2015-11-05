<div class="nonQualifyingCirculations view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('non qualifying circulation');?><?php echo !empty($nonQualifyingCirculation['NonQualifyingCirculation']['id']) ? ' - ' . $nonQualifyingCirculation['NonQualifyingCirculation']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $nonQualifyingCirculation['NonQualifyingCirculation']['id'], 'copy_id' => $nonQualifyingCirculation['NonQualifyingCirculation']['id'], 'delete_id' => $nonQualifyingCirculation['NonQualifyingCirculation']['id'], 'delete_text' => ___('do you really want to delete this non qualifying circulation ?', true)));
	?>

	<table border="0" class="view">
<!--	<tr>
		<td>
			<?php ___('Non Qualifying Circulation Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['id']; ?>
		</td>
	</tr>-->
	<tr>
		<td>
			<?php ___('Printing Center Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['PrintingCenter']['id']; //$this->Html->link($nonQualifyingCirculation['PrintingCenter']['id'], array('controller' => 'printing_centers', 'action' => 'view', $nonQualifyingCirculation['PrintingCenter']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Regular Period Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['RegularPeriod']['regular_period_name']; //$this->Html->link($nonQualifyingCirculation['RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $nonQualifyingCirculation['RegularPeriod']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies 10'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_10']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies 20'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_20']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies 100'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_100']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Single Copy Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_single_copy_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Single Copy Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_single_copy_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Single Copy Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_single_copy_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Single Copy Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_single_copy_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Single Copy Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_single_copy_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Combo Sales Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_combo_sales_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Combo Sales Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_combo_sales_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Combo Sales Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_combo_sales_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Combo Sales Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_combo_sales_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Combo Sales Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_combo_sales_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Single Copy Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_single_copy_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Single Copy Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_single_copy_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Single Copy Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_single_copy_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Single Copy Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_single_copy_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Single Copy Subscription'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_single_copy_subscription']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Joint Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_joint_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Joint Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_joint_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Joint Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_joint_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Joint Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_joint_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Joint Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_joint_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Institutional Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_institutional_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Institutional Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_institutional_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Institutional Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_institutional_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Institutional Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_institutional_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Institutional Subscription Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_institutional_subscription_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Institutional Sale Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_institutional_sale_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Institutional Sale Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_institutional_sale_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Institutional Sale Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_institutional_sale_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Institutional Sale Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_institutional_sale_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Institutional Sale Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_institutional_sale_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Free Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_free_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Free Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_free_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Free Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_free_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Free Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_free_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Free Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_free_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Non Qualifying Sales Other Than Nnr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_non_qualifying_sales_other_than_nnr']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Non Qualifying Sales Other Than Nnr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_non_qualifying_sales_other_than_nnr']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Non Qualifying Sales Other Than Nnr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_non_qualifying_sales_other_than_nnr']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Institutional Non Qualifying Sales Other Than Nnr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_non_qualifying_sales_other_than_nnr']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Free Copies Non Qualifying Sales Other Than Nnr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_non_qualifying_sales_other_than_nnr']; ?>
		</td>
	</tr>
	</table>
</div>
