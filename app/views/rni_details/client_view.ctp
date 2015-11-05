<div class="rniDetails view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('rni detail');?><?php echo !empty($rniDetail['RniDetail']['rni_number']) ? ' - ' . $rniDetail['RniDetail']['rni_number'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('common_toolbar');
	?>

	<table border="0" class="view">
<!--	<tr>
		<td>
			<?php ___('Rni Detail Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $rniDetail['RniDetail']['id']; ?>
		</td>
	</tr>-->
	<tr class="display_none">
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $rniDetail['Membership']['name']; //$this->Html->link($rniDetail['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $rniDetail['Membership']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Rni Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $rniDetail['RniDetail']['rni_number']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('File Rni Document'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($rniDetail['RniDetail']['file_rni_document']) ? $this->AlaxosForm->get_download_link($rniDetail['RniDetail']['file_rni_document'], 'rni_details', $rniDetail['RniDetail']['id'], 'file_rni_document') : ''; ?>
		</td>
	</tr>
	</table>
</div>
