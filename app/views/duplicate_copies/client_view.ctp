<div class="duplicateCopies view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('duplicate copy');?><?php echo !empty($duplicateCopy['DuplicateCopy']['id']) ? ' - ' . $duplicateCopy['DuplicateCopy']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $duplicateCopy['DuplicateCopy']['id'], 'copy_id' => $duplicateCopy['DuplicateCopy']['id'], 'delete_id' => $duplicateCopy['DuplicateCopy']['id'], 'delete_text' => ___('do you really want to delete this duplicate copy ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Duplicate Copy Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy['QualifyingCirculation']['id']; //$this->Html->link($duplicateCopy['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $duplicateCopy['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Yellow Certificate'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['yellow_certificate']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('White Certificate'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['white_certificate']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name Of Contact Person'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['name_of_contact_person']; ?>
		</td>
	</tr>
	<?php echo $this->element("address_view", array('address' => $duplicateCopy));?>
	</table>
</div>
