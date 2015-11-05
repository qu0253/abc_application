<div class="addresses view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('address');?><?php echo !empty($address['Address']['id']) ? ' - ' . $address['Address']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $address['Address']['id'], 'copy_id' => $address['Address']['id'], 'delete_id' => $address['Address']['id'], 'delete_text' => ___('do you really want to delete this address ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Address Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Email'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['email']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Address Line 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['address_line_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Address Line 2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['address_line_2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Country Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['Country']['country_name'], array('controller' => 'countries', 'action' => 'view', $address['Country']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Zone Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['Zone']['zone_name'], array('controller' => 'zones', 'action' => 'view', $address['Zone']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('State Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['State']['state_name'], array('controller' => 'states', 'action' => 'view', $address['State']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('District Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['District']['district_name'], array('controller' => 'districts', 'action' => 'view', $address['District']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('City Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Pin Code') ?><tr>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['pin']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Std Code'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['std_code']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Phone Number 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['phone_number_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Phone Number 2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['phone_number_2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Fax Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $address['Address']['fax_number']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($address['Address']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($address['Address']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $address['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($address['Address']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($address['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $address['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
