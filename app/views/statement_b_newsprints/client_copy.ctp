<div class="statementBNewsprints form">

	<?php echo $this->AlaxosForm->create('StatementBNewsprint', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('client copy statement b newsprint'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true,
            'additional_buttons' => array(
            __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
        )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Name Of Publication') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('name_of_publication', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Average No Of Pages Printed During The Period') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('average_no_of_pages_printed_during_the_period', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Actual No Of Pages Printed During The Period As Per Production') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('actual_no_of_pages_printed_during_the_period_as_per_production', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Size Of The Page Sq Cm') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('size_of_the_page_sq_cm', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Act Consmp Of Ns Ppr Incl Waste') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('act_consmp_of_ns_ppr_incl_waste', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Gsm') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('gsm', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Remarks') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('remarks', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___d('alaxos', 'copy', true)); ?> 		</td>
 	</tr>
	</table>

</div>
