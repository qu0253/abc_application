<?php if (isset($notifications) && is_array($notifications) && count($notifications) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($notifications, 'Notifications List');
    exit;
}
?><div class="notifications index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('notifications');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Notification', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<!--th><?php echo $this->Paginator->sort(__('Notification Id', true), 'Notification.id');?></th-->
		<th><?php echo $this->Paginator->sort(__('Title', true), 'Notification.title');?></th>
		<th><?php echo $this->Paginator->sort(__('Interpretation', true), 'Notification.interpretation');?></th>
		<th><?php echo $this->Paginator->sort(__('Subject', true), 'Notification.subject');?></th>
		<!--th><?php echo $this->Paginator->sort(__('Html Email Content', true), 'Notification.html_email_content');?></th-->
		<th><?php echo $this->Paginator->sort(__('CC', true), 'Notification.cc');?></th>
		<th><?php echo $this->Paginator->sort(__('BCC', true), 'Notification.bcc');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'Notification.active');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
		<!--td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('title');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('interpretation');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subject');
			?>
		</td>
		<!--td>
			<?php
				echo $this->AlaxosForm->filter_field('html_email_content');
			?>
		</td-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cc');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('bcc');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('active');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Notification', array('id' => 'chooseActionForm', 'url' => array('controller' => 'notifications', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($notifications as $notification):
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
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('Notification.' . $i . '.id', array('value' => $notification['Notification']['id']));
		?>
		</td>
		<!--td>
			<?php echo $notification['Notification']['id']; ?>
		</td-->
		<td>
			<?php echo $notification['Notification']['title']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['interpretation']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['subject']; ?>
		</td>
		<!--td>
			<?php echo $notification['Notification']['html_email_content']; ?>
		</td-->
		<td>
			<?php echo $notification['Notification']['cc']; ?>
		</td>
		<td>
			<?php echo $notification['Notification']['bcc']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($notification['Notification']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $notification['Notification']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $notification['Notification']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $notification['Notification']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $notification['Notification']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $notification['Notification']['title'])); ?>-->

		</td>
	</tr>
<?php endforeach; ?>
	</table>
         	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $this->AlaxosForm->input_actions_list_without_delete();
	echo '&nbsp;';
	echo $this->AlaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
</div>
	<div class="select_rec_per_page">
            <?php

	$passedArgs = $this->passedArgs;
	unset($passedArgs['limit']);
	echo $this->AlaxosForm->create('Notification', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
	echo 'Select Records Per page: ';
	$options = Configure::read('select_rec_per_page');
	$paginingParams = ($paginator->params) ? $paginator->params : array();
	$pagining = !empty($paginingParams) ? array_pop($paginingParams['paging']) : array();
	$value = (empty($pagining) && empty($pagining['options']) && empty($pagining['options']['limit'])) ? $pagining['defaults']['limit'] : $pagining['options']['limit'];
	echo $this->AlaxosForm->select('limit', $options, $value, array(
            'value'=>$value, 
            'default'=>20, 
            'empty' => FALSE, 
            'onChange'=>'update_limit(this); return false;', 
            'name'=>'limit'
            )
        );
	echo $this->AlaxosForm->end();
	?>
        </div>
