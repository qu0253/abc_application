<?php if (isset($tickets) && is_array($tickets) && count($tickets) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($tickets, 'Tickets List');
    exit;
}
?><div class="tickets index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('tickets');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Ticket', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Ticket Id', true), 'Ticket.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Hash', true), 'Ticket.hash');?></th>
		<th><?php echo $this->Paginator->sort(__('Data', true), 'Ticket.data');?></th>
		<th><?php echo $this->Paginator->sort(__('Expires', true), 'Ticket.expires');?></th>
		
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
				echo $this->AlaxosForm->filter_field('hash');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('data');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('expires');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Ticket', array('id' => 'chooseActionForm', 'url' => array('controller' => 'tickets', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($tickets as $ticket):
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
		echo $this->AlaxosForm->checkBox('Ticket.' . $i . '.id', array('value' => $ticket['Ticket']['id']));
		?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['hash']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['data']; ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($ticket['Ticket']['expires']); ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $ticket['Ticket']['id']), array('class' => 'to_detail', 'escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $ticket['Ticket']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $ticket['Ticket']['id']), array('escape' => false)); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $ticket['Ticket']['id']), array('escape' => false), sprintf(___("are you sure you want to delete '%s' ?", true), $ticket['Ticket']['id'])); ?>-->

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
	echo $this->AlaxosForm->create('Ticket', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
