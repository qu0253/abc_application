<div class="holdingCompanies view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center"><?php
                if ($this->data['Membership']['membership_type_id'] == 5) {
                ?>
                <h2><?php ___('Company / Proprietor Name');?>
                <?php
                } else {
                ?>
                <h2><?php ___('holding company');?>
                <?php
                }
                ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $holdingCompany['HoldingCompany']['id'], 'copy_id' => $holdingCompany['HoldingCompany']['id'], 'delete_id' => $holdingCompany['HoldingCompany']['id'], 'delete_text' => ___('do you really want to delete this holding company ?', true)));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Holding Company Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $holdingCompany['HoldingCompany']['id']; ?>
		</td>
	</tr>
        <?php
        if(!empty($holdingCompany['Membership']['name'])) {
        ?>
	<tr>
		<td>
			<?php ___('Membership Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($holdingCompany['Membership']['name'], array('controller' => 'memberships', 'action' => 'view', $holdingCompany['Membership']['id'])); ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ___('Holding Company Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $holdingCompany['HoldingCompany']['holding_company_name']; ?>
		</td>
	</tr>
	<?php echo $this->element("address_without_mobile_email_view", array('address' => $holdingCompany));?>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($holdingCompany['HoldingCompany']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($holdingCompany['HoldingCompany']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($holdingCompany['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $holdingCompany['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($holdingCompany['HoldingCompany']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($holdingCompany['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $holdingCompany['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
