<?php if (isset($distributionCenters) && is_array($distributionCenters) && count($distributionCenters) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($distributionCenters, 'Distribution Centers List');
    exit;
}
echo $this->render('client_add');
?><div class="distributionCenters index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('distribution centers');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => false, 'print' => false, 'add' => false, 'container_class' => 'toolbar_container_list',
            'additional_buttons' => array(
                __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
            )));
	?>

	<?php
	echo $this->AlaxosForm->create('DistributionCenter', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;" class="display_none"></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Distribution Center Id', true), 'DistributionCenter.id');?></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Distribution Center Name', true), 'DistributionCenter.distribution_center_name');?></th>
<!--		<th><?php echo $this->Paginator->sort(__('Name Address', true), 'DistributionCenter.name_address');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Approx Average No Of Copies Supplied', true), 'DistributionCenter.approx_average_no_of_copies_supplied');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td class="display_none"></td>
                <td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_id');
			?>
		</td>
<!--		<td>
			<?php
				echo $this->AlaxosForm->filter_field('distribution_center_name');
			?>
		</td>-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('name_address');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('approx_average_no_of_copies_supplied');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('DistributionCenter', array('id' => 'chooseActionForm', 'url' => array('controller' => 'distributionCenters', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($distributionCenters as $distributionCenter):
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
		<td class="display_none" >
		<?php
		echo $this->AlaxosForm->checkBox('DistributionCenter.' . $i . '.id', array('value' => $distributionCenter['DistributionCenter']['id']));
		?>
		</td>
		<td class="display_none">
			<?php echo $distributionCenter['DistributionCenter']['id']; ?>
		</td>
		<td class="display_none">
			<?php echo $distributionCenter['QualifyingCirculation']['id']; //$this->Html->link($distributionCenter['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $distributionCenter['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $distributionCenter['DistributionCenter']['distribution_center_name']; ?>
		</td>
<!--		<td>
			<?php echo $distributionCenter['DistributionCenter']['name_address']; ?>
		</td>-->
		<td>
			<?php echo $distributionCenter['DistributionCenter']['approx_average_no_of_copies_supplied']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $distributionCenter['DistributionCenter']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $distributionCenter['DistributionCenter']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $distributionCenter['DistributionCenter']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $distributionCenter['DistributionCenter']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $distributionCenter['DistributionCenter']['distribution_center_name'])); ?>-->

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
if($i > 0 && 0 && 1)
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
	echo $this->AlaxosForm->create('DistributionCenter', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
