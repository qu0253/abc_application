<?php
$mem_id = $this->Session->read('Auth.Membership.id');
$mem_type_id = $this->Session->read('Auth.Membership.membership_type_id');
$mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
$certificate_group_id = $this->Session->read('Auth.Membership.certificate_group_id');
$applied_for_rni_no = $this->Session->read('Auth.Membership.applied_for_rni_no');
$representative_type_ids = Set::extract('/representative_type_id', $this->Session->read('Auth.Representative'));
$printingCentersIds = Set::extract('/membership_id', $this->Session->read('Auth.PrintingCenter'));
$printingCenters = $this->Session->read('Auth.PrintingCenter');
$membershipPaymentsIds = Set::extract('/membership_id', $this->Session->read('Auth.MembershipPayment'));
$holdingCompanyId = Set::extract('/id', $this->Session->read('Auth.HoldingCompany'));
$rniDetailsId = Set::extract('/id', $this->Session->read('Auth.RniDetail'));
$class = '';
if ($mem_status_id < 2) {   
    $class = 'pending';
}     
?>
<ul class="<?php echo $class; ?>">    
<?php    
if(empty($mem_id)) {
?>
<li class="span_register"><?php echo $this->Html->link('Publisher', array('action' => 'add', 'controller' => 'memberships', 'client' => true, 'membership_type_id' => '5'), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Publisher')); ?></li>
<li class="span_register"><?php echo $this->Html->link('Advertiser', array('action' => 'add', 'controller' => 'memberships', 'client' => true, 'membership_type_id' => '1'), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Advertiser')); ?></li>
<li class="span_register"><?php echo $this->Html->link('Advertising Agency', array('action' => 'add', 'controller' => 'memberships', 'client' => true, 'membership_type_id' => 2), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Advertising Agency')); ?></li>
<li class="span_register"><?php echo $this->Html->link('Govt. Organisation', array('action' => 'add', 'controller' => 'memberships', 'client' => true, 'membership_type_id' => 3), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Govt. Organization')); ?></li>
<li class="span_register"><?php echo $this->Html->link('Non Govt. Organisation', array('action' => 'add', 'controller' => 'memberships', 'client' => true, 'membership_type_id' => 4), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Non Govt. Organaization')); ?></li>
<?php
} else if (!empty($mem_id) && $mem_status_id != 2) {
if ($mem_status_id < 2) {    
    ?>
<li class="span_register"><label>Pending List</label></li>
    <?php
}
    $clear_all_steps = 1;
    if (!in_array(1, $representative_type_ids)) {      
        $clear_all_steps = 0;
?>
        <li class="span_register"><?php echo $this->Html->link('Add Primary Representative', array('action' => 'add', 'controller' => 'representatives', 'client' => true, 'representative_type_id' => '1'), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add Primary Representative')); ?></li>
    <?php
    }
    if (!in_array(2, $representative_type_ids)) {
        $clear_all_steps = 0;
        ?>
        <li class="span_register"><?php echo $this->Html->link('Add Correspondence / Billing Representative', array('action' => 'add', 'controller' => 'representatives', 'client' => true, 'representative_type_id' => '2'), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add Correspondence / Billing Representative')); ?></li>    
    <?php        
    }    
    if (!in_array(3, $representative_type_ids) && ($mem_type_id == 5 && $this->Support->isEditable($mem_status_id))) {
        ?>
        <li class="span_register"><?php echo $this->Html->link('Add Mumbai Representative (Optional)', array('action' => 'add', 'controller' => 'representatives', 'client' => true, 'representative_type_id' => '3'), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add Mumbai Representative')); ?></li>
    <?php    
    }    
    if ($mem_type_id == 5 && empty($printingCentersIds)) {
        $clear_all_steps = 0;
        ?>
        <li class="span_register"><?php echo $this->Html->link('Add Printing Centers', array('action' => 'add', 'controller' => 'printing_centers', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add Printing Centers')); ?></li>
        <?php
    }
        $lbl = 'Holding Company';
    if ($mem_type_id == 5) {
        $lbl = 'Company / Proprietor';
    }
    if (empty($holdingCompanyId)) {
        if ($mem_type_id == 5) {
            $clear_all_steps = 0;
        }
        ?>
        <li class="span_register"><?php echo $this->Html->link("Add {$lbl}", array('action' => 'add', 'controller' => 'holding_companies', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => "Add {$lbl}")); ?></li>    
    <?php        
    }
    if (empty($membershipPaymentsIds)) {
        $clear_all_steps = 0;
        ?>
        <li class="span_register"><?php echo $this->Html->link('Add Payment Details', array('action' => 'add', 'controller' => 'membership_payments', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add Membership Payments')); ?></li>
        <?php
    } 
    if ($mem_type_id == 5 && (empty($rniDetailsId) || (empty($rniDetailsId) && $applied_for_rni_no)) && $mem_status_id < 2) {
        $appendClass = '';
        if (!$applied_for_rni_no) {
            $clear_all_steps = 0;
        } else {
            $appendClass = 'display_none';
        }        
        ?>
        <li class="span_register"></li>
        <li class="span_register"><span class="<?php echo $appendClass;?> " id="span_have_rni_details"><?php echo $this->Html->link('Add Rni Details', array('action' => 'add', 'controller' => 'rni_details', 'client' => true), array('class' => 'dashboard_links', 'id' => 'add_edit_rni_details', 'escape' => false, 'title' => 'Add Rni Details')); ?></span><span id="link_have_rni_details" class="<?php echo $appendClass; ?>"> / Or Have you applied for RNI number?</span><span class="appliedForRNI <?php  echo ($applied_for_rni_no == 1) ? '' : 'display_none' ?>">Application will be treated as Incomplete till submission of RNI details<br />We have applied RNI </span><?php echo $this->AlaxosForm->checkbox('Membership.applied_for_rni_no', array('label' => false, 'checked' => ($applied_for_rni_no == 1) ? 'checked' : '')); ?></li>
        <?php       
    }
    if (0 && $mem_type_id == 5 && empty($certificate_group_id) && $mem_status_id < 2) {
        ?>
        <li class="span_register"><?php echo $this->Html->link('Combine Certificate (Optional)', array('action' => 'index', 'controller' => 'certificate_groups', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Combine Certificate (Optional)')); ?></li>
        <?php
    }

    ?>
</ul>    
<?php
if (!$this->Support->isEditable($mem_status_id)) {
?>
<?php if($this->action != "display_session_message" && $this->Session->check('Auth'))
{
    echo $this->element('common_for_pages'); }
	if ($mem_type_id == 5) {
?>
<table>

        <li class="span_register"><?php echo $this->Html->link('Add More Printing Centers', array('action' => 'add', 'controller' => 'printing_centers', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add More Printing Centers')); ?></li>
        <li class="span_register"><?php echo $this->Html->link('Add More Membership Payments', array('action' => 'add', 'controller' => 'membership_payments', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add More Membership Payments')); ?></li>
</table>        
<?php
}
}
if ($mem_status_id == 3) {
    if ($mem_type_id == 5 && $mem_status_id > 2 && count($printingCenters) > 0 && is_array($printingCenters)) {
        foreach($printingCenters as $k => $v) {
            if ($v['active']) {
            ?>
            <ul class="completed">
                <li class="span_register"><?php echo $this->Html->link(__('Fill incoming forms for ', true) . $v['PrintedAt']['city_name'], array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $v['id']));?></li>
            </ul>
            <?php
            }
        }
    }
}
?>
<ul class="completed">     
    <li class="span_register"><label>Account Details</label></li>
        <li class="span_register"><?php echo $this->Html->link('View Membership Details', array('action' => 'view', 'controller' => 'memberships', 'client' => true, $mem_id), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'View Membership Details')); ?></li>        
            <?php
            if ($this->Support->isEditable($mem_status_id)) {
            ?>
            <li class="span_register"><?php echo $this->Html->link('Edit Membership Details', array('action' => 'edit', 'controller' => 'memberships', 'client' => true, $mem_id), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Edit Membership Details')); ?></li>        
            <?php
            }
        
        if (!empty($representative_type_ids)) {
        ?>
        <li class="span_register"><?php echo $this->Html->link('Representatives', array('action' => 'index', 'controller' => 'representatives', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Representatives')); ?></li>
        <?php
        }
        if (!empty($holdingCompanyId[0])) {
        ?>    
        <li class="span_register"><?php echo $this->Html->link("{$lbl}", array('action' => 'view', 'controller' => 'holding_companies', 'client' => true, $holdingCompanyId[0]), array('class' => 'dashboard_links', 'escape' => false, 'title' => "{$lbl}")); ?></li>
            <?php
            if ($this->Support->isEditable($mem_status_id)) {
            ?>
                <li class="span_register"><?php echo $this->Html->link("Edit {$lbl}", array('action' => 'edit', 'controller' => 'holding_companies', 'client' => true, $holdingCompanyId[0]), array('class' => 'dashboard_links', 'escape' => false, 'title' => "Edit {$lbl}")); ?></li>                
            <?php
            }
        }       
        if ($mem_type_id == 5) {
            if (!empty($rniDetailsId[0])) {
            ?>
            <li class="span_register"><?php echo $this->Html->link('RNI Details', array('action' => 'index', 'controller' => 'rni_details', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'RNI Details')); ?></li>  
                <?php
                if ($this->Support->isEditable($mem_status_id)) {
                ?>
                <li class="span_register"><?php echo $this->Html->link('Edit RNI Details', array('action' => 'edit', 'controller' => 'rni_details', 'client' => true, $rniDetailsId[0]), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Edit RNI Details')); ?></li>              
            <?php
                }
            } else if ($applied_for_rni_no == 1) {
                ?>
                <span class="appliedForRNI"><li class="span_register"><a href="#">Applied For RNI : Yes</a></li></span>
                <?php
            }
            if (!empty($printingCentersIds)) {
            ?>
            <li class="span_register"><?php echo $this->Html->link('Printing Centers', array('action' => 'index', 'controller' => 'printing_centers', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Printing Centers')); ?></li>
                <?php
                if ($this->Support->isEditable($mem_status_id)) {
                ?>
                <li class="span_register"><?php echo $this->Html->link('Add More Printing Centers', array('action' => 'add', 'controller' => 'printing_centers', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add More Printing Centers')); ?></li>
                <?php
                }                
            }
            if (0 && $mem_type_id == 5 && !empty($certificate_group_id) && $mem_status_id < 2) {
                ?>
                <li class="span_register"><?php echo $this->Html->link('Combine Certificate (Optional)', array('action' => 'index', 'controller' => 'certificate_groups', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Combine Certificate (Optional)')); ?></li>
                <?php
            }
            if (!empty($membershipPaymentsIds)) {
            ?>
            <li class="span_register"><?php echo $this->Html->link('Membership Payments', array('action' => 'index', 'controller' => 'membership_payments', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Membership Payments')); ?></li>
                <?php
                if ($this->Support->isEditable($mem_status_id) && 0) {
                ?>
                <li class="span_register"><?php echo $this->Html->link('Add More Membership Payments', array('action' => 'add', 'controller' => 'membership_payments', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Add More Membership Payments')); ?></li>
                <?php
                }
            }
            if ($this->Support->isEditable($mem_status_id)) {
            ?>
            <li class="span_register"><?php echo $this->Html->link('Review Form', array('action' => 'print_for_approval', 'controller' => 'memberships', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Review Form', 'target' => '_blank')); ?></li>
            <?php
            }
        }
    
}
?>
</ul>
<ul class="actions">
<?php
if (isset($clear_all_steps) && $clear_all_steps == 1 && ($mem_status_id < 2)) {
    ?>
    <li class="span_register">&nbsp;</li>
    <li class="span_register submit_link"><?php echo $this->Html->link('Submit For Approval And Take Print', array('action' => 'submit_for_approval', 'controller' => 'memberships', 'client' => true), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Submit For Approval')); ?></li>
    <?php
} else if ($mem_status_id == 2) {
    ?>
    <li class="span_register"><?php echo $this->Html->link('Print Form For Sending Hard Copy', array('action' => 'print_for_approval', 'controller' => 'memberships', 'client' => true, 'print' => 1), array('class' => 'dashboard_links', 'escape' => false, 'title' => 'Print Form For Sending Hard Copy', 'target' => '_blank')); ?></li>
    <li class="span_register"><br/><b>Your application is under review</b></li>
    <?php
}
?>
</ul>