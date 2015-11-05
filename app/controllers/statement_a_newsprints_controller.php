<?php
class StatementANewsprintsController extends AppController {

	var $name = 'StatementANewsprints';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->StatementANewsprint->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_statementANewsprint = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('statementANewsprints', $this->paginate($this->StatementANewsprint, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $statementANewsprints = $this->StatementANewsprint->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($statementANewsprints as $statementANewsprint) {     
                        foreach ($statementANewsprint as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_statementANewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_statementANewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('statementANewsprints', $data_statementANewsprint);                
                }
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_view($id = null)
	{
		$this->_set_statementANewsprint($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->StatementANewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement a newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the statement a newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->StatementANewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement a newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the statement a newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementANewsprint($id);
		
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->StatementANewsprint->id = false;
			
			if ($this->StatementANewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement a newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['StatementANewsprint'][$this->StatementANewsprint->primaryKey] = $id;
				$this->Session->setFlash(___('the statement a newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementANewsprint($id);
		
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->StatementANewsprint->delete($id))
		{
			$this->Session->setFlash(___('statement a newsprint deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('statement a newsprint was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'StatementANewsprints/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/StatementANewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementANewsprint->deactivateAll(array('StatementANewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementANewsprints deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementANewsprints were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementANewsprint to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/StatementANewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementANewsprint->activateAll(array('StatementANewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementANewsprints activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementANewsprints were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementANewsprint to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/StatementANewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementANewsprint->deleteAll(array('StatementANewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementANewsprints deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementANewsprints were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementANewsprint to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_statementANewsprint($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->StatementANewsprint->is_address_field_present()) {
                    $this->data = $this->StatementANewsprint->read(null, $id);
                } else {
                    $this->data = $this->StatementANewsprint->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('statementANewsprint', $this->data);
	}
	
	

	function client_index()
	{
		$this->StatementANewsprint->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_statementANewsprint = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('statementANewsprints', $this->paginate($this->StatementANewsprint, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $statementANewsprints = $this->StatementANewsprint->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($statementANewsprints as $statementANewsprint) {     
                        foreach ($statementANewsprint as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_statementANewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_statementANewsprint[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('statementANewsprints', $data_statementANewsprint);                
                }
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_view($id = null)
	{
		$this->_set_statementANewsprint($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->StatementANewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement a newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the statement a newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                            $this->params['named'] = array();
                        }
                        $this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
		}
		
		if (!empty($this->data))
		{
			if ($this->StatementANewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement a newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the statement a newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementANewsprint($id);
		
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                            $this->params['named'] = array();
                        }
                        $this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->StatementANewsprint->id = false;
			
			if ($this->StatementANewsprint->save($this->data))
			{
				$this->Session->setFlash(___('the statement a newsprint has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				//reset id to copy
				$this->data['StatementANewsprint'][$this->StatementANewsprint->primaryKey] = $id;
				$this->Session->setFlash(___('the statement a newsprint could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_statementANewsprint($id);
		
		$qualifyingCirculations = $this->StatementANewsprint->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for statement a newsprint', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->StatementANewsprint->delete($id))
		{
			$this->Session->setFlash(___('statement a newsprint deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('statement a newsprint was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'StatementANewsprints/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/StatementANewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementANewsprint->deactivateAll(array('StatementANewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementANewsprints deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementANewsprints were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementANewsprint to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/StatementANewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementANewsprint->activateAll(array('StatementANewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementANewsprints activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementANewsprints were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementANewsprint to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/StatementANewsprint/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->StatementANewsprint->deleteAll(array('StatementANewsprint.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('statementANewsprints deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('statementANewsprints were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no statementANewsprint to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>