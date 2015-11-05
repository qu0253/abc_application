<div class="representatives view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('representative');?><?php echo !empty($representative['Representative']['representative_name']) ? ' - ' . $representative['Prefix']['prefix_name'] . ' ' . $representative['Representative']['representative_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
        $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
        if ($this->Support->isEditable($mem_status_id)) {                            
            echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => false, 'list' => true, 'edit_id' => $representative['Representative']['id']));
        } else {
            echo $this->element('common_toolbar');
        }
	?>

	<table border="0" class="view">
<!--	<tr>
		<td>
			<?php ___('Representative Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['id']; ?>
		</td>
	</tr>-->
	<?php
        if(!empty($representatives['Membership']['name'])) {
        ?>   
        <tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Membership']['name']; //$this->Html->link($representative['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $representative['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ___('Representative Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['RepresentativeType']['representative_type_name']; //$this->Html->link($representative['RepresentativeType']['representative_type_name'], array('controller' => 'representative_types', 'action' => 'view', $representative['RepresentativeType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Prefix']['prefix_name'] . ' ' . $representative['Representative']['representative_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Designation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['designation']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Additional Details'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $representative['Representative']['additional_details']; ?>
		</td>
	</tr>
	<?php echo $this->element("address_view", array('address' => $representative));?>
	</table>
</div>
