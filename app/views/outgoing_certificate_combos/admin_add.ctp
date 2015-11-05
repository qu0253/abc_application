<div class="outgoingCertificateCombos form">

	<?php echo $this->AlaxosForm->create('OutgoingCertificateCombo', array('enctype' => 'multipart/form-data'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('admin add outgoing certificate combo'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Combo Name') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_id', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Combo Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo_name', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Outgoing Certificate Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('outgoing_certificate_id', array('label' => false)); ?>
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
			<?php ___('Combo') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo', array('label' => false)); ?>
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
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
