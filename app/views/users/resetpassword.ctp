<?php ?>
<div class="form">
<form id="forgotPasswordFrm" action="/users/resetpassword/" method="POST" onsubmit="javascript: return validateFormForgotPass();">
    <?php
    if (!empty($data)) {
        ?>
        <ul>
            <li class="li-text">An email has been sent with instructions to <b><?php echo "{$data['User']['first_name']} {$data['User']['last_name']} ({$data['User']['email_address']})"; ?></b></li>
        </ul>
        <?php
    }
    ?>
    <ul>
        <li class="li-text">Enter Your Username</li>
        <li class="li-text"><input class="input-box" name="data[User][username]" id="UserUsername" /></li>
        <li class="li-text">Please enter a valid username, instructions to reset your password will be mailed to your email address.</li>
        <li class="li-text"><br/></li>
        <li class="li-submit"><input class="update" name="" type="submit" value="Send" /></li>
    </ul>

</form>
</div>
<script type="text/javascript">
//    function validateEmail(id, msg) {
//        x = $('#' + id).val();
//        var atpos = x.indexOf("@");
//        var dotpos = x.lastIndexOf(".");
//        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)
//        {
//            $('#' + id).css('border', '1px solid red');
//            alert(msg);
//            return false;
//        }
//        $('#' + id).css('border', '1px solid #D9D9D9');
//        return true;
//    }
    function validateBlankField(id, msg) {
        if ($('#' + id).val() == '')
        {
            alert(msg);
            $('#' + id).css('border', '1px solid red');
            $('#' + id).focus();
            return false;
        }
        $('#' + id).css('border', '1px solid #D9D9D9');
        return true;

    }
    $(document).ready(function() {

    });
    function validateFormForgotPass()
    {
        if (!validateBlankField('UserUsername', 'Please enter an email id to proceed'))
            return false;
        if (!validateEmail('UserUsername', 'Please enter a valid email id to proceed'))
            return false;
//    existsUsername() ;
        return true;
    }
    function existsUsername() {
        var ajax_url_username = '/Users/is_username_unique/username:' + $('#UserUsername').val();
        if (!(window.xhr_username === undefined)) {
            xhr_username.abort();
        }
        var sbt_form = false;
        xhr_username = $.getJSON(ajax_url_username, function(data) {
            $("#loading").show()
            if (data) {
                $.each(data, function(key, val) {
                    if (val == 1) {
                        $('#hid_sbt_frm').val(1);
                        $('#forgotPasswordFrm').submit();
                        return true;
                    } else {
                        $('#UserUsername').css('border', '1px solid red');
                        $('#UserUsername').focus();
                        $('#email_error').html('');
                        alert('This email id does not exist in our records, please enter a valid email id to proceed');
                        return false;
                    }
                });
                $("#loading").hide();
            }
        });
        return sbt_form;
    }
</script>