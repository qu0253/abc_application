<?php
class SurpriseChecksController extends AppController {

	var $name = 'SurpriseChecks';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->SurpriseCheck->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_surpriseCheck = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('surpriseChecks', $this->paginate($this->SurpriseCheck, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $surpriseChecks = $this->SurpriseCheck->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($surpriseChecks as $surpriseCheck) {     
                        foreach ($surpriseCheck as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_surpriseCheck[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_surpriseCheck[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('surpriseChecks', $data_surpriseCheck);                
                }
//		$qualifyingCirculations = $this->SurpriseCheck->QualifyingCirculation->find('list');
                $qualifyingCirculations = $this->_getQcToNamed();
		$auditorBranches = $this->_getAuditorBranch();
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}

	function admin_view($id = null)
	{
		$this->_set_surpriseCheck($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->SurpriseCheck->save($this->data))
			{
				$this->Session->setFlash(___('the surprise check has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the surprise check could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
                $qualifyingCirculations = $this->_getQcToNamed();
		$auditorBranches = $this->_getAuditorBranch();
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->SurpriseCheck->save($this->data))
			{
				$this->Session->setFlash(___('the surprise check has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the surprise check could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_surpriseCheck($id);
		
		$qualifyingCirculations = $this->_getQcToNamed();
		$auditorBranches = $this->_getAuditorBranch();
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->SurpriseCheck->id = false;
			
			if ($this->SurpriseCheck->save($this->data))
			{
				$this->Session->setFlash(___('the surprise check has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['SurpriseCheck'][$this->SurpriseCheck->primaryKey] = $id;
				$this->Session->setFlash(___('the surprise check could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_surpriseCheck($id);
		
		$qualifyingCirculations = $this->_getQcToNamed();
		$auditorBranches = $this->_getAuditorBranch();
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->SurpriseCheck->delete($id))
		{
			$this->Session->setFlash(___('surprise check deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('surprise check was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'SurpriseChecks/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/SurpriseCheck/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SurpriseCheck->deactivateAll(array('SurpriseCheck.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('surpriseChecks deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('surpriseChecks were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no surpriseCheck to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/SurpriseCheck/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SurpriseCheck->activateAll(array('SurpriseCheck.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('surpriseChecks activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('surpriseChecks were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no surpriseCheck to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/SurpriseCheck/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SurpriseCheck->deleteAll(array('SurpriseCheck.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('surpriseChecks deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('surpriseChecks were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no surpriseCheck to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_surpriseCheck($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->SurpriseCheck->is_address_field_present()) {
                    $this->data = $this->SurpriseCheck->read(null, $id);
                } else {
                    $this->data = $this->SurpriseCheck->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('surpriseCheck', $this->data);
	}
	
	

	function client_index()
	{
		$this->SurpriseCheck->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_surpriseCheck = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('surpriseChecks', $this->paginate($this->SurpriseCheck, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $surpriseChecks = $this->SurpriseCheck->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($surpriseChecks as $surpriseCheck) {     
                        foreach ($surpriseCheck as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_surpriseCheck[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_surpriseCheck[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('surpriseChecks', $data_surpriseCheck);                
                }
		$qualifyingCirculations = $this->SurpriseCheck->QualifyingCirculation->find('list');
		$auditorBranches = $this->SurpriseCheck->AuditorBranch->find('list');
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}

	function client_view($id = null)
	{
		$this->_set_surpriseCheck($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->SurpriseCheck->save($this->data))
			{
				$this->Session->setFlash(___('the surprise check has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the surprise check could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->SurpriseCheck->QualifyingCirculation->find('list');
		$auditorBranches = $this->SurpriseCheck->AuditorBranch->find('list');
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->SurpriseCheck->save($this->data))
			{
				$this->Session->setFlash(___('the surprise check has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the surprise check could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_surpriseCheck($id);
		
		$qualifyingCirculations = $this->SurpriseCheck->QualifyingCirculation->find('list');
		$auditorBranches = $this->SurpriseCheck->AuditorBranch->find('list');
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->SurpriseCheck->id = false;
			
			if ($this->SurpriseCheck->save($this->data))
			{
				$this->Session->setFlash(___('the surprise check has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['SurpriseCheck'][$this->SurpriseCheck->primaryKey] = $id;
				$this->Session->setFlash(___('the surprise check could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_surpriseCheck($id);
		
		$qualifyingCirculations = $this->SurpriseCheck->QualifyingCirculation->find('list');
		$auditorBranches = $this->SurpriseCheck->AuditorBranch->find('list');
		$this->set(compact('qualifyingCirculations', 'auditorBranches'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for surprise check', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->SurpriseCheck->delete($id))
		{
			$this->Session->setFlash(___('surprise check deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('surprise check was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'SurpriseChecks/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/SurpriseCheck/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SurpriseCheck->deactivateAll(array('SurpriseCheck.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('surpriseChecks deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('surpriseChecks were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no surpriseCheck to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/SurpriseCheck/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SurpriseCheck->activateAll(array('SurpriseCheck.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('surpriseChecks activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('surpriseChecks were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no surpriseCheck to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/SurpriseCheck/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SurpriseCheck->deleteAll(array('SurpriseCheck.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('surpriseChecks deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('surpriseChecks were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no surpriseCheck to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>