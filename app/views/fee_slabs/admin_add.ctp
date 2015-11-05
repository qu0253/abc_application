<div class="feeSlabs form">

	<?php echo $this->AlaxosForm->create('FeeSlab', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin add fee slab'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Fee Slab Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('fee_slab_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Membership Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_type_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Frequency Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('frequency_id', array('label' => false)); ?>
		</td>
	</tr>
                        	<tr>
		<td>
			<?php ___('Publication Type Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('publication_type_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Circulation From') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('circulation_from', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Circulation To') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('circulation_to', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Annual Expenditure From') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('annual_expenditure_from', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Annual Expenditure To') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('annual_expenditure_to', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Annual Turnover From') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('annual_turnover_from', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Annual Turnover To') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('annual_turnover_to', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Application Fee') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('application_fee', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Entrance Fee') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('entrance_fee', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Annual Subscription') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('annual_subscription', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Active') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('active', array('label' => false)); ?>
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
