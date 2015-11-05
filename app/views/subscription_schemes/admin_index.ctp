<?php if (isset($subscriptionSchemes) && is_array($subscriptionSchemes) && count($subscriptionSchemes) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($subscriptionSchemes, 'Subscription Schemes List');
    exit;
}
?><div class="subscriptionSchemes index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('subscription schemes');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('SubscriptionScheme', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Scheme Id', true), 'SubscriptionScheme.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Sale Type Name', true), 'SaleType.sale_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Name Of The Scheme', true), 'SubscriptionScheme.name_of_the_scheme');?></th>
		<th><?php echo $this->Paginator->sort(__('Cover Price', true), 'SubscriptionScheme.cover_price');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Rate', true), 'SubscriptionScheme.subscription_rate');?></th>
		<th><?php echo $this->Paginator->sort(__('Discount', true), 'SubscriptionScheme.discount');?></th>
		<th><?php echo $this->Paginator->sort(__('Value Of The Gift', true), 'SubscriptionScheme.value_of_the_gift');?></th>
		<th><?php echo $this->Paginator->sort(__('Trade Discount', true), 'SubscriptionScheme.trade_discount');?></th>
		<th><?php echo $this->Paginator->sort(__('Any Other Expenses', true), 'SubscriptionScheme.any_other_expenses');?></th>
		<th><?php echo $this->Paginator->sort(__('Balance Amount Retained', true), 'SubscriptionScheme.balance_amount_retained');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Copies', true), 'SubscriptionScheme.no_of_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'SubscriptionScheme.active');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('sale_type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('name_of_the_scheme');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cover_price');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_rate');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('discount');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('value_of_the_gift');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('trade_discount');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('any_other_expenses');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('balance_amount_retained');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('active');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('SubscriptionScheme', array('id' => 'chooseActionForm', 'url' => array('controller' => 'subscriptionSchemes', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($subscriptionSchemes as $subscriptionScheme):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('SubscriptionScheme.' . $i . '.id', array('value' => $subscriptionScheme['SubscriptionScheme']['id']));
		?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($subscriptionScheme['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $subscriptionScheme['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($subscriptionScheme['SaleType']['sale_type_name'], array('controller' => 'sale_types', 'action' => 'view', $subscriptionScheme['SaleType']['id'])); ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['name_of_the_scheme']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['cover_price']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['subscription_rate']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['discount']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['value_of_the_gift']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['trade_discount']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['any_other_expenses']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['balance_amount_retained']; ?>
		</td>
		<td>
			<?php echo $subscriptionScheme['SubscriptionScheme']['no_of_copies']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($subscriptionScheme['SubscriptionScheme']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $subscriptionScheme['SubscriptionScheme']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $subscriptionScheme['SubscriptionScheme']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $subscriptionScheme['SubscriptionScheme']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $subscriptionScheme['SubscriptionScheme']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $subscriptionScheme['SubscriptionScheme']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $this->AlaxosForm->input_actions_list();
	echo '&nbsp;';
	echo $this->AlaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
</div>
	<div class="select_rec_per_page">
            <?php

	$passedArgs = $this->passedArgs;
	unset($passedArgs['limit']);
	echo $this->AlaxosForm->create('SubscriptionScheme', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
	echo 'Select Records Per page: ';
	$options = Configure::read('select_rec_per_page');
	$paginingParams = ($paginator->params) ? $paginator->params : array();
	$pagining = !empty($paginingParams) ? array_pop($paginingParams['paging']) : array();
	$value = (empty($pagining) && empty($pagining['options']) && empty($pagining['options']['limit'])) ? $pagining['defaults']['limit'] : $pagining['options']['limit'];
	echo $this->AlaxosForm->select('limit', $options, $value, array(
            'value'=>$value, 
            'default'=>20, 
            'empty' => FALSE, 
            'onChange'=>'update_limit(this); return false;', 
            'name'=>'limit'
            )
        );
	echo $this->AlaxosForm->end();
	?>
        </div>
