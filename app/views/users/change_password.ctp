<?php ?>
<span class="h2-center">
    <h2><?php echo $title; ?></h2>
</span>
<div class="toolbar_container">  <div class="toolbar">&nbsp;&nbsp;</div></div>
<form id="UserEditForm" method="post" action="<?php echo $form_url; ?>"><input type="hidden" name="_method" value="PUT" />

    <table border="0" cellpadding="5" cellspacing="0" class="edit">
        <tbody>
            <?php if (empty($remove_old_pass_field)) { ?>
            <tr><td>Old Password</td><td>:</td><td><input class="input-box" type="password" name="data[User][password]" id="password" /></td></tr>
            <?php } ?>
            <tr><td>New Password</td><td>:</td><td><input class="input-box" maxlength="255" type="password" name="data[User][passwordn]" id="passwordn" /></td></tr>
            <tr><td>Confirm password</td><td>:</td><td><input class="input-box" maxlength="255" type="password" name="data[User][password2]" id="password2" /></td></tr>
            <tr><td> </td><td> </td><td><input class="cma" name="" type="submit" value="Update Password" /></td></tr>            
        </tbody>
    </table>
</form>