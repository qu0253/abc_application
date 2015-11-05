<div class="outgoingCertificateCombos view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('outgoing certificate combo');?><?php echo !empty($outgoingCertificateCombo['OutgoingCertificateCombo']['id']) ? ' - ' . $outgoingCertificateCombo['OutgoingCertificateCombo']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $outgoingCertificateCombo['OutgoingCertificateCombo']['id'], 'copy_id' => $outgoingCertificateCombo['OutgoingCertificateCombo']['id'], 'delete_id' => $outgoingCertificateCombo['OutgoingCertificateCombo']['id'], 'delete_text' => ___('do you really want to delete this outgoing certificate combo ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Outgoing Certificate Combo Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['combo_id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['combo_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Outgoing Certificate Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCombo['OutgoingCertificate']['id'], array('controller' => 'outgoing_certificates', 'action' => 'view', $outgoingCertificateCombo['OutgoingCertificate']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['cover_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Combo'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['combo']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($outgoingCertificateCombo['OutgoingCertificateCombo']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificateCombo['OutgoingCertificateCombo']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCombo['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificateCombo['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificateCombo['OutgoingCertificateCombo']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCombo['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificateCombo['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
