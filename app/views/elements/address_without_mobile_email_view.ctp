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
                <?php echo $address['Country']['country_name']; //$this->Html->link($address['Country']['country_name'], array('controller' => 'countries', 'action' => 'view', $address['Country']['id'])); ?>
        </td>
</tr>
<tr>
        <td>
                <?php ___('Zone Name'); ?>
        </td>
        <td>:</td>
        <td>
                <?php echo $address['Zone']['zone_name']; //$this->Html->link($address['Zone']['zone_name'], array('controller' => 'zones', 'action' => 'view', $address['Zone']['id'])); ?>
        </td>
</tr>
<tr>
        <td>
                <?php ___('State Name'); ?>
        </td>
        <td>:</td>
        <td>
                <?php echo $address['State']['state_name']; //$this->Html->link($address['State']['state_name'], array('controller' => 'states', 'action' => 'view', $address['State']['id'])); ?>
        </td>
</tr>
<tr>
        <td>
                <?php ___('District Name'); ?>
        </td>
        <td>:</td>
        <td>
                <?php echo $address['District']['district_name']; //$this->Html->link($address['District']['district_name'], array('controller' => 'districts', 'action' => 'view', $address['District']['id'])); ?>
        </td>
</tr>
<tr>
        <td>
                <?php ___('City Name'); ?>
        </td>
        <td>:</td>
        <td>
                <?php echo $address['City']['city_name']; //$this->Html->link($address['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
        </td>
</tr>
<tr>
        <td>
                <?php ___('Pin Code') ?>
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
                <?php ___('Fax Number'); ?>
        </td>
        <td>:</td>
        <td>
                <?php echo $address['Address']['fax_number']; ?>
        </td>
</tr>