<div class="qualifyingCirculations form">

	<?php echo $this->AlaxosForm->create('QualifyingCirculation', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add qualifying circulation'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
        echo $this->element('yellow_form_toolbar');
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="add">
            
	<tr class="display_none">
        		<td>
			<?php ___('Printing Center Name') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('printing_center_id', array('label' => false, 'tabindex' => 1)); ?>
		</td>

	</tr>
                                    
	<tr  class="display_none">
        		<td>
			<?php ___('Regular Period Name') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('regular_period_id', array('label' => false, 'tabindex' => 1)); ?>
		</td>

	</tr>
        <tr>
        	<td colspan="6" class="ic-heading-left">
			<?php ___('Cover Price Details') ?>
		</td>
	</tr>
        <tr>
        	<td>
			<?php ___('Single Copy') ?>
		</td>
                <td>:</td>
                       		
		<td colspan="4">
			<?php echo $this->AlaxosForm->input('single_copy', array('label' => false, 'tabindex' => 1)); ?>
		</td>                
	</tr>
        <tr>
        	<td>
			<?php ___('Combo Copy') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('combo_copy', array('label' => false, 'tabindex' => 1)); ?>
		</td>
                
                <td colspan="3">
		</td>
                
	</tr>
        <tr>
                <td colspan="1" class="ic-heading-left">
			<?php ___('Printing Center Started Current Period?') ?>
		</td>
                <td>:</td>
                <td colspan="4" class="ic-heading-left">
			<?php echo $this->AlaxosForm->input('flag_pc_started_current_period', array('label' => false, 'tabindex' => 1, 'type' => 'checkbox')); ?>
		</td>
	</tr>
        <tr>
                <td>
			<?php ___('Please enter newly started printing center city and date') ?>
		</td>
                <td>:</td>
		<td colspan="4">
			<?php echo $this->AlaxosForm->input('pc_started_current_period', array('label' => false, 'tabindex' => 1)); ?>
		</td>
	</tr>
        <tr>
        	<td colspan="6" class="ic-heading">
			<?php ___('CALCULATION OF AVERAGE QUALIFYING CIRCULATION') ?>
		</td>
	</tr>
        <tr>
        	<td colspan="6" class="ic-heading-left">
			<?php ___('PARTICULARS') ?>
		</td>
	</tr>
        <tr>        	
                <td></td>       		
                <td></td>       		
		<td>
			<?php ___('Total Monthly Qualifying Circulation') ?>
		</td>
                <td>
			<?php ___('Number of publishing days') ?>
		</td>
		<td>
		</td>
                <td>
                        <?php ___('Average monthly qualifying circulation') ?>
		</td>
	</tr>  
        <?php
        $publication_type_id = $this->Session->read('Auth.Membership.publication_type_id');
        $frequency_type_id = $this->Session->read('Auth.Membership.frequency_type_id');
        if ($this->Support->isMagazine($publication_type_id) && $this->Support->isAnnual($frequency_type_id)) {
            $months = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
            ?>
            <tr class="row0">
                            <td>
                            <?php echo $this->AlaxosForm->input('month', array('label' => false, 'options' => $months)); ?>
                    </td>
                    <td>:</td>

                    <td>
                            <?php echo $this->AlaxosForm->input('total_month_1', array('label' => false, 'tabindex' => 1)); ?>
                    </td>


                    <td>
                            <?php echo $this->AlaxosForm->input('no_of_pub_days_month_1', array('label' => false, 'tabindex' => 1)); ?>
                    </td>


                    <td>

                    </td>


                    <td>
                        <?php echo $this->AlaxosForm->input('total_row0', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
                    </td>
            </tr>
            <?php
        } else {
        ?>
		<tr class="row0">
        		<td>
			<?php ___('Total Month 1') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_month_1', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_1', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			
		</td>
		
              
                <td>
                    <?php echo $this->AlaxosForm->input('total_row0', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
		</td>
	</tr>
        <tr class="row1">
        		<td>
			<?php ___('Total Month 2') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_month_2', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_2', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			
		</td>
		
              
                <td>
                    <?php echo $this->AlaxosForm->input('total_row1', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
		</td>
	</tr>
	<tr class="row2">
        		<td>
			<?php ___('Total Month 3') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_month_3', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_3', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			
		</td>
		
              
                <td>
                    <?php echo $this->AlaxosForm->input('total_row2', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
		</td>
	</tr>
                                    
	
                                    
	<tr class="row3">
        		<td>
			<?php ___('Total Month 4') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_month_4', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_4', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			
		</td>
		
              
                <td>
                    <?php echo $this->AlaxosForm->input('total_row3', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
		</td>
	</tr>
	<tr class="row4">
        		<td>
			<?php ___('Total Month 5') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_month_5', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_5', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			
		</td>
		
              
                <td>
                    <?php echo $this->AlaxosForm->input('total_row4', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
		</td>
	</tr>
                                    
	<tr class="row5">
        		<td>
			<?php ___('Total Month 6') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_month_6', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('no_of_pub_days_month_6', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			
		</td>
		
              
                <td>
                    <?php echo $this->AlaxosForm->input('total_row5', array('label' => false, 'readonly' => 'readonly', 'class' => 'average_monthly highlighted')); ?>
		</td>
	</tr>

        <?php
        }
        ?>
            <tr class="rowTotal1">
            <td><?php ___('Total of average qualifying circulation') ?></td>
            <td>:</td>
            <td>
                <?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_qcir1 highlighted')); ?>
            </td>
            <td>
                <?php echo $this->AlaxosForm->input('total_number_of_publishing_days', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_qcir2 highlighted')); ?>
            </td>
            <td></td>
            <td>
                <?php echo $this->AlaxosForm->input('ft_average_monthly_qualifying_circulation', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_average_monthly highlighted')); ?>
            </td>
        </tr>
        <tr>
        	<td colspan="6" class="ic-heading">
			<?php ___('NON SUBSCRIPTION SALES') ?>
		</td>
	</tr>
        <?php
        if ($this->Support->isMagazine($publication_type_id)) {
        ?>
        <tr>
        	<td colspan="6" class="ic-heading-left">
			<?php ___('Single (Non Subscription) copies sold to the distribution trade above NRR') ?>
		</td>
	</tr>        
        <?php
        }
        ?>
    <tr>
                <td></td>
                <td></td>
                <td>
                        <?php ___('Single copy Sales') ?>
                </td>       
                <td>
                        <?php ___('Combo Copy Sales') ?>
                </td>       		
		<td>
			<?php ___('INSTN Sales') ?><br/>
                        <?php
                        $publication_type_id = $this->Session->read('Auth.Membership.publication_type_id');
                        if ($this->Support->isNewspaper($publication_type_id)) {
                            ___('(upto 10% of qualifying circulation)');
                        } else {
                            ___('(upto 25% of Average Net Paid sales)');
                        }
                        ?>
		</td>
		<td>
                    <?php ___('Average monthly qualifying circulation') ?>
		</td>
	</tr>
        <tr>
            <td colspan="6" class="ic-heading">
                    <?php ___('Details of NRR') ?>
            </td>
	</tr>
        <?php
        if ($this->Support->isNewspaper($publication_type_id) || $this->Support->isMagazine($publication_type_id)) {
        ?>
	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr 10') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_10', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_10', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_10', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row45', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr 20') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_20', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_20', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_20', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row48', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr 100') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_100', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_100', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_100', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row51', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="single_nnr">
        		<td>
			<?php ___('Single Nnr Below Nnr Within Qualifying') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('single_nnr_below_nnr_within_qualifying', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('combo_nnr_below_nnr_within_qualifying', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_nnr_below_nnr_within_qualifying', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row54', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
	 <tr class="rowTotal3">
                    <td><?php ___('Total categories') ?></td>
                                    <td>:</td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_single_nnr', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir1_total_single_nnr highlighted')); ?>
                    </td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_combo_nnr', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir2_total_single_nnr highlighted')); ?>
                    </td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_instn_nnr', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir3_total_single_nnr highlighted')); ?>
                    </td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_average_monthly_qualifying_circulation_nnr', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_single_nnr highlighted')); ?>
                    </td>
      </tr>
        <?php
        }
        ?>
        <tr>
                <td colspan="6" class="ic-heading-left">
                        <?php ___('Break up of copies sold with / without incentives') ?>
                </td>
	</tr>
	<tr class="nss_incentive">
        		<td>
			<?php ___('Nss Incentive Single Nil') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_nil', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_nil', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_nil', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row57', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="nss_incentive">
        		<td>
			<?php ___('Nss Incentive Single 50') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_50', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_50', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_50', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row60', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
	<tr class="nss_incentive">
        		<td>
			<?php ___('Nss Incentive Single 100') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_single_100', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_combo_100', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('nss_incentive_instn_100', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row61', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
    </tr>
    <tr class="rowTotal4">
                    <td><?php ___('Total incentives') ?></td>
                                    <td>:</td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_nss_incentive_single', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir1_total_nss_incentive highlighted')); ?>
                    </td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_nss_incentive_combo', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir2_total_nss_incentive highlighted')); ?>
                    </td>
                    <td><?php echo $this->AlaxosForm->input('total_nss_incentive_instn', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir3_total_nss_incentive highlighted')); ?>
                    </td>
                    <td>
                        <?php echo $this->AlaxosForm->input('total_nss_incentive_average_monthly_qualifying_circulation', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_nss_incentive highlighted')); ?>
                    </td>
         </tr>
        <tr>
            <td colspan="6" class="ic-heading">
                    <?php ___('Institutional Sales') ?>
            </td>
	</tr>
	<tr class="non">
        		<td>
			<?php ___('Single Airlines') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_airlines', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row63', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Body Corporates') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_body_corporates', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row66', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
	<tr class="non">
        		<td>
			<?php ___('Instn Edu Inst') ?>
		</td>
                <td>:</td>

		<td>
		</td>

		<td>
		</td>

		<td>
			<?php echo $this->AlaxosForm->input('instn_edu_inst', array('label' => false, 'tabindex' => 1)); ?>
		</td>

                <td>
                    <?php echo $this->AlaxosForm->input('total_row67', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="non">
        		<td>
			<?php ___('Single Hotels') ?>
		</td>
                <td>:</td>

		<td>
			<?php //echo $this->AlaxosForm->input('single_hotels', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php //echo $this->AlaxosForm->input('combo_hotels', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_hotels', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row68', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
	
	<tr class="non">
        		<td>
			<?php ___('Single Libraries') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_libraries', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row69', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
        
	<tr class="non">
        		<td>
			<?php ___('Single Others') ?>
		</td>
                <td>:</td>

		<td>
		</td>


		<td>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('instn_others', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row75', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
	<tr class="rowTotal5">
                <td><?php ___('Total') ?></td>
                                <td>:</td>
                <td>
                    <?php //echo $this->AlaxosForm->input('total_corporates_single', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir1_total_non highlighted')); ?>
                </td>
                <td>
                    <?php //echo $this->AlaxosForm->input('total_corporates_combo', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir2_total_non highlighted')); ?>
                </td>
                <td><?php echo $this->AlaxosForm->input('total_corporates_instn', array('label' => false, 'readonly' => 'readonly', 'class' => 'cir3_total_non highlighted')); ?>
                </td>
                <td>
                    <?php echo $this->AlaxosForm->input('total_corporates_average_monthly_qualifying_circulation', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_non highlighted')); ?>
                </td>
     </tr>
        <tr>
           <td colspan="6" class="ic-heading">
                   <?php ___('SUBSCRIPTION SALES') ?>
           </td>
        </tr>
        <tr>
           <td colspan="6" class="ic-heading-left">
                   <?php ___('Subscription categories') ?>
           </td>
	</tr>
    <tr>
                    <td></td>
                    <td></td>
                    <td>
                            <?php ___('Single Subscription') ?>
                    </td>
                    <td>
                            <?php ___('Joint Subscription') ?>
                    </td>
    		<td>
    			<?php ___('Institutional Subscription') ?><br/>
                        <?php
                        $publication_type_id = $this->Session->read('Auth.Membership.publication_type_id');
                        if ($this->Support->isNewspaper($publication_type_id)) {
                            ___('(upto 5% of qualifying circulation)');
                        } else {
                            ___('(upto 10% of Average Net Paid sales)');
                        }
                        ?>
    		</td>
    		<td>
                        <?php ___('Average monthly qualifying circulation') ?>
    		</td>
    	</tr>
        
	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single General') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_general', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_general', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php //echo $this->AlaxosForm->input('ss_cat_institutional_general', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row111', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single School') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_school', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_school', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php //echo $this->AlaxosForm->input('ss_cat_institutional_school', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row114', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single Institutional') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_institutional', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_institutional', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_institutional_institutional', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row117', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="ss_cat">
        		<td>
			<?php ___('Ss Cat Single Others') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_single_others', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_joint_others', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_cat_institutional_others', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row120', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
    	<tr class="rowTotal7">
                                <td><?php ___('Total subscription categories') ?></td>
                                                <td>:</td>
                                <td>
                                    <?php echo $this->AlaxosForm->input('total_ss_cat_single', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur1_total_ss_cat highlighted')); ?>
                                </td>
                                <td>
                                    <?php echo $this->AlaxosForm->input('total_ss_cat_joint', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur2_total_ss_cat highlighted')); ?>
                                </td>
                                <td><?php echo $this->AlaxosForm->input('total_ss_cat_institutional', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur3_total_ss_cat highlighted')); ?>
                                </td>
                                <td>
                                    <?php echo $this->AlaxosForm->input('total_ss_cat_average_monthly_qualifying_circulation', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_cat highlighted')); ?>
                                </td>
        </tr>
        <tr>
                <td colspan="6" class="ic-heading-left">
                        <?php ___('Break up of copies sold with / without incentives') ?>
                </td>
	</tr>
	<tr class="ss_incentive">
        		<td>
			<?php ___('Ss Incentive Single Nil') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_single_nil', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_joint_nil', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_institutional_nil', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row123', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="ss_incentive">
        		<td>
			<?php ___('Ss Incentive Single 50') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_single_50', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_joint_50', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_institutional_50', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row126', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>

	<tr class="ss_incentive">
        		<td>
			<?php ___('Ss Incentive Single 90') ?>
		</td>
                <td>:</td>

		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_single_90', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_joint_90', array('label' => false, 'tabindex' => 1)); ?>
		</td>


		<td>
			<?php echo $this->AlaxosForm->input('ss_incentive_institutional_90', array('label' => false, 'tabindex' => 1)); ?>
		</td>


                <td>
                    <?php echo $this->AlaxosForm->input('total_row129', array('label' => false, 'readonly' => 'readonly', 'class' => 'subtotal highlighted')); ?>
		</td>
	</tr>
    <tr class="rowTotal8">
                                    <td><?php ___('Total breakup of subscription copies sold at various incentives') ?></td>
                                                    <td>:</td>
                                    <td>
                                        <?php echo $this->AlaxosForm->input('total_ss_incentive_single', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur1_total_ss_incentive highlighted')); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->AlaxosForm->input('total_ss_incentive_joint', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur2_total_ss_incentive highlighted')); ?>
                                    </td>
                                    <td><?php echo $this->AlaxosForm->input('total_ss_incentive_institutional', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur3_total_ss_incentive highlighted')); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->AlaxosForm->input('total_ss_incentive_average_monthly_qualifying_circulation', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_incentive highlighted')); ?>
                                    </td>
            </tr>
        <tr>
            <td colspan="6" class="ic-heading">
                    <?php ___('QUALIFYING SALES - SUMMARY') ?>
            </td>
	</tr>
            
	<tr class="q_summary">
                <td>
			<?php ___('Ss Sa Single Copy Sales') ?>
		</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td></td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_single_copy_sales', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_sa_single_copy_sales highlighted')); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td>
			<?php ___('Ss Sa Combo Sales Copies'); ?>
		</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td></td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_combo_sales_copies', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_sa_combo_sales_copies highlighted')); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td>
			<?php ___('Ss Sa Single Copy Subscription'); ?>
		</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td></td>
		<td>
			<?php echo $this->AlaxosForm->input('ss_sa_single_copy_subscription', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_sa_single_copy_subscription highlighted')); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td>
			<?php ___('Ss Sa Joint Subscription Copies'); ?>
		</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
			<?php echo $this->AlaxosForm->input('ss_sa_joint_subscription_copies', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_sa_joint_subscription_copies highlighted')); ?>
		</td>
	<tr>
	</tr>

	<tr class="q_summary">
        		<td>
			<?php ___('Ss Sa Institutional Subscription Copies'); ?>
		</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
			<?php echo $this->AlaxosForm->input('ss_sa_institutional_subscription_copies', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_sa_institutional_subscription_copies highlighted')); ?>
		</td>
        </tr>
        <tr class="q_summary">
		<td>
			<?php ___('Ss Sa Institutional Sale Copies'); ?>
		</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
			<?php echo $this->AlaxosForm->input('ss_sa_institutional_sale_copies', array('label' => false, 'readonly' => 'readonly', 'class' => 'total_ss_sa_institutional_sale_copies highlighted')); ?>
		</td>
        </tr>
         <tr class="rowTotal9">
                                            <td><?php ___('Total qualifying sales summary') ?></td>
                                                            <td>:</td>
                                            <td>
                                                <?php //echo $this->AlaxosForm->input('total_ss_sa_single', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur1_total_q_summary highlighted')); ?>
                                            </td>
                                            <td>
                                                <?php //echo $this->AlaxosForm->input('total_ss_sa_joint', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur2_total_q_summary highlighted')); ?>
                                            </td>
                                            <td><?php //echo $this->AlaxosForm->input('total_ss_sa_institutional', array('label' => false, 'readonly' => 'readonly', 'class' => 'cur3_total_q_summary highlighted')); ?>
                                            </td>
                                            <td>
                                                <?php echo $this->AlaxosForm->input('total_ss_sa_average_monthly_qualifying_circulation_1', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
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
