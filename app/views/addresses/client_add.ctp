<div class="addresses form">

	<?php echo $this->AlaxosForm->create('Address', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add address'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Email') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('email', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Address Line 1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('address_line_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Address Line 2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('address_line_2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Country Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('country_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Zone Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('zone_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('State Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('state_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('District Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('district_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('City Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('city_id', array('label' => false, 'placeholder' => 'Please type city name')); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Pin') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('pin', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Std Code') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('std_code', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Phone Number 1') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('phone_number_1', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Phone Number 2') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('phone_number_2', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Fax Number') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('fax_number', array('label' => false)); ?>
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
