<?php
class AddressesController extends AppController {

	var $name = 'Addresses';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->Address->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_address = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('addresses', $this->paginate($this->Address, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $addresses = $this->Address->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($addresses as $address) {     
                        foreach ($address as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_address[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_address[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('addresses', $data_address);                
                }
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}

	function admin_view($id = null)
	{
		$this->_set_address($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->Address->save($this->data))
			{
				$this->Session->setFlash(___('the address has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the address could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Address->save($this->data))
			{
				$this->Session->setFlash(___('the address has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the address could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_address($id);
		
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Address->id = false;
			
			if ($this->Address->save($this->data))
			{
				$this->Session->setFlash(___('the address has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Address'][$this->Address->primaryKey] = $id;
				$this->Session->setFlash(___('the address could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_address($id);
		
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Address->delete($id))
		{
			$this->Session->setFlash(___('address deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('address was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Addresses/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Address/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Address->deactivateAll(array('Address.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('addresses deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('addresses were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no address to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/Address/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Address->activateAll(array('Address.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('addresses activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('addresses were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no address to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/Address/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Address->deleteAll(array('Address.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('addresses deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('addresses were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no address to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_address($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->Address->is_address_field_present()) {
                    $this->data = $this->Address->read(null, $id);
                } else {
                    $this->data = $this->Address->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('address', $this->data);
	}
	
	

	function client_index()
	{
		$this->Address->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_address = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('addresses', $this->paginate($this->Address, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $addresses = $this->Address->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($addresses as $address) {     
                        foreach ($address as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_address[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_address[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('addresses', $data_address);                
                }
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}

	function client_view($id = null)
	{
		$this->_set_address($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->Address->save($this->data))
			{
				$this->Session->setFlash(___('the address has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the address could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Address->save($this->data))
			{
				$this->Session->setFlash(___('the address has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the address could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_address($id);
		
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Address->id = false;
			
			if ($this->Address->save($this->data))
			{
				$this->Session->setFlash(___('the address has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Address'][$this->Address->primaryKey] = $id;
				$this->Session->setFlash(___('the address could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_address($id);
		
		$countries = $this->Address->Country->find('list');
		$zones = $this->Address->Zone->find('list');
		$states = $this->Address->State->find('list');
		$districts = $this->Address->District->find('list');
		$cities = $this->Address->City->find('list');
		$this->set(compact('countries', 'zones', 'states', 'districts', 'cities'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for address', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Address->delete($id))
		{
			$this->Session->setFlash(___('address deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('address was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Addresses/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Address/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Address->deactivateAll(array('Address.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('addresses deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('addresses were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no address to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/Address/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Address->activateAll(array('Address.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('addresses activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('addresses were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no address to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/Address/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Address->deleteAll(array('Address.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('addresses deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('addresses were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no address to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>