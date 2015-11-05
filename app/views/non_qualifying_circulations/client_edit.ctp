<div class="nonQualifyingCirculations form">

	<?php echo $this->AlaxosForm->create('NonQualifyingCirculation', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client edit non qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('yellow_form_toolbar');
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
            
	<tr>
                <td colspan="7" class="ic-heading-left">
                        <?php ___('Non qualifying sales other than NRR') ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><?php ___('Single copy Sales') ?></td> 
                <td><?php ___('Combo Copy Sales') ?></td>
                <td><?php ___('Subscription Sales') ?></td>
                <td><?php ___('Institutional Sales') ?></td>
                <td><?php ___('Free Copies') ?></td>
            </tr>    
	<tr class="display_none">
        		<td>
			<?php ___('NQC Qualifying Circulation Name') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
		
                              
	</tr>                                    	
                                    
	<tr class="row50">
        		<td>
			<?php ___('NQC Single Non Qualifying Sales Other Than Nnr') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
        <tr class="row15">
        		<td>
			<?php ___('NQC Single Single Copy Sales') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_single_copy_sales', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
	<tr class="row20">
        		<td>
			<?php ___('NQC Single Combo Sales Copies') ?>
		</td>
                <td>:</td>
                       		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_combo_sales_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row25">
        		<td>
			<?php ___('NQC Single Single Copy Subscription') ?>
		</td>
                <td>:</td>
                       		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_single_copy_subscription', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row30">
        		<td>
			<?php ___('NQC Single Joint Subscription Copies') ?>
		</td>
                <td>:</td>
                       		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_joint_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row35">
        		<td>
			<?php ___('NQC Single Institutional Subscription Copies') ?>
		</td>
                <td>:</td>
                       		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_institutional_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row40">
        		<td>
			<?php ___('NQC Single Institutional Sale Copies') ?>
		</td>
                <td>:</td>
                       		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_institutional_sale_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row45">
        		<td>
			<?php ___('NQC Single Free Copies') ?>
		</td>
                <td>:</td>
                       		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td><?php echo $this->AlaxosForm->input('input_disabled', array('label' => false, 'disabled' => 'disabled', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_free_copies', array('label' => false)); ?>
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
