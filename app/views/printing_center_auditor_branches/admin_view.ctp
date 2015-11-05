<div class="printingCenterAuditorBranches view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing center auditor branch');?><?php echo !empty($printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']) ? ' - ' . $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id'], 'copy_id' => $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id'], 'delete_id_' => $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id'], 'delete_text' => ___('do you really want to delete this printing center auditor branch ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Printing Center Auditor Branch Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Center Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['printing_center_id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Auditor Branch Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['auditor_branch_id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Regular Period Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['regular_period_id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($printingCenterAuditorBranch['PrintingCenterAuditorBranch']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($printingCenterAuditorBranch['PrintingCenterAuditorBranch']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['created_by']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($printingCenterAuditorBranch['PrintingCenterAuditorBranch']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenterAuditorBranch['PrintingCenterAuditorBranch']['modified_by']; ?>
		</td>
	</tr>
	</table>
</div>
