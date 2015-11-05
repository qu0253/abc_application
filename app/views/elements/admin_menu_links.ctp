<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul class="menu"><!-- BEGIN MENU -->
           <li><a href="#" class="drop">Master</a><!-- Begin 1 column Item -->
        
        
            <div class="dropdown_1column"><!-- Begin 1 column container -->
            
            
                <div class="col_1 firstcolumn">
                
                    <ul class="levels">
                        <li><a href="#">Company Masters  &gt;</a>
                            <ul>
                                <li><a href="/admin/company_types/"><?php echo __('company types'); ?></a></li>
<!--                                <li><a href="/admin/companies/">Name of Company</a></li>-->
                            </ul>
                        </li>
                        <li><a href="#">Geolocation Masters  &gt;</a>
                            <ul>
                                <li><a href="/admin/countries/">Country</a></li>
                                <li><a href="/admin/zones/">Zone</a></li>
                                <li><a href="/admin/states/">State</a></li>
                                <li><a href="/admin/districts/">District</a></li>
                                <li><a title="City" href="/admin/cities/">City</a>
                            </ul>
                        </li>
<!--                        <li><a href="#">User Masters  &gt;</a>
                            <ul>
                                li><a href="/admin/acl/aros/ajax_role_permissions/">Activity</a></li>
                                <li><a href="/admin/roles/">Role</a></li
                                <li><a href="/admin/users/">User</a></li>
                            </ul>
                        </li>-->
                        <li><a href="#">Auditor Masters  &gt;</a>
                            <ul>
                                <li><a href="/admin/auditor_types/">Auditor Type</a></li>
                                <li><a href="/admin/auditor_firms/">Auditor Firms</a></li>
                                <li><a href="/admin/auditor_branches/">Auditor Branches</a></li>
                                <li><a href="/admin/partners/">Partners</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Fee Slab Masters  &gt;</a>
                            <ul>                                
                                <li><a href="/admin/fee_slabs/">Fee Slabs</a></li>                                
                            </ul>
                        </li>
                        <li><a href="#">Email Notifications  &gt;</a>
                            <ul>                                
                                <li><a href="/admin/notifications/">Email Notifications</a></li>                                
                            </ul>
                        </li>
                        <li><a href="#">Membership Masters  &gt;</a>
                            <ul>                                
                                <li><a href="/admin/membership_types/">Membership Types</a></li>                                
                                <li><a href="/admin/member_statuses/">Member Statuses</a></li>                                
                            </ul>
                        </li>
                        <li><a href="#">Period Masters  &gt;</a>
                            <ul>
                                <li><a href="/admin/regular_periods/">Regular Period</a></li>
                                <li><a href="/admin/special_periods/">Special Period</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Master for Registration  &gt;</a>
                            <ul>
                                <li><a href="/admin/publication_types/">Publication Types</a></li>
                                <li><a href="/admin/center_types/">Center Types</a></li>
                                <li><a href="/admin/frequencies/">Frequencies</a></li>
                                <li><a href="/admin/membership_types/">Membership Types</a></li>
                                <li><a href="/admin/frequency_types/">Frequencies Types</a></li>
                                <li><a href="/admin/categories/">Categories</a></li>
                                <li><a href="/admin/languages/">Language</a></li>
                                <li><a href="/admin/representative_types/">Representative Types</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Masters for Invoice  &gt;</a>
                            <ul>
                                <li><a href="/admin/taxes/">Tax</a></li>
                                <li><a href="/admin/certificate_types/">Certificate Types / Cost</a></li>
                            </ul>
                        </li>
                        <li><a title="Masters for Certfication" href="#">Masters for Certfication  &gt;</a>
                            <ul>
                                <li><a href="/admin/reasons/">Reason</a></li>
                            </ul>
                        </li>                        
                    </ul>   
                     
                </div>
                
            
            </div><!-- End 1 column container -->
            
        
        </li><!-- End 1 column Item -->
            <li><a href="#" class="drop">Registration</a><!-- Begin 1 column Item -->
        
        
            <div class="dropdown_1column"><!-- Begin 1 column container -->
            
            
                <div class="col_1 firstcolumn">
                
                    <ul class="levels">
                        <li><a href="/admin/users/">Users</a></li> 
                        <li><a href="/admin/publications/">Name of Publications</a></li> 
                        <li><a href="/admin/member_statuses/">Membership Status</a></li>
                        <li><a title="Masters for Certfication" href="#">New Registration  &gt;</a>
                            <ul>
                                <li><?php echo $this->Html->link('New Publisher', array('action' => 'add', 'controller' => 'memberships', 'admin' => true, 'membership_type_id' => 5), array('class' => 'register', 'escape' => false, 'title' => 'Publisher')); ?></li>
                                <li><?php echo $this->Html->link('New Advertiser', array('action' => 'add', 'controller' => 'memberships', 'admin' => true, 'membership_type_id' => 1), array('class' => 'register', 'escape' => false, 'title' => 'Advertiser')); ?></li>
                                <li><?php echo $this->Html->link('New Advertising Agency', array('action' => 'add', 'controller' => 'memberships', 'admin' => true, 'membership_type_id' => 2), array('class' => 'register', 'escape' => false, 'title' => 'Advertising Agency')); ?></li>
                                <li><?php echo $this->Html->link('New Govt. Organisation', array('action' => 'add', 'controller' => 'memberships', 'admin' => true, 'membership_type_id' => 3), array('class' => 'register', 'escape' => false, 'title' => 'Govt. Organization')); ?></li>
                                <li><?php echo $this->Html->link('New Non Govt. Organisation', array('action' => 'add', 'controller' => 'memberships', 'admin' => true, 'membership_type_id' => 4), array('class' => 'register', 'escape' => false, 'title' => 'Non Govt. Organaization')); ?></li>
                            </ul>
                        </li>
                        <li><a href="/admin/memberships/">Registration List</a></li>
                    </ul>   
                     
                </div>
                
            
            </div><!-- End 1 column container -->
            
        
        </li><!-- End 1 column Item -->
            <li><a href="#" class="drop">Incoming Certificate</a><!-- Begin 1 column Item -->
        
        
            <div class="dropdown_1column"><!-- Begin 1 column container -->
            
            
                <div class="col_1 firstcolumn">
                
                    <ul class="levels">
                        <li><a href="/admin/qualifying_circulations/">Incoming Certificate</a></li>                         
                        <li><a title="Masters for Certication" href="#">Statuses  &gt;</a>
                            <ul>
                                <li><?php echo $this->Html->link('Not Received', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 1), array('class' => 'register', 'escape' => false, 'title' => 'Not Received')); ?></li>
                                <li><?php echo $this->Html->link('Submitted', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 2), array('class' => 'register', 'escape' => false, 'title' => 'Submitted')); ?></li>
                                <li><?php echo $this->Html->link('Under Consideration', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 3), array('class' => 'register', 'escape' => false, 'title' => 'Under Consideration')); ?></li>
                                <li><?php echo $this->Html->link('Approved 1', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 4), array('class' => 'register', 'escape' => false, 'title' => 'Approved 1')); ?></li>
                                <li><?php echo $this->Html->link('Approved 2', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 5), array('class' => 'register', 'escape' => false, 'title' => 'Approved 2')); ?></li>
                                <li><?php echo $this->Html->link('Approved 3', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 6), array('class' => 'register', 'escape' => false, 'title' => 'Approved 3')); ?></li>
                                <li><?php echo $this->Html->link('Recheck', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 7), array('class' => 'register', 'escape' => false, 'title' => 'Recheck')); ?></li>
                                <li><?php echo $this->Html->link('Late Received - Not Certified', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 8), array('class' => 'register', 'escape' => false, 'title' => 'Late Received - Not Certified')); ?></li>
                                <li><?php echo $this->Html->link('Rejected', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 9), array('class' => 'register', 'escape' => false, 'title' => 'Rejected')); ?></li>
                                <li><?php echo $this->Html->link('Not Accepted', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 10), array('class' => 'register', 'escape' => false, 'title' => 'Not Accepted')); ?></li>
                                <li><?php echo $this->Html->link('Certified', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 11), array('class' => 'register', 'escape' => false, 'title' => 'Certified')); ?></li>
                                <li><?php echo $this->Html->link('Withdrawal', array('action' => 'index', 'controller' => 'qualifying_circulations', 'admin' => true, 'qualifying_circulation_status_id' => 12), array('class' => 'register', 'escape' => false, 'title' => 'Withdrawal')); ?></li>
                                
                            </ul>
                        </li>
<!--                        <li><a href="/admin/qualifying_circulations/">Statuses</a></li>-->
                        <li><a href="/admin/printing_center_auditor_branches/">Auditors - Certificate</a></li>
                        <li><a href="/admin/surprise_checks/">Surprise Checks</a></li>
                    </ul>   
                     
                </div>
                
            
            </div><!-- End 1 column container -->
            
        
        </li><!-- End 1 column Item -->
        <li><a href="#" class="drop">Outgoing Certificate</a><!-- Begin 1 column Item -->
            <div class="dropdown_1column"><!-- Begin 1 column container -->
                <div class="col_1 firstcolumn">
                    <ul class="levels">
                        <?php
                        App::import('Model', 'RegularPeriod');
                        $regularPeriodObj = new RegularPeriod();
                        $regularPeriods = $regularPeriodObj->find('list');
                        foreach($regularPeriods as $pk => $regularPeriodName) {
                        ?>
                        <li><?php echo $this->Html->link(__($regularPeriodName, true), "/regularPeriod:$pk"); ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div><!-- End 1 column container -->
        </li><!-- End 1 column Item -->
        <?php			
            if($this->Session->check('Auth.User'))
            {
                ?>
            <li class="right"><?php echo $this->Html->link(__('logout', true), '/users/logout') /*. ' (' . $this->Session->read('Auth.User.username') . ')' */; ?><!-- Begin Contact Item -->                
            <li class="right"><a href="/users/change_password/">Change Password</a></li>
            </li><!-- End Contact Item -->
            <?php                
            }
            ?>    
</ul><!-- END MENU -->