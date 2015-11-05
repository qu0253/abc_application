<div class="tradeTerms view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('trade term');?><?php echo !empty($tradeTerm['TradeTerm']['id']) ? ' - ' . $tradeTerm['TradeTerm']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $tradeTerm['TradeTerm']['id'], 'copy_id' => $tradeTerm['TradeTerm']['id'], 'delete_id' => $tradeTerm['TradeTerm']['id'], 'delete_text' => ___('do you really want to delete this trade term ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Trade Term Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tradeTerm['TradeTerm']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subscription Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tradeTerm['SubscriptionType']['subscription_type_name'], array('controller' => 'subscription_types', 'action' => 'view', $tradeTerm['SubscriptionType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tradeTerm['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $tradeTerm['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Sale Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tradeTerm['SaleType']['sale_type_name'], array('controller' => 'sale_types', 'action' => 'view', $tradeTerm['SaleType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Copies Sold'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tradeTerm['TradeTerm']['copies_sold']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Sold At Trade Term'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tradeTerm['TradeTerm']['sold_at_trade_term']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($tradeTerm['TradeTerm']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($tradeTerm['TradeTerm']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tradeTerm['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $tradeTerm['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($tradeTerm['TradeTerm']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tradeTerm['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $tradeTerm['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
