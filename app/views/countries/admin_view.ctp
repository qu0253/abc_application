<div class="countries view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('country');?><?php echo ' - ' . $country['Country']['country_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $country['Country']['id'], 'copy_id' => $country['Country']['id'], 'delete_id' => $country['Country']['id'], 'delete_text' => ___('do you really want to delete this country ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Country Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $country['Country']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Country Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $country['Country']['country_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($country['Country']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($country['Country']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($country['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $country['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($country['Country']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($country['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $country['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
