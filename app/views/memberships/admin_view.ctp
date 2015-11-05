<div class="memberships view">
	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('membership');?><?php echo !empty($membership['Membership']['name']) ? ' - ' . $membership['Membership']['name'] : ''; ?>
	    </h2></span>
        <span class="h2-right"></span></div>
	<?php
        $lbl = 'Holding Company';
        if ($membership['MembershipType']['id'] == 5) {
            $lbl = 'Company / Proprietor';
        }
        $additional_buttons = array(
        _('Representatives') => $this->Html->link('Representatives', array('action' => 'index', 'controller' => 'representatives', 'admin' => true), array('escape' => false, 'title' => 'Representatives', 'class' => 'sub_form')),
        _("{$lbl}") => $this->Html->link("{$lbl}", array('action' => 'index', 'controller' => 'holding_companies', 'admin' => true), array('escape' => false, 'title' => "{$lbl}", 'class' => 'sub_form')),
        );
        if ($membership['MembershipType']['id'] == 5) {
            $additional_buttons[_('RNI Details')] = $this->Html->link('RNI Details', array('action' => 'index', 'controller' => 'rni_details', 'admin' => true), array('escape' => false, 'title' => 'RNI Details', 'class' => 'sub_form'));
            $additional_buttons[_('Printing Centers')] = $this->Html->link('Printing Centers', array('action' => 'index', 'controller' => 'printing_centers', 'admin' => true), array('escape' => false, 'title' => 'Printing Centers', 'class' => 'sub_form'));
            $additional_buttons[__('Payment Details', true)] = $this->Html->link(__('Payment Details', true), array('action' => 'index', 'controller' => 'membership_payments', 'admin' => true), array('escape' => false, 'title' => __('Payment Details', true), 'class' => 'sub_form'));
            $additional_buttons[__('Combined certificate? Click here', true)] = $this->Html->link(__('Combined certificate? Click here', true), array('action' => 'index', 'controller' => 'certificate_groups', 'admin' => true), array('escape' => false, 'title' => __('Combined certificate? Click here', true), 'class' => 'sub_form'));
        }
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'list' => true, 'edit_id' => $membership['Membership']['id'], 'copy_id' => $membership['Membership']['id'], 'delete_id' => $membership['Membership']['id'], 'delete_text' => ___('do you really want to delete this membership ?', true),
            'additional_buttons' => $additional_buttons));
	?>

	<table border="0" class="view">
	<tr>
		<td>
			<?php ___('Membership Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['id']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Membership Type Name'); ?><input type="hidden" id="MembershipMembershipTypeId" value="<?php echo $membership['MembershipType']['id']?>"/>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $membership['MembershipType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('User Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['User']['username'], array('controller' => 'users', 'action' => 'view', $membership['User']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['name']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Publication Name'); ?><span><span id="MembershipPublicationId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $membership['Publication']['id'])); ?>                        
		</td>
	</tr>
<!--	<tr>
		<td>
			<?php ___('Edition Name'); ?><span><span id="ViewEditionId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Edition']['city_name'], array('controller' => 'cities', 'action' => 'view', $membership['Edition']['id'])); ?>
		</td>
	</tr>-->
	<?php echo $this->element("only_address_view", array('address' => $membership));?>
	<tr>
		<td>
			<?php ___('Publication Type Name'); ?><span><span id="MembershipPublicationTypeId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['PublicationType']['publication_type_name'], array('controller' => 'publication_types', 'action' => 'view', $membership['PublicationType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Language Name'); ?><span><span id="MembershipLanguageId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $membership['Language']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Frequency Type Name'); ?><span><span id="MembershipFrequencyTypeId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['FrequencyType']['frequency_type_name'], array('controller' => 'frequency_types', 'action' => 'view', $membership['FrequencyType']['id'])); ?>
		</td>
	</tr>
<!--	<tr>
		<td>
			<?php ___('Date Of First Issue'); ?><span id="ViewDateOfFirstIssue"></span>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_first_issue']); ?>
		</td>
	</tr>-->
	<tr>
		<td>
			<?php ___('Category Name'); ?><span><span id="MembershipCategoryId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Category']['category_name'], array('controller' => 'categories', 'action' => 'view', $membership['Category']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Website'); ?><span><span id="MembershipWebsite"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['website']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Publications'); ?><span><span id="MembershipOtherPublications"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['other_publications']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Branch Offices'); ?><span><span id="MembershipBranchOffices"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['branch_offices']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Belong To Other Prof Org'); ?><span><span id="MembershipBelongToOtherProfOrg"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['belong_to_other_prof_org']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Cover Price'); ?><span><span id="MembershipCoverPrice"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['cover_price']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Applied For Rni No'); ?><span><span id="MembershipCoverPrice"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['applied_for_rni_no']; ?>
		</td>
	</tr>	
	<tr>
		<td>
			<?php ___('Proposer 1 Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Proposer1Representative']['Prefix']['prefix_name'] . ' ' . $membership['Proposer1Representative']['representative_name'], array('controller' => 'representatives', 'action' => 'view', $membership['Proposer1Representative']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Proposer 2 Representative Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Proposer2Representative']['Prefix']['prefix_name'] . ' ' . $membership['Proposer2Representative']['representative_name'], array('controller' => 'representatives', 'action' => 'view', $membership['Proposer2Representative']['id'])); ?>
		</td>
	</tr>
        <?php if(!empty($membership['Membership']['file_pub_confr_letter']))  { ?>
        <tr>
		<td>
			<?php ___('File Pub Confr Letter'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($membership['Membership']['file_pub_confr_letter']) ? $this->AlaxosForm->get_download_link($membership['Membership']['file_pub_confr_letter'], 'memberships', $membership['Membership']['id'], 'file_pub_confr_letter') : ''; ?>
		</td>
	</tr>
        <?php } ?>
        <?php if(!empty($membership['Membership']['file_letter_of_auth']))  { ?>
	<tr>
		<td>
			<?php ___('File Letter Of Auth'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo ($membership['Membership']['file_letter_of_auth']) ? $this->AlaxosForm->get_download_link($membership['Membership']['file_letter_of_auth'], 'memberships', $membership['Membership']['id'], 'file_letter_of_auth') : ''; ?>
		</td>
	</tr>
        <?php } ?>
	<tr>
		<td>
			<?php ___('Date Of Establishment'); ?><span id="ViewDateOfEstablishment"></span>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_establishment']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Company Type Name'); ?><span><span id="MembershipCompanyTypeId"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['CompanyType']['company_type_name'], array('controller' => 'company_types', 'action' => 'view', $membership['CompanyType']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Nature Of Business'); ?><span><span id="MembershipNatureOfBusiness"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['nature_of_business']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Product Or Services Advertised'); ?><span><span id="MembershipProductOrServicesAdvertised"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['product_or_services_advertised']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Total Exp On Press Adver During Prev Yr'); ?><span id="MembershipTotalExpOnPressAdverDuringPrevYr"></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['total_exp_on_press_adver_during_prev_yr']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name Of Publications Used For Advert'); ?><span><span id="MembershipNameOfPublicationsUsedForAdvert"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['name_of_publications_used_for_advert']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Name Of Client Served'); ?><span><span id="MembershipNameOfClientServed"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['name_of_client_served']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Agency Accredited'); ?><span><span id="MembershipAgencyAccredited"></span></span>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['agency_accredited']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Date Of Application'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_application']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Date Of Bod Approval'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_of_bod_approval']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Member Status Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['MemberStatus']['member_status_name'], array('controller' => 'member_statuses', 'action' => 'view', $membership['MemberStatus']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Other Details'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['other_details']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Reason Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['Reason']['reason_name'], array('controller' => 'reasons', 'action' => 'view', $membership['Reason']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Comments'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membership['Membership']['comments']; ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Date Inactive'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['date_inactive']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Active'); ?>
		</td>
		<td>:</td>
		<td>
			<?php
			echo $this->AlaxosHtml->get_active_inactive($membership['Membership']['active']);
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['created']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Created By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['CreatedBy']['username'], array('controller' => 'users', 'action' => 'view', $membership['CreatedBy']['id'])); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo DateTool :: sql_to_date($membership['Membership']['modified']); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('Modified By'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->Html->link($membership['ModifiedBy']['username'], array('controller' => 'users', 'action' => 'view', $membership['ModifiedBy']['id'])); ?>
		</td>
	</tr>
	</table>
</div>
