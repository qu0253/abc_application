<div class="outgoingCertificateCoverprices view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('outgoing certificate coverprice');?><?php echo !empty($outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']) ? ' - ' . $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id'], 'copy_id' => $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id'], 'delete_id' => $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id'], 'delete_text' => ___('do you really want to delete this outgoing certificate coverprice ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Outgoing Certificate Coverprice Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['cover_price_id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Outgoing Certificate Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['OutgoingCertificate']['id'], array('controller' => 'outgoing_certificates', 'action' => 'view', $outgoingCertificateCoverprice['OutgoingCertificate']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Edition Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['Edition']['city_name'], array('controller' => 'editions', 'action' => 'view', $outgoingCertificateCoverprice['Edition']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Center Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['PrintingCenter']['id'], array('controller' => 'printing_centers', 'action' => 'view', $outgoingCertificateCoverprice['PrintingCenter']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Publishing Days'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['no_of_publishing_days']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['cover_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['total_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Copies Per Publishing Day'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['copies_per_publishing_day']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Combo Other Variant'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['single_combo_other_variant']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Comments'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['comments']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Additional Notes1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['additional_notes1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Additional Notes2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['additional_notes2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Additional Notes3'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['additional_notes3']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['CreatedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificateCoverprice['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['ModifiedBy']['id'], array('controller' => 'users', 'action' => 'view', $outgoingCertificateCoverprice['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
