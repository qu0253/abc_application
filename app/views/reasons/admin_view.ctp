<div class="reasons view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('reason');?><?php echo ' - ' . $reason['Reason']['reason_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $reason['Reason']['id'], 'copy_id' => $reason['Reason']['id'], 'delete_id' => $reason['Reason']['id'], 'delete_text' => ___('do you really want to delete this reason ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Reason Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $reason['Reason']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Reason Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $reason['Reason']['reason_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $reason['Reason']['description']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($reason['Reason']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $reason['Reason']['created']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($reason['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $reason['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $reason['Reason']['modified']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($reason['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $reason['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
