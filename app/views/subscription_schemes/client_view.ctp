<div class="subscriptionSchemes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('subscription scheme');?><?php echo !empty($subscriptionScheme['SubscriptionScheme']['id']) ? ' - ' . $subscriptionScheme['SubscriptionScheme']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $subscriptionScheme['SubscriptionScheme']['id'], 'copy_id' => $subscriptionScheme['SubscriptionScheme']['id'], 'delete_id' => $subscriptionScheme['SubscriptionScheme']['id'], 'delete_text' => ___('do you really want to delete this subscription scheme ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Subscription Scheme Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['id']; ?>
		</td>
	</tr>
	<tr class="display_none">
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['QualifyingCirculation']['id']; //$this->Html->link($subscriptionScheme['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $subscriptionScheme['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Sale Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SaleType']['sale_type_name']; //$this->Html->link($subscriptionScheme['SaleType']['sale_type_name'], array('controller' => 'sale_types', 'action' => 'view', $subscriptionScheme['SaleType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name Of The Scheme'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['name_of_the_scheme']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['cover_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Rate'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['subscription_rate']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Discount'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['discount']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Value Of The Gift'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['value_of_the_gift']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Trade Discount'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['trade_discount']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Any Other Expenses'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['any_other_expenses']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Balance Amount Retained'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['balance_amount_retained']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['no_of_copies']; ?>
		</td>
	</tr>
	</table>
</div>
