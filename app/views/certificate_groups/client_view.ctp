<div class="certificateGroups view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('certificate group');?><?php echo !empty($certificateGroup['CertificateGroup']['id']) ? ' - ' . $certificateGroup['CertificateGroup']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $certificateGroup['CertificateGroup']['id'], 'copy_id' => $certificateGroup['CertificateGroup']['id'], 'delete_id' => $certificateGroup['CertificateGroup']['id'], 'delete_text' => ___('do you really want to delete this certificate group ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Certificate Group Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateGroup['CertificateGroup']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Certificate Group Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateGroup['CertificateGroup']['certificate_group_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Language Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateGroup['Language']['language_name']; //$this->Html->link($certificateGroup['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $certificateGroup['Language']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Frequency Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateGroup['FrequencyType']['frequency_type_name']; //$this->Html->link($certificateGroup['FrequencyType']['frequency_type_name'], array('controller' => 'frequency_types', 'action' => 'view', $certificateGroup['FrequencyType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Publication Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateGroup['Publication']['publication_name']; //$this->Html->link($certificateGroup['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $certificateGroup['Publication']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
