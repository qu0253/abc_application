<div class="partners view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('partner');?><?php echo ' - ' . $partner['Partner']['partner_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $partner['Partner']['id'], 'copy_id' => $partner['Partner']['id'], 'delete_id' => $partner['Partner']['id'], 'delete_text' => ___('do you really want to delete this partner ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Partner Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $partner['Partner']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Partner Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $partner['Partner']['partner_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Registration Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $partner['Partner']['registration_number']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Branch Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($partner['AuditorBranch']['auditor_branch_name'], array('controller' => 'auditor_branches', 'action' => 'view', $partner['AuditorBranch']['id'])); ?>
		</td>
	</tr>
	<?php echo $this->element("address_view", array('address' => $partner));?>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($partner['Partner']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($partner['Partner']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($partner['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $partner['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($partner['Partner']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($partner['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $partner['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
