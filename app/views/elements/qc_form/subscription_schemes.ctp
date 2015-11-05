<?php
$subscriptionSchemes = $qualifyingCirculation['SubscriptionScheme'];
?>
	<table border="1" cellspacing="0" cellpadding="0" class="add" width="950">
	<tr class="sortHeader">
                <td class="bold13" colspan="10"><?php ___('subscription schemes');?></td>
	</tr>
	<tr>
                <td class="bold13" ><?php echo __('Sale Type Name', true);?></td>
		<td class="bold13" ><?php echo __('Name Of The Scheme', true);?></td>
		<td class="number-align bold13"><?php echo __('Cover Price', true);?></td>
		<td class="number-align bold13"><?php echo __('Subscription Rate', true);?></td>
		<td class="number-align bold13"><?php echo __('Discount', true);?></td>
		<td class="number-align bold13"><?php echo __('Value Of The Gift', true);?></td>
		<td class="number-align bold13"><?php echo __('Trade Discount', true);?></td>
		<td class="number-align bold13"><?php echo __('Any Other Expenses', true);?></td>
		<td class="number-align bold13"><?php echo __('Balance Amount Retained', true);?></td>
		<td class="number-align bold13"><?php echo __('No Of Copies', true);?></td>
	</tr>
	<?php
	$i = 0;
	foreach ($subscriptionSchemes as $subscriptionScheme):
                $subscriptionScheme['SubscriptionScheme'] = $subscriptionScheme;
	?>
	<tr>
		<td>
			<?php echo $saleTypes[$subscriptionScheme['SubscriptionScheme']['sale_type_id']]; //$this->Html->link($subscriptionScheme['SaleType']['sale_type_name'], array('controller' => 'sale_types', 'action' => 'view', $subscriptionScheme['SaleType']['id'])); ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['name_of_the_scheme']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['cover_price']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['subscription_rate']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['discount']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['value_of_the_gift']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['trade_discount']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['any_other_expenses']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['balance_amount_retained']; ?>
		</td>
		<td class="number-align">
			<?php echo $subscriptionScheme['SubscriptionScheme']['no_of_copies']; ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>	
</div>