<?php if (isset($printingCenters) && is_array($printingCenters) && count($printingCenters) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($printingCenters, 'Printing Centers List');
    exit;
}
?><div class="printingCenters index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing centers');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('common_toolbar');
	?>

	<?php
	echo $this->AlaxosForm->create('PrintingCenter', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
<!--		<th style="width:5px;"></th>-->
<!--		<th><?php echo $this->Paginator->sort(__('Printing Center Id', true), 'PrintingCenter.id');?></th>-->
<!--		<th><?php echo $this->Paginator->sort(__('Membership Name', true), 'PrintingCenter.membership_id');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Printed At Name', true), 'City.city_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Date Of First Issue', true), 'PrintingCenter.date_of_first_issue');?></th>
		<th><?php echo $this->Paginator->sort(__('Claimed Circulation', true), 'PrintingCenter.claimed_circulation');?></th>
		<th><?php echo $this->Paginator->sort(__('Size Of Page', true), 'PrintingCenter.size_of_page');?></th>
		<th><?php echo $this->Paginator->sort(__('Number Of Pages', true), 'PrintingCenter.number_of_pages');?></th>
		<th><?php echo $this->Paginator->sort(__('Width Of Column', true), 'PrintingCenter.width_of_column');?></th>
		<th><?php echo $this->Paginator->sort(__('Length Of Column', true), 'PrintingCenter.length_of_column');?></th>
		<th><?php echo $this->Paginator->sort(__('Number Of Columns Per Page', true), 'PrintingCenter.number_of_columns_per_page');?></th>
		<th><?php echo $this->Paginator->sort(__('Type Of Paper Used', true), 'PrintingCenter.type_of_paper_used');?></th>
		<th><?php echo $this->Paginator->sort(__('Type Of Printing Machine', true), 'PrintingCenter.type_of_printing_machine');?></th>
		<th><?php echo $this->Paginator->sort(__('Number Of Printing Machines', true), 'PrintingCenter.number_of_printing_machines');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Capacity', true), 'PrintingCenter.printing_capacity');?></th>
		<th><?php echo $this->Paginator->sort(__('Printing Units', true), 'PrintingCenter.printing_units');?></th>
		<th><?php echo $this->Paginator->sort(__('Capacity Per Printing Units', true), 'PrintingCenter.capacity_per_printing_units');?></th>
		<th><?php echo $this->Paginator->sort(__('File Advertising Rate Card', true), 'PrintingCenter.file_advertising_rate_card');?></th>
		<th><?php echo $this->Paginator->sort(__('File Specimen Copy', true), 'PrintingCenter.file_specimen_copy');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
<!--		<td></td>-->
<!--                <td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>-->
<!--		<td>
			<?php
				echo $this->AlaxosForm->filter_field('membership_id');
			?>
		</td>-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printed_at_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_of_first_issue');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('claimed_circulation');
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
				echo $this->AlaxosForm->filter_field('width_of_column');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('length_of_column');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('number_of_columns_per_page');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('type_of_paper_used');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('type_of_printing_machine');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('number_of_printing_machines');
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
				echo $this->AlaxosForm->filter_field('capacity_per_printing_units');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('file_advertising_rate_card');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('file_specimen_copy');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('PrintingCenter', array('id' => 'chooseActionForm', 'url' => array('controller' => 'printingCenters', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($printingCenters as $printingCenter):
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
		echo $this->AlaxosForm->checkBox('PrintingCenter.' . $i . '.id', array('value' => $printingCenter['PrintingCenter']['id']));
		?>
		</td>-->
<!--		<td>
			<?php echo $printingCenter['PrintingCenter']['id']; ?>
		</td>-->
<!--		<td>
			<?php echo $this->Html->link($printingCenter['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $printingCenter['Membership']['id'])); ?>
		</td>-->
		<td>
			<?php echo $printingCenter['PrintedAt']['city_name']; //$this->Html->link($printingCenter['PrintedAt']['city_name'], array('controller' => 'cities', 'action' => 'view', $printingCenter['PrintedAt']['id'])); ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['date_of_first_issue']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['claimed_circulation']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['size_of_page']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_pages']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['width_of_column']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['length_of_column']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_columns_per_page']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['type_of_paper_used']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['type_of_printing_machine']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_printing_machines']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['printing_capacity']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['printing_units']; ?>
		</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['capacity_per_printing_units']; ?>
		</td>
		<td>
			<?php
			$file_name = $printingCenter['PrintingCenter']['file_advertising_rate_card'];
			if (!empty($file_name)) {
				echo $this->AlaxosForm->get_download_link($printingCenter['PrintingCenter']['file_advertising_rate_card'], 'printing_centers', $printingCenter['PrintingCenter']['id'], 'file_advertising_rate_card');
			} ?>
		</td>
		<td>
			<?php
			$file_name = $printingCenter['PrintingCenter']['file_specimen_copy'];
			if (!empty($file_name)) {
				echo $this->AlaxosForm->get_download_link($printingCenter['PrintingCenter']['file_specimen_copy'], 'printing_centers', $printingCenter['PrintingCenter']['id'], 'file_specimen_copy');
			} ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $printingCenter['PrintingCenter']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
                        <?php
                        $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
                        if ($this->Support->isEditable($mem_status_id)) {
                            ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $printingCenter['PrintingCenter']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $printingCenter['PrintingCenter']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $printingCenter['PrintingCenter']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $printingCenter['PrintingCenter']['id'])); ?>-->
                            <?php
                        }
                        ?>

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

</div>
	<div class="select_rec_per_page">
            <?php

	$passedArgs = $this->passedArgs;
	unset($passedArgs['limit']);
	echo $this->AlaxosForm->create('PrintingCenter', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
