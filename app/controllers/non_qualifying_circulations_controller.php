<?php
class NonQualifyingCirculationsController extends AppController {

	var $name = 'NonQualifyingCirculations';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->NonQualifyingCirculation->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_nonQualifyingCirculation = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('nonQualifyingCirculations', $this->paginate($this->NonQualifyingCirculation, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $nonQualifyingCirculations = $this->NonQualifyingCirculation->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($nonQualifyingCirculations as $nonQualifyingCirculation) {     
                        foreach ($nonQualifyingCirculation as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_nonQualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_nonQualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('nonQualifyingCirculations', $data_nonQualifyingCirculation);                
                }
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_view($id = null)
	{
		$this->_set_nonQualifyingCirculation($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->NonQualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the non qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the non qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->NonQualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the non qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the non qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_nonQualifyingCirculation($id);
		
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->NonQualifyingCirculation->id = false;
			
			if ($this->NonQualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the non qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['NonQualifyingCirculation'][$this->NonQualifyingCirculation->primaryKey] = $id;
				$this->Session->setFlash(___('the non qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_nonQualifyingCirculation($id);
		
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->NonQualifyingCirculation->delete($id))
		{
			$this->Session->setFlash(___('non qualifying circulation deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('non qualifying circulation was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'NonQualifyingCirculations/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/NonQualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->NonQualifyingCirculation->deactivateAll(array('NonQualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no nonQualifyingCirculation to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/NonQualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->NonQualifyingCirculation->activateAll(array('NonQualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no nonQualifyingCirculation to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/NonQualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->NonQualifyingCirculation->deleteAll(array('NonQualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no nonQualifyingCirculation to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_nonQualifyingCirculation($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->NonQualifyingCirculation->is_address_field_present()) {
                    $this->data = $this->NonQualifyingCirculation->read(null, $id);
                } else {
                    $this->data = $this->NonQualifyingCirculation->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('nonQualifyingCirculation', $this->data);
	}
	
	

	function client_index()
	{
		$this->NonQualifyingCirculation->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_nonQualifyingCirculation = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('nonQualifyingCirculations', $this->paginate($this->NonQualifyingCirculation, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $nonQualifyingCirculations = $this->NonQualifyingCirculation->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($nonQualifyingCirculations as $nonQualifyingCirculation) {     
                        foreach ($nonQualifyingCirculation as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_nonQualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_nonQualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('nonQualifyingCirculations', $data_nonQualifyingCirculation);                
                }
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_view($id = null)
	{
		$this->_set_nonQualifyingCirculation($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->NonQualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the non qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the non qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                            $this->params['named'] = array();
                        }
                        $this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
		}
		
		if (!empty($this->data))
		{
			if ($this->NonQualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the non qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the non qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_nonQualifyingCirculation($id);
		
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->NonQualifyingCirculation->id = false;
			
			if ($this->NonQualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the non qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['NonQualifyingCirculation'][$this->NonQualifyingCirculation->primaryKey] = $id;
				$this->Session->setFlash(___('the non qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_nonQualifyingCirculation($id);
		
		$qualifyingCirculations = $this->NonQualifyingCirculation->QualifyingCirculation->find('list');
		$this->set(compact('qualifyingCirculations'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for non qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->NonQualifyingCirculation->delete($id))
		{
			$this->Session->setFlash(___('non qualifying circulation deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('non qualifying circulation was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'NonQualifyingCirculations/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/NonQualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->NonQualifyingCirculation->deactivateAll(array('NonQualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no nonQualifyingCirculation to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/NonQualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->NonQualifyingCirculation->activateAll(array('NonQualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no nonQualifyingCirculation to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/NonQualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->NonQualifyingCirculation->deleteAll(array('NonQualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('nonQualifyingCirculations were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no nonQualifyingCirculation to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>