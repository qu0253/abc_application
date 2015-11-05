<div class="regularPeriods view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('regular period');?><?php echo !empty($regularPeriod['RegularPeriod']['regular_period_name']) ? ' - ' . $regularPeriod['RegularPeriod']['regular_period_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $regularPeriod['RegularPeriod']['id'], 'copy_id' => $regularPeriod['RegularPeriod']['id'], 'delete_id' => $regularPeriod['RegularPeriod']['id'], 'delete_text' => ___('do you really want to delete this regular period ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Regular Period Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Regular Period Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['regular_period_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Volume Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['volume_number']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('From Date'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['from_date']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('To Date'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['to_date']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cut Off Date'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['cut_off_date']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Grace Days Reminder 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['grace_days_reminder_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Grace Days Reminder 2'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['grace_days_reminder_2']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Grace Days Reminder 3'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $regularPeriod['RegularPeriod']['grace_days_reminder_3']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($regularPeriod['RegularPeriod']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($regularPeriod['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $regularPeriod['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($regularPeriod['RegularPeriod']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($regularPeriod['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $regularPeriod['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
