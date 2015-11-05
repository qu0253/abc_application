<?php
echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => false, 'list' => false, 'counter' => false,
    'additional_buttons' => array(
        __('INCOMING CERTIFICATE', true) => $this->Html->link(__('INCOMING CERTIFICATE', true), array('action' => 'showpage', 'controller' => 'dynamic_pages', 'yellow_form', 'sub_div_view999' => 'printing_center-' . $this->Session->read('PrintingCenter.id')), array('escape' => false, 'title' => __('INCOMING CERTIFICATE', true))),
        )));
?>