<div class="hometop clearfix">
	<div class="about-mid-sub">
		<div class="about-content">
			<div class="clearfix">
				<h2>Login</h2>
			</div>

			<div class="form">

				<?php echo $form->create('User', array('url' => '', 'id' => 'UserLoginForm')); ?>
				<div class="container">
					<br/><label for="name">Username <font color="red">*</font></label><?php echo $form->input('username', array('label' => '')); ?>
					<br/><label for="Email">Password <font color="red">*</font></label><?php echo $form->input('password', array('label' => '')); ?>
					<br/>
					<?php
					echo $form->input('auto_login', array('label' => 'Remember Me',
														  'type' => 'checkbox',
														  'style' => ''));
					?>
					<br/><input class="submit" type="submit" name="btn_submit" value="Submit" id="btn_submit" />
					<br /><br/><span class="span_register"><?php echo $this->Html->link('Forgot Password', array('action' => 'resetpassword'), array('class' => 'register', 'escape' => false, 'title' => 'Forgot Password')); ?></span>
					<br/>
					<br/><span class="span_register"><?php echo $this->Html->link('New Registration', array('action' => 'register'), array('class' => 'register', 'escape' => false, 'title' => 'Register')); ?></span>
				</div>
				<div style="clear:both"></div>
				<?php echo $form->end(); ?>
			</div>
		</div>
	</div>
</div>