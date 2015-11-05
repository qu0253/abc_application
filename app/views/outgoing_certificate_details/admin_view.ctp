<div class="outgoingCertificateDetails view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('outgoing certificate detail');?><?php echo !empty($outgoingCertificateDetail['OutgoingCertificateDetail']['id']) ? ' - ' . $outgoingCertificateDetail['OutgoingCertificateDetail']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $outgoingCertificateDetail['OutgoingCertificateDetail']['id'], 'copy_id' => $outgoingCertificateDetail['OutgoingCertificateDetail']['id'], 'delete_id' => $outgoingCertificateDetail['OutgoingCertificateDetail']['id'], 'delete_text' => ___('do you really want to delete this outgoing certificate detail ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Outgoing Certificate Detail Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Outgoing Certificate Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['OutgoingCertificate']['id'], array('controller' => 'outgoing_certificates', 'action' => 'view', $outgoingCertificateDetail['OutgoingCertificate']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Edition Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['Edition']['city_name'], array('controller' => 'editions', 'action' => 'view', $outgoingCertificateDetail['Edition']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Edition Symbol'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['edition_symbol']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Center Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['PrintingCenter']['id'], array('controller' => 'printing_centers', 'action' => 'view', $outgoingCertificateDetail['PrintingCenter']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Center Symbol'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['printing_center_symbol']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Qualifying Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_qualifying_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Qualifying Sales Symbol'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_qualifying_sales_symbol']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Number Of Publishing Days'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_number_of_publishing_days']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Number Of Publishing Days Symbol'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_number_of_publishing_days_symbol']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Average Total Qualifying Sales'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['average_total_qualifying_sales']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Average Total Qualifying Sales Symbol'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['average_total_qualifying_sales_symbol']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificateDetail['OutgoingCertificateDetail']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificateDetail['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificateDetail['OutgoingCertificateDetail']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificateDetail['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
