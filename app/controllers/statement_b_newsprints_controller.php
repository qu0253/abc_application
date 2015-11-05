<?php
class StatementBNewsprintsController extends AppController {

	var $name = 'StatementBNewsprints';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->StatementBNewsprint->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_statementBNewsprint = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('statementBNewsprints', $this->paginate($this->StatementBNewsprint, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $statementBNewsprints = $this->StatementBNewsprint->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($statementBNewsprints as $statementBNewsprint) {     
                        foreach ($statementBNewsprint as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_statementBNewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_statementBNewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('statementBNewsprints', $data_statementBNewsprint);                
                }
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_view($id = null)
	{
		$this->_set_statementBNewsprint($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->StatementBNewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement b newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the statement b newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->StatementBNewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement b newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the statement b newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementBNewsprint($id);
		
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->StatementBNewsprint->id = false;
			
			if ($this->StatementBNewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement b newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['StatementBNewsprint'][$this->StatementBNewsprint->primaryKey] = $id;
				$this->Session->setFlash(___('the statement b newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementBNewsprint($id);
		
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->StatementBNewsprint->delete($id))
		{
			$this->Session->setFlash(___('statement b newsprint deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('statement b newsprint was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'StatementBNewsprints/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/StatementBNewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementBNewsprint->deactivateAll(array('StatementBNewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementBNewsprint to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/StatementBNewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementBNewsprint->activateAll(array('StatementBNewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementBNewsprint to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/StatementBNewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementBNewsprint->deleteAll(array('StatementBNewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementBNewsprint to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_statementBNewsprint($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->StatementBNewsprint->is_address_field_present()) {
                    $this->data = $this->StatementBNewsprint->read(null, $id);
                } else {
                    $this->data = $this->StatementBNewsprint->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('statementBNewsprint', $this->data);
	}
	
	

	function client_index()
	{
		$this->StatementBNewsprint->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_statementBNewsprint = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('statementBNewsprints', $this->paginate($this->StatementBNewsprint, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $statementBNewsprints = $this->StatementBNewsprint->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($statementBNewsprints as $statementBNewsprint) {     
                        foreach ($statementBNewsprint as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_statementBNewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_statementBNewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('statementBNewsprints', $data_statementBNewsprint);                
                }
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_view($id = null)
	{
		$this->_set_statementBNewsprint($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->StatementBNewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement b newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the statement b newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->StatementBNewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement b newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the statement b newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementBNewsprint($id);
		
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->StatementBNewsprint->id = false;
			
			if ($this->StatementBNewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement b newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['StatementBNewsprint'][$this->StatementBNewsprint->primaryKey] = $id;
				$this->Session->setFlash(___('the statement b newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementBNewsprint($id);
		
		$qualifyingCirculations = $this->StatementBNewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for statement b newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->StatementBNewsprint->delete($id))
		{
			$this->Session->setFlash(___('statement b newsprint deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('statement b newsprint was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'StatementBNewsprints/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/StatementBNewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementBNewsprint->deactivateAll(array('StatementBNewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementBNewsprint to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/StatementBNewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementBNewsprint->activateAll(array('StatementBNewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementBNewsprint to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/StatementBNewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementBNewsprint->deleteAll(array('StatementBNewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementBNewsprints were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementBNewsprint to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>