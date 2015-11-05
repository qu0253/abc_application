<?php if (isset($terminationReasons) && is_array($terminationReasons) && count($terminationReasons) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($terminationReasons, 'Termination Reasons List');
    exit;
}
?><div class="terminationReasons index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('termination reasons');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('TerminationReason', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Termination Reason Id', true), 'TerminationReason.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Termination Reason Name', true), 'TerminationReason.termination_reason_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'TerminationReason.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('termination_reason_name');
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
			echo $this->AlaxosForm->create('TerminationReason', array('id' => 'chooseActionForm', 'url' => array('controller' => 'terminationReasons', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($terminationReasons as $terminationReason):
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
		echo $this->AlaxosForm->checkBox('TerminationReason.' . $i . '.id', array('value' => $terminationReason['TerminationReason']['id']));
		?>
		</td>
		<td>
			<?php echo $terminationReason['TerminationReason']['id']; ?>
		</td>
		<td>
			<?php echo $terminationReason['TerminationReason']['termination_reason_name']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($terminationReason['TerminationReason']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $terminationReason['TerminationReason']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $terminationReason['TerminationReason']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $terminationReason['TerminationReason']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $terminationReason['TerminationReason']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $terminationReason['TerminationReason']['termination_reason_name'])); ?>

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
	echo $this->AlaxosForm->create('TerminationReason', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
