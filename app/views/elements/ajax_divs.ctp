<?php
$msg = $this->Session->flash();
$style = 'display: none;';
if(trim($msg)) {
   $style = 'display: block;';
}
?>
<div id="ajax_message" class="" style="<?php echo $style; ?>"><?php echo $msg; ?></div>
<div  class="bgAjaxLoad hidden"></div>
<img  src="/img/ajax-loader.gif" alt="Ajax Loading" class="ajaxLoading hidden" height="32" width="32">
