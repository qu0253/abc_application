<?php
class RepresentativesController extends AppController {

	var $name = 'Representatives';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->Representative->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_representative = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('representatives', $this->paginate($this->Representative, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $representatives = $this->Representative->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($representatives as $representative) {     
                        foreach ($representative as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_representative[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_representative[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('representatives', $data_representative);                
                }
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'prefixes'));
	}

	function admin_view($id = null)
	{
		$this->_set_representative($id);
	}
	function admin_add()
	{
                $representative_type_id = !empty($this->params['named']['representative_type_id']) ? $this->params['named']['representative_type_id'] : 1;
		if (!empty($this->data))
		{
			if ($this->Representative->save($this->data))
			{
				$this->Session->setFlash(___('the representative has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the representative could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
                if (!empty($representative_type_id)) {
                    $this->data['Representative']['representative_type_id'] = $representative_type_id;
                } 
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'addresses', 'prefixes'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
                        $id = $this->data['Representative']['id'];
                        $this->data['Representative']['id'] = null;
			if ($this->Representative->save($this->data))
			{
                                $this->data = $this->Representative->read(null, $id, 1);
                                $this->data['Representative']['active'] = 0;
                                $this->Representative->save($this->data);
				$this->Session->setFlash(___('the representative has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the representative could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_representative($id);
		
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'addresses', 'prefixes'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Representative->id = false;
			
			if ($this->Representative->save($this->data))
			{
				$this->Session->setFlash(___('the representative has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Representative'][$this->Representative->primaryKey] = $id;
				$this->Session->setFlash(___('the representative could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_representative($id);
		
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'addresses', 'prefixes'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Representative->delete($id))
		{
			$this->Session->setFlash(___('representative deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('representative was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Representatives/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Representative/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Representative->deactivateAll(array('Representative.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('representatives deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('representatives were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no representative to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/Representative/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Representative->activateAll(array('Representative.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('representatives activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('representatives were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no representative to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/Representative/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Representative->deleteAll(array('Representative.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('representatives deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('representatives were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no representative to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_representative($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->Representative->is_address_field_present()) {
                    $this->data = $this->Representative->read(null, $id);
                } else {
                    $this->data = $this->Representative->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('representative', $this->data);
	}
	
	

	function client_index()
	{
		$this->Representative->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_representative = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('representatives', $this->paginate($this->Representative, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $representatives = $this->Representative->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($representatives as $representative) {     
                        foreach ($representative as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_representative[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_representative[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('representatives', $data_representative);                
                }
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'prefixes'));
	}

	function client_view($id = null)
	{
		$this->_set_representative($id);
	}

	function client_add()
	{
                $representative_type_id = !empty($this->params['named']['representative_type_id']) ? $this->params['named']['representative_type_id'] : 1;
		if (!empty($this->data))
		{        
			if ($this->Representative->save($this->data))
			{
				$this->Session->setFlash(___('the representative has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_moveStatusPostApprovedChanges();
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the representative could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}		
                if (!empty($representative_type_id)) {
                    $this->data['Representative']['representative_type_id'] = $representative_type_id;
                } 
                $options = array('conditions' => array('Membership.id' => $this->Session->read('Auth.Membership.id')));
		$memberships = $this->Representative->Membership->find('list', $options);
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                // $prefixes = $this->Representative->Prefix->find('list', array('fields' => array('id', 'prefix_name')));
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'addresses', 'prefixes'));
	}
              
	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->Representative->save($this->data))
			{
				$this->Session->setFlash(___('the representative has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
                                $this->_moveStatusPostApprovedChanges();
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the representative could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_representative($id);
		
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'addresses', 'prefixes'));
	}

	function client_copy($id = null)
	{
                $representative_type_id = !empty($this->params['named']['representative_type_id']) ? $this->params['named']['representative_type_id'] : 1;
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		

		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Representative->id = false;

			if ($this->Representative->save($this->data))
			{
                            			                
				$this->Session->setFlash(___('the representative has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				//reset id to copy
				$this->data['Representative'][$this->Representative->primaryKey] = $id;
				$this->Session->setFlash(___('the representative could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_representative($id);
		if (!empty($representative_type_id)) {
                    $this->data['Representative']['representative_type_id'] = $representative_type_id;
                } 
		$memberships = $this->Representative->Membership->find('list');
		$representativeTypes = $this->Representative->RepresentativeType->find('list');
                $prefixes = $this->__getPrefixes();
		//$addresses = $this->Representative->Address->find('list');
		$this->set(compact('memberships', 'representativeTypes', 'addresses', 'prefixes'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for representative', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Representative->delete($id))
		{
			$this->Session->setFlash(___('representative deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('representative was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Representatives/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Representative/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Representative->deactivateAll(array('Representative.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('representatives deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('representatives were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no representative to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/Representative/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Representative->activateAll(array('Representative.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('representatives activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('representatives were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no representative to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/Representative/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Representative->deleteAll(array('Representative.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('representatives deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('representatives were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no representative to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
        private function __getPrefixes() {
            return $this->Representative->Prefix->find('list', 
                    array('fields' => array('id', 'prefix_name'),'order'=>array('Prefix.prefix_name ASC')));
        }
	
	
}
?>