<div class="roles view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('role');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $role['Role']['id'], 'copy_id' => $role['Role']['id'], 'delete_id' => $role['Role']['id'], 'delete_text' => ___('do you really want to delete this role ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Role Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $role['Role']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $role['Role']['name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($role['Role']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($role['Role']['modified']); ?>
		</td>
	</tr>
	</table>
</div>
