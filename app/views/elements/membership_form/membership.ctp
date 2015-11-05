	<tr>
		<td height="60" colspan="3" align="center" valign="middle"><span class="bold13">Permanent Information Form</span></td>
	</tr>


	<?php if(!empty($membership['Membership']['id']))  { ?>
	<tr>
		<td>
			<?php ___('Membership Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['id']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['membership_type_id']))  { ?>
	<tr>
		<td>
			<?php ___('Membership Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['MembershipType']['membership_type_name']; //$this->Html->link($membership['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $membership['MembershipType']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['user_id']))  { ?>
	<tr>
		<td>
			<?php ___('User Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['User']['username']; //$this->Html->link($membership['User']['username'], array('controller' => 'users', 'action' => 'view', $membership['User']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['name']))  { ?>
	<tr>
		<td>
			<?php ___('Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['name']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['publication_id']))  { ?>
	<tr>
		<td>
			<?php ___('Publication Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Publication']['publication_name']; //$this->Html->link($membership['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $membership['Publication']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['edition_id']))  { ?>
<!--	<tr>
		<td>
			<?php ___('Edition Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Edition']['city_name']; //$this->Html->link($membership['Edition']['city_name'], array('controller' => 'cities', 'action' => 'view', $membership['Edition']['id'])); ?>
		</td>
	</tr>-->
	<?php echo $this->element("only_address_view", array('address' => $membership));?>
	<?php } ?>
	<?php if(!empty($membership['Membership']['publication_type_id']))  { ?>
	<tr>
		<td>
			<?php ___('Publication Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['PublicationType']['publication_type_name']; //$this->Html->link($membership['PublicationType']['publication_type_name'], array('controller' => 'publication_types', 'action' => 'view', $membership['PublicationType']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['language_id']))  { ?>
	<tr>
		<td>
			<?php ___('Language Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Language']['language_name']; //$this->Html->link($membership['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $membership['Language']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['frequency_type_id']))  { ?>
	<tr>
		<td>
			<?php ___('Frequency Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['FrequencyType']['frequency_type_name']; //$this->Html->link($membership['FrequencyType']['frequency_type_name'], array('controller' => 'frequency_types', 'action' => 'view', $membership['FrequencyType']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['date_of_first_issue']))  { ?>
<!--	<tr>
		<td>
			<?php ___('Date Of First Issue'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_first_issue']); ?>
		</td>
	</tr>-->
	<?php } ?>
	<?php if(!empty($membership['Membership']['category_id']))  { ?>
	<tr>
		<td>
			<?php ___('Category Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Category']['category_name']; //$this->Html->link($membership['Category']['category_name'], array('controller' => 'categories', 'action' => 'view', $membership['Category']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['company_proprietor_id']))  { ?>
	<tr>
		<td>
			<?php ___('Company Proprietor Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Company']['company_name']; //$this->Html->link($membership['Company']['company_name'], array('controller' => 'companies', 'action' => 'view', $membership['Company']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['website']))  { ?>
	<tr>
		<td>
			<?php ___('Website'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['website']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['other_publications']))  { ?>
	<tr>
		<td>
			<?php ___('Other Publications'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['other_publications']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['branch_offices']))  { ?>
	<tr>
		<td>
			<?php ___('Branch Offices'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['branch_offices']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['belong_to_other_prof_org']))  { ?>
	<tr>
		<td>
			<?php ___('Belong To Other Prof Org'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['belong_to_other_prof_org']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['cover_price']))  { ?>
	<tr>
		<td>
			<?php ___('Cover Price'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['cover_price']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['date_of_chque_dd_no']))  { ?>
	<tr>
		<td>
			<?php ___('Date Of Chque Dd No'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_chque_dd_no']); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['chque_dd_no']))  { ?>
	<tr>
		<td>
			<?php ___('Chque Dd No'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['chque_dd_no']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['bank_name']))  { ?>
	<tr>
		<td>
			<?php ___('Bank Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['bank_name']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['branch_name']))  { ?>
	<tr>
		<td>
			<?php ___('Branch Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['branch_name']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['comments_if_any']))  { ?>
	<tr>
		<td>
			<?php ___('Comments If Any'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['comments_if_any']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['proposer_1_representative_id']))  { ?>
	<tr>
		<td>
			<?php ___('Proposer 1 Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Proposer1Representative']['Prefix']['prefix_name'] . ' ' . $membership['Proposer1Representative']['representative_name']; //$this->Html->link($membership['Proposer1Representative']['representative_name'], array('controller' => 'representatives', 'action' => 'view', $membership['Proposer1Representative']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['proposer_2_representative_id']))  { ?>
	<tr>
		<td>
			<?php ___('Proposer 2 Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Proposer2Representative']['Prefix']['prefix_name'] . ' ' . $membership['Proposer2Representative']['representative_name']; //$this->Html->link($membership['Proposer2Representative']['representative_name'], array('controller' => 'representatives', 'action' => 'view', $membership['Proposer2Representative']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['date_of_establishment']))  { ?>
<!--	<tr>
		<td>
			<?php ___('Date Of Establishment'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_establishment']); ?>
		</td>
	</tr>-->
	<?php } ?>
	<?php if(!empty($membership['Membership']['company_type_id']))  { ?>
	<tr>
		<td>
			<?php ___('Company Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['CompanyType']['company_type_name']; //$this->Html->link($membership['CompanyType']['company_type_name'], array('controller' => 'company_types', 'action' => 'view', $membership['CompanyType']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['nature_of_business']))  { ?>
	<tr>
		<td>
			<?php ___('Nature Of Business'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['nature_of_business']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['product_or_services_advertised']))  { ?>
	<tr>
		<td>
			<?php ___('Product Or Services Advertised'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['product_or_services_advertised']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['total_exp_on_press_adver_during_prev_yr']))  { ?>
	<tr>
		<td>
			<?php ___('Total Exp On Press Adver During Prev Yr'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['total_exp_on_press_adver_during_prev_yr']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['name_of_publications_used_for_advert']))  { ?>
	<tr>
		<td>
			<?php ___('Name Of Publications Used For Advert'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['name_of_publications_used_for_advert']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['name_of_client_served']))  { ?>
	<tr>
		<td>
			<?php ___('Name Of Client Served'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['name_of_client_served']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['agency_accredited']))  { ?>
	<tr>
		<td>
			<?php ___('Agency Accredited'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['agency_accredited']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['date_of_application']))  { ?>
	<tr>
		<td>
			<?php ___('Date Of Application'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_application']); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['date_of_bod_approval']))  { ?>
	<tr>
		<td>
			<?php ___('Date Of Bod Approval'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_bod_approval']); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['member_status_id']))  { ?>
	<tr>
		<td>
			<?php ___('Member Status Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['MemberStatus']['member_status_name']; //$this->Html->link($membership['MemberStatus']['member_status_name'], array('controller' => 'member_statuses', 'action' => 'view', $membership['MemberStatus']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['other_details']))  { ?>
	<tr>
		<td>
			<?php ___('Other Details'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['other_details']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['reason_id']))  { ?>
	<tr>
		<td>
			<?php ___('Reason Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Reason']['reason_name']; //$this->Html->link($membership['Reason']['reason_name'], array('controller' => 'reasons', 'action' => 'view', $membership['Reason']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membership['Membership']['comments']))  { ?>
	<tr>
		<td>
			<?php ___('Comments'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['comments']; ?>
		</td>
	</tr>
	<?php } ?>
