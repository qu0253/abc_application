<div class="statementBNewsprints view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('statement b newsprint');?><?php echo !empty($statementBNewsprint['StatementBNewsprint']['id']) ? ' - ' . $statementBNewsprint['StatementBNewsprint']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $statementBNewsprint['StatementBNewsprint']['id'], 'copy_id' => $statementBNewsprint['StatementBNewsprint']['id'], 'delete_id' => $statementBNewsprint['StatementBNewsprint']['id'], 'delete_text' => ___('do you really want to delete this statement b newsprint ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Statement B Newsprint Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($statementBNewsprint['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $statementBNewsprint['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name Of Publication'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['name_of_publication']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Average No Of Pages Printed During The Period'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['average_no_of_pages_printed_during_the_period']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Actual No Of Pages Printed During The Period As Per Production'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['actual_no_of_pages_printed_during_the_period_as_per_production']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Size Of The Page Sq Cm'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['size_of_the_page_sq_cm']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Act Consmp Of Ns Ppr Incl Waste'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['act_consmp_of_ns_ppr_incl_waste']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Gsm'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['gsm']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Remarks'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $statementBNewsprint['StatementBNewsprint']['remarks']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($statementBNewsprint['StatementBNewsprint']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($statementBNewsprint['StatementBNewsprint']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($statementBNewsprint['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $statementBNewsprint['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($statementBNewsprint['StatementBNewsprint']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($statementBNewsprint['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $statementBNewsprint['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
