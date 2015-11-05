<?php if (isset($holdingCompanies) && is_array($holdingCompanies) && count($holdingCompanies) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($holdingCompanies, 'Holding Companies List');
    exit;
}
?><div class="holdingCompanies index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('holding companies');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('common_toolbar');
	?>

	<?php
	echo $this->AlaxosForm->create('HoldingCompany', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
<!--		<th style="width:5px;"></th>-->
<!--		<th><?php echo $this->Paginator->sort(__('Holding Company Id', true), 'HoldingCompany.id');?></th>
<!--		<th><?php echo $this->Paginator->sort(__('Membership Name', true), 'Membership.name');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Holding Company Name', true), 'HoldingCompany.holding_company_name');?></th>
<!--		<th><?php echo $this->Paginator->sort(__('Active', true), 'HoldingCompany.active');?></th>-->
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
<!--		<td></td>-->
<!--                <td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('membership_id');
			?>
		</td>-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('holding_company_name');
			?>
		</td>
<!--		<td>
			<?php
				echo $this->AlaxosForm->filter_field('active');
			?>
		</td>-->
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('HoldingCompany', array('id' => 'chooseActionForm', 'url' => array('controller' => 'holdingCompanies', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($holdingCompanies as $holdingCompany):
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
<!--		<td>
		<?php
		echo $this->AlaxosForm->checkBox('HoldingCompany.' . $i . '.id', array('value' => $holdingCompany['HoldingCompany']['id']));
		?>
		</td>-->
<!--		<td>
			<?php echo $holdingCompany['HoldingCompany']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($holdingCompany['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $holdingCompany['Membership']['id'])); ?>
		</td>-->
		<td>
			<?php echo $holdingCompany['HoldingCompany']['holding_company_name']; ?>
		</td>
<!--		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($holdingCompany['HoldingCompany']['active']);
			?>
		</td>-->
		<td class="actions">

			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $holdingCompany['HoldingCompany']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $holdingCompany['HoldingCompany']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $holdingCompany['HoldingCompany']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $holdingCompany['HoldingCompany']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $holdingCompany['HoldingCompany']['holding_company_name'])); ?>-->

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