<?php if (isset($outgoingCertificateCoverprices) && is_array($outgoingCertificateCoverprices) && count($outgoingCertificateCoverprices) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($outgoingCertificateCoverprices, 'Outgoing Certificate Coverprices List');
    exit;
}
?><div class="page-title">
        <h2><?php ___('outgoing certificate coverprices');?></h2>        
</div>
<div class="outgoingCertificateCoverprices index">
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => array('model_name' => 'OutgoingCertificateCoverprice', 'total_records' => $outgoingCertificateCoverprices), 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('OutgoingCertificateCoverprice', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
          
        <div class="table-responsive">
	        <table class="administration table table-striped table-bordered table-hover">
                <thead>
                    <tr class="sortHeader">
                        <th><li class="fa fa-minus-square-o"></li></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Coverprice Id', true), 'OutgoingCertificateCoverprice.id');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Cover Price Id', true), 'OutgoingCertificateCoverprice.cover_price_id');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Name', true), 'OutgoingCertificate.outgoing_certificate_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Edition Name', true), 'Edition.edition_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Printing Center Name', true), 'PrintingCenter.printing_center_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('No Of Publishing Days', true), 'OutgoingCertificateCoverprice.no_of_publishing_days');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Cover Price', true), 'OutgoingCertificateCoverprice.cover_price');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Copies', true), 'OutgoingCertificateCoverprice.total_copies');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Copies Per Publishing Day', true), 'OutgoingCertificateCoverprice.copies_per_publishing_day');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Single Combo Other Variant', true), 'OutgoingCertificateCoverprice.single_combo_other_variant');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Comments', true), 'OutgoingCertificateCoverprice.comments');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Additional Notes1', true), 'OutgoingCertificateCoverprice.additional_notes1');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Additional Notes2', true), 'OutgoingCertificateCoverprice.additional_notes2');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Additional Notes3', true), 'OutgoingCertificateCoverprice.additional_notes3');?></th>
                                                                                                                                                
                        <th class="actions">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
	<tr class="searchHeader">
		<td>
			<?php
				echo $this->AlaxosForm->checkBox('OutgoingCertificateCoverprice.select_all', array('class' => 'select_all')); ?>
		</td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id', array('placeholder' => __('Outgoing Certificate Coverprice Id', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cover_price_id', array('placeholder' => __('Cover Price Id', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('outgoing_certificate_id', array('placeholder' => __('Outgoing Certificate Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('edition_id', array('placeholder' => __('Edition Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printing_center_id', array('placeholder' => __('Printing Center Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_publishing_days', array('placeholder' => __('No Of Publishing Days', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cover_price', array('placeholder' => __('Cover Price', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_copies', array('placeholder' => __('Total Copies', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('copies_per_publishing_day', array('placeholder' => __('Copies Per Publishing Day', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_combo_other_variant', array('placeholder' => __('Single Combo Other Variant', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('comments', array('placeholder' => __('Comments', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_notes1', array('placeholder' => __('Additional Notes1', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_notes2', array('placeholder' => __('Additional Notes2', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('additional_notes3', array('placeholder' => __('Additional Notes3', true)));
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->button(___('search', true), array('class' => 'btn btn-default searchSubmit', 'type' => 'submit'));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset', 'class' => 'btn btn-default'));echo $this->AlaxosForm->end();?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('OutgoingCertificateCoverprice', array('id' => 'chooseActionForm', 'url' => array('controller' => 'outgoingCertificateCoverprices', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($outgoingCertificateCoverprices as $outgoingCertificateCoverprice):
		$i++;
        ?>
	<tr class="data" primary_key="<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']; ?>">
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('OutgoingCertificateCoverprice.' . $i . '.id', array('value' => $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']));
		?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['cover_price_id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['OutgoingCertificate']['id'], array('controller' => 'outgoing_certificates', 'action' => 'view', $outgoingCertificateCoverprice['OutgoingCertificate']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['Edition']['city_name'], array('controller' => 'editions', 'action' => 'view', $outgoingCertificateCoverprice['Edition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCoverprice['PrintingCenter']['id'], array('controller' => 'printing_centers', 'action' => 'view', $outgoingCertificateCoverprice['PrintingCenter']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['no_of_publishing_days']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['cover_price']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['total_copies']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['copies_per_publishing_day']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['single_combo_other_variant']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['comments']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['additional_notes1']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['additional_notes2']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['additional_notes3']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link('<i class="fa fa-list-alt"></i>', array('action' => 'view', $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link('<i class="fa fa-files-o"></i>', array('action' => 'copy', $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link('<i class="fa fa-times"></i>', array('action' => 'delete', $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $outgoingCertificateCoverprice['OutgoingCertificateCoverprice']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'input_actions' => true, 'paginator' => false, 'total_records' => $outgoingCertificateCoverprices, 'container_class' => 'toolbar_container_list'));
?>
</div>
	
