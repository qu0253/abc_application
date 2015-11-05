<?php 
$membershipLocalSess = $this->Session->read('Auth');
if ($membershipLocalSess['Membership']['membership_type_id'] == 5) {
?>
<table class="dashboardTable">
    <tr>
    <td>
    <table width="50%">
    <?php if(!empty($membershipLocalSess['Membership']['id']))  { ?>
    <tr>
		<td class="ic-heading-left">
			<?php ___('Membership Id'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['Membership']['id']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membershipLocalSess['Membership']['membership_type_id']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('Membership Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['MembershipType']['membership_type_name']; //$this->Html->link($membershipLocalSess['MembershipType']['membership_type_name'], array('controller' => 'membership_types', 'action' => 'view', $membershipLocalSess['MembershipType']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membershipLocalSess['RniDetail'][0]['rni_number']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('Rni Number'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['RniDetail'][0]['rni_number']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membershipLocalSess['Membership']['name']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['Membership']['name']; ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membershipLocalSess['Membership']['publication_id']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('Publication'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['Publication']['publication_name']; //$this->Html->link($membershipLocalSess['Publication']['publication_name'], array('controller' => 'publications', 'action' => 'view', $membershipLocalSess['Publication']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
                <?php if(!empty($membershipLocalSess['Edition']['city_name']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('Edition Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['Edition']['city_name']; //$this->Html->link($membershipLocalSess['Edition']['city_name'], array('controller' => 'cities', 'action' => 'view', $membershipLocalSess['Edition']['id'])); ?>
		</td>
	</tr>
                <?php if (isset($city_name)) { ?>                                
        <tr>
                        <td class="ic-heading-left">
                                        <?php ___('Last Selected Printing Center'); ?>
                        </td>
                        <td>:</td>
                        <td>
                                        <?php echo $city_name;  ?>
                        </td>
        </tr>
        <?php } ?>
	<?php } ?>
    </table>
        </td>
        <td>
    <table width="50%">
        <?php if(!empty($membershipLocalSess['Membership']['user_id']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('User Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['User']['username']; //$this->Html->link($membershipLocalSess['User']['username'], array('controller' => 'users', 'action' => 'view', $membershipLocalSess['User']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
	<?php if(!empty($membershipLocalSess['Membership']['publication_type_id']))  { ?>
	<tr>
		<td class="ic-heading-left">
			<?php ___('Publication Type Name'); ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $membershipLocalSess['PublicationType']['publication_type_name']; //$this->Html->link($membershipLocalSess['PublicationType']['publication_type_name'], array('controller' => 'publication_types', 'action' => 'view', $membershipLocalSess['PublicationType']['id'])); ?>
		</td>
	</tr>
	<?php } ?>
				<tr>
						<td class="ic-heading-left">
								<?php ___('Edition'); ?>
						</td>
						<td>:</td>
						<td>
								<?php echo $this->Session->read('Auth.Edition.city_name'); ?>
						</td>
				</tr>
                                <?php
                                $SessFrequencyTypeObj = $this->Session->read('Auth.FrequencyType');
                                if($SessFrequencyTypeObj['frequency_type_name'])  { ?>
                                <tr>
                                        <td class="ic-heading-left">
                                                <?php ___('Frequency Type Name'); ?>
                                        </td>
                                        <td>:</td>
                                        <td>
                                                <?php echo $SessFrequencyTypeObj['frequency_type_name']; //$this->Html->link($membershipLocalSess['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $membershipLocalSess['Language']['id'])); ?>
                                        </td>
                                </tr>
                                <?php } ?>
                                <?php
                                $SessLanguageObj = $this->Session->read('Auth.Language');
                                if($SessLanguageObj['language_name'])  { ?>
                                <tr>
                                        <td class="ic-heading-left">
                                                <?php ___('Language Name'); ?>
                                        </td>
                                        <td>:</td>
                                        <td>
                                                <?php echo $SessLanguageObj['language_name']; //$this->Html->link($membershipLocalSess['Language']['language_name'], array('controller' => 'languages', 'action' => 'view', $membershipLocalSess['Language']['id'])); ?>
                                        </td>
                                </tr>
                                <?php } ?>
                                <?php
                                if (!empty($printing_Center_auditor_branches)) { ?>
                                				<tr>
						<td class="ic-heading-left">
								<?php ___('Last Selected Printing\'s Name and Address of Auditor'); ?>
						</td>
						<td>:</td>
						<td>
                                                                <?php echo @$printing_Center_auditor_branches[0]['AuditorBranch']['AuditorFirm']['auditor_firm_name'] . ' ' . $printing_Center_auditor_branches[0]['AuditorBranch']['auditor_branch_name'];  ?>
						</td>
				</tr>
                                <?php } ?>
    </table>
        </td>
        </tr>
</table>
<?php
}
?>