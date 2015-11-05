<div class="zones form">

	<?php echo $this->AlaxosForm->create('Zone', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin edit zone'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $zone['Zone']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Zone Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('zone_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Country Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('country_id', array('label' => false)); ?>
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
