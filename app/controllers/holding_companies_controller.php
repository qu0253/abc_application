<?php
class HoldingCompaniesController extends AppController {

	var $name = 'HoldingCompanies';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->HoldingCompany->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_holdingCompany = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('holdingCompanies', $this->paginate($this->HoldingCompany, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $holdingCompanies = $this->HoldingCompany->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($holdingCompanies as $holdingCompany) {     
                        foreach ($holdingCompany as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_holdingCompany[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_holdingCompany[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('holdingCompanies', $data_holdingCompany);                
                }
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships'));
	}

	function admin_view($id = null)
	{
		$this->_set_holdingCompany($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->HoldingCompany->save($this->data))
			{
				$this->Session->setFlash(___('the holding company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the holding company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships', 'addresses'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->HoldingCompany->save($this->data))
			{
				$this->Session->setFlash(___('the holding company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the holding company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_holdingCompany($id);
		
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships', 'addresses'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->HoldingCompany->id = false;
			
			if ($this->HoldingCompany->save($this->data))
			{
				$this->Session->setFlash(___('the holding company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['HoldingCompany'][$this->HoldingCompany->primaryKey] = $id;
				$this->Session->setFlash(___('the holding company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_holdingCompany($id);
		
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships', 'addresses'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->HoldingCompany->delete($id))
		{
			$this->Session->setFlash(___('holding company deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('holding company was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'HoldingCompanies/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/HoldingCompany/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->HoldingCompany->deactivateAll(array('HoldingCompany.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('holdingCompanies deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('holdingCompanies were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no holdingCompany to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/HoldingCompany/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->HoldingCompany->activateAll(array('HoldingCompany.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('holdingCompanies activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('holdingCompanies were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no holdingCompany to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/HoldingCompany/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->HoldingCompany->deleteAll(array('HoldingCompany.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('holdingCompanies deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('holdingCompanies were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no holdingCompany to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_holdingCompany($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->HoldingCompany->is_address_field_present()) {
                    $this->data = $this->HoldingCompany->read(null, $id);
                } else {
                    $this->data = $this->HoldingCompany->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('holdingCompany', $this->data);
	}
	
	

	function client_index()
	{
		$this->HoldingCompany->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_holdingCompany = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('holdingCompanies', $this->paginate($this->HoldingCompany, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $holdingCompanies = $this->HoldingCompany->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($holdingCompanies as $holdingCompany) {     
                        foreach ($holdingCompany as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_holdingCompany[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_holdingCompany[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('holdingCompanies', $data_holdingCompany);                
                }
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships'));
	}

	function client_view($id = null)
	{
		$this->_set_holdingCompany($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->HoldingCompany->save($this->data))
			{
				$this->Session->setFlash(___('the holding company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the holding company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships', 'addresses'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->HoldingCompany->save($this->data))
			{
				$this->Session->setFlash(___('the holding company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the holding company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_holdingCompany($id);
		
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships', 'addresses'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->HoldingCompany->id = false;
			
			if ($this->HoldingCompany->save($this->data))
			{
				$this->Session->setFlash(___('the holding company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				//reset id to copy
				$this->data['HoldingCompany'][$this->HoldingCompany->primaryKey] = $id;
				$this->Session->setFlash(___('the holding company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_holdingCompany($id);
		
		$memberships = $this->HoldingCompany->Membership->find('list');
		//$addresses = $this->HoldingCompany->Address->find('list');
		$this->set(compact('memberships', 'addresses'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for holding company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->HoldingCompany->delete($id))
		{
			$this->Session->setFlash(___('holding company deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('holding company was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'HoldingCompanies/admin_' . $this->data['_Tech']['action']))
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
	        	$this->setAction('client_' . $this->data['_Tech']['action']);
	        }
	    }
	    else
	    {
	        $this->Session->setFlash(___d('alaxos', 'the action to perform is not defined', true), 'flash_error', array('plugin' => 'alaxos'));
	        $this->redirect($this->referer());
	    }
	}
	function client_deactivateAll()
	{
	    $ids = Set :: extract('/HoldingCompany/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->HoldingCompany->deactivateAll(array('HoldingCompany.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('holdingCompanies deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('holdingCompanies were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no holdingCompany to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/HoldingCompany/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->HoldingCompany->activateAll(array('HoldingCompany.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('holdingCompanies activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('holdingCompanies were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no holdingCompany to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/HoldingCompany/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->HoldingCompany->deleteAll(array('HoldingCompany.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('holdingCompanies deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('holdingCompanies were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no holdingCompany to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>