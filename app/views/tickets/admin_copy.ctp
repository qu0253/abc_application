<div class="tickets form">

	<?php echo $this->AlaxosForm->create('Ticket', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('admin copy ticket'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $ticket['Ticket']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Hash') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('hash', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Data') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('data', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Expires') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('expires', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___d('alaxos', 'copy', true)); ?> 		</td>
 	</tr>
	</table>

</div>
