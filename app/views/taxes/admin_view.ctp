<div class="taxes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('tax');?><?php echo ' - ' . $tax['Tax']['tax_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $tax['Tax']['id'], 'copy_id' => $tax['Tax']['id'], 'delete_id' => $tax['Tax']['id'], 'delete_text' => ___('do you really want to delete this tax ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Tax Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tax['Tax']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Tax Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tax['Tax']['tax_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Tax Percentage'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $tax['Tax']['tax_percentage']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($tax['Tax']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($tax['Tax']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tax['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $tax['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($tax['Tax']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($tax['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $tax['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
