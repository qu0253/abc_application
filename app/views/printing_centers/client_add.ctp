<div class="printingCenters form">

	<?php echo $this->AlaxosForm->create('PrintingCenter', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add printing center'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr class="display_none">
		<td>
			<?php ___('Membership Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_id', array('label' => false)); ?>
		</td>
	</tr>
        <?php /*
                	<tr>
		<td>
			<?php ___('Printed At Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printed_at_id', array('label' => false)); ?>
		</td>
	</tr>
         * 
         */
        ?>
                <?php echo $this->element("address_printed_at_form");?>
        <tr>
		<td>
			<?php ___('Date Of First Issue') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('date_of_first_issue', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Claimed Circulation') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('claimed_circulation', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Size Of Page') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('size_of_page', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Number Of Pages') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('number_of_pages', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Width Of Column') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('width_of_column', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Length Of Column') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('length_of_column', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Number Of Columns Per Page') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('number_of_columns_per_page', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Type Of Paper Used') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('type_of_paper_used', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Type Of Printing Machine') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('type_of_printing_machine', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Number Of Printing Machines') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('number_of_printing_machines', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Printing Capacity') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_capacity', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Printing Units') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_units', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Capacity Per Printing Units') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('capacity_per_printing_units', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('File Advertising Rate Card') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input_file('file_advertising_rate_card', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('File Specimen Copy') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input_file('file_specimen_copy', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
