<?php
$duplicateCopy = $qualifyingCirculation['DuplicateCopy'];
?>
<div class="duplicateCopies form">

	<div class="h2bg"><span class="h2-left"></span>
	    <span class="h2-center">
		<h2><?php ___('duplicate copy'); ?></h2>
	    </span>
	<span class="h2-right"></span></div>
 	<table border="1" cellspacing="0" cellpadding="0" class="edit" width="950">
	<tr>
		<td width="465">
			<?php ___('Yellow Certificate') ?>
		</td>
		<td width="20">:</td>
		<td width="465">
			<?php echo $duplicateCopy[0]['yellow_certificate']; ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('White Certificate') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy[0]['white_certificate']; ?>
		</td>
	</tr>
                	<tr>
		<td>
			<?php ___('Name Of Contact Person') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $duplicateCopy[0]['name_of_contact_person'];?>
		</td>
	</tr>
                <?php echo $this->element("address_view", array('address' => $duplicateCopy[0]));?>

	</table>

</div>
