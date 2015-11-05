<div class="distributionCenters form">

	<?php echo $this->AlaxosForm->create('DistributionCenter', array('enctype' => 'multipart/form-data', 'action' => 'client_add', 'id' => 'DistributionCenterClientAddForm'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h3><?php ___('client add distribution center'); ?></h3>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,
            'additional_buttons' => array(
                __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
            )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
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
			<?php ___('Distribution Center Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('distribution_center_name', array('label' => false)); ?>
		</td>
	</tr>
<!--                	<tr>
		<td>
			<?php ___('Name Address') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('name_address', array('label' => false)); ?>
		</td>
	</tr>-->
                	<tr>
		<td>
			<?php ___('Approx Average No Of Copies Supplied') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('approx_average_no_of_copies_supplied', array('label' => false)); ?>
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
