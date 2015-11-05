<div class="printingPresses view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing press');?><?php echo !empty($printingPress['PrintingPress']['printing_press_name']) ? ' - ' . $printingPress['PrintingPress']['printing_press_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $printingPress['PrintingPress']['id'], 'copy_id' => $printingPress['PrintingPress']['id'], 'delete_id' => $printingPress['PrintingPress']['id'], 'delete_text' => ___('do you really want to delete this printing press ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Printing Press Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($printingPress['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $printingPress['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Press Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['printing_press_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Address'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['address']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Std Code'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['std_code']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Phone Number 1'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['phone_number_1']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Fax Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['fax_number']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Dates On Which Publication Is Normally Sent For Printing'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['dates_on_which_publication_is_normally_sent_for_printing']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Normal Printing Schedule'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['normal_printing_schedule']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Normal Start Time'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['normal_start_time']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Normal Completion Time'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['normal_completion_time']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Sent For Printing'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['sent_for_printing']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Size Of Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['size_of_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Pages'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['number_of_pages']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Make Of Newprint Used'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['make_of_newprint_used']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Make Of Printing Machine'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['make_of_printing_machine']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Capacity'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['printing_capacity']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Units'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingPress['PrintingPress']['printing_units']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($printingPress['PrintingPress']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($printingPress['PrintingPress']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($printingPress['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $printingPress['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($printingPress['PrintingPress']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($printingPress['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $printingPress['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
