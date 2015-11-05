<?php 
$nonQualifyingCirculation = $qualifyingCirculation['NonQualifyingCirculation'];
?><div class="nonQualifyingCirculations form">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('non qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	
 	<table border="1" cellpadding="5" cellspacing="0" class="edit" width="950">
            
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
                                    
	<tr class="row50">
        		<td>
			<?php ___('NQC Single Non Qualifying Sales Other Than Nnr') ?>
		</td>
                <td>:</td>
                       		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['single_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['combo_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['subscription_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['institutional_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		
                        		
		<td class="number-align">
			<?php //echo $nonQualifyingCirculation[0]['free_copies_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		
                              
	</tr>
        <tr class="row15">
        		<td>
			<?php ___('NQC Single Single Copy Sales') ?>
		</td>
                <td>:</td>
                       		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['single_single_copy_sales']; ?>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                              
	</tr>
	<tr class="row20">
        		<td>
			<?php ___('NQC Single Combo Sales Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['combo_combo_sales_copies']; ?>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                              
	</tr>
                                    
	<tr class="row25">
        		<td>
			<?php ___('NQC Single Single Copy Subscription') ?>
		</td>
                <td>:</td>
                       		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['subscription_single_copy_subscription']; ?>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                              
	</tr>
                                    
	<tr class="row30">
        		<td>
			<?php ___('NQC Single Joint Subscription Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['subscription_joint_subscription_copies']; ?>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                              
	</tr>
                                    
	<tr class="row35">
        		<td>
			<?php ___('NQC Single Institutional Subscription Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['institutional_institutional_subscription_copies']; ?>
		</td>
		
                        		
		<td>
		</td>
		
                              
	</tr>
                                    
	<tr class="row40">
        		<td>
			<?php ___('NQC Single Institutional Sale Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['institutional_institutional_sale_copies']; ?>
		</td>
		
                        		
		<td>
		</td>
		
                              
	</tr>
                                    
	<tr class="row45">
        		<td>
			<?php ___('NQC Single Free Copies') ?>
		</td>
                <td>:</td>
                       		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td>
		</td>
		
                        		
		<td class="number-align">
			<?php echo $nonQualifyingCirculation[0]['free_copies_free_copies']; ?>
		</td>
	</table>
</div>
