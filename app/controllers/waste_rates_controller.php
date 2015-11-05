<?php
class WasteRatesController extends AppController {

	var $name = 'WasteRates';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->WasteRate->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_wasteRate = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('wasteRates', $this->paginate($this->WasteRate, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $wasteRates = $this->WasteRate->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($wasteRates as $wasteRate) {     
                        foreach ($wasteRate as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_wasteRate[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_wasteRate[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('wasteRates', $data_wasteRate);                
                }
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_view($id = null)
	{
		$this->_set_wasteRate($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->WasteRate->save($this->data))
			{
				$this->Session->setFlash(___('the waste rate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the waste rate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->WasteRate->save($this->data))
			{
				$this->Session->setFlash(___('the waste rate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the waste rate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_wasteRate($id);
		
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->WasteRate->id = false;
			
			if ($this->WasteRate->save($this->data))
			{
				$this->Session->setFlash(___('the waste rate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['WasteRate'][$this->WasteRate->primaryKey] = $id;
				$this->Session->setFlash(___('the waste rate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_wasteRate($id);
		
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->WasteRate->delete($id))
		{
			$this->Session->setFlash(___('waste rate deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('waste rate was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'WasteRates/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/WasteRate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WasteRate->deactivateAll(array('WasteRate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('wasteRates deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('wasteRates were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no wasteRate to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/WasteRate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WasteRate->activateAll(array('WasteRate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('wasteRates activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('wasteRates were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no wasteRate to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/WasteRate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WasteRate->deleteAll(array('WasteRate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('wasteRates deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('wasteRates were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no wasteRate to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_wasteRate($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->WasteRate->is_address_field_present()) {
                    $this->data = $this->WasteRate->read(null, $id);
                } else {
                    $this->data = $this->WasteRate->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('wasteRate', $this->data);
	}
	
	

	function client_index()
	{
		$this->WasteRate->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_wasteRate = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('wasteRates', $this->paginate($this->WasteRate, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $wasteRates = $this->WasteRate->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($wasteRates as $wasteRate) {     
                        foreach ($wasteRate as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_wasteRate[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_wasteRate[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('wasteRates', $data_wasteRate);                
                }
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_view($id = null)
	{
		$this->_set_wasteRate($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->WasteRate->save($this->data))
			{
				$this->Session->setFlash(___('the waste rate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the waste rate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                            $this->params['named'] = array();
                        }
                        $this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
		}
		
		if (!empty($this->data))
		{
			if ($this->WasteRate->save($this->data))
			{
				$this->Session->setFlash(___('the waste rate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the waste rate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_wasteRate($id);
		
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->WasteRate->id = false;
			
			if ($this->WasteRate->save($this->data))
			{
				$this->Session->setFlash(___('the waste rate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['WasteRate'][$this->WasteRate->primaryKey] = $id;
				$this->Session->setFlash(___('the waste rate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_wasteRate($id);
		
		$qualifyingCirculations = $this->WasteRate->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for waste rate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->WasteRate->delete($id))
		{
			$this->Session->setFlash(___('waste rate deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('waste rate was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'WasteRates/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/WasteRate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WasteRate->deactivateAll(array('WasteRate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('wasteRates deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('wasteRates were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no wasteRate to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/WasteRate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WasteRate->activateAll(array('WasteRate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('wasteRates activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('wasteRates were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no wasteRate to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/WasteRate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->WasteRate->deleteAll(array('WasteRate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('wasteRates deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('wasteRates were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no wasteRate to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>