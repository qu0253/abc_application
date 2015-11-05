<?php if (isset($duplicateCopies) && is_array($duplicateCopies) && count($duplicateCopies) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($duplicateCopies, 'Duplicate Copies List');
    exit;
}
?><div class="duplicateCopies index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('duplicate copies');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('DuplicateCopy', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Duplicate Copy Id', true), 'DuplicateCopy.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Yellow Certificate', true), 'DuplicateCopy.yellow_certificate');?></th>
		<th><?php echo $this->Paginator->sort(__('White Certificate', true), 'DuplicateCopy.white_certificate');?></th>
		<th><?php echo $this->Paginator->sort(__('Name Of Contact Person', true), 'DuplicateCopy.name_of_contact_person');?></th>
		<th><?php echo $this->Paginator->sort(__('Active', true), 'DuplicateCopy.active');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('yellow_certificate');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('white_certificate');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('name_of_contact_person');
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
			echo $this->AlaxosForm->create('DuplicateCopy', array('id' => 'chooseActionForm', 'url' => array('controller' => 'duplicateCopies', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($duplicateCopies as $duplicateCopy):
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
		echo $this->AlaxosForm->checkBox('DuplicateCopy.' . $i . '.id', array('value' => $duplicateCopy['DuplicateCopy']['id']));
		?>
		</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($duplicateCopy['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $duplicateCopy['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['yellow_certificate']; ?>
		</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['white_certificate']; ?>
		</td>
		<td>
			<?php echo $duplicateCopy['DuplicateCopy']['name_of_contact_person']; ?>
		</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($duplicateCopy['DuplicateCopy']['active']);
			?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $duplicateCopy['DuplicateCopy']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $duplicateCopy['DuplicateCopy']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $duplicateCopy['DuplicateCopy']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $duplicateCopy['DuplicateCopy']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $duplicateCopy['DuplicateCopy']['id'])); ?>

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
	echo $this->AlaxosForm->input_actions_list();
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
	echo $this->AlaxosForm->create('DuplicateCopy', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
