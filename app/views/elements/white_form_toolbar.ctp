<?php
echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => false, 'list' => false, 'counter' => false,
    'additional_buttons' => array(
        __('White Form', true) => $this->Html->link(__('White Form', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'white_form'), array('escape' => false, 'title' => __('White Form', true))),
        )));
?>