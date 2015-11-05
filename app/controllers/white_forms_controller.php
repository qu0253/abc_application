<?php
class WhiteFormsController extends AppController {

	var $name = 'WhiteForms';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->WhiteForm->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_whiteForm = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('whiteForms', $this->paginate($this->WhiteForm, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $whiteForms = $this->WhiteForm->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($whiteForms as $whiteForm) {     
                        foreach ($whiteForm as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_whiteForm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_whiteForm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('whiteForms', $data_whiteForm);                
                }
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		//$cities = $this->WhiteForm->City->find('list');
		$this->set(compact('qualifyingCirculations', 'cities'));
	}

	function admin_view($id = null)
	{
		$this->_set_whiteForm($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->WhiteForm->save($this->data))
			{
				$this->Session->setFlash(___('the white form has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the white form could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		//$cities = $this->WhiteForm->City->find('list');
		$this->set(compact('qualifyingCirculations', 'cities'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->WhiteForm->save($this->data))
			{
				$this->Session->setFlash(___('the white form has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the white form could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_whiteForm($id);
		
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		//$cities = $this->WhiteForm->City->find('list');
		$this->set(compact('qualifyingCirculations', 'cities'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->WhiteForm->id = false;
			
			if ($this->WhiteForm->save($this->data))
			{
				$this->Session->setFlash(___('the white form has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['WhiteForm'][$this->WhiteForm->primaryKey] = $id;
				$this->Session->setFlash(___('the white form could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_whiteForm($id);
		
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		//$cities = $this->WhiteForm->City->find('list');
		$this->set(compact('qualifyingCirculations', 'cities'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->WhiteForm->delete($id))
		{
			$this->Session->setFlash(___('white form deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('white form was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'WhiteForms/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/WhiteForm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WhiteForm->deactivateAll(array('WhiteForm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('whiteForms deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('whiteForms were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no whiteForm to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/WhiteForm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WhiteForm->activateAll(array('WhiteForm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('whiteForms activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('whiteForms were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no whiteForm to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/WhiteForm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WhiteForm->deleteAll(array('WhiteForm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('whiteForms deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('whiteForms were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no whiteForm to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_whiteForm($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->WhiteForm->is_address_field_present()) {
                    $this->data = $this->WhiteForm->read(null, $id);
                } else {
                    $this->data = $this->WhiteForm->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('whiteForm', $this->data);
            return $this->data;
	}
	
	

	function client_index()
	{
		$this->WhiteForm->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_whiteForm = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('whiteForms', $this->paginate($this->WhiteForm, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $whiteForms = $this->WhiteForm->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($whiteForms as $whiteForm) {     
                        foreach ($whiteForm as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_whiteForm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_whiteForm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('whiteForms', $data_whiteForm);                
                }
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		//$cities = $this->WhiteForm->City->find('list');
                $states = $this->WhiteForm->City->District->State->find('list');
                $districts = array('' => 'Select District');
                if (!empty($this->params['named']['state_id'])) {
                    $this->data['WhiteForm']['state_id'] = $this->params['named']['state_id'];
                    $districts = $this->getDistrict($this->params['named']['state_id'], 1);
                }
                if (!empty($this->params['named']['district_id'])) {
                    $this->data['WhiteForm']['district_id'] = $this->params['named']['district_id'];
                }
		$this->set(compact('qualifyingCirculations', 'cities', 'states', 'districts'));
	}

	function client_view($id = null)
	{
		$this->_set_whiteForm($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->WhiteForm->save($this->data))
			{
				$this->Session->setFlash(___('the white form has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
                                $this->redirect(array('action' => 'index', 'state_id' => ($this->data['WhiteForm']['state_id']) ? $this->data['WhiteForm']['state_id'] : '', 'district_id' => ($this->data['WhiteForm']['district_id']) ? $this->data['WhiteForm']['district_id'] : ''));
			}
			else
			{
				$this->Session->setFlash(___('the white form could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		//$cities = $this->WhiteForm->City->find('list');
                $states = $this->WhiteForm->City->District->State->find('list');
                $districts = array('' => 'Select District');
                if (!empty($this->data['WhiteForm']['state_id'])) {
                    $districts = $this->getDistrict($this->data['WhiteForm']['state_id'], 1);
                }
		$this->set(compact('qualifyingCirculations', 'cities', 'states', 'districts'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->WhiteForm->save($this->data))
			{
				$this->Session->setFlash(___('the white form has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the white form could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->data = $this->_set_whiteForm($id);
                $this->data['WhiteForm']['state_id'] = $this->data['State']['id'];
                $this->data['WhiteForm']['district_id'] = $this->data['District']['id'];
                
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		$cities = $this->WhiteForm->City->find('list', array('conditions' => array('id' => $this->data['WhiteForm']['city_id'])));
		$states = $this->WhiteForm->City->District->State->find('list');
                $districts = array('' => 'Select District');
                if (!empty($this->data['WhiteForm']['state_id'])) {
                    $districts = $this->getDistrict($this->data['WhiteForm']['state_id'], 1);
                }
		$this->set(compact('qualifyingCirculations', 'cities', 'states', 'districts'));
                }

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->WhiteForm->id = false;
			
			if ($this->WhiteForm->save($this->data))
			{
				$this->Session->setFlash(___('the white form has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['WhiteForm'][$this->WhiteForm->primaryKey] = $id;
				$this->Session->setFlash(___('the white form could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_whiteForm($id);
		
		$qualifyingCirculations = $this->WhiteForm->QualifyingCirculation->find('list');
		$this->data['WhiteForm']['state_id'] = $this->data['State']['id'];
                $this->data['WhiteForm']['district_id'] = $this->data['District']['id'];
                
                $cities = $this->WhiteForm->City->find('list', array('conditions' => array('id' => $this->data['WhiteForm']['city_id'])));
		$states = $this->WhiteForm->City->District->State->find('list');
                $districts = array('' => 'Select District');
                if (!empty($this->data['WhiteForm']['state_id'])) {
                    $districts = $this->getDistrict($this->data['WhiteForm']['state_id'], 1);
                }
		$this->set(compact('qualifyingCirculations', 'cities', 'states', 'districts'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for white form', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->WhiteForm->delete($id))
		{
			$this->Session->setFlash(___('white form deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('white form was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'WhiteForms/client_' . $this->data['_Tech']['action']))
	            {
	                $this->setAction('client_' . $this->data['_Tech']['action']);
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
                if(in_array(strtolower('client_' . $this->data['_Tech']['action']), $this->Auth->allowedActions))
                {
                    $this->setAction('client_' . $this->data['_Tech']['action']);
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
	    $ids = Set :: extract('/WhiteForm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WhiteForm->deactivateAll(array('WhiteForm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('whiteForms deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('whiteForms were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no whiteForm to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/WhiteForm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WhiteForm->activateAll(array('WhiteForm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('whiteForms activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('whiteForms were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no whiteForm to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/WhiteForm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WhiteForm->deleteAll(array('WhiteForm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('whiteForms deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('whiteForms were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no whiteForm to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>