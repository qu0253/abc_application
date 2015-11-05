<?php if (isset($outgoingCertificateCombos) && is_array($outgoingCertificateCombos) && count($outgoingCertificateCombos) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($outgoingCertificateCombos, 'Outgoing Certificate Combos List');
    exit;
}
?><div class="page-title">
        <h2><?php ___('outgoing certificate combos');?></h2>        
</div>
<div class="outgoingCertificateCombos index">
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => array('model_name' => 'OutgoingCertificateCombo', 'total_records' => $outgoingCertificateCombos), 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('OutgoingCertificateCombo', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
          
        <div class="table-responsive">
	        <table class="administration table table-striped table-bordered table-hover">
                <thead>
                    <tr class="sortHeader">
                        <th><li class="fa fa-minus-square-o"></li></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Combo Id', true), 'OutgoingCertificateCombo.id');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Id', true), 'OutgoingCertificateCombo.combo_id');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo Name', true), 'OutgoingCertificateCombo.combo_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Outgoing Certificate Name', true), 'OutgoingCertificate.outgoing_certificate_name');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Cover Price', true), 'OutgoingCertificateCombo.cover_price');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Combo', true), 'OutgoingCertificateCombo.combo');?></th>
                                		<th><?php echo $this->Paginator->sort(__('Active', true), 'OutgoingCertificateCombo.active');?></th>
                                                                                                                                                
                        <th class="actions">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
	<tr class="searchHeader">
		<td>
			<?php
				echo $this->AlaxosForm->checkBox('OutgoingCertificateCombo.select_all', array('class' => 'select_all')); ?>
		</td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id', array('placeholder' => __('Outgoing Certificate Combo Id', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_id', array('placeholder' => __('Combo Id', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_name', array('placeholder' => __('Combo Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('outgoing_certificate_id', array('placeholder' => __('Outgoing Certificate Name', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cover_price', array('placeholder' => __('Cover Price', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo', array('placeholder' => __('Combo', true)));
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('active', array('placeholder' => __('Active', true)));
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->button(___('search', true), array('class' => 'btn btn-default searchSubmit', 'type' => 'submit'));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset', 'class' => 'btn btn-default'));echo $this->AlaxosForm->end();?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('OutgoingCertificateCombo', array('id' => 'chooseActionForm', 'url' => array('controller' => 'outgoingCertificateCombos', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($outgoingCertificateCombos as $outgoingCertificateCombo):
		$i++;
        ?>
	<tr class="data" primary_key="<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['id']; ?>">
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('OutgoingCertificateCombo.' . $i . '.id', array('value' => $outgoingCertificateCombo['OutgoingCertificateCombo']['id']));
		?>
		</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['id']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['combo_id']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['combo_name']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($outgoingCertificateCombo['OutgoingCertificate']['id'], array('controller' => 'outgoing_certificates', 'action' => 'view', $outgoingCertificateCombo['OutgoingCertificate']['id'])); ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['cover_price']; ?>
		</td>
		<td>
			<?php echo $outgoingCertificateCombo['OutgoingCertificateCombo']['combo']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($outgoingCertificateCombo['OutgoingCertificateCombo']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link('<i class="fa fa-list-alt"></i>', array('action' => 'view', $outgoingCertificateCombo['OutgoingCertificateCombo']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link('<i class="fa fa-edit"></i>', array('action' => 'edit', $outgoingCertificateCombo['OutgoingCertificateCombo']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link('<i class="fa fa-files-o"></i>', array('action' => 'copy', $outgoingCertificateCombo['OutgoingCertificateCombo']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link('<i class="fa fa-times"></i>', array('action' => 'delete', $outgoingCertificateCombo['OutgoingCertificateCombo']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $outgoingCertificateCombo['OutgoingCertificateCombo']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'input_actions' => true, 'paginator' => false, 'total_records' => $outgoingCertificateCombos, 'container_class' => 'toolbar_container_list'));
?>
</div>
	
