<?php if (isset($partners) && is_array($partners) && count($partners) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($partners, 'Partners List');
    exit;
}
?><div class="partners index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('partners');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Partner', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<!--th><?php echo $this->Paginator->sort(__('Partner Id', true), 'Partner.id');?></th-->
		<th><?php echo $this->Paginator->sort(__('Auditor Firm Name', true), 'AuditorFirm.auditor_firm_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Auditor Branch Name', true), 'AuditorBranch.auditor_branch_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Partner Name', true), 'Partner.partner_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Registration Number', true), 'Partner.registration_number');?></th>
		<th><?php echo $this->Paginator->sort(___('Phone Number 2'), 'Address.phone_number_2');?></th>
		<th><?php echo $this->Paginator->sort(___('Email'), 'Address.email');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'Partner.active');?></th>
		
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
                                $view =& ClassRegistry :: getObject('view');  
                                if (empty($view->viewVars['auditorFirms'])) {
                                    $view->viewVars['auditorFirms'] = array();
                                }
				echo $this->AlaxosForm->filter_field('AuditorBranch.auditor_firm_id', array('options' => $view->viewVars['auditorFirms'], 'empty' => 'All Auditor Firms'));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('auditor_branch_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('partner_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('registration_number');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('Address.phone_number_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('Address.email');
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
			echo $this->AlaxosForm->create('Partner', array('id' => 'chooseActionForm', 'url' => array('controller' => 'partners', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($partners as $partner):
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
		echo $this->AlaxosForm->checkBox('Partner.' . $i . '.id', array('value' => $partner['Partner']['id']));
		?>
		</td>
		<!--td>
			<?php echo $partner['Partner']['id']; ?>
		</td-->
		<td>
			<?php echo $this->Html->link($partner['AuditorFirm']['auditor_firm_name'], array('controller' => 'auditor_firms', 'action' => 'view', $partner['AuditorFirm']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($partner['AuditorBranch']['auditor_branch_name'], array('controller' => 'auditor_branches', 'action' => 'view', $partner['AuditorBranch']['id'])); echo ($partner['AuditorFirm']['auditor_branch_id'] == $partner['AuditorBranch']['id']) ? ' (HO)' : '';?>
		</td>
		<td>
			<?php echo $partner['Partner']['partner_name']; ?>
		</td>
		<td>
			<?php echo $partner['Partner']['registration_number']; ?>
		</td>
		<td>
			<?php echo $partner['Address']['phone_number_2']; ?>
		</td>
		<td>
			<?php echo $partner['Address']['email']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($partner['Partner']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $partner['Partner']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $partner['Partner']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $partner['Partner']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $partner['Partner']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $partner['Partner']['partner_name'])); ?>-->

		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?> |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?> |
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
	echo $this->AlaxosForm->create('Partner', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
