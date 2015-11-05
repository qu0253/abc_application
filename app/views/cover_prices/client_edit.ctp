<div class="coverPrices form">

	<?php echo $this->AlaxosForm->create('CoverPrice', array('enctype' => 'multipart/form-data'));?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client edit cover price'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $coverPrice['CoverPrice']['id'],
            'additional_buttons' => array(
            __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
        )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
        <tr>
                <td colspan="3"><?php echo $this->Support->coverPriceLabel($qualifyingCirculation) ;?></td>
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
			<?php ___('No Of Publishing Days') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('no_of_publishing_days', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Total Copies') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('total_copies', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Copies Per Publishing Day') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('copies_per_publishing_day', array('label' => false, 'readonly' => 'readonly', 'class' => 'highlighted', 'tabindex' => '-1')); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Single Combo Other Variant') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('single_combo_other_variant', array('label' => false)); ?>
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
