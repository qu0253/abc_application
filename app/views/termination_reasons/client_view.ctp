<div class="terminationReasons view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('termination reason');?><?php echo !empty($terminationReason['TerminationReason']['termination_reason_name']) ? ' - ' . $terminationReason['TerminationReason']['termination_reason_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $terminationReason['TerminationReason']['id'], 'copy_id' => $terminationReason['TerminationReason']['id'], 'delete_id' => $terminationReason['TerminationReason']['id'], 'delete_text' => ___('do you really want to delete this termination reason ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Termination Reason Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $terminationReason['TerminationReason']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Termination Reason Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $terminationReason['TerminationReason']['termination_reason_name']; ?>
		</td>
	</tr>
	</table>
</div>
