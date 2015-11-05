<div class="distributionCenters view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('distribution center');?><?php echo !empty($distributionCenter['DistributionCenter']['distribution_center_name']) ? ' - ' . $distributionCenter['DistributionCenter']['distribution_center_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $distributionCenter['DistributionCenter']['id'], 'copy_id' => $distributionCenter['DistributionCenter']['id'], 'delete_id' => $distributionCenter['DistributionCenter']['id'], 'delete_text' => ___('do you really want to delete this distribution center ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Distribution Center Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $distributionCenter['DistributionCenter']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($distributionCenter['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $distributionCenter['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Distribution Center Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $distributionCenter['DistributionCenter']['distribution_center_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name Address'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $distributionCenter['DistributionCenter']['name_address']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Approx Average No Of Copies Supplied'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $distributionCenter['DistributionCenter']['approx_average_no_of_copies_supplied']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($distributionCenter['DistributionCenter']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($distributionCenter['DistributionCenter']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($distributionCenter['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $distributionCenter['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($distributionCenter['DistributionCenter']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($distributionCenter['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $distributionCenter['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
