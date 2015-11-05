<?php
class PrintingPressesController extends AppController {

	var $name = 'PrintingPresses';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->PrintingPress->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_printingPress = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('printingPresses', $this->paginate($this->PrintingPress, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $printingPresses = $this->PrintingPress->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($printingPresses as $printingPress) {     
                        foreach ($printingPress as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_printingPress[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_printingPress[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('printingPresses', $data_printingPress);                
                }
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_view($id = null)
	{
		$this->_set_printingPress($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->PrintingPress->save($this->data))
			{
				$this->Session->setFlash(___('the printing press has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the printing press could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->PrintingPress->save($this->data))
			{
				$this->Session->setFlash(___('the printing press has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the printing press could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingPress($id);
		
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->PrintingPress->id = false;
			
			if ($this->PrintingPress->save($this->data))
			{
				$this->Session->setFlash(___('the printing press has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['PrintingPress'][$this->PrintingPress->primaryKey] = $id;
				$this->Session->setFlash(___('the printing press could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingPress($id);
		
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->PrintingPress->delete($id))
		{
			$this->Session->setFlash(___('printing press deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('printing press was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'PrintingPresses/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/PrintingPress/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingPress->deactivateAll(array('PrintingPress.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingPresses deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingPresses were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingPress to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/PrintingPress/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingPress->activateAll(array('PrintingPress.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingPresses activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingPresses were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingPress to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/PrintingPress/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingPress->deleteAll(array('PrintingPress.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingPresses deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingPresses were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingPress to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_printingPress($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->PrintingPress->is_address_field_present()) {
                    $this->data = $this->PrintingPress->read(null, $id);
                } else {
                    $this->data = $this->PrintingPress->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('printingPress', $this->data);
	}
	
	

	function client_index()
	{
		$this->PrintingPress->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_printingPress = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('printingPresses', $this->paginate($this->PrintingPress, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $printingPresses = $this->PrintingPress->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($printingPresses as $printingPress) {     
                        foreach ($printingPress as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_printingPress[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_printingPress[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('printingPresses', $data_printingPress);                
                }
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_view($id = null)
	{
		$this->_set_printingPress($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->PrintingPress->save($this->data))
			{
				$this->Session->setFlash(___('the printing press has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the printing press could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->PrintingPress->save($this->data))
			{
				$this->Session->setFlash(___('the printing press has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the printing press could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingPress($id);
		
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->PrintingPress->id = false;
			
			if ($this->PrintingPress->save($this->data))
			{
				$this->Session->setFlash(___('the printing press has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['PrintingPress'][$this->PrintingPress->primaryKey] = $id;
				$this->Session->setFlash(___('the printing press could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingPress($id);
		
		$qualifyingCirculations = $this->PrintingPress->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for printing press', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->PrintingPress->delete($id))
		{
			$this->Session->setFlash(___('printing press deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('printing press was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'PrintingPresses/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/PrintingPress/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingPress->deactivateAll(array('PrintingPress.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingPresses deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingPresses were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingPress to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/PrintingPress/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingPress->activateAll(array('PrintingPress.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingPresses activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingPresses were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingPress to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/PrintingPress/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingPress->deleteAll(array('PrintingPress.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingPresses deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingPresses were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingPress to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>