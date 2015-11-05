<div class="combos form">

	<?php echo $this->AlaxosForm->create('Combo', array('enctype' => 'multipart/form-data', 'action' => 'client_add', 'id' => 'ComboClientAddForm'));?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add combo'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,
            'additional_buttons' => array(
            __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
        )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
        <tr>
                <td colspan="3"><?php echo $this->Support->comboDetails($qualifyingCirculation); ;?></td>
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
			<?php ___('Cover Price') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('cover_price', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('COPIES') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('combo', array('label' => false)); ?>
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
