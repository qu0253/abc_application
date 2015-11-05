<?php if (isset($tradeTerms) && is_array($tradeTerms) && count($tradeTerms) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($tradeTerms, 'Trade Terms List');
    exit;
}
?>
<?php 
if (!empty($this->data['TradeTerm']['sale_type_id']) && !empty($this->data['TradeTerm']['subscription_type_id']))
    echo $this->render('client_add');
?>
<div class="tradeTerms index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h3><?php ___('trade terms');?></h3>
	    </span>
        <span class="h2-right"></span></div>
	<?php
        $additional_button = array(
                __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
            );
        if ($this->data['TradeTerm']['subscription_type_id'] == 1) {
            $additional_button[__('Add Trade Terms for Single', true)] = $this->Html->link(__('Add Trade Terms for Single', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $this->data['TradeTerm']['qualifying_circulation_id'], 'sub_div_view101' => 'subscription_type-' . 1, 'sub_div_view102' => 'sale_type-' . 1), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Single', true)));
            $additional_button[__('Add Trade Terms for Combo', true)] = $this->Html->link(__('Add Trade Terms for Combo', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $this->data['TradeTerm']['qualifying_circulation_id'], 'sub_div_view101' => 'subscription_type-' . 1, 'sub_div_view102' => 'sale_type-' . 2), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Combo', true)));
            $additional_button[__('Add Trade Terms for Institutional', true)] = $this->Html->link(__('Add Trade Terms for Institutional', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $this->data['TradeTerm']['qualifying_circulation_id'], 'sub_div_view101' => 'subscription_type-' . 1, 'sub_div_view102' => 'sale_type-' . 3), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Institutional', true)));
        }
        if ($this->data['TradeTerm']['subscription_type_id'] == 2) {
            $additional_button[__('Add Trade Terms for Single', true)] = $this->Html->link(__('Add Trade Terms for Single', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $this->data['TradeTerm']['qualifying_circulation_id'], 'sub_div_view101' => 'subscription_type-' . 2, 'sub_div_view102' => 'sale_type-' . 1), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Single', true)));
            $additional_button[__('Add Trade Terms for Combo', true)] = $this->Html->link(__('Add Trade Terms for Combo', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $this->data['TradeTerm']['qualifying_circulation_id'], 'sub_div_view101' => 'subscription_type-' . 2, 'sub_div_view102' => 'sale_type-' . 2), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Combo', true)));
            $additional_button[__('Add Trade Terms for Institutional', true)] = $this->Html->link(__('Add Trade Terms for Institutional', true), array('action' => 'index', 'controller' => 'trade_terms', 'client' => true, 'sub_div_view100' => 'qualifying_circulation-' . $this->data['TradeTerm']['qualifying_circulation_id'], 'sub_div_view101' => 'subscription_type-' . 2, 'sub_div_view102' => 'sale_type-' . 3), array('class' => 'dashboard_links ', 'escape' => false, 'title' => __('Add Trade Terms for Institutional', true)));
        }
        echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => false, 'export_excel' => false, 'print' => false, 'add' => false, 'container_class' => 'toolbar_container_list',
            'additional_buttons' => $additional_button));
	?>

	<?php
	echo $this->AlaxosForm->create('TradeTerm', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;" class="display_none"></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Trade Term Id', true), 'TradeTerm.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Type Name', true), 'SubscriptionType.subscription_type_name');?></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Sale Type Name', true), 'SaleType.sale_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Copies Sold', true), 'TradeTerm.copies_sold');?></th>
		<th><?php echo $this->Paginator->sort(__('Sold At Trade Term', true), 'TradeTerm.sold_at_trade_term');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader display_none">
		<td class="display_none"></td>
			<td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_type_id');
			?>
		</td>
		<td class="display_none">
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
				echo $this->AlaxosForm->filter_field('copies_sold');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('sold_at_trade_term');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('TradeTerm', array('id' => 'chooseActionForm', 'url' => array('controller' => 'tradeTerms', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($tradeTerms as $tradeTerm):
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
		<td class="display_none">
		<?php
		echo $this->AlaxosForm->checkBox('TradeTerm.' . $i . '.id', array('value' => $tradeTerm['TradeTerm']['id']));
		?>
		</td>
		<td class="display_none">
			<?php echo $tradeTerm['TradeTerm']['id']; ?>
		</td>
		<td>
			<?php echo $tradeTerm['SubscriptionType']['subscription_type_name']; //$this->Html->link($tradeTerm['SubscriptionType']['subscription_type_name'], array('controller' => 'subscription_types', 'action' => 'view', $tradeTerm['SubscriptionType']['id'])); ?>
		</td>
		<td class="display_none">
			<?php echo $tradeTerm['QualifyingCirculation']['id']; //$this->Html->link($tradeTerm['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $tradeTerm['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $tradeTerm['SaleType']['sale_type_name']; //$this->Html->link($tradeTerm['SaleType']['sale_type_name'], array('controller' => 'sale_types', 'action' => 'view', $tradeTerm['SaleType']['id'])); ?>
		</td>
		<td>
			<?php echo $tradeTerm['TradeTerm']['copies_sold']; ?>
		</td>
		<td>
			<?php echo $tradeTerm['TradeTerm']['sold_at_trade_term']; ?>
		</td>
		<td class="actions">

			<?php //echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $tradeTerm['TradeTerm']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $tradeTerm['TradeTerm']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php //echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $tradeTerm['TradeTerm']['id']), array('escape' => false, 'title' => 'Copy')); ?>
                        <?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $tradeTerm['TradeTerm']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $tradeTerm['TradeTerm']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
	<div class="paging display_none">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0 && 1 && 0)
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
