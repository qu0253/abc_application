<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'dynamic_pages', 'action' => 'showpage'));
	Router::connect('/admin', array('controller' => 'dynamic_pages', 'action' => 'showpage'));
	Router::connect('/client', array('controller' => 'dynamic_pages', 'action' => 'showpage'));
	Router::connect('/users/showpage', array('controller' => 'dynamic_pages', 'action' => 'showpage', 'auth-circulations.html'));
        Router::connect('/admin/users/login', array('controller' => 'users', 'action' => 'login'));
        Router::connect('/auth/users/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/admin', array('controller' => 'dynamic_pages', 'action' => 'showpage', 'auth-admin'));
        Router::connect(
                                '/:pagename',
                                array(
                                        'controller' => 'dynamic_pages',
                                        'action' => 'showpage'
                                ),
                                array('pagename' => '[a-z_\-0-9\-A-Z]+.(html|cgi|zip|pdf)', 'pass' => array('pagename')) 
                );
//	Router::connect('/mobile.php', array('controller' => 'dynamic_pages', 'action' => 'showpage', 'mobile.html'));
//	
//	Router::connect('/', array('controller' => 'dynamic_pages', 'action' => 'showpage', 'index.html'));	
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));	
/**
 * Dynamic page routing
   
        App::import('Core','ClassRegistry');
        $DynamicPage = ClassRegistry::init('DynamicPage');
        if(empty($fromUrl)) {
			$fromUrl = "index.html";
		}
        $options['conditions'] = array('DynamicPage.url_to_this_page' => $fromUrl);
        $page_exists = $DynamicPage->find('count', $options);

        if($page_exists) {
                Router::connect(
                                '/:pagename',
                                array(
                                        'controller' => 'dynamic_pages',
                                        'action' => 'showpage'
                                ),
                                array(
                                        'pass' => array(
                                                'pagename'
                                        )
                                )
                );
        }
*/   