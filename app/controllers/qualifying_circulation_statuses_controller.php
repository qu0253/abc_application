<?php
class QualifyingCirculationStatusesController extends AppController {

	var $name = 'QualifyingCirculationStatuses';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->QualifyingCirculationStatus->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_qualifyingCirculationStatus = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('qualifyingCirculationStatuses', $this->paginate($this->QualifyingCirculationStatus, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $qualifyingCirculationStatuses = $this->QualifyingCirculationStatus->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($qualifyingCirculationStatuses as $qualifyingCirculationStatus) {     
                        foreach ($qualifyingCirculationStatus as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_qualifyingCirculationStatus[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_qualifyingCirculationStatus[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('qualifyingCirculationStatuses', $data_qualifyingCirculationStatus);                
                }
	}

	function admin_view($id = null)
	{
		$this->_set_qualifyingCirculationStatus($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->QualifyingCirculationStatus->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation status has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the qualifying circulation status could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation status', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->QualifyingCirculationStatus->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation status has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the qualifying circulation status could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_qualifyingCirculationStatus($id);
		
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation status', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->QualifyingCirculationStatus->id = false;
			
			if ($this->QualifyingCirculationStatus->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation status has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['QualifyingCirculationStatus'][$this->QualifyingCirculationStatus->primaryKey] = $id;
				$this->Session->setFlash(___('the qualifying circulation status could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_qualifyingCirculationStatus($id);
		
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation status', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->QualifyingCirculationStatus->delete($id))
		{
			$this->Session->setFlash(___('qualifying circulation status deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('qualifying circulation status was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'QualifyingCirculationStatuses/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/QualifyingCirculationStatus/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculationStatus->deactivateAll(array('QualifyingCirculationStatus.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculationStatuses deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculationStatuses were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculationStatus to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/QualifyingCirculationStatus/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculationStatus->activateAll(array('QualifyingCirculationStatus.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculationStatuses activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculationStatuses were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculationStatus to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/QualifyingCirculationStatus/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculationStatus->deleteAll(array('QualifyingCirculationStatus.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculationStatuses deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculationStatuses were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculationStatus to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_qualifyingCirculationStatus($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->QualifyingCirculationStatus->is_address_field_present()) {
                    $this->data = $this->QualifyingCirculationStatus->read(null, $id);
                } else {
                    $this->data = $this->QualifyingCirculationStatus->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for qualifying circulation status', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('qualifyingCirculationStatus', $this->data);
	}	
	
}
?>