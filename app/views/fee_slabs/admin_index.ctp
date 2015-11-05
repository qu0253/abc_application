<?php if (isset($feeSlabs) && is_array($feeSlabs) && count($feeSlabs) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($feeSlabs, 'Fee Slabs List');
    exit;
}
?><div class="feeSlabs index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('fee slabs');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('FeeSlab', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Fee Slab Id', true), 'FeeSlab.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Fee Slab Name', true), 'FeeSlab.fee_slab_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Membership Type Name', true), 'MembershipType.membership_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Frequency Name', true), 'Frequency.frequency_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Publication Type Name', true), 'PublicationType.publication_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Circulation From', true), 'FeeSlab.circulation_from');?></th>
		<th><?php echo $this->Paginator->sort(__('Circulation To', true), 'FeeSlab.circulation_to');?></th>
		<th><?php echo $this->Paginator->sort(__('Annual Expenditure From', true), 'FeeSlab.annual_expenditure_from');?></th>
		<th><?php echo $this->Paginator->sort(__('Annual Expenditure To', true), 'FeeSlab.annual_expenditure_to');?></th>
		<th><?php echo $this->Paginator->sort(__('Annual Turnover From', true), 'FeeSlab.annual_turnover_from');?></th>
		<th><?php echo $this->Paginator->sort(__('Annual Turnover To', true), 'FeeSlab.annual_turnover_to');?></th>
		<th><?php echo $this->Paginator->sort(__('Application Fee', true), 'FeeSlab.application_fee');?></th>
		<th><?php echo $this->Paginator->sort(__('Entrance Fee', true), 'FeeSlab.entrance_fee');?></th>
		<th><?php echo $this->Paginator->sort(__('Annual Subscription', true), 'FeeSlab.annual_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'FeeSlab.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('fee_slab_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('membership_type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('frequency_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('publication_type_id');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('circulation_from');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('circulation_to');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('annual_expenditure_from');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('annual_expenditure_to');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('annual_turnover_from');
			?>
		</td>
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('annual_turnover_to');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('application_fee');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('entrance_fee');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('annual_subscription');
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
			echo $this->AlaxosForm->create('FeeSlab', array('id' => 'chooseActionForm', 'url' => array('controller' => 'feeSlabs', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($feeSlabs as $feeSlab):
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
		echo $this->AlaxosForm->checkBox('FeeSlab.' . $i . '.id', array('value' => $feeSlab['FeeSlab']['id']));
		?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['id']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['fee_slab_name']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($feeSlab['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $feeSlab['MembershipType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($feeSlab['Frequency']['frequency_name'], array('controller' => 'frequencies', 'action' => 'view', $feeSlab['Frequency']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($feeSlab['PublicationType']['publication_type_name'], array('controller' => 'publication_types', 'action' => 'view', $feeSlab['PublicationType']['id'])); ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['circulation_from']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['circulation_to']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_expenditure_from']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_expenditure_to']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_turnover_from']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_turnover_to']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['application_fee']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['entrance_fee']; ?>
		</td>
		<td>
			<?php echo $feeSlab['FeeSlab']['annual_subscription']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($feeSlab['FeeSlab']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $feeSlab['FeeSlab']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $feeSlab['FeeSlab']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $feeSlab['FeeSlab']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $feeSlab['FeeSlab']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $feeSlab['FeeSlab']['fee_slab_name'])); ?>-->

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
	echo $this->AlaxosForm->input_actions_list_without_delete();
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
	echo $this->AlaxosForm->create('FeeSlab', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
