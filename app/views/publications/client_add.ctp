<div class="publications form">

	<?php echo $this->AlaxosForm->create('Publication', array('enctype' => 'multipart/form-data'));?>
        <?php echo $this->AlaxosForm->hidden('membership_type_id', array('label' => false)); ?>
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('client add publication'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'hidePaginator' => true,
            'additional_buttons' => array(
            _('Back To Dashboard') => $this->Html->link('<span class="toolbar-button" title="' . _('Back To Dashboard') . '">' . _('Back To Dashboard') . '</span>', '/client', array('title' => _('Back To Dashboard'), 'escape' => false)),
        )));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('Publication Name') ?>
		</td>
		<td>*:</td>
		<td>
			<?php echo $this->AlaxosForm->input('publication_name', array('label' => false)); ?>
		</td>
	</tr>
<!--                	<tr>
		<td>
			<?php ___('Description') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('description', array('label' => false)); ?>
		</td>
	</tr>-->
        <tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
