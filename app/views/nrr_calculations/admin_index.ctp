<?php if (isset($nrrCalculations) && is_array($nrrCalculations) && count($nrrCalculations) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($nrrCalculations, 'Nrr Calculations List');
    exit;
}
?><div class="nrrCalculations index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('nrr calculations');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('NrrCalculation', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Nrr Calculation Id', true), 'NrrCalculation.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Cover Price Of The Publication', true), 'NrrCalculation.cover_price_of_the_publication');?></th>
		<th><?php echo $this->Paginator->sort(__('Trade Discount Offered To Trade', true), 'NrrCalculation.trade_discount_offered_to_trade');?></th>
		<th><?php echo $this->Paginator->sort(__('Net Realisation', true), 'NrrCalculation.net_realisation');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pages Per Issue Minimum', true), 'NrrCalculation.no_of_pages_per_issue_minimum');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pages Per Issue Maximum', true), 'NrrCalculation.no_of_pages_per_issue_maximum');?></th>
		<th><?php echo $this->Paginator->sort(__('Waste Rate Per Kg', true), 'NrrCalculation.waste_rate_per_kg');?></th>
		<th><?php echo $this->Paginator->sort(__('Gsm', true), 'NrrCalculation.gsm');?></th>
		<th><?php echo $this->Paginator->sort(__('Size Of The Page', true), 'NrrCalculation.size_of_the_page');?></th>
		<th><?php echo $this->Paginator->sort(__('Weight Per Page', true), 'NrrCalculation.weight_per_page');?></th>
		<th><?php echo $this->Paginator->sort(__('Value In Waste Per Page', true), 'NrrCalculation.value_in_waste_per_page');?></th>
		<th><?php echo $this->Paginator->sort(__('Actual Weight Of The Copy Min', true), 'NrrCalculation.actual_weight_of_the_copy_min');?></th>
		<th><?php echo $this->Paginator->sort(__('Actual Weight Of The Copy Max', true), 'NrrCalculation.actual_weight_of_the_copy_max');?></th>
		<th><?php echo $this->Paginator->sort(__('Weight Net Price', true), 'NrrCalculation.weight_net_price');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Pages Net Price', true), 'NrrCalculation.no_of_pages_net_price');?></th>
		<th><?php echo $this->Paginator->sort(__('Waste Price Per Issue Min', true), 'NrrCalculation.waste_price_per_issue_min');?></th>
		<th><?php echo $this->Paginator->sort(__('Waste Price Per Issue Max', true), 'NrrCalculation.waste_price_per_issue_max');?></th>
		<th><?php echo $this->Paginator->sort(__('Waste Price Per Issue Cutoff', true), 'NrrCalculation.waste_price_per_issue_cutoff');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'NrrCalculation.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('cover_price_of_the_publication');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('trade_discount_offered_to_trade');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('net_realisation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pages_per_issue_minimum');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pages_per_issue_maximum');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('waste_rate_per_kg');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('gsm');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('size_of_the_page');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('weight_per_page');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('value_in_waste_per_page');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('actual_weight_of_the_copy_min');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('actual_weight_of_the_copy_max');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('weight_net_price');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_pages_net_price');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('waste_price_per_issue_min');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('waste_price_per_issue_max');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('waste_price_per_issue_cutoff');
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
			echo $this->AlaxosForm->create('NrrCalculation', array('id' => 'chooseActionForm', 'url' => array('controller' => 'nrrCalculations', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($nrrCalculations as $nrrCalculation):
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
		echo $this->AlaxosForm->checkBox('NrrCalculation.' . $i . '.id', array('value' => $nrrCalculation['NrrCalculation']['id']));
		?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($nrrCalculation['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $nrrCalculation['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['cover_price_of_the_publication']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['trade_discount_offered_to_trade']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['net_realisation']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_per_issue_minimum']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_per_issue_maximum']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_rate_per_kg']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['gsm']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['size_of_the_page']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['weight_per_page']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['value_in_waste_per_page']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['actual_weight_of_the_copy_min']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['actual_weight_of_the_copy_max']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['weight_net_price']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['no_of_pages_net_price']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_min']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_max']; ?>
		</td>
		<td>
			<?php echo $nrrCalculation['NrrCalculation']['waste_price_per_issue_cutoff']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($nrrCalculation['NrrCalculation']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $nrrCalculation['NrrCalculation']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $nrrCalculation['NrrCalculation']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $nrrCalculation['NrrCalculation']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $nrrCalculation['NrrCalculation']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $nrrCalculation['NrrCalculation']['id'])); ?>

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
	echo $this->AlaxosForm->create('NrrCalculation', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
