<div class="certificateTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('certificate type');?><?php echo ' - ' . $certificateType['CertificateType']['certificate_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $certificateType['CertificateType']['id'], 'copy_id' => $certificateType['CertificateType']['id'], 'delete_id' => $certificateType['CertificateType']['id'], 'delete_text' => ___('do you really want to delete this certificate type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Certificate Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateType['CertificateType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Certificate Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateType['CertificateType']['certificate_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cost Per Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateType['CertificateType']['cost_per_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Minimum Multiple Of Pages'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $certificateType['CertificateType']['minimum_multiple_of_pages']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($certificateType['CertificateType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($certificateType['CertificateType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($certificateType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $certificateType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($certificateType['CertificateType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($certificateType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $certificateType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
