<?php
class DistrictsController extends AppController {

	var $name = 'Districts';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->District->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_district = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('districts', $this->paginate($this->District, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $districts = $this->District->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($districts as $district) {     
                        foreach ($district as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_district[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_district[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('districts', $data_district);                
                }
		$states = $this->District->State->find('list');
		$this->set(compact('states'));
	}

	function admin_view($id = null)
	{
		$this->_set_district($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->District->save($this->data))
			{
				$this->Session->setFlash(___('the district has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the district could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$states = $this->District->State->find('list');
		$this->set(compact('states'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for district', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->District->save($this->data))
			{
				$this->Session->setFlash(___('the district has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the district could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_district($id);
		
		$states = $this->District->State->find('list');
		$this->set(compact('states'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for district', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->District->id = false;
			
			if ($this->District->save($this->data))
			{
				$this->Session->setFlash(___('the district has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['District'][$this->District->primaryKey] = $id;
				$this->Session->setFlash(___('the district could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_district($id);
		
		$states = $this->District->State->find('list');
		$this->set(compact('states'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for district', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->District->delete($id))
		{
			$this->Session->setFlash(___('district deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('district was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Districts/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/District/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->District->deactivateAll(array('District.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('districts deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('districts were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no district to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/District/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->District->activateAll(array('District.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('districts activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('districts were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no district to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/District/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->District->deleteAll(array('District.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('districts deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('districts were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no district to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_district($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->District->is_address_field_present()) {
                    $this->data = $this->District->read(null, $id);
                } else {
                    $this->data = $this->District->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for district', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('district', $this->data);
	}
	
	
}
?>