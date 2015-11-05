<div class="zones view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('zone');?><?php echo ' - ' . $zone['Zone']['zone_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $zone['Zone']['id'], 'copy_id' => $zone['Zone']['id'], 'delete_id' => $zone['Zone']['id'], 'delete_text' => ___('do you really want to delete this zone ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Zone Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $zone['Zone']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Zone Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $zone['Zone']['zone_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Country Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($zone['Country']['country_name'], array('controller' => 'countries', 'action' => 'view', $zone['Country']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($zone['Zone']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($zone['Zone']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($zone['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $zone['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($zone['Zone']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($zone['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $zone['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
