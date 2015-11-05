<?php
echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => false, 'list' => false, 'counter' => false,
    'additional_buttons' => array(
        _('Dashboard') => $this->Html->link('<span class="toolbar-button" title="' . _('Dashboard') . '">' . _('Dashboard') . '</span>', '/client', array('title' => _('Dashboard'), 'escape' => false)),
        _('Representatives Details') => $this->Html->link('<span class="toolbar-button" title="' . _('Representatives Details') . '">' . _('Representatives Details') . '</span>', array('controller' => 'representatives', 'action'=>'index'), array('title' => _('Representatives Details'), 'escape' => false)),
        )));
?>