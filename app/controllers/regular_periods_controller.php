<?php
class RegularPeriodsController extends AppController {

	var $name = 'RegularPeriods';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->RegularPeriod->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_regularPeriod = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('regularPeriods', $this->paginate($this->RegularPeriod, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $regularPeriods = $this->RegularPeriod->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($regularPeriods as $regularPeriod) {     
                        foreach ($regularPeriod as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_regularPeriod[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_regularPeriod[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('regularPeriods', $data_regularPeriod);                
                }
	}

	function admin_view($id = null)
	{
		$this->_set_regularPeriod($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->RegularPeriod->save($this->data))
			{
				$this->Session->setFlash(___('the regular period has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the regular period could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
                $options = array(
                        'order' => array('RegularPeriod.id DESC'),
                        'recursive' => -1,
                    );
                $regularPeriod = $this->RegularPeriod->find('first', $options);
                if(!empty($regularPeriod['RegularPeriod']['volume_number'])) {
                    $volno = $this->data['RegularPeriod']['volume_number'] = $regularPeriod['RegularPeriod']['volume_number'] + 1;
                    $yr = round(($volno - 129) / 2, 0, PHP_ROUND_HALF_DOWN) + 2013;                    
                    if($volno % 2 == 0) {                        
                        $this->data['RegularPeriod']['regular_period_name'] = 'Jul - Dec ' . $yr;
                        $this->data['RegularPeriod']['from_date'] = $yr . '-07-01';
                        $this->data['RegularPeriod']['to_date'] = $yr . '-12-31';
                    } else {                        
                        $this->data['RegularPeriod']['regular_period_name'] = 'Jan - Jun ' . $yr;
                        $this->data['RegularPeriod']['from_date'] = $yr . '-01-01';
                        $this->data['RegularPeriod']['to_date'] = $yr . '-06-30';
                    }                    
                }
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for regular period', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->RegularPeriod->save($this->data))
			{
				$this->Session->setFlash(___('the regular period has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the regular period could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_regularPeriod($id);
		
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for regular period', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->RegularPeriod->id = false;
			
			if ($this->RegularPeriod->save($this->data))
			{
				$this->Session->setFlash(___('the regular period has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['RegularPeriod'][$this->RegularPeriod->primaryKey] = $id;
				$this->Session->setFlash(___('the regular period could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_regularPeriod($id);
		
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for regular period', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->RegularPeriod->delete($id))
		{
			$this->Session->setFlash(___('regular period deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('regular period was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'RegularPeriods/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/RegularPeriod/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RegularPeriod->deactivateAll(array('RegularPeriod.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('regularPeriods deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('regularPeriods were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no regularPeriod to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/RegularPeriod/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RegularPeriod->activateAll(array('RegularPeriod.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('regularPeriods activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('regularPeriods were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no regularPeriod to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/RegularPeriod/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RegularPeriod->deleteAll(array('RegularPeriod.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('regularPeriods deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('regularPeriods were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no regularPeriod to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_regularPeriod($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->RegularPeriod->is_address_field_present()) {
                    $this->data = $this->RegularPeriod->read(null, $id);
                } else {
                    $this->data = $this->RegularPeriod->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for regular period', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('regularPeriod', $this->data);
	}
	
	
}
?>