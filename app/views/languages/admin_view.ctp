<div class="languages view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('language');?><?php echo ' - ' . $language['Language']['language_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $language['Language']['id'], 'copy_id' => $language['Language']['id'], 'delete_id' => $language['Language']['id'], 'delete_text' => ___('do you really want to delete this language ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Language Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $language['Language']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Language Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $language['Language']['language_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($language['Language']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($language['Language']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($language['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $language['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($language['Language']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($language['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $language['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
