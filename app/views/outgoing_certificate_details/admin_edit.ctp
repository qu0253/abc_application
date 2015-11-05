<div class="outgoingCertificateDetails form">

	<?php echo $this->AlaxosForm->create('OutgoingCertificateDetail', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit outgoing certificate detail'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $outgoingCertificateDetail['OutgoingCertificateDetail']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Outgoing Certificate Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('outgoing_certificate_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Edition Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('edition_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Edition Symbol') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('edition_symbol', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Printing Center Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_center_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Printing Center Symbol') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_center_symbol', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Qualifying Sales') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_qualifying_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Qualifying Sales Symbol') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_qualifying_sales_symbol', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Number Of Publishing Days') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_number_of_publishing_days', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Number Of Publishing Days Symbol') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_number_of_publishing_days_symbol', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Average Total Qualifying Sales') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('average_total_qualifying_sales', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Average Total Qualifying Sales Symbol') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('average_total_qualifying_sales_symbol', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
