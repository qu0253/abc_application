<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
		Admin :: ABC	</title>
	<link href="/favicon.ico" type="image/x-icon" rel="icon" />
	<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />  
	<!-- Admin Menu: Start -->
        <link rel="stylesheet" href="/css/admin_menu/reset.css" type="text/css" media="screen" /><!-- Reset -->
        <link rel="stylesheet" href="/css/admin_menu/menu.css" type="text/css" media="screen" /><!-- Menu -->
        <!--[if IE 6]>
        <link rel="stylesheet" href="/css/admin_menu/ie/ie6.css" type="text/css" media="screen" />
        <![endif]-->
	<!-- Admin Menu: End -->
        <link rel="stylesheet" type="text/css" href="/css/admin/demo.css" />
	<link rel="stylesheet" type="text/css" href="/alaxos/css/alaxos.css" />	
        
        <script type="text/javascript">
	//<![CDATA[
	var date_format = "y-m-d";
	//]]>
	</script>
		<script type="text/javascript">
	//<![CDATA[
	var application_root = "/";
	//]]>
	</script>
	<script type="text/javascript">
	//<![CDATA[
	var confirmDeleteAllText =            "Are you sure you want to delete all those items ?";
	var pleaseChooseActionToPerformText = "Please choose the action to perform";

	//]]>
	</script>
		
		<script type="text/javascript" src="/js/vendor/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/alaxos/js/jquery/jquery_no_conflict.js"></script>
		<script type="text/javascript" src="/alaxos/js/alaxos/alaxos.js"></script>		
		<script type="text/javascript" src="/js/abc_common.js"></script>		
</head>
<body>
	<div id="container">
		<noscript><p class="error" style="text-align:center">Javascript must be turned on to navigate correctly on this site</p></noscript>
		<div id="header">
			<h1><a href="/admin">Audit Bureau of Circulation</a></h1>
		</div> 
                <div id="admin_menu">
                    <?php echo $this->element('admin_menu_links'); ?>
                </div>
		<div id="content">			
			<?php			
			if($this->Session->check('Auth.User'))
			{
			    echo '<div style="float:right;">';
			    echo $this->Html->link(__('logout', true), '/users/logout') . ' (' . $this->Session->read('Auth.User.username') . ')';
			    echo '</div>';
			}
			
			?>
			
			<div style="clear:both;">&nbsp;</div>
			
			<?php
			if($this->Session->check('Message.auth'))
			{
			    echo $this->element('flash_error', array('plugin' => 'alaxos', 'message' => $this->Session->flash('auth')));
			}
			?>
			
			<?php echo $this->Session->flash(); ?>
			
			<?php echo $content_for_layout; ?>
			
			<?php
//			if(($this->params['controller'] == 'users' || $this->params['controller'] == 'roles')
//			    &&
//			    !in_array($this->params['action'], array('login', 'add', 'admin_add', 'copy', 'admin_copy')))
//			{
//			    echo $this->element('default_user_not_deletable');
//			}
			?>
			
		</div>		
					
						
			

		<div id="footer">&nbsp;</div>
	</div>
	    </body>
</html>
<?php echo $this->element('sql_dump'); ?>