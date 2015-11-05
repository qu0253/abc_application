<div class="weekdaysSundays form">

	<?php echo $this->AlaxosForm->create('WeekdaysSunday', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add weekdays sunday'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('yellow_form_toolbar');
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="add">
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
                <td></td>
                <td></td>
                <td><?php ___('Total Monthly qualifying circulation Weekdays') ?></td>                       		
		<td><?php ___('Total Monthly qualifying circulation Sunday') ?></td>
                <td><?php ___('Number of publishing days Weekdays') ?></td>                       		
		<td><?php ___('Number of publishing days Sunday') ?></td>
		<td><?php ___('Average monthly qualifying circulation Weekdays') ?></td>
		<td><?php ___('Average monthly qualifying circulation Sunday') ?></td>
	</tr>
        <tr class="row0">
                <td>
			<?php ___('WS Total Monthly Qualifying Circulation Weekdays Month 1') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_weekdays_month_1', array('label' => false, 'tabindex' => 1)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_sunday_month_1', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_weekdays_month_1', array('label' => false, 'tabindex' => 2)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_sunday_month_1', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_weekdays_month_1', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_sunday_month_1', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
			<?php echo $this->AlaxosForm->hidden('total_month_1', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['total_month_1'])); ?>
			<?php echo $this->AlaxosForm->hidden('no_of_pub_days_month_1', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_1'])); ?>
		</td>
		
                              
	</tr>
                                                   
	<tr class="row1">
        		<td>
			<?php ___('WS Total Monthly Qualifying Circulation Weekdays Month 2') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_weekdays_month_2', array('label' => false, 'tabindex' => 3)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_sunday_month_2', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_weekdays_month_2', array('label' => false, 'tabindex' => 4)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_sunday_month_2', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_weekdays_month_2', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_sunday_month_2', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
                        <?php echo $this->AlaxosForm->hidden('total_month_2', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['total_month_2'])); ?>
                        <?php echo $this->AlaxosForm->hidden('no_of_pub_days_month_2', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_2'])); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row2">
        		<td>
			<?php ___('WS Total Monthly Qualifying Circulation Weekdays Month 3') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_weekdays_month_3', array('label' => false, 'tabindex' => 5)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_sunday_month_3', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_weekdays_month_3', array('label' => false, 'tabindex' => 6)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_sunday_month_3', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_weekdays_month_3', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_sunday_month_3', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
                        <?php echo $this->AlaxosForm->hidden('total_month_3', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['total_month_3'])); ?>
                        <?php echo $this->AlaxosForm->hidden('no_of_pub_days_month_3', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_3'])); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row3">
        		<td>
			<?php ___('WS Total Monthly Qualifying Circulation Weekdays Month 4') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_weekdays_month_4', array('label' => false, 'tabindex' => 7)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_sunday_month_4', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_weekdays_month_4', array('label' => false, 'tabindex' => 8)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_sunday_month_4', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_weekdays_month_4', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_sunday_month_4', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
                        <?php echo $this->AlaxosForm->hidden('total_month_4', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['total_month_4'])); ?>
                        <?php echo $this->AlaxosForm->hidden('no_of_pub_days_month_4', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_4'])); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row4">
        		<td>
			<?php ___('WS Total Monthly Qualifying Circulation Weekdays Month 5') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_weekdays_month_5', array('label' => false, 'tabindex' => 9)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_sunday_month_5', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_weekdays_month_5', array('label' => false, 'tabindex' => 10)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_sunday_month_5', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_weekdays_month_5', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_sunday_month_5', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
                        <?php echo $this->AlaxosForm->hidden('total_month_5', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['total_month_5'])); ?>
                        <?php echo $this->AlaxosForm->hidden('no_of_pub_days_month_5', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_5'])); ?>
		</td>
		
                              
	</tr>
                                    
	<tr class="row5">
        		<td>
			<?php ___('WS Total Monthly Qualifying Circulation Weekdays Month 6') ?>
		</td>
                <td>:</td>
                       		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_weekdays_month_6', array('label' => false, 'tabindex' => 11)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('total_monthly_qualifying_circulation_sunday_month_6', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_weekdays_month_6', array('label' => false, 'tabindex' => 12)); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('number_of_publishing_days_sunday_month_6', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_weekdays_month_6', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
		</td>
		
                        		
		<td>
			<?php echo $this->AlaxosForm->input('average_monthly_qualifying_circulation_sunday_month_6', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted')); ?>
                        <?php echo $this->AlaxosForm->hidden('total_month_6', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['total_month_6'])); ?>
                        <?php echo $this->AlaxosForm->hidden('no_of_pub_days_month_6', array('label' => false, 'value' => $qualifyingCirculation['QualifyingCirculation']['no_of_pub_days_month_6'])); ?>
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
