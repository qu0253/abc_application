<?php if (isset($memberships) && is_array($memberships) && count($memberships) > 0 && isset($export_to_excel) && $export_to_excel == 1) {
    $excel->generate($memberships, 'Memberships List');
    exit;
}
?><div class="memberships index">
	
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('memberships');?></h2>
	    </span>
        <span class="h2-right"></span></div>
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'select_rec_per_page' => true, 'export_excel' => false, 'print' => false, 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Membership', array('url' => $this->passedArgs, )); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('Membership Id', true), 'Membership.id');?></th>
		<th><?php echo $this->Paginator->sort(__('Membership Type Name', true), 'MembershipType.membership_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('User Name', true), 'User.username');?></th>
		<th><?php echo $this->Paginator->sort(__('Name', true), 'Membership.name');?></th>
		<th><?php echo $this->Paginator->sort(__('Publication Name', true), 'Publication.publication_name');?></th>
<!--		<th><?php echo $this->Paginator->sort(__('Edition Name', true), 'Edition.edition_name');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Publication Type Name', true), 'PublicationType.publication_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Language Name', true), 'Language.language_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Frequency Type Name', true), 'FrequencyType.frequency_type_name');?></th>
<!--		<th><?php echo $this->Paginator->sort(__('Date Of First Issue', true), 'Membership.date_of_first_issue');?></th>-->
		<th><?php echo $this->Paginator->sort(__('Category Name', true), 'Category.category_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Website', true), 'Membership.website');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Publications', true), 'Membership.other_publications');?></th>
		<th><?php echo $this->Paginator->sort(__('Branch Offices', true), 'Membership.branch_offices');?></th>
		<th><?php echo $this->Paginator->sort(__('Belong To Other Prof Org', true), 'Membership.belong_to_other_prof_org');?></th>
		<th><?php echo $this->Paginator->sort(__('Cover Price', true), 'Membership.cover_price');?></th>
		<th><?php echo $this->Paginator->sort(__('Applied For Rni No', true), 'Membership.applied_for_rni_no');?></th>
		<th><?php echo $this->Paginator->sort(__('Proposer 1 Representative Name', true), 'Proposer1Representative.proposer_1_representative_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Proposer 2 Representative Name', true), 'Proposer2Representative.proposer_2_representative_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Date Of Establishment', true), 'Membership.date_of_establishment');?></th>
		<th><?php echo $this->Paginator->sort(__('Company Type Name', true), 'CompanyType.company_type_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Nature Of Business', true), 'Membership.nature_of_business');?></th>
		<th><?php echo $this->Paginator->sort(__('Product Or Services Advertised', true), 'Membership.product_or_services_advertised');?></th>
		<th><?php echo $this->Paginator->sort(__('Total Exp On Press Adver During Prev Yr', true), 'Membership.total_exp_on_press_adver_during_prev_yr');?></th>
		<th><?php echo $this->Paginator->sort(__('Name Of Publications Used For Advert', true), 'Membership.name_of_publications_used_for_advert');?></th>
		<th><?php echo $this->Paginator->sort(__('Name Of Client Served', true), 'Membership.name_of_client_served');?></th>
		<th><?php echo $this->Paginator->sort(__('Agency Accredited', true), 'Membership.agency_accredited');?></th>
		<th><?php echo $this->Paginator->sort(__('Date Of Application', true), 'Membership.date_of_application');?></th>
		<th><?php echo $this->Paginator->sort(__('Date Of Bod Approval', true), 'Membership.date_of_bod_approval');?></th>
		<th><?php echo $this->Paginator->sort(__('Member Status Name', true), 'MemberStatus.member_status_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Other Details', true), 'Membership.other_details');?></th>
		<th><?php echo $this->Paginator->sort(__('Reason Name', true), 'Reason.reason_name');?></th>
		<th><?php echo $this->Paginator->sort(__('Comments', true), 'Membership.comments');?></th>
		<th><?php echo $this->Paginator->sort(__('Date Inactive', true), 'Membership.date_inactive');?></th>
		
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
				echo $this->AlaxosForm->filter_field('membership_type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('user_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('name');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('publication_id');
			?>
		</td>
<!--		<td>
			<?php
				echo $this->AlaxosForm->filter_field('edition_id');
			?>
		</td>-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('publication_type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('language_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('frequency_type_id');
			?>
		</td>
<!--		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_of_first_issue');
			?>
		</td>-->
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('category_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('website');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_publications');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('branch_offices');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('belong_to_other_prof_org');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('cover_price');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('applied_for_rni_no');
			?>
		</td>		
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('proposer_1_representative_id');
			?>
		</td>		
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('proposer_2_representative_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_of_establishment');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('company_type_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nature_of_business');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('product_or_services_advertised');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('total_exp_on_press_adver_during_prev_yr');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('name_of_publications_used_for_advert');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('name_of_client_served');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('agency_accredited');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_of_application');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_of_bod_approval');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('member_status_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('other_details');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('reason_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('comments');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_inactive');
			?>
		</td>
		<td class="searchHeader">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));echo $this->AlaxosForm->button(___('reset', true), array('type' => 'reset'));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Membership', array('id' => 'chooseActionForm', 'url' => array('controller' => 'memberships', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($memberships as $membership):
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
		echo $this->AlaxosForm->checkBox('Membership.' . $i . '.id', array('value' => $membership['Membership']['id']));
		?>
		</td>
		<td>
			<?php echo $membership['Membership']['id']; ?>
		</td>
		<td>
			<?php echo $membership['MembershipType']['membership_type_name']; //$this->Html->link($membership['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $membership['MembershipType']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['User']['username']; //$this->Html->link($membership['User']['id'], array('controller' => 'users', 'action' => 'view', $membership['User']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Membership']['name']; ?>
		</td>
		<td>
			<?php echo $membership['Publication']['publication_name']; //$this->Html->link($membership['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $membership['Publication']['id'])); ?>
		</td>
<!--		<td>
			<?php echo $membership['Edition']['city_name']; //$this->Html->link($membership['Edition']['city_name'], array('controller' => 'cities', 'action' => 'view', $membership['Edition']['id'])); ?>
		</td>-->
		<td>
			<?php echo $membership['PublicationType']['publication_type_name']; //$this->Html->link($membership['PublicationType']['publication_type_name'], array('controller' => 'publication_types', 'action' => 'view', $membership['PublicationType']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Language']['language_name']; //$this->Html->link($membership['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $membership['Language']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['FrequencyType']['frequency_type_name']; //$this->Html->link($membership['FrequencyType']['frequency_type_name'], array('controller' => 'frequency_types', 'action' => 'view', $membership['FrequencyType']['id'])); ?>
		</td>
<!--		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_first_issue']); ?>
		</td>-->
		<td>
			<?php echo $membership['Category']['category_name']; //$this->Html->link($membership['Category']['category_name'], array('controller' => 'categories', 'action' => 'view', $membership['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Membership']['website']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['other_publications']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['branch_offices']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['belong_to_other_prof_org']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['cover_price']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['applied_for_rni_no']; ?>
		</td>
		<td>
			<?php echo $membership['Proposer1Representative']['Prefix']['prefix_name'] . ' ' . $membership['Proposer1Representative']['representative_name']; //$this->Html->link($membership['Proposer1Representative']['representative_name'], array('controller' => 'representatives', 'action' => 'view', $membership['Proposer1Representative']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Proposer2Representative']['Prefix']['prefix_name'] . ' ' . $membership['Proposer2Representative']['representative_name']; //$this->Html->link($membership['Proposer2Representative']['representative_name'], array('controller' => 'representatives', 'action' => 'view', $membership['Proposer2Representative']['id'])); ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_establishment']); ?>
		</td>
		<td>
			<?php echo $membership['CompanyType']['company_type_name']; //$this->Html->link($membership['CompanyType']['company_type_name'], array('controller' => 'company_types', 'action' => 'view', $membership['CompanyType']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Membership']['nature_of_business']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['product_or_services_advertised']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['total_exp_on_press_adver_during_prev_yr']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['name_of_publications_used_for_advert']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['name_of_client_served']; ?>
		</td>
		<td>
			<?php echo $membership['Membership']['agency_accredited']; ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_application']); ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_bod_approval']); ?>
		</td>
		<td>
			<?php echo $membership['MemberStatus']['member_status_name']; //$this->Html->link($membership['MemberStatus']['member_status_name'], array('controller' => 'member_statuses', 'action' => 'view', $membership['MemberStatus']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Membership']['other_details']; ?>
		</td>
		<td>
			<?php echo $membership['Reason']['reason_name']; //$this->Html->link($membership['Reason']['reason_name'], array('controller' => 'reasons', 'action' => 'view', $membership['Reason']['id'])); ?>
		</td>
		<td>
			<?php echo $membership['Membership']['comments']; ?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_inactive']); ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $membership['Membership']['id']), array('class' => 'to_detail', 'escape' => false, 'title' => 'View')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $membership['Membership']['id']), array('escape' => false, 'title' => 'Edit')); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/copy.png'), array('action' => 'copy', $membership['Membership']['id']), array('escape' => false, 'title' => 'Copy')); ?>
			<!--<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $membership['Membership']['id']), array('escape' => false, 'title' => 'Delete'), sprintf(___("are you sure you want to delete '%s' ?", true), $membership['Membership']['name'])); ?>-->

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
if($i > 0 && 1 && 0)
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
	echo $this->AlaxosForm->create('Membership', array('url' => $passedArgs, 'id' => 'SelectRecPerPage', 'class' => 'SelectRecPerPage')); //'url' => $this->passedArgs allows to keep the sort when searching
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
