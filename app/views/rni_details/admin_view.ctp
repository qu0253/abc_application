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
	<tr>
		<td>
			<?php ___('Rni Detail Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $rniDetail['RniDetail']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($rniDetail['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $rniDetail['Membership']['id'])); ?>
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
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($rniDetail['RniDetail']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($rniDetail['RniDetail']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($rniDetail['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $rniDetail['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($rniDetail['RniDetail']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($rniDetail['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $rniDetail['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
