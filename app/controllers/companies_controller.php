<?php
class CompaniesController extends AppController {

	var $name = 'Companies';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->Company->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_company = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('companies', $this->paginate($this->Company, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $companies = $this->Company->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($companies as $company) {     
                        foreach ($company as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_company[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_company[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('companies', $data_company);                
                }
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes'));
	}

	function admin_view($id = null)
	{
		$this->_set_company($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->Company->save($this->data))
			{
				$this->Session->setFlash(___('the company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes', 'addresses'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Company->save($this->data))
			{
				$this->Session->setFlash(___('the company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_company($id);
		
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes', 'addresses'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Company->id = false;
			
			if ($this->Company->save($this->data))
			{
				$this->Session->setFlash(___('the company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Company'][$this->Company->primaryKey] = $id;
				$this->Session->setFlash(___('the company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_company($id);
		
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes', 'addresses'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Company->delete($id))
		{
			$this->Session->setFlash(___('company deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('company was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Companies/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Company/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Company->deactivateAll(array('Company.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('companies deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('companies were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no company to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/Company/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Company->activateAll(array('Company.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('companies activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('companies were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no company to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/Company/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Company->deleteAll(array('Company.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('companies deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('companies were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no company to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_company($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->Company->is_address_field_present()) {
                    $this->data = $this->Company->read(null, $id);
                } else {
                    $this->data = $this->Company->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('company', $this->data);
	}
	
	

	function client_index()
	{
		$this->Company->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_company = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('companies', $this->paginate($this->Company, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $companies = $this->Company->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($companies as $company) {     
                        foreach ($company as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_company[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_company[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('companies', $data_company);                
                }
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes'));
	}

	function client_view($id = null)
	{
		$this->_set_company($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->Company->save($this->data))
			{
				$this->Session->setFlash(___('the company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes', 'addresses'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->Company->save($this->data))
			{
				$this->Session->setFlash(___('the company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_company($id);
		
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes', 'addresses'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Company->id = false;
			
			if ($this->Company->save($this->data))
			{
				$this->Session->setFlash(___('the company has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Company'][$this->Company->primaryKey] = $id;
				$this->Session->setFlash(___('the company could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_company($id);
		
		$companyTypes = $this->Company->CompanyType->find('list');
		$membershipTypes = $this->Company->MembershipType->find('list');
		//$addresses = $this->Company->Address->find('list');
		$this->set(compact('companyTypes', 'membershipTypes', 'addresses'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for company', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Company->delete($id))
		{
			$this->Session->setFlash(___('company deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('company was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Companies/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Company/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Company->deactivateAll(array('Company.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('companies deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('companies were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no company to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/Company/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Company->activateAll(array('Company.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('companies activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('companies were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no company to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/Company/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Company->deleteAll(array('Company.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('companies deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('companies were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no company to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>