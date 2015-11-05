<div class="centerTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('center type');?><?php echo ' - ' . $centerType['CenterType']['center_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $centerType['CenterType']['id'], 'copy_id' => $centerType['CenterType']['id'], 'delete_id' => $centerType['CenterType']['id'], 'delete_text' => ___('do you really want to delete this center type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Center Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $centerType['CenterType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Center Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $centerType['CenterType']['center_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($centerType['CenterType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($centerType['CenterType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($centerType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $centerType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($centerType['CenterType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($centerType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $centerType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
