<div class="representativeTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('representative type');?><?php echo ' - ' . $representativeType['RepresentativeType']['representative_type_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $representativeType['RepresentativeType']['id'], 'copy_id' => $representativeType['RepresentativeType']['id'], 'delete_id' => $representativeType['RepresentativeType']['id'], 'delete_text' => ___('do you really want to delete this representative type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Representative Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representativeType['RepresentativeType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Representative Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representativeType['RepresentativeType']['representative_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($representativeType['RepresentativeType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($representativeType['RepresentativeType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($representativeType['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $representativeType['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($representativeType['RepresentativeType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($representativeType['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $representativeType['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
