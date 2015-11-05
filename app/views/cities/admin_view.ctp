<div class="cities view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('city');?><?php echo ' - ' . $city['City']['city_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $city['City']['id'], 'copy_id' => $city['City']['id'], 'delete_id' => $city['City']['id'], 'delete_text' => ___('do you really want to delete this city ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('City Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $city['City']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('City Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $city['City']['city_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('District Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($city['District']['district_name'], array('controller' => 'districts', 'action' => 'view', $city['District']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($city['City']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($city['City']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($city['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $city['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($city['City']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($city['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $city['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
