<?php if (isset($representatives) && is_array($representatives) && count($representatives) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($representatives, 'Representatives List');
    exit;
}
?><div class="representatives index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('representatives');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
//	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => false, 'print' => false, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Representative', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<!--<th style="width:5px;"></th>-->
<!--		<th><?php echo $this->Paginator->sort(__('Representative Id', true), 'Representative.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Membership Name', true), 'Membership.name');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Representative Type Name', true), 'RepresentativeType.representative_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Representative Name', true), 'Representative.representative_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Designation', true), 'Representative.designation');?></th>
		<th><?php echo $this->Paginator->sort(__('Additional Details', true), 'Representative.additional_details');?></th>
		
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
				echo $this->AlaxosForm->filter_field('representative_type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('representative_name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('designation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_details');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Representative', array('id' => 'chooseActionForm', 'url' => array('controller' => 'representatives', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($representatives as $representative):
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
		echo $this->AlaxosForm->checkBox('Representative.' . $i . '.id', array('value' => $representative['Representative']['id']));
		?>
		</td>-->
<!--		<td>
			<?php echo $representative['Representative']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($representative['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $representative['Membership']['id'])); ?>
		</td>-->
		<td>
			<?php echo $representative['RepresentativeType']['representative_type_name']; //$this->Html->link($representative['RepresentativeType']['representative_type_name'], array('controller' => 'representative_types', 'action' => 'view', $representative['RepresentativeType']['id'])); ?>
		</td>
		<td>
			<?php echo $representative['Prefix']['prefix_name'] . ' ' . $representative['Representative']['representative_name']; ?>
		</td>
		<td>
			<?php echo $representative['Representative']['designation']; ?>
		</td>
		<td>
			<?php echo $representative['Representative']['additional_details']; ?>
		</td>
		<td class="actions">
                        <?php
                        $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
			echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $representative['Representative']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View'));
                        if ($this->Support->isEditable($mem_status_id)) {
                            ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $representative['Representative']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $representative['Representative']['id']), array('escape' => false, 'title' => 'Copy')); ?>-->
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $representative['Representative']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $representative['Prefix']['prefix_name'] . ' ' . $representative['Representative']['representative_name'])); ?>-->
                         <?php
                        }
                        ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>         		
</div>	
