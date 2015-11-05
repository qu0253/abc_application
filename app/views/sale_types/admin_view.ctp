<div class="saleTypes view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('sale type');?><?php echo !empty($saleType['SaleType']['sale_type_name']) ? ' - ' . $saleType['SaleType']['sale_type_name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $saleType['SaleType']['id'], 'copy_id' => $saleType['SaleType']['id'], 'delete_id' => $saleType['SaleType']['id'], 'delete_text' => ___('do you really want to delete this sale type ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Sale Type Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $saleType['SaleType']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Sale Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $saleType['SaleType']['sale_type_name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($saleType['SaleType']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($saleType['SaleType']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $saleType['SaleType']['created_by']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($saleType['SaleType']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $saleType['SaleType']['modified_by']; ?>
		</td>
	</tr>
	</table>
</div>
