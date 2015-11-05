<div class="outgoingCertificateCoverprices form">

	<?php echo $this->AlaxosForm->create('OutgoingCertificateCoverprice', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit outgoing certificate coverprice'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Cover Price Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cover_price_id', array('label' => false)); ?>
		</td>
	</tr>
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
			<?php ___('Printing Center Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('printing_center_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Publishing Days') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_publishing_days', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Cover Price') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cover_price', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Copies') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Copies Per Publishing Day') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('copies_per_publishing_day', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Combo Other Variant') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_combo_other_variant', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Comments') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('comments', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Notes1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_notes1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Notes2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_notes2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Notes3') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_notes3', array('label' => false)); ?>
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
