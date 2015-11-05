<?php if (isset($nonQualifyingCirculations) && is_array($nonQualifyingCirculations) && count($nonQualifyingCirculations) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($nonQualifyingCirculations, 'Non Qualifying Circulations List');
    exit;
}
?><div class="nonQualifyingCirculations index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('non qualifying circulations');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => true, 'print' => true, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('NonQualifyingCirculation', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Non Qualifying Circulation Id', true), 'NonQualifyingCirculation.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Qualifying Circulation Name', true), 'QualifyingCirculation.qualifying_circulation_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Single 10', true), 'NonQualifyingCirculation.single_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo 10', true), 'NonQualifyingCirculation.combo_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription 10', true), 'NonQualifyingCirculation.subscription_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional 10', true), 'NonQualifyingCirculation.institutional_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies 10', true), 'NonQualifyingCirculation.free_copies_10');?></th>
		<th><?php echo $this->Paginator->sort(__('Single 20', true), 'NonQualifyingCirculation.single_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo 20', true), 'NonQualifyingCirculation.combo_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription 20', true), 'NonQualifyingCirculation.subscription_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional 20', true), 'NonQualifyingCirculation.institutional_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies 20', true), 'NonQualifyingCirculation.free_copies_20');?></th>
		<th><?php echo $this->Paginator->sort(__('Single 100', true), 'NonQualifyingCirculation.single_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo 100', true), 'NonQualifyingCirculation.combo_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription 100', true), 'NonQualifyingCirculation.subscription_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional 100', true), 'NonQualifyingCirculation.institutional_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies 100', true), 'NonQualifyingCirculation.free_copies_100');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Single Copy Sales', true), 'NonQualifyingCirculation.single_single_copy_sales');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Single Copy Sales', true), 'NonQualifyingCirculation.combo_single_copy_sales');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Single Copy Sales', true), 'NonQualifyingCirculation.subscription_single_copy_sales');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Single Copy Sales', true), 'NonQualifyingCirculation.institutional_single_copy_sales');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Single Copy Sales', true), 'NonQualifyingCirculation.free_copies_single_copy_sales');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Combo Sales Copies', true), 'NonQualifyingCirculation.single_combo_sales_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Combo Sales Copies', true), 'NonQualifyingCirculation.combo_combo_sales_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Combo Sales Copies', true), 'NonQualifyingCirculation.subscription_combo_sales_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Combo Sales Copies', true), 'NonQualifyingCirculation.institutional_combo_sales_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Combo Sales Copies', true), 'NonQualifyingCirculation.free_copies_combo_sales_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Single Copy Subscription', true), 'NonQualifyingCirculation.single_single_copy_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Single Copy Subscription', true), 'NonQualifyingCirculation.combo_single_copy_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Single Copy Subscription', true), 'NonQualifyingCirculation.subscription_single_copy_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Single Copy Subscription', true), 'NonQualifyingCirculation.institutional_single_copy_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Single Copy Subscription', true), 'NonQualifyingCirculation.free_copies_single_copy_subscription');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Joint Subscription Copies', true), 'NonQualifyingCirculation.single_joint_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Joint Subscription Copies', true), 'NonQualifyingCirculation.combo_joint_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Joint Subscription Copies', true), 'NonQualifyingCirculation.subscription_joint_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Joint Subscription Copies', true), 'NonQualifyingCirculation.institutional_joint_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Joint Subscription Copies', true), 'NonQualifyingCirculation.free_copies_joint_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Institutional Subscription Copies', true), 'NonQualifyingCirculation.single_institutional_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Institutional Subscription Copies', true), 'NonQualifyingCirculation.combo_institutional_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Institutional Subscription Copies', true), 'NonQualifyingCirculation.subscription_institutional_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Institutional Subscription Copies', true), 'NonQualifyingCirculation.institutional_institutional_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Institutional Subscription Copies', true), 'NonQualifyingCirculation.free_copies_institutional_subscription_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Institutional Sale Copies', true), 'NonQualifyingCirculation.single_institutional_sale_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Institutional Sale Copies', true), 'NonQualifyingCirculation.combo_institutional_sale_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Institutional Sale Copies', true), 'NonQualifyingCirculation.subscription_institutional_sale_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Institutional Sale Copies', true), 'NonQualifyingCirculation.institutional_institutional_sale_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Institutional Sale Copies', true), 'NonQualifyingCirculation.free_copies_institutional_sale_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Free Copies', true), 'NonQualifyingCirculation.single_free_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Free Copies', true), 'NonQualifyingCirculation.combo_free_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Free Copies', true), 'NonQualifyingCirculation.subscription_free_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Free Copies', true), 'NonQualifyingCirculation.institutional_free_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Free Copies', true), 'NonQualifyingCirculation.free_copies_free_copies');?></th>
		<th><?php echo $this->Paginator->sort(__('Single Non Qualifying Sales Other Than Nnr', true), 'NonQualifyingCirculation.single_non_qualifying_sales_other_than_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Combo Non Qualifying Sales Other Than Nnr', true), 'NonQualifyingCirculation.combo_non_qualifying_sales_other_than_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Subscription Non Qualifying Sales Other Than Nnr', true), 'NonQualifyingCirculation.subscription_non_qualifying_sales_other_than_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Institutional Non Qualifying Sales Other Than Nnr', true), 'NonQualifyingCirculation.institutional_non_qualifying_sales_other_than_nnr');?></th>
		<th><?php echo $this->Paginator->sort(__('Free Copies Non Qualifying Sales Other Than Nnr', true), 'NonQualifyingCirculation.free_copies_non_qualifying_sales_other_than_nnr');?></th>
		
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
				echo $this->AlaxosForm->filter_field('single_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_10');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_20');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_100');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_single_copy_sales');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_single_copy_sales');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_single_copy_sales');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_single_copy_sales');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_single_copy_sales');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_combo_sales_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_combo_sales_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_combo_sales_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_combo_sales_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_combo_sales_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_single_copy_subscription');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_single_copy_subscription');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_single_copy_subscription');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_single_copy_subscription');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_single_copy_subscription');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_joint_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_joint_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_joint_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_joint_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_joint_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_institutional_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_institutional_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_institutional_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_institutional_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_institutional_subscription_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_institutional_sale_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_institutional_sale_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_institutional_sale_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_institutional_sale_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_institutional_sale_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_free_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_free_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_free_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_free_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_free_copies');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('single_non_qualifying_sales_other_than_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('combo_non_qualifying_sales_other_than_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('subscription_non_qualifying_sales_other_than_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('institutional_non_qualifying_sales_other_than_nnr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('free_copies_non_qualifying_sales_other_than_nnr');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('NonQualifyingCirculation', array('id' => 'chooseActionForm', 'url' => array('controller' => 'nonQualifyingCirculations', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($nonQualifyingCirculations as $nonQualifyingCirculation):
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
		echo $this->AlaxosForm->checkBox('NonQualifyingCirculation.' . $i . '.id', array('value' => $nonQualifyingCirculation['NonQualifyingCirculation']['id']));
		?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['id']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['QualifyingCirculation']['id']; //$this->Html->link($nonQualifyingCirculation['QualifyingCirculation']['id'], array('controller' => 'qualifying_circulations', 'action' => 'view', $nonQualifyingCirculation['QualifyingCirculation']['id'])); ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_10']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_10']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_10']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_10']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_10']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_20']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_20']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_20']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_20']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_20']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_100']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_100']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_100']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_100']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_100']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_single_copy_sales']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_combo_sales_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_single_copy_subscription']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_joint_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_institutional_subscription_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_institutional_sale_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_free_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_free_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_free_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_free_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_free_copies']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['single_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['combo_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['subscription_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['institutional_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td>
			<?php echo $nonQualifyingCirculation['NonQualifyingCirculation']['free_copies_non_qualifying_sales_other_than_nnr']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $nonQualifyingCirculation['NonQualifyingCirculation']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $nonQualifyingCirculation['NonQualifyingCirculation']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $nonQualifyingCirculation['NonQualifyingCirculation']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $nonQualifyingCirculation['NonQualifyingCirculation']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $nonQualifyingCirculation['NonQualifyingCirculation']['id'])); ?>-->

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
	echo $this->AlaxosForm->create('NonQualifyingCirculation', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
