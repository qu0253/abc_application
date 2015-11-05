<div class="printingCenters view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('printing center');?><?php echo !empty($printingCenter['PrintedAt']['city_name']) ? ' - ' . $printingCenter['PrintedAt']['city_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
        <?php
            $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
            if ($this->Support->isEditable($mem_status_id)) {
                echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $printingCenter['PrintingCenter']['id'], 'copy_id' => $printingCenter['PrintingCenter']['id'], 'delete_id' => $printingCenter['PrintingCenter']['id'], 'delete_text' => ___('do you really want to delete this printing center ?', true)));
            }
            if ($mem_status_id == 3) {
            echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos',
                'additional_buttons' => array(
                __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form'), array('class' => 'sub_form', 'escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
                )));                
            }
            ?>

	<table border="0" class="view">
	<tr class="display_none">
		<td>
			<?php ___('Printing Center Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['id']; ?>
		</td>
	</tr>
        <?php
        if(!empty($printingCenter['Membership']['name'])) {
        ?>
	<tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['Membership']['name']; //$this->Html->link($printingCenter['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $printingCenter['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<?php /*
        <tr>
		<td>
			<?php ___('Printed At Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintedAt']['city_name']; //$this->Html->link($printingCenter['PrintedAt']['city_name'], array('controller' => 'cities', 'action' => 'view', $printingCenter['PrintedAt']['id'])); ?>
		</td>
	</tr>
         * 
         */
        ?>
	<?php echo $this->element("address_printed_view", array('address' => $printingCenter));?>
        <tr>
		<td>
			<?php ___('Date Of First Issue'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['date_of_first_issue']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Claimed Circulation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['claimed_circulation']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Size Of Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['size_of_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Pages'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_pages']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Width Of Column'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['width_of_column']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Length Of Column'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['length_of_column']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Columns Per Page'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_columns_per_page']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Type Of Paper Used'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['type_of_paper_used']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Type Of Printing Machine'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['type_of_printing_machine']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Number Of Printing Machines'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['number_of_printing_machines']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Capacity'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['printing_capacity']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Printing Units'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['printing_units']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Capacity Per Printing Units'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $printingCenter['PrintingCenter']['capacity_per_printing_units']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('File Advertising Rate Card'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($printingCenter['PrintingCenter']['file_advertising_rate_card']) ? $this->AlaxosForm->get_download_link($printingCenter['PrintingCenter']['file_advertising_rate_card'], 'printing_centers', $printingCenter['PrintingCenter']['id'], 'file_advertising_rate_card') : ''; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('File Specimen Copy'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($printingCenter['PrintingCenter']['file_specimen_copy']) ? $this->AlaxosForm->get_download_link($printingCenter['PrintingCenter']['file_specimen_copy'], 'printing_centers', $printingCenter['PrintingCenter']['id'], 'file_specimen_copy') : ''; ?>
		</td>
	</tr>
	</table>
</div>
