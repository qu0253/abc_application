<div class="nonQualifyingCirculations form">

	<?php echo $this->AlaxosForm->create('NonQualifyingCirculation', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit non qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $nonQualifyingCirculation['NonQualifyingCirculation']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
            
	<tr class="display_none">
        		<td>
			<?php ___('NQC Qualifying Circulation Name') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('qualifying_circulation_id', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row0">
        		<td>
			<?php ___('NQC Single 10') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_10', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_10', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_10', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_10', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_10', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row5">
        		<td>
			<?php ___('NQC Single 20') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_20', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_20', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_20', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_20', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_20', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row10">
        		<td>
			<?php ___('NQC Single 100') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_100', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_100', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_100', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_100', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_100', array('label' => false)); ?>
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
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_single_copy_sales', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_single_copy_sales', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_single_copy_sales', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_single_copy_sales', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row20">
        		<td>
			<?php ___('NQC Single Combo Sales Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_combo_sales_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_combo_sales_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_combo_sales_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_combo_sales_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_combo_sales_copies', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row25">
        		<td>
			<?php ___('NQC Single Single Copy Subscription') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_single_copy_subscription', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_single_copy_subscription', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_single_copy_subscription', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_single_copy_subscription', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_single_copy_subscription', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row30">
        		<td>
			<?php ___('NQC Single Joint Subscription Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_joint_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_joint_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_joint_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_joint_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_joint_subscription_copies', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row35">
        		<td>
			<?php ___('NQC Single Institutional Subscription Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_institutional_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_institutional_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_institutional_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_institutional_subscription_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_institutional_subscription_copies', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row40">
        		<td>
			<?php ___('NQC Single Institutional Sale Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_institutional_sale_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_institutional_sale_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_institutional_sale_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_institutional_sale_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_institutional_sale_copies', array('label' => false)); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row45">
        		<td>
			<?php ___('NQC Single Free Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('single_free_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('combo_free_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('subscription_free_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('institutional_free_copies', array('label' => false)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_free_copies', array('label' => false)); ?>
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
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('free_copies_non_qualifying_sales_other_than_nnr', array('label' => false)); ?>
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
