<?php if (isset($printingCenterAuditorBranches) && is_array($printingCenterAuditorBranches) && count($printingCenterAuditorBranches) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($printingCenterAuditorBranches, 'Printing Center Auditor Branches List');
    exit;
}
?><div class="printingCenterAuditorBranches index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing center auditor branches');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('PrintingCenterAuditorBranch', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Printing Center Auditor Branch Id', true), 'PrintingCenterAuditorBranch.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Center Id', true), 'PrintingCenterAuditorBranch.printing_center_id');?></th>
		<th><?php echo $this->Paginator->sort(__('Auditor Branch Id', true), 'PrintingCenterAuditorBranch.auditor_branch_id');?></th>
		<th><?php echo $this->Paginator->sort(__('Regular Period Id', true), 'PrintingCenterAuditorBranch.regular_period_id');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'PrintingCenterAuditorBranch.active');?></th>
		
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
				echo $this->AlaxosForm->filter_field('printing_center_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('auditor_branch_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('regular_period_id');
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
			echo $this->AlaxosForm->create('PrintingCenterAuditorBranch', array('id' => 'chooseActionForm', 'url' => array('controller' => 'printingCenterAuditorBranches', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($printingCenterAuditorBranches as $printingCenterAuditorBranch):
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
		echo $this->AlaxosForm->checkBox('PrintingCenterAuditorBranch.' . $i . '.id', array('value' => $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']));
		?>
		</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']; ?>
		</td>
		<td>
			<?php echo $printingCenters[$printingCenterAuditorBranch['PrintingCenterAuditorBranch']['printing_center_id']]; ?>
		</td>
		<td>
			<?php echo $auditorBranches[$printingCenterAuditorBranch['PrintingCenterAuditorBranch']['auditor_branch_id']]; ?>
		</td>
		<td>
			<?php echo $regularPeriods[$printingCenterAuditorBranch['PrintingCenterAuditorBranch']['regular_period_id']]; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($printingCenterAuditorBranch['PrintingCenterAuditorBranch']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php //echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id'])); ?>

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
	echo $this->AlaxosForm->create('PrintingCenterAuditorBranch', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
