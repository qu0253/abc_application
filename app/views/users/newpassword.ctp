<?php ?>
<form action="<?php echo $html->url('/users/newpassword/' . $form->value('User.id')); ?>" method="POST" id="PasswordEditForm">
    <input type="hidden" name="_method" value="PUT" />
    <ul>
        <li>New Password</li>
        <li><input class="input-box" maxlength="255" type="password" name="data[User][password]" id="UserPassword" />
        </li>						
        <li>Confirm New Password</li>
        <li><input class="input-box" maxlength="255" type="password" name="data[User][confirm_password]" id="UserConfirmPassword" />
        </li>						
        <li><input class="update" name="" type="submit" value="Submit" />
        </li>
    </ul>
</form>