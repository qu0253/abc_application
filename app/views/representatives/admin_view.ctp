<div class="representatives view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('representative');?><?php echo !empty($representative['Representative']['representative_name']) ? ' - ' . $representative['Representative']['representative_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $representative['Representative']['id'], 'copy_id' => $representative['Representative']['id'], 'delete_id' => $representative['Representative']['id'], 'delete_text' => ___('do you really want to delete this representative ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Representative Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['id']; ?>
		</td>
	</tr>
	<?php
        if(!empty($representatives['Membership']['name'])) {
        ?>   
        <tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($representative['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $representative['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ___('Representative Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($representative['RepresentativeType']['representative_type_name'], array('controller' => 'representative_types', 'action' => 'view', $representative['RepresentativeType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['representative_name']; ?>
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
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($representative['Representative']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($representative['Representative']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($representative['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $representative['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($representative['Representative']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($representative['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $representative['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
