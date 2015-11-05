<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	<title>
            Admin :: ABC	</title>
        <link href="/favicon.ico" type="image/x-icon" rel="icon" />
        <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />  
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
            var confirmDeleteAllText = "Are you sure you want to delete all those items ?";
            var pleaseChooseActionToPerformText = "Please choose the action to perform";

            //]]>
        </script>

        <script type="text/javascript" src="/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="/alaxos/js/jquery/jquery_no_conflict.js"></script>
        <script type="text/javascript" src="/alaxos/js/alaxos/alaxos.js"></script>		
    </head>
    <body>
        <div id="container">
            <?php echo $content_for_layout; ?>
            <script type="text/javascript">
                $('.toolbar_container_list').hide();
                $('.searchHeader').hide();
                $('.choose_action').hide();
                $('.actions').hide();
                $('.paging').hide();
                $('input').hide();
                $('.select_rec_per_page').hide();
                $('a').attr('disabled','disabled');
                window.print();
            </script>
    </body>
</html>
<?php echo $this->element('sql_dump'); ?>