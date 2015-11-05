<div class="categories view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('category');?><?php echo ' - ' . $category['Category']['category_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $category['Category']['id'], 'copy_id' => $category['Category']['id'], 'delete_id' => $category['Category']['id'], 'delete_text' => ___('do you really want to delete this category ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Category Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $category['Category']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Category Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $category['Category']['category_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($category['Category']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($category['Category']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($category['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $category['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($category['Category']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($category['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $category['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
