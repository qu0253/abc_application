<?php if (isset($coverPrices) && is_array($coverPrices) && count($coverPrices) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($coverPrices, 'Cover Prices List');
    exit;
}
echo $this->render('client_add');
?><div class="coverPrices index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h3><?php ___('cover prices');?></h3>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('yellow_form_toolbar');
	?>

	<?php
	echo $this->AlaxosForm->create('CoverPrice', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;" class="display_none"></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Cover Price Id', true), 'CoverPrice.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Cover Price', true), 'CoverPrice.cover_price');?></th>
		<th class="display_none"><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('No Of Publishing Days', true), 'CoverPrice.no_of_publishing_days');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Copies', true), 'CoverPrice.total_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Copies Per Publishing Day', true), 'CoverPrice.copies_per_publishing_day');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Combo Other Variant', true), 'CoverPrice.single_combo_other_variant');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td class="display_none"></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('id');
			?>
		</td>
		<td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('cover_price');
			?>
		</td>
		<td class="display_none">
			<?php
				echo $this->AlaxosForm->filter_field('qualifying_circulation_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('no_of_publishing_days');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('copies_per_publishing_day');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_combo_other_variant');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('CoverPrice', array('id' => 'chooseActionForm', 'url' => array('controller' => 'coverPrices', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($coverPrices as $coverPrice):
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
		<td class="display_none">
		<?php
		echo $this->AlaxosForm->checkBox('CoverPrice.' . $i . '.id', array('value' => $coverPrice['CoverPrice']['id']));
		?>
		</td>
		<td class="display_none">
			<?php echo $coverPrice['CoverPrice']['id']; ?>
		</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['cover_price']; ?>
		</td>
		<td class="display_none">
			<?php echo $coverPrice['QualifyingCirculation']['id']; //$this->Html->link($coverPrice['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $coverPrice['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['no_of_publishing_days']; ?>
		</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['total_copies']; ?>
		</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['copies_per_publishing_day']; ?>
		</td>
		<td>
			<?php echo $coverPrice['CoverPrice']['single_combo_other_variant']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $coverPrice['CoverPrice']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $coverPrice['CoverPrice']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $coverPrice['CoverPrice']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $coverPrice['CoverPrice']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $coverPrice['CoverPrice']['id'])); ?>

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
if($i > 0 && 0 && 1)
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
	echo $this->AlaxosForm->create('CoverPrice', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
