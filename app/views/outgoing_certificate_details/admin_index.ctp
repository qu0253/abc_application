<?php if (isset($outgoingCertificateDetails) && is_array($outgoingCertificateDetails) && count($outgoingCertificateDetails) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($outgoingCertificateDetails, 'Outgoing Certificate Details List');
    exit;
}
?><div class="page-title">
        <h2><?php ___('outgoing certificate details');?></h2>        
</div>
<div class="outgoingCertificateDetails index">
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => array('model_name' => 'OutgoingCertificateDetail', 'total_records' => $outgoingCertificateDetails), 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('OutgoingCertificateDetail', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
          
        <div class="table-responsive">
	        <table class="administration table table-striped table-bordered table-hover">
                <thead>
                    <tr class="sortHeader">
                        <th><li class="fa fa-minus-square-o"></li></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Detail Id', true), 'OutgoingCertificateDetail.id');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Name', true), 'OutgoingCertificate.outgoing_certificate_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Edition Name', true), 'Edition.edition_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Edition Symbol', true), 'OutgoingCertificateDetail.edition_symbol');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Printing Center Name', true), 'PrintingCenter.printing_center_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Printing Center Symbol', true), 'OutgoingCertificateDetail.printing_center_symbol');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Qualifying Sales', true), 'OutgoingCertificateDetail.total_qualifying_sales');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Qualifying Sales Symbol', true), 'OutgoingCertificateDetail.total_qualifying_sales_symbol');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Number Of Publishing Days', true), 'OutgoingCertificateDetail.total_number_of_publishing_days');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Total Number Of Publishing Days Symbol', true), 'OutgoingCertificateDetail.total_number_of_publishing_days_symbol');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Average Total Qualifying Sales', true), 'OutgoingCertificateDetail.average_total_qualifying_sales');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Average Total Qualifying Sales Symbol', true), 'OutgoingCertificateDetail.average_total_qualifying_sales_symbol');?></th>
                                                                                                                                                
                        <th class="actions">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
	<tr class="searchHeader">
		<td>
			<?php
				echo $this->AlaxosForm->checkBox('OutgoingCertificateDetail.select_all', array('class' => 'select_all')); ?>
		</td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id', array('placeholder' => __('Outgoing Certificate Detail Id', true)));
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
				echo $this->AlaxosForm->filter_field('edition_symbol', array('placeholder' => __('Edition Symbol', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printing_center_id', array('placeholder' => __('Printing Center Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('printing_center_symbol', array('placeholder' => __('Printing Center Symbol', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_qualifying_sales', array('placeholder' => __('Total Qualifying Sales', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_qualifying_sales_symbol', array('placeholder' => __('Total Qualifying Sales Symbol', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_number_of_publishing_days', array('placeholder' => __('Total Number Of Publishing Days', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_number_of_publishing_days_symbol', array('placeholder' => __('Total Number Of Publishing Days Symbol', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('average_total_qualifying_sales', array('placeholder' => __('Average Total Qualifying Sales', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('average_total_qualifying_sales_symbol', array('placeholder' => __('Average Total Qualifying Sales Symbol', true)));
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->button(___('search', true), array('class' => 'btn btn-default searchSubmit', 'type' => 'submit'));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset', 'class' => 'btn btn-default'));echo $this->AlaxosForm->end();?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('OutgoingCertificateDetail', array('id' => 'chooseActionForm', 'url' => array('controller' => 'outgoingCertificateDetails', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($outgoingCertificateDetails as $outgoingCertificateDetail):
		$i++;
        ?>
	<tr class="data" primary_key="<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['id']; ?>">
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('OutgoingCertificateDetail.' . $i . '.id', array('value' => $outgoingCertificateDetail['OutgoingCertificateDetail']['id']));
		?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['OutgoingCertificate']['id'], array('controller' => 'outgoing_certificates', 'action' => 'view', $outgoingCertificateDetail['OutgoingCertificate']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['Edition']['city_name'], array('controller' => 'editions', 'action' => 'view', $outgoingCertificateDetail['Edition']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['edition_symbol']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateDetail['PrintingCenter']['id'], array('controller' => 'printing_centers', 'action' => 'view', $outgoingCertificateDetail['PrintingCenter']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['printing_center_symbol']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_qualifying_sales']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_qualifying_sales_symbol']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_number_of_publishing_days']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['total_number_of_publishing_days_symbol']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['average_total_qualifying_sales']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateDetail['OutgoingCertificateDetail']['average_total_qualifying_sales_symbol']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link('<i class="fa fa-list-alt"></i>', array('action' => 'view', $outgoingCertificateDetail['OutgoingCertificateDetail']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $outgoingCertificateDetail['OutgoingCertificateDetail']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link('<i class="fa fa-files-o"></i>', array('action' => 'copy', $outgoingCertificateDetail['OutgoingCertificateDetail']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link('<i class="fa fa-times"></i>', array('action' => 'delete', $outgoingCertificateDetail['OutgoingCertificateDetail']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $outgoingCertificateDetail['OutgoingCertificateDetail']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'input_actions' => true, 'paginator' => false, 'total_records' => $outgoingCertificateDetails, 'container_class' => 'toolbar_container_list'));
?>
</div>
	
