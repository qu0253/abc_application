<?php if (isset($printingPresses) && is_array($printingPresses) && count($printingPresses) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($printingPresses, 'Printing Presses List');
    exit;
}
?><div class="printingPresses index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing presses');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('PrintingPress', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Printing Press Id', true), 'PrintingPress.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Press Name', true), 'PrintingPress.printing_press_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Address', true), 'PrintingPress.address');?></th>
		<th><?php echo $this->Paginator->sort(__('Std Code', true), 'PrintingPress.std_code');?></th>
		<th><?php echo $this->Paginator->sort(__('Phone Number 1', true), 'PrintingPress.phone_number_1');?></th>
		<th><?php echo $this->Paginator->sort(__('Fax Number', true), 'PrintingPress.fax_number');?></th>
		<th><?php echo $this->Paginator->sort(__('Dates On Which Publication Is Normally Sent For Printing', true), 'PrintingPress.dates_on_which_publication_is_normally_sent_for_printing');?></th>
		<th><?php echo $this->Paginator->sort(__('Normal Printing Schedule', true), 'PrintingPress.normal_printing_schedule');?></th>
		<th><?php echo $this->Paginator->sort(__('Normal Start Time', true), 'PrintingPress.normal_start_time');?></th>
		<th><?php echo $this->Paginator->sort(__('Normal Completion Time', true), 'PrintingPress.normal_completion_time');?></th>
		<th><?php echo $this->Paginator->sort(__('Sent For Printing', true), 'PrintingPress.sent_for_printing');?></th>
		<th><?php echo $this->Paginator->sort(__('Size Of Page', true), 'PrintingPress.size_of_page');?></th>
		<th><?php echo $this->Paginator->sort(__('Number Of Pages', true), 'PrintingPress.number_of_pages');?></th>
		<th><?php echo $this->Paginator->sort(__('Make Of Newprint Used', true), 'PrintingPress.make_of_newprint_used');?></th>
		<th><?php echo $this->Paginator->sort(__('Make Of Printing Machine', true), 'PrintingPress.make_of_printing_machine');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Capacity', true), 'PrintingPress.printing_capacity');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Units', true), 'PrintingPress.printing_units');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'PrintingPress.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('printing_press_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('address');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('std_code');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('phone_number_1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('fax_number');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('dates_on_which_publication_is_normally_sent_for_printing');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('normal_printing_schedule');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('normal_start_time');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('normal_completion_time');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('sent_for_printing');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('size_of_page');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('number_of_pages');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('make_of_newprint_used');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('make_of_printing_machine');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printing_capacity');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printing_units');
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
			echo $this->AlaxosForm->create('PrintingPress', array('id' => 'chooseActionForm', 'url' => array('controller' => 'printingPresses', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($printingPresses as $printingPress):
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
		echo $this->AlaxosForm->checkBox('PrintingPress.' . $i . '.id', array('value' => $printingPress['PrintingPress']['id']));
		?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($printingPress['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $printingPress['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['printing_press_name']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['address']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['std_code']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['phone_number_1']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['fax_number']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['dates_on_which_publication_is_normally_sent_for_printing']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['normal_printing_schedule']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['normal_start_time']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['normal_completion_time']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['sent_for_printing']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['size_of_page']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['number_of_pages']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['make_of_newprint_used']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['make_of_printing_machine']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['printing_capacity']; ?>
		</td>
		<td>
			<?php echo $printingPress['PrintingPress']['printing_units']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($printingPress['PrintingPress']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $printingPress['PrintingPress']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $printingPress['PrintingPress']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $printingPress['PrintingPress']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $printingPress['PrintingPress']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $printingPress['PrintingPress']['printing_press_name'])); ?>

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
	echo $this->AlaxosForm->create('PrintingPress', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
