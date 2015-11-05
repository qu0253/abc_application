<div class="notifications view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('notification');?><?php echo ' - ' . $notification['Notification']['title']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $notification['Notification']['id'], 'copy_id' => $notification['Notification']['id'], 'delete_id' => $notification['Notification']['id'], 'delete_text' => ___('do you really want to delete this notification ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Notification Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Title'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['title']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Interpretation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['interpretation']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Subject'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['subject']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Html Email Content'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['html_email_content']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('CC'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['cc']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('BCC'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $notification['Notification']['bcc']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($notification['Notification']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($notification['Notification']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($notification['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $notification['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($notification['Notification']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($notification['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $notification['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
