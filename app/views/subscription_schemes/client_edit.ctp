<div class="subscriptionSchemes form">

	<?php echo $this->AlaxosForm->create('SubscriptionScheme', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client edit subscription scheme'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $subscriptionScheme['SubscriptionScheme']['id'],
            'additional_buttons' => array(
            __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
        )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
        <?php if (!empty($this->data['SubscriptionScheme']['sale_type_id'])) { ?>
        <tr class="<?php echo ($this->data['SubscriptionScheme']['sale_type_id'] == 1) ? '' : 'display_none' ?> subscriptionSchemesTrPending">
                <td colspan="3" class="subscriptionSchemes1"><?php $func = "" . $this->data['SubscriptionScheme']['sale_type_id'];
                echo $this->Support->subscriptionSchemes1($qualifyingCirculation); ?></td>
	</tr>
        <tr class="<?php echo ($this->data['SubscriptionScheme']['sale_type_id'] == 2) ? '' : 'display_none' ?>  subscriptionSchemesTrPending">
                <td colspan="3" class="subscriptionSchemes2"><?php $func = "subscriptionSchemes" . $this->data['SubscriptionScheme']['sale_type_id'];
                echo $this->Support->subscriptionSchemes2($qualifyingCirculation); ?></td>
	</tr>
        <tr class="<?php echo ($this->data['SubscriptionScheme']['sale_type_id'] == 3) ? '' : 'display_none' ?>  subscriptionSchemesTrPending">
                <td colspan="3" class="subscriptionSchemes3"><?php $func = "subscriptionSchemes" . $this->data['SubscriptionScheme']['sale_type_id'];
                echo $this->Support->subscriptionSchemes3($qualifyingCirculation); ?></td>
	</tr>
        <?php } ?>
	<tr class="display_none">
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
			<?php  
                            echo $this->data['SaleType']['sale_type_name']; 
                            echo $this->AlaxosForm->hidden('sale_type_id', array('label' => false)); 
                        ?>
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
			<?php echo $this->AlaxosForm->input('discount', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
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
			<?php echo $this->AlaxosForm->input('balance_amount_retained', array('label' => false, 'class' => 'highlighted', 'readonly' => 'readonly')); ?>
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
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
