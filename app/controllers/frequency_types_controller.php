<?php
class FrequencyTypesController extends AppController {

	var $name = 'FrequencyTypes';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->FrequencyType->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_frequencyType = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('frequencyTypes', $this->paginate($this->FrequencyType, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $frequencyTypes = $this->FrequencyType->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($frequencyTypes as $frequencyType) {     
                        foreach ($frequencyType as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_frequencyType[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_frequencyType[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('frequencyTypes', $data_frequencyType);                
                }
		$frequencies = $this->FrequencyType->Frequency->find('list');
		$this->set(compact('frequencies'));
	}

	function admin_view($id = null)
	{
		$this->_set_frequencyType($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->FrequencyType->save($this->data))
			{
				$this->Session->setFlash(___('the frequency type has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the frequency type could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$frequencies = $this->FrequencyType->Frequency->find('list');
		$this->set(compact('frequencies'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for frequency type', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->FrequencyType->save($this->data))
			{
				$this->Session->setFlash(___('the frequency type has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the frequency type could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_frequencyType($id);
		
		$frequencies = $this->FrequencyType->Frequency->find('list');
		$this->set(compact('frequencies'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for frequency type', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->FrequencyType->id = false;
			
			if ($this->FrequencyType->save($this->data))
			{
				$this->Session->setFlash(___('the frequency type has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['FrequencyType'][$this->FrequencyType->primaryKey] = $id;
				$this->Session->setFlash(___('the frequency type could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_frequencyType($id);
		
		$frequencies = $this->FrequencyType->Frequency->find('list');
		$this->set(compact('frequencies'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for frequency type', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->FrequencyType->delete($id))
		{
			$this->Session->setFlash(___('frequency type deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('frequency type was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'FrequencyTypes/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/FrequencyType/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->FrequencyType->deactivateAll(array('FrequencyType.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('frequencyTypes deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('frequencyTypes were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no frequencyType to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/FrequencyType/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->FrequencyType->activateAll(array('FrequencyType.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('frequencyTypes activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('frequencyTypes were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no frequencyType to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/FrequencyType/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->FrequencyType->deleteAll(array('FrequencyType.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('frequencyTypes deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('frequencyTypes were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no frequencyType to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_frequencyType($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->FrequencyType->is_address_field_present()) {
                    $this->data = $this->FrequencyType->read(null, $id);
                } else {
                    $this->data = $this->FrequencyType->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for frequency type', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('frequencyType', $this->data);
	}
	
	
}
?>