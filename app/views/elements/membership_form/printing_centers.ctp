	<tr>
		<td height="60" colspan="3" align="center" valign="middle"><span class="bold13">Printing Center Details</span></td>
	</tr>
	<?php
	foreach($printing_centers as $k => $v) {
	$printingCenter['PrintingCenter'] = $v;
	$printingCenter['PrintedAt'] = $v['PrintedAt'];
	$printingCenter['Address'] = $v['Address'];
	$printingCenter['Country'] = $v['Address']['Country'];
	$printingCenter['Zone'] = $v['Address']['Zone'];
	$printingCenter['State'] = $v['Address']['State'];
	$printingCenter['District'] = $v['Address']['District'];
	$printingCenter['City'] = $v['Address']['City'];
	?>
	<tr class="display_none">
		<td>
			<?php ___('Printing Center Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['id']; ?>
		</td>
	</tr>
        <?php
        if(!empty($printingCenter['Membership']['name'])) {
        ?>
	<tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['Membership']['name']; //$this->Html->link($printingCenter['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $printingCenter['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ___('Printed At Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintedAt']['city_name']; //$this->Html->link($printingCenter['PrintedAt']['city_name'], array('controller' => 'cities', 'action' => 'view', $printingCenter['PrintedAt']['id'])); ?>
		</td>
	</tr>
	<?php echo $this->element("address_without_mobile_email_view", array('address' => $printingCenter));?>
	<tr>
		<td>
			<?php ___('Claimed Circulation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['claimed_circulation']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Size Of Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['size_of_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Pages'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_pages']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Width Of Column'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['width_of_column']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Length Of Column'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['length_of_column']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Columns Per Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_columns_per_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Type Of Paper Used'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['type_of_paper_used']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Type Of Printing Machine'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['type_of_printing_machine']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Printing Machines'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_printing_machines']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Capacity'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['printing_capacity']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Units'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['printing_units']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Capacity Per Printing Units'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['capacity_per_printing_units']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('File Advertising Rate Card'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($printingCenter['PrintingCenter']['file_advertising_rate_card']) ? $this->AlaxosForm->get_download_link($printingCenter['PrintingCenter']['file_advertising_rate_card'], 'printing_centers', $printingCenter['PrintingCenter']['id'], 'file_advertising_rate_card') : ''; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('File Specimen Copy'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($printingCenter['PrintingCenter']['file_specimen_copy']) ? $this->AlaxosForm->get_download_link($printingCenter['PrintingCenter']['file_specimen_copy'], 'printing_centers', $printingCenter['PrintingCenter']['id'], 'file_specimen_copy') : ''; ?>
		</td>
	</tr>
	<?php
    }
    ?>
