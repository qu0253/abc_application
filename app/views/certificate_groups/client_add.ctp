<div class="certificateGroups form">

	<?php echo $this->AlaxosForm->create('CertificateGroup', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add certificate group'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Certificate Group Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('certificate_group_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Language Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->hidden('language_id', array('label' => false)); echo $languages[$this->data['CertificateGroup']['language_id']]; ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Frequency Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->hidden('frequency_type_id', array('label' => false)); echo $frequencyTypes[$this->data['CertificateGroup']['frequency_type_id']]; ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Publication Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->hidden('publication_id', array('label' => false)); echo $publications[$this->data['CertificateGroup']['publication_id']]; ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
