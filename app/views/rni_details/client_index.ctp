<?php if (isset($rniDetails) && is_array($rniDetails) && count($rniDetails) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($rniDetails, 'Rni Details List');
    exit;
}
?><div class="rniDetails index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('rni details');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('common_toolbar');
	?>

	<?php
	echo $this->AlaxosForm->create('RniDetail', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
<!--		<th style="width:5px;"></th>-->
<!--		<th><?php echo $this->Paginator->sort(__('Rni Detail Id', true), 'RniDetail.id');?></th>-->
<!--		<th><?php echo $this->Paginator->sort(__('Membership Name', true), 'RniDetail.membership_id');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Rni Number', true), 'RniDetail.rni_number');?></th>
		<th><?php echo $this->Paginator->sort(__('File Rni Document', true), 'RniDetail.file_rni_document');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	<?php
	$i = 0;
	foreach ($rniDetails as $rniDetail):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
<!--		<td>
		<?php
		echo $this->AlaxosForm->checkBox('RniDetail.' . $i . '.id', array('value' => $rniDetail['RniDetail']['id']));
		?>
		</td>-->
<!--		<td>
			<?php echo $rniDetail['RniDetail']['id']; ?>
		</td>-->
<!--		<td>
			<?php echo $rniDetail['Membership']['name']; //$this->Html->link($rniDetail['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $rniDetail['Membership']['id'])); ?>
		</td>-->
		<td>
			<?php echo $rniDetail['RniDetail']['rni_number']; ?>
		</td>
		<td>
			<?php
			$file_name = $rniDetail['RniDetail']['file_rni_document'];
			if (!empty($file_name)) {
				echo $this->AlaxosForm->get_download_link($rniDetail['RniDetail']['file_rni_document'], 'rni_details', $rniDetail['RniDetail']['id'], 'file_rni_document');
			} ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $rniDetail['RniDetail']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
</div>	
