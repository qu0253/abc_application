<div class="states view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('state');?><?php echo ' - ' . $state['State']['state_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $state['State']['id'], 'copy_id' => $state['State']['id'], 'delete_id' => $state['State']['id'], 'delete_text' => ___('do you really want to delete this state ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('State Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $state['State']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('State Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $state['State']['state_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Zone Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($state['Zone']['zone_name'], array('controller' => 'zones', 'action' => 'view', $state['Zone']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($state['State']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($state['State']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($state['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $state['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($state['State']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($state['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $state['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
