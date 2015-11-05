<div class="holdingCompanies form">

	<?php echo $this->AlaxosForm->create('HoldingCompany', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ($this->Session->read('Auth.Membership.membership_type_id') == 5) ? ___('Company / Proprietor Name') : ___('Holding Company Name'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => false));
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
                	<tr>
		<td>
			<?php ($this->Session->read('Auth.Membership.membership_type_id') == 5) ? ___('Company / Proprietor Name') : ___('Holding Company Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('holding_company_name', array('label' => false)); ?>
		</td>
	</tr>
                <?php echo $this->element("address_without_mobile_email_form");?>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
