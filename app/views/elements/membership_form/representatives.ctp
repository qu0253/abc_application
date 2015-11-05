	<tr>
		<td height="60" colspan="3" align="center" valign="middle"><span class="bold13">Representative(s) Information</span></td>
	</tr>

	<?php
	foreach($representatives as $k => $v) {
	$representative['Representative'] = $v;
	$representative['RepresentativeType'] = $v['RepresentativeType'];
	$representative['Address'] = $v['Address'];
	$representative['Country'] = $v['Address']['Country'];
	$representative['Zone'] = $v['Address']['Zone'];
	$representative['State'] = $v['Address']['State'];
	$representative['District'] = $v['Address']['District'];
	$representative['City'] = $v['Address']['City'];
	?>

	<?php
	if(!empty($representatives['Membership']['name'])) {
	?>
	<tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Membership']['name']; //$this->Html->link($representative['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $representative['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ___('Representative Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['RepresentativeType']['representative_type_name']; //$this->Html->link($representative['RepresentativeType']['representative_type_name'], array('controller' => 'representative_types', 'action' => 'view', $representative['RepresentativeType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Prefix']['prefix_name'] . ' ' . $representative['Representative']['representative_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Designation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['designation']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Additional Details'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['additional_details']; ?>
		</td>
	</tr>
	<?php echo $this->element("address_view", array('address' => $representative));?>

<?php
}
?>
