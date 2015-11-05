<?php if (isset($auditorBranches) && is_array($auditorBranches) && count($auditorBranches) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($auditorBranches, 'Auditor Branches List');
    exit;
}
?><div class="auditorBranches index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('auditor branches');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('AuditorBranch', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<!--th><?php echo $this->Paginator->sort(__('Auditor Branch Id', true), 'AuditorBranch.id');?></th-->
		<th><?php echo $this->Paginator->sort(__('Auditor Firm Name', true), 'AuditorFirm.auditor_firm_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Auditor Branch Name', true), 'AuditorBranch.auditor_branch_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'AuditorBranch.active');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
		<!--td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('auditor_firm_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('auditor_branch_name');
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
			echo $this->AlaxosForm->create('AuditorBranch', array('id' => 'chooseActionForm', 'url' => array('controller' => 'auditorBranches', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($auditorBranches as $auditorBranch):
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
			echo $this->AlaxosForm->checkBox('AuditorBranch.' . $i . '.id', array('value' => $auditorBranch['AuditorBranch']['id']));
		?>
		</td>
		<!--td>
			<?php echo $auditorBranch['AuditorBranch']['id']; ?>
		</td-->
		<td>
			<?php echo $this->Html->link($auditorBranch['AuditorFirm']['auditor_firm_name'], array('controller' => 'auditor_firms', 'action' => 'view', $auditorBranch['AuditorFirm']['id'])); ?>
		</td>
		<td>
			<?php 
                                echo $auditorBranch['AuditorBranch']['auditor_branch_name'];
                        ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($auditorBranch['AuditorBranch']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $auditorBranch['AuditorBranch']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $auditorBranch['AuditorBranch']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $auditorBranch['AuditorBranch']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $auditorBranch['AuditorBranch']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $auditorBranch['AuditorBranch']['auditor_branch_name'])); ?>-->

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
	echo $this->AlaxosForm->create('AuditorBranch', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
