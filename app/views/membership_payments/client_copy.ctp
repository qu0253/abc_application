<div class="membershipPayments form">

	<?php echo $this->AlaxosForm->create('MembershipPayment', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
 	<h2><?php ___('client copy membership payment'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('common_toolbar');
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr class="display_none">
		<td>
			<?php ___('Membership Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Date Of Chque Dd No') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('date_of_chque_dd_no', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Chque Dd No') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('chque_dd_no', array('label' => false)); ?>
		</td>
	</tr>
        <tr class="display_none">
		<td>
			<?php ___('Amount') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('amount', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Bank Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('bank_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Branch Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('branch_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Comments If Any') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('comments_if_any', array('label' => false)); ?>
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
