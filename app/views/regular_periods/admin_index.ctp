<?php if (isset($regularPeriods) && is_array($regularPeriods) && count($regularPeriods) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($regularPeriods, 'Regular Periods List');
    exit;
}
?><div class="regularPeriods index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('regular periods');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('RegularPeriod', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Regular Period Id', true), 'RegularPeriod.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Regular Period Name', true), 'RegularPeriod.regular_period_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Volume Number', true), 'RegularPeriod.volume_number');?></th>
		<th><?php echo $this->Paginator->sort(__('From Date', true), 'RegularPeriod.from_date');?></th>
		<th><?php echo $this->Paginator->sort(__('To Date', true), 'RegularPeriod.to_date');?></th>
		<th><?php echo $this->Paginator->sort(__('Cut Off Date', true), 'RegularPeriod.cut_off_date');?></th>
		<th><?php echo $this->Paginator->sort(__('Grace Days Reminder 1', true), 'RegularPeriod.grace_days_reminder_1');?></th>
		<th><?php echo $this->Paginator->sort(__('Grace Days Reminder 2', true), 'RegularPeriod.grace_days_reminder_2');?></th>
		<th><?php echo $this->Paginator->sort(__('Grace Days Reminder 3', true), 'RegularPeriod.grace_days_reminder_3');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'RegularPeriod.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('regular_period_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('volume_number');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('from_date');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('to_date');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cut_off_date');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('grace_days_reminder_1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('grace_days_reminder_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('grace_days_reminder_3');
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
			echo $this->AlaxosForm->create('RegularPeriod', array('id' => 'chooseActionForm', 'url' => array('controller' => 'regularPeriods', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($regularPeriods as $regularPeriod):
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
		echo $this->AlaxosForm->checkBox('RegularPeriod.' . $i . '.id', array('value' => $regularPeriod['RegularPeriod']['id']));
		?>
		</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['id']; ?>
		</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['regular_period_name']; ?>
		</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['volume_number']; ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['from_date']); ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['to_date']); ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['cut_off_date']); ?>
		</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['grace_days_reminder_1']; ?>
		</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['grace_days_reminder_2']; ?>
		</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['grace_days_reminder_3']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($regularPeriod['RegularPeriod']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $regularPeriod['RegularPeriod']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $regularPeriod['RegularPeriod']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $regularPeriod['RegularPeriod']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $regularPeriod['RegularPeriod']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $regularPeriod['RegularPeriod']['regular_period_name'])); ?>-->

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
	echo $this->AlaxosForm->create('RegularPeriod', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
