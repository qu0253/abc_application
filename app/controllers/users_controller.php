<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
        var $uses = array('User', 'Ticket');
	var $components = array('Ticketmaster', 'Email');

	function admin_index()
	{
		$this->User->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_user = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('users', $this->paginate($this->User, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $users = $this->User->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($users as $user) {     
                        foreach ($user as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_user[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_user[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('users', $data_user);                
                }
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_view($id = null)
	{
		$this->_set_user($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
                    			/*
		     * Set new password if filled
		     */
		    if(array_key_exists('new_password', $this->data['User']) && !empty($this->data['User']['new_password']))
		    {
		        $this->data['User']['password'] =$this->data['User']['new_password'];
		    }
		    else if(array_key_exists('password', $this->data['User']))
		    {                        
//		        $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
                        
		    }
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for user', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Set new password if filled
		     */
		    if(array_key_exists('new_password', $this->data['User']) && !empty($this->data['User']['new_password']))
		    {
		        $this->data['User']['password'] = $this->Auth->password($this->data['User']['new_password']);
		    }
		    
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_user($id);
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for user', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->User->id = false;
			
			/*
		     * Set new password if filled
		     */
		    if(array_key_exists('new_password', $this->data['User']) && !empty($this->data['User']['new_password']))
		    {
		        $this->data['User']['password'] = $this->Auth->password($this->data['User']['new_password']);
		    }
		    else if(array_key_exists('password', $this->data['User']))
		    {
		        $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
		    }
		    
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['User'][$this->User->primaryKey] = $id;
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_user($id);
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for user', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->User->delete($id))
		{
			$this->Session->setFlash(___('user deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('user was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Users/admin_' . $this->data['_Tech']['action']))
	            {
	                $this->setAction('admin_' . $this->data['_Tech']['action']);
	            }
	            else
	            {
	                $this->Session->setFlash(___d('alaxos', 'not authorized', true), 'flash_error', array('plugin' => 'alaxos'));
	                $this->redirect($this->referer());
	            }
	        }
	        elseif(isset($this->Auth) && $this->Auth->user() == null)
	        {
	            /*
	             * Manually check permission, as the setAction() method does not check for permission rights
	             */
                if(in_array(strtolower('admin_' . $this->data['_Tech']['action']), $this->Auth->allowedActions))
                {
                    $this->setAction('admin_' . $this->data['_Tech']['action']);
                }
                else
	            {
	                $this->Session->setFlash(___d('alaxos', 'not authorized', true), 'flash_error', array('plugin' => 'alaxos'));
					$this->redirect($this->referer());
	            }
	        }
	        else
	        {
	        	/*
	             * neither Auth nor Acl, or Auth + logged user
	             * -> grant access
	             */
	        	$this->setAction('admin_' . $this->data['_Tech']['action']);
	        }
	    }
	    else
	    {
	        $this->Session->setFlash(___d('alaxos', 'the action to perform is not defined', true), 'flash_error', array('plugin' => 'alaxos'));
	        $this->redirect($this->referer());
	    }
	}
	function admin_deactivateAll()
	{
	    $ids = Set :: extract('/User/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->User->deactivateAll(array('User.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('users deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('users were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no user to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/User/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->User->activateAll(array('User.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('users activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('users were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no user to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/User/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->User->deleteAll(array('User.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('users deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('users were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no user to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_user($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->User->is_address_field_present()) {
                    $this->data = $this->User->read(null, $id);
                } else {
                    $this->data = $this->User->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for user', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('user', $this->data);
	}
	
	function login(){
            $superAdminTryingLogin = $this->Session->read('Access_admin_permitted');
            if(!empty($superAdminTryingLogin)) {
                $this->Session->write('Auth', $this->Session->read('Access_admin_permitted'));
                $this->Session->delete('Access_admin_permitted');
                $this->_login_redirect();
            }
            if ($this->Auth->user('id')) {
                $this->_login_redirect();
            }            
        }
	function logout()
	{
	    $this->Auth->logout();
            $this->Session->delete('Auth');
	    $this->redirect('/users/login');
        }
        public function change_password() {
            $this->set('title', 'Change Password');
            $session = $this->Session->read();
            $id = null;
            if (!empty($session['Auth']['User']['id'])) {
                $id = $session['Auth']['User']['id'];
            }
            if(!empty($id)) {
                $this->_change_password($id);
                $this->set('form_url', "/users/change_password");                
            } else {
                $this->redirect('/');
            }
        }
    public function admin_reset_password($id) {
            if (!empty($id) && is_numeric($id)) {
                $this->set('title', 'Admin Reset Password');
                $this->_change_password($id, 1);
                $this->set('form_url', "/admin/users/reset_password/{$id}");
                $this->set('remove_old_pass_field', 1);
                $this->render('change_password');
            } else if (!empty($this->params['prefix'])) {
                $func = "{$this->params['prefix']}_change_password";
                $this->$func();
            }
        }
    function _change_password($id, $force = null) {
        $user = $this->User->find('first', array('recursive' => -1, 'conditions' => array('id' => $id), 'fields' => array('id', 'username', 'password')));
        $this->set('user', $user);
        if (!empty($this->data)) {                
            $this->data['User']['username'] = $user['User']['username'];
            if ((!empty($this->data['User']['password']) && $this->Auth->password($this->data['User']['password']) == $user['User']['password']) || $force) {                    
                if ($this->data['User']['passwordn'] == $this->data['User']['password2']) {                        
                    // Passwords match, continue processing
                    $data = $this->data;
                    $this->data = $user;
                    $this->data['User']['password'] = $this->Auth->password($data['User']['passwordn']);
                    $this->User->id = $id;                        
                    if($this->User->save($this->data)) {                            
                        $this->Session->setFlash('Password changed.');
                    }
//                    $this->redirect(array('controller' => '/', 'action' => ''));
                } else {
                    $this->Session->setFlash('New passwords do not match.');
                }
            } else {
                $this->Session->setFlash('Old password is incorrect.');
            }
        }
    }
    function resetpassword($username = null) {
        if (empty($this->data)) {
            $this->data['User']['username'] = $username;
            //show form
        } else {
            //set email to passed variable if present
            if (!$username)
                $username = $this->data['User']['username'];
            // make sure whave email and a check
            if (!$username) {
                $this->User->invalidate('username');
            } else {
                //email entered, check for it
                $options['conditions'] = array(
                    'User.username' => $username,
//                    'OR' => array(
//                        array('User.official_email' => $username),
//                        array('User.notification_email' => $username),
//                        array('User.personal_email' => $username)
//                    )
                );
                $account = $this->User->find('first', $options);
                if (!$account['User']['active']) {
                    //banned user, tell em where to go
                    $this->Session->setFlash('<h3>Account is Inactive. Please contact Admin.</h3>');
                    $this->redirect('/users/login');
                }
                if (!isset($account['User']['email_address'])) {
                    $this->Session->setFlash('<h3>Please enter a valid email id to proceed.</h3>');
                    $this->redirect('/users/login');
                }
                /*
                 * SEND NOTIFICATION
                 * $this->Username->useremail($username, $account['User']['username'], $message);
                */
                $data = array();
                $data['User']['first_name'] = $account['User']['first_name'];
                $data['User']['last_name'] = $account['User']['last_name'];
                $data['User']['email_address'] = $account['User']['email_address'];
                $hashyToken = md5(date('mdY') . rand(1000000, 4999999));
                $data['Ticket']['reset_password_link'] = 'http://' . $_SERVER['HTTP_HOST'] . '/users/useticket/' . $hashyToken;
                $this->_sendTicketEmail($account['User']['username'], $account['User']['email_address'], 'forgot_password', $data, $hashyToken);
            }
        }
    }
    function _sendTicketEmail($username, $email_address, $notification_title, $data, $hashyToken) {
        $sent = $this->sendEmail($email_address, $notification_title, $data, $username);
                if ($sent || 1) { // explict setting to true
                    $data['Ticket']['hash'] = $hashyToken;
                    $data['Ticket']['data'] = $username;
                    $data['Ticket']['expires'] = $this->Ticketmaster->getExpirationDate();

                    if ($this->Ticket->save($data)) {
                        $this->Session->setFlash('An email has been sent with instructions.');
//                        $this->redirect('/users/login');
                        $this->set('data', $data);
                    } else {
                        $this->Session->setFlash('Ticket could not be issued');
                        $this->redirect('/users/login');
                    }
                } else {
                    $this->Session->setFlash('Email could be sent. Please contact admin.');
                }
    }
    function useticket($hash, $newactivation = null) {
        //purge all expired tickets
        //built into check
        $results = $this->Ticketmaster->checkTicket($hash);
        if (!empty($results['Ticket']['data'])) {
            //now pull up mine IF still present
            $options['conditions'] = array(
                'User.username' => trim($results['Ticket']['data']),
            );
            $options['recursive'] = -1;
            if ($newactivation == "1") {
                $options['callbacks'] = false;
            }
            $passTicket = $this->User->find('first', $options);
            $this->Ticketmaster->voidTicket($hash);
            if ($newactivation == "1") {
                $this->User->id = $passTicket['User']['id'];
                $this->User->saveField('active', 1);
                $this->Session->setFlash('Account has been activated.');
                $this->redirect('/users/logout');
            } else {
                $this->Session->write('tokenreset', $passTicket['User']['id']);
                $this->Session->setFlash('Enter your new password below');
                $this->redirect('/users/newpassword/' . $passTicket['User']['id']);
            }
        } else {
            $this->Session->setFlash('Your ticket is lost or expired.');
            $this->redirect('/users/login');
        }
    }

    function newpassword($id = null) {

        if ($this->Session->check('tokenreset')) {
            //user is not logged in, BUT has TOKEN in hand
        } else {
            //But youll need to read the user info somehow, and only the user who owns the profile
            $attempter = $this->Session->read('Auth');

            //make sure its the admin or the rigth user
            if (isset($attempter['User']['id']) && $attempter['User']['id'] != $id && $attempter['User']['role_id'] != 1) {
                $this->User->id = $attempter['User']['id'];
                $this->User->saveField('active', 0);
                $this->Session->setFlash('Your account has been deactivated');
                $this->redirect('/users/login');
            }
        }

        if (empty($this->data)) {
            if ($this->Session->check('tokenreset'))
                $id = $this->Session->read('tokenreset');
            if (!$id) {
                $this->Session->setFlash('Invalid id for User');
                $this->redirect('/users/login');
            }
            $this->data = $this->User->read(null, $id);
        } else if ($this->Session->read('tokenreset')) {
            $this->User->id = $this->Session->read('tokenreset');
            if ($this->User->saveField('password', $this->Auth->password($this->data['User']['password']))) {
                //delkete session token and dlete used ticket from table
                $this->Session->delete('tokenreset');
                $this->Session->setFlash('The User\'s Password has been updated');
                $this->redirect('/users/login');
            } else {
                $this->Session->setFlash('Please correct errors below.');
            }
        } else {
            $this->redirect('/users/login');
        }
    }

	function client_view($id = null)
	{
		$this->_set_user($id);
	}
        
        function client_index() {
            
        }
	function register()
	{                
		if (!empty($this->data))
		{
                    $this->data['User']['role_id'] = 2;
                    $this->data['User']['active'] = 0;
                    /*
		     * Set new password if filled
		     */
                    if ($this->User->save($this->data))
                    {
                            $hashyToken = md5(date('mdY') . rand(1000000, 4999999));
                            $this->data['Ticket']['activate_account_link'] = 'http://' . $_SERVER['HTTP_HOST'] . '/users/useticket/' . $hashyToken . '/1';
                            $this->_sendTicketEmail($this->data['User']['username'], $this->data['User']['email_address'], 'activate_account', $this->data, $hashyToken);
                            $this->redirect(array('action' => 'login'));
                    }
                    else
                    {
                            //http://mantis.quadzero.in/view.php?id=880
                            $this->Session->setFlash(___('Username is in deactivate state. Please contact Administrator to activate same account. If its not your username, kindly use different username.', true), 'flash_error', array('plugin' => 'alaxos'));
                    }
		}	
	}

	function client_edit($id = null)
	{
                $id = $this->Session->read('Auth.User.id');
                if (empty($id)) {
                    $this->_login_redirect();
                }
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for user', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_user($id);
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}
	
}
?>