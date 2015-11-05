<div class="coverPrices view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('cover price');?><?php echo !empty($coverPrice['CoverPrice']['id']) ? ' - ' . $coverPrice['CoverPrice']['id'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $coverPrice['CoverPrice']['id'], 'copy_id' => $coverPrice['CoverPrice']['id'], 'delete_id' => $coverPrice['CoverPrice']['id'], 'delete_text' => ___('do you really want to delete this cover price ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Cover Price Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['cover_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Qualifying Circulation Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($coverPrice['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $coverPrice['QualifyingCirculation']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('No Of Publishing Days'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['no_of_publishing_days']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Copies'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['total_copies']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Copies Per Publishing Day'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['copies_per_publishing_day']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Single Combo Other Variant'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['single_combo_other_variant']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($coverPrice['CoverPrice']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($coverPrice['CoverPrice']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($coverPrice['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $coverPrice['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($coverPrice['CoverPrice']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($coverPrice['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $coverPrice['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
