<div class="publications view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('publication');?><?php echo !empty($publication['Publication']['publication_name']) ? ' - ' . $publication['Publication']['publication_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $publication['Publication']['id'], 'copy_id' => $publication['Publication']['id'], 'delete_id' => $publication['Publication']['id'], 'delete_text' => ___('do you really want to delete this publication ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Publication Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $publication['Publication']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Publication Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $publication['Publication']['publication_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Description'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $publication['Publication']['description']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($publication['Publication']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($publication['Publication']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($publication['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $publication['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($publication['Publication']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($publication['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $publication['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
