<div class="whiteForms view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('white form');?><?php echo !empty($whiteForm['WhiteForm']['id']) ? ' - ' . $whiteForm['WhiteForm']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $whiteForm['WhiteForm']['id'], 'copy_id' => false, 'delete_id' => $whiteForm['WhiteForm']['id'], 'delete_text' => ___('do you really want to delete this white form ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('White Form Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $whiteForm['WhiteForm']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $whiteForm['QualifyingCirculation']['id']; //$this->Html->link($whiteForm['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $whiteForm['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('City Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $whiteForm['City']['city_name']; //$this->Html->link($whiteForm['City']['city_name'], array('controller' => 'cities', 'action' => 'view', $whiteForm['City']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Circulation'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $whiteForm['WhiteForm']['circulation']; ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Sunday'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $whiteForm['WhiteForm']['sunday']; ?>
		</td>
	</tr>
	</table>
</div>
