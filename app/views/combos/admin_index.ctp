<?php if (isset($combos) && is_array($combos) && count($combos) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($combos, 'Combos List');
    exit;
}
?><div class="combos index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('combos');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Combo', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;" class="display_none"></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Combo Id', true), 'Combo.id');?></th>
                <th class="display_none"><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Name', true), 'Combo.combo_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Cover Price', true), 'Combo.cover_price');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo', true), 'Combo.combo');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td class="display_none"></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
                <td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_id');
			?>
		</td>
		<td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('combo_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cover_price');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('instn');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Combo', array('id' => 'chooseActionForm', 'url' => array('controller' => 'combos', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($combos as $combo):
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
		echo $this->AlaxosForm->checkBox('Combo.' . $i . '.id', array('value' => $combo['Combo']['id']));
		?>
		</td>
		<td class="display_none">
			<?php echo $combo['Combo']['id']; ?>
		</td>
                <td class="display_none">
			<?php echo $tradeTerm['QualifyingCirculation']['id']; //$this->Html->link($tradeTerm['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $tradeTerm['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $combo['Combo']['combo_name']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($combo['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $combo['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $combo['Combo']['cover_price']; ?>
		</td>
		<td>
			<?php echo $combo['Combo']['combo']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $combo['Combo']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $combo['Combo']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $combo['Combo']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $combo['Combo']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $combo['Combo']['combo_name'])); ?>-->

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
	echo $this->AlaxosForm->create('Combo', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
