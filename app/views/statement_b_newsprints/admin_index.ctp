<?php if (isset($statementBNewsprints) && is_array($statementBNewsprints) && count($statementBNewsprints) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($statementBNewsprints, 'Statement B Newsprints List');
    exit;
}
?><div class="statementBNewsprints index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('statement b newsprints');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('StatementBNewsprint', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Statement B Newsprint Id', true), 'StatementBNewsprint.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Name Of Publication', true), 'StatementBNewsprint.name_of_publication');?></th>
		<th><?php echo $this->Paginator->sort(__('Average No Of Pages Printed During The Period', true), 'StatementBNewsprint.average_no_of_pages_printed_during_the_period');?></th>
		<th><?php echo $this->Paginator->sort(__('Actual No Of Pages Printed During The Period As Per Production', true), 'StatementBNewsprint.actual_no_of_pages_printed_during_the_period_as_per_production');?></th>
		<th><?php echo $this->Paginator->sort(__('Size Of The Page Sq Cm', true), 'StatementBNewsprint.size_of_the_page_sq_cm');?></th>
		<th><?php echo $this->Paginator->sort(__('Act Consmp Of Ns Ppr Incl Waste', true), 'StatementBNewsprint.act_consmp_of_ns_ppr_incl_waste');?></th>
		<th><?php echo $this->Paginator->sort(__('Gsm', true), 'StatementBNewsprint.gsm');?></th>
		<th><?php echo $this->Paginator->sort(__('Remarks', true), 'StatementBNewsprint.remarks');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'StatementBNewsprint.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('name_of_publication');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('average_no_of_pages_printed_during_the_period');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('actual_no_of_pages_printed_during_the_period_as_per_production');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('size_of_the_page_sq_cm');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('act_consmp_of_ns_ppr_incl_waste');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('gsm');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('remarks');
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
			echo $this->AlaxosForm->create('StatementBNewsprint', array('id' => 'chooseActionForm', 'url' => array('controller' => 'statementBNewsprints', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($statementBNewsprints as $statementBNewsprint):
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
		echo $this->AlaxosForm->checkBox('StatementBNewsprint.' . $i . '.id', array('value' => $statementBNewsprint['StatementBNewsprint']['id']));
		?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($statementBNewsprint['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $statementBNewsprint['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['name_of_publication']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['average_no_of_pages_printed_during_the_period']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['actual_no_of_pages_printed_during_the_period_as_per_production']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['size_of_the_page_sq_cm']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['act_consmp_of_ns_ppr_incl_waste']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['gsm']; ?>
		</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['remarks']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($statementBNewsprint['StatementBNewsprint']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $statementBNewsprint['StatementBNewsprint']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $statementBNewsprint['StatementBNewsprint']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $statementBNewsprint['StatementBNewsprint']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $statementBNewsprint['StatementBNewsprint']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $statementBNewsprint['StatementBNewsprint']['id'])); ?>

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
	echo $this->AlaxosForm->create('StatementBNewsprint', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
