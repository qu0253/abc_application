<div class="outgoingCertificates">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('outgoing certificate');?><?php echo !empty($outgoingCertificate['OutgoingCertificate']['id']) ? ' - ' . $outgoingCertificate['OutgoingCertificate']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $outgoingCertificate['OutgoingCertificate']['id'], 'copy_id' => $outgoingCertificate['OutgoingCertificate']['id'], 'delete_id' => $outgoingCertificate['OutgoingCertificate']['id'], 'delete_text' => ___('do you really want to delete this outgoing certificate ?', true)));
        echo $this->element('outgoing/outgoing', array('outgoingCertificate' => $outgoingCertificate));
	?>
<table>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($outgoingCertificate['OutgoingCertificate']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificate['OutgoingCertificate']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificate['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificate['OutgoingCertificate']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificate['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificate['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>