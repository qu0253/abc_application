<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul class="menu"><!-- BEGIN MENU -->
            <li><a href="/client/"><?php echo __('Dashboard'); ?>
                                   <?php $publicationNameInSession = $this->Session->read('Auth.Publication.publication_name'); echo ($publicationNameInSession && $this->Session->read('Auth.Membership.member_status_id') > 0) ? ' - ' . ucwords($this->Session->read('Auth.Publication.publication_name')) : ''; ?>
                </a></li>
        <?php			
            if($this->Session->check('Auth.User'))
            {
                ?>
            <li><a href="/client/users/edit"><?php echo __('Edit Profile'); ?></a></li>            
            <li class="right"><?php echo $this->Html->link(__('logout', true), '/users/logout') /*. ' (' . $this->Session->read('Auth.User.username') . ')' */; ?><!-- Begin Contact Item -->                
            <li class="right"><a href="/users/change_password/">Change Password</a></li>
            </li><!-- End Contact Item -->
            <?php                
            }
            ?>    
</ul><!-- END MENU -->