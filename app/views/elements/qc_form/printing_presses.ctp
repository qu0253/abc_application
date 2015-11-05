<?php
$printingPresses = $qualifyingCirculation['PrintingPress'];
?>
<?php
foreach ($printingPresses as $printingPress):
        $printingPress['PrintingPress'] = $printingPress;
?>
<div class="printingPresses index">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing presses');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<table border="1" class="view" cellspacing="0" cellpadding="0" width="950">
	<tr>
		<td width="465">
			<?php ___('Printing Press Name'); ?>
		</td>
		<td width="20">:</td>
		<td width="465">
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
        <?php
        $publication_type_id = $this->Session->read('Auth.Membership.publication_type_id');
        if ($this->Support->isMagazine($publication_type_id)) {
        ?>
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
        <?php
        }
        ?>
	<tr>
		<td>
			<?php ___('Normal Start Time'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool::get_time_from_db($printingPress['PrintingPress']['normal_start_time']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Normal Completion Time'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool::get_time_from_db($printingPress['PrintingPress']['normal_completion_time']); ?>
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
	</table>
</div>
<?php endforeach; ?>