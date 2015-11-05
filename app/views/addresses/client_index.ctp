<?php if (isset($addresses) && is_array($addresses) && count($addresses) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($addresses, 'Addresses List');
    exit;
}
?><div class="addresses index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('addresses');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => false, 'print' => false, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Address', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Address Id', true), 'Address.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Email', true), 'Address.email');?></th>
		<th><?php echo $this->Paginator->sort(__('Address Line 1', true), 'Address.address_line_1');?></th>
		<th><?php echo $this->Paginator->sort(__('Address Line 2', true), 'Address.address_line_2');?></th>
		<th><?php echo $this->Paginator->sort(__('Country Name', true), 'Country.country_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Zone Name', true), 'Zone.zone_name');?></th>
		<th><?php echo $this->Paginator->sort(__('State Name', true), 'State.state_name');?></th>
		<th><?php echo $this->Paginator->sort(__('District Name', true), 'District.district_name');?></th>
		<th><?php echo $this->Paginator->sort(__('City Name', true), 'City.city_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Pin', true), 'Address.pin');?></th>
		<th><?php echo $this->Paginator->sort(__('Std Code', true), 'Address.std_code');?></th>
		<th><?php echo $this->Paginator->sort(__('Phone Number 1', true), 'Address.phone_number_1');?></th>
		<th><?php echo $this->Paginator->sort(__('Phone Number 2', true), 'Address.phone_number_2');?></th>
		<th><?php echo $this->Paginator->sort(__('Fax Number', true), 'Address.fax_number');?></th>
		
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
				echo $this->AlaxosForm->filter_field('email');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('address_line_1');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('address_line_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('country_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('zone_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('state_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('district_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('city_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('pin');
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
				echo $this->AlaxosForm->filter_field('phone_number_2');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('fax_number');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Address', array('id' => 'chooseActionForm', 'url' => array('controller' => 'addresses', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($addresses as $address):
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
		echo $this->AlaxosForm->checkBox('Address.' . $i . '.id', array('value' => $address['Address']['id']));
		?>
		</td>
		<td>
			<?php echo $address['Address']['id']; ?>
		</td>
		<td>
			<?php echo $address['Address']['email']; ?>
		</td>
		<td>
			<?php echo $address['Address']['address_line_1']; ?>
		</td>
		<td>
			<?php echo $address['Address']['address_line_2']; ?>
		</td>
		<td>
			<?php echo $address['Country']['country_name']; //$this->Html->link($address['Country']['country_name'], array('controller' => 'countries', 'action' => 'view', $address['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $address['Zone']['zone_name']; //$this->Html->link($address['Zone']['zone_name'], array('controller' => 'zones', 'action' => 'view', $address['Zone']['id'])); ?>
		</td>
		<td>
			<?php echo $address['State']['state_name']; //$this->Html->link($address['State']['state_name'], array('controller' => 'states', 'action' => 'view', $address['State']['id'])); ?>
		</td>
		<td>
			<?php echo $address['District']['district_name']; //$this->Html->link($address['District']['district_name'], array('controller' => 'districts', 'action' => 'view', $address['District']['id'])); ?>
		</td>
		<td>
			<?php echo $address['City']['city_name']; //$this->Html->link($address['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
		</td>
		<td>
			<?php echo $address['Address']['pin']; ?>
		</td>
		<td>
			<?php echo $address['Address']['std_code']; ?>
		</td>
		<td>
			<?php echo $address['Address']['phone_number_1']; ?>
		</td>
		<td>
			<?php echo $address['Address']['phone_number_2']; ?>
		</td>
		<td>
			<?php echo $address['Address']['fax_number']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $address['Address']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $address['Address']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $address['Address']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $address['Address']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $address['Address']['id'])); ?>-->

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
	echo $this->AlaxosForm->create('Address', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
