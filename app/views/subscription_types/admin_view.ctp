<div class="subscriptionTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('subscription type');?><?php echo !empty($subscriptionType['SubscriptionType']['subscription_type_name']) ? ' - ' . $subscriptionType['SubscriptionType']['subscription_type_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $subscriptionType['SubscriptionType']['id'], 'copy_id' => $subscriptionType['SubscriptionType']['id'], 'delete_id' => $subscriptionType['SubscriptionType']['id'], 'delete_text' => ___('do you really want to delete this subscription type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Subscription Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionType['SubscriptionType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionType['SubscriptionType']['subscription_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($subscriptionType['SubscriptionType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($subscriptionType['SubscriptionType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionType['SubscriptionType']['created_by']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($subscriptionType['SubscriptionType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $subscriptionType['SubscriptionType']['modified_by']; ?>
		</td>
	</tr>
	</table>
</div>
