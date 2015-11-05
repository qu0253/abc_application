<div class="subscriptionSchemes form">

	<?php echo $this->AlaxosForm->create('SubscriptionScheme', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit subscription scheme'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $subscriptionScheme['SubscriptionScheme']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Sale Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('sale_type_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Name Of The Scheme') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('name_of_the_scheme', array('label' => false)); ?>
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
			<?php ___('Subscription Rate') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('subscription_rate', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Discount') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('discount', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Value Of The Gift') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('value_of_the_gift', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Trade Discount') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('trade_discount', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Any Other Expenses') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('any_other_expenses', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Balance Amount Retained') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('balance_amount_retained', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('No Of Copies') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_copies', array('label' => false)); ?>
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
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
