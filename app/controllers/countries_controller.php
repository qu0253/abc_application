<?php
class CountriesController extends AppController {

	var $name = 'Countries';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->Country->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_country = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('countries', $this->paginate($this->Country, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $countries = $this->Country->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($countries as $country) {     
                        foreach ($country as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_country[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_country[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('countries', $data_country);                
                }
	}

	function admin_view($id = null)
	{
		$this->_set_country($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->Country->save($this->data))
			{
				$this->Session->setFlash(___('the country has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the country could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for country', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Country->save($this->data))
			{
				$this->Session->setFlash(___('the country has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the country could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_country($id);
		
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for country', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Country->id = false;
			
			if ($this->Country->save($this->data))
			{
				$this->Session->setFlash(___('the country has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Country'][$this->Country->primaryKey] = $id;
				$this->Session->setFlash(___('the country could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_country($id);
		
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for country', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Country->delete($id))
		{
			$this->Session->setFlash(___('country deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('country was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Countries/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Country/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Country->deactivateAll(array('Country.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('countries deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('countries were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no country to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/Country/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Country->activateAll(array('Country.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('countries activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('countries were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no country to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/Country/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Country->deleteAll(array('Country.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('countries deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('countries were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no country to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_country($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->Country->is_address_field_present()) {
                    $this->data = $this->Country->read(null, $id);
                } else {
                    $this->data = $this->Country->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for country', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('country', $this->data);
	}
	
	
}
?>