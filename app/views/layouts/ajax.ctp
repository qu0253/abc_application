<?php if($this->action != "display_session_message" && $this->Session->check('Auth'))
{
    echo $this->element('common_for_pages'); }
?>
<?php echo $content_for_layout; ?>