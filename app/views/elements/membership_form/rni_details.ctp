	<tr>
		<td height="60" colspan="3" align="center" valign="middle"><span class="bold13">RNI Information</span></td>
	</tr>
	<?php
	if (empty($rni_details)) {
	?>
	<tr>
		<td>
			Applied For RNI
		</td>
		<td>:</td>
		<td>
			Yes
		</td>
	</tr>
	<?php
	}
	?>
	<?php
	foreach($rni_details as $k => $v) {
	$rniDetail['RniDetail'] = $v;
	?>
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
<?php
}
?>
