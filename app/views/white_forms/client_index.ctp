<?php if (isset($whiteForms) && is_array($whiteForms) && count($whiteForms) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($whiteForms, 'White Forms List');
    exit;
}
echo $this->render('client_add');
?><div class="whiteForms index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h3><?php ___('white forms');?></h3>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => false, 'print' => false, 'add' => false, 'container_class' => 'toolbar_container_list',
            'additional_buttons' => array(
                __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
            )));
	?>

	<?php
	echo $this->AlaxosForm->create('WhiteForm', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;" class="display_none"></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('White Form Id', true), 'WhiteForm.id');?></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Zone Name', true), 'Zone.zone_name');?></th>
		<th><?php echo $this->Paginator->sort(__('State Name', true), 'State.state_name');?></th>
		<th><?php echo $this->Paginator->sort(__('District Name', true), 'District.district_name');?></th>
		<th><?php echo $this->Paginator->sort(__('City Name', true), 'City.city_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Circulation', true), 'WhiteForm.circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Sunday', true), 'WhiteForm.sunday');?></th>
		
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
		<td>
			<?php
//				echo $this->AlaxosForm->filter_field('city_id');
			?>
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('circulation');
			?>
		</td>
                <td>
			<?php
				echo $this->AlaxosForm->filter_field('sunday');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('WhiteForm', array('id' => 'chooseActionForm', 'url' => array('controller' => 'whiteForms', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($whiteForms as $whiteForm):
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
		echo $this->AlaxosForm->checkBox('WhiteForm.' . $i . '.id', array('value' => $whiteForm['WhiteForm']['id']));
		?>
		</td>
		<td class="display_none">
			<?php echo $whiteForm['WhiteForm']['id']; ?>
		</td>
		<td class="display_none">
			<?php echo $whiteForm['QualifyingCirculation']['id']; //$this->Html->link($whiteForm['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $whiteForm['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $whiteForm['Zone']['zone_name']; //$this->Html->link($whiteForm['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $whiteForm['City']['id'])); ?>
		</td>
		<td>
			<?php echo $whiteForm['State']['state_name']; //$this->Html->link($whiteForm['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $whiteForm['City']['id'])); ?>
		</td>
		<td>
			<?php echo $whiteForm['District']['district_name']; //$this->Html->link($whiteForm['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $whiteForm['City']['id'])); ?>
		</td>
		<td>
			<?php echo $whiteForm['City']['city_name']; //$this->Html->link($whiteForm['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $whiteForm['City']['id'])); ?>
		</td>
		<td>
			<?php echo $whiteForm['WhiteForm']['circulation']; ?>
		</td>
		<td>
			<?php echo $whiteForm['WhiteForm']['sunday']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $whiteForm['WhiteForm']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $whiteForm['WhiteForm']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php //echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $whiteForm['WhiteForm']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $whiteForm['WhiteForm']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $whiteForm['WhiteForm']['id'])); ?>

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
	<div class="select_rec_per_page">
            <?php

	$passedArgs = $this->passedArgs;
	unset($passedArgs['limit']);
	echo $this->AlaxosForm->create('WhiteForm', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
