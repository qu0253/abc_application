<div class="whiteForms form">

	<?php echo $this->AlaxosForm->create('WhiteForm', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client edit white form'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $whiteForm['WhiteForm']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
        <tr>
            <td colspan="3">
            <?php echo $this->Support->whiteFormLabel($qualifyingCirculation); ?>
            </td>
        </tr>
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
			<?php ___('State Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('state_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('District Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('district_id', array('label' => false, 'options' => $districts)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('City Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('city_id', array('label' => false, 'placeholder' => 'Please type city name')); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Circulation') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('circulation', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Sunday') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('sunday', array('label' => false)); ?>
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
