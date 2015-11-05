<div class="districts view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('district');?><?php echo ' - ' . $district['District']['district_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $district['District']['id'], 'copy_id' => $district['District']['id'], 'delete_id' => $district['District']['id'], 'delete_text' => ___('do you really want to delete this district ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('District Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $district['District']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('District Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $district['District']['district_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('State Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($district['State']['state_name'], array('controller' => 'states', 'action' => 'view', $district['State']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($district['District']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($district['District']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($district['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $district['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($district['District']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($district['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $district['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
