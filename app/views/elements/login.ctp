<div class="hometop clearfix">
	<div class="about-mid-sub">
		<div class="about-content">
			<div class="clearfix">
				<h3>Login</h3>
			</div>

			<div class="form">

				<?php echo $form->create('User', array('url' => '', 'id' => 'UserLoginForm')); ?>
				<div class="container">
					<p><label for="name">Username <font color="red">*</font></label><?php echo $form->input('username', array('label' => '')); ?></p>
					<p><label for="Email">Password <font color="red">*</font></label><?php echo $form->input('password', array('label' => '')); ?></p>
					<p>
						<?php
						echo $form->input('auto_login', array('label' => 'Remember Me',
															  'type' => 'checkbox',
															  'style' => 'margin-left:140px;margin-bottom:10px;'));
						?>
					</p>
					<p class="button"><input class="submit" type="submit" name="btn_submit" value="Submit" id="btn_submit" /></p>
				</div>
				<div style="clear:both"></div>
				<?php echo $form->end(); ?>
			</div>
		</div>
	</div>
</div>