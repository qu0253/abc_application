<div class="representatives form">

	<?php echo $this->AlaxosForm->create('Representative', array('enctype' => 'multipart/form-data'));?>
        <?php echo $this->AlaxosForm->input('id'); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add representative'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr class="display_none">
		<td>
			<?php ___('Membership Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('membership_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr class="display_none">
		<td>
			<?php ___('Representative Type Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('representative_type_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr>
		<td>
			<?php ___('Prefix Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('prefix_id', array('label' => false)); ?>
		</td>
	</tr>
        <tr class="horz_tr">
		<td>
			<?php ___('Representative Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('representative_name', array('label' => false)); ?>
                        <div class="add_horz_link">
                        <?php 
                        foreach($this->Session->read('Auth.Representative') as $k => $r) {
                            echo $this->Html->link("Copy '{$r['representative_name']}' Here", array('action' => 'copy', $r['id'], 'representative_type_id' => $this->data['Representative']['representative_type_id']), array('escape' => false, 'title' => "Copy '{$r['representative_name']}' Here"));
                            }
                        ?>
                        </div>
		</td>   
	</tr>
                	<tr>
		<td>
			<?php ___('Designation') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('designation', array('label' => false)); ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Additional Details') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('additional_details', array('label' => false)); ?>
		</td>
	</tr>
                <?php echo $this->element("address_form");?>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
