<div class="specialPeriods view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('special period');?><?php echo ' - ' . $specialPeriod['SpecialPeriod']['special_period_name']; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'delete' => false, 'add' => true, 'list' => true, 'edit_id' => $specialPeriod['SpecialPeriod']['id'], 'copy_id' => $specialPeriod['SpecialPeriod']['id'], 'delete_id' => $specialPeriod['SpecialPeriod']['id'], 'delete_text' => ___('do you really want to delete this special period ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Special Period Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $specialPeriod['SpecialPeriod']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Special Period Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $specialPeriod['SpecialPeriod']['special_period_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Regular Period Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($specialPeriod['RegularPeriod']['regular_period_name'], array('controller' => 'regular_periods', 'action' => 'view', $specialPeriod['RegularPeriod']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('From Date'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($specialPeriod['SpecialPeriod']['from_date']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('To Date'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($specialPeriod['SpecialPeriod']['to_date']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($specialPeriod['SpecialPeriod']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($specialPeriod['SpecialPeriod']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($specialPeriod['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $specialPeriod['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($specialPeriod['SpecialPeriod']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($specialPeriod['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $specialPeriod['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
