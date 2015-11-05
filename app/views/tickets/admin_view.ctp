<div class="tickets view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('ticket');?><?php echo !empty($ticket['Ticket']['id']) ? ' - ' . $ticket['Ticket']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $ticket['Ticket']['id'], 'copy_id' => $ticket['Ticket']['id'], 'delete_id' => $ticket['Ticket']['id'], 'delete_text' => ___('do you really want to delete this ticket ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Ticket Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $ticket['Ticket']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Hash'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $ticket['Ticket']['hash']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Data'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $ticket['Ticket']['data']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($ticket['Ticket']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Expires'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($ticket['Ticket']['expires']); ?>
		</td>
	</tr>
	</table>
</div>
