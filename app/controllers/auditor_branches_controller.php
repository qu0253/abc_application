<?php
class AuditorBranchesController extends AppController {

	var $name = 'AuditorBranches';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->AuditorBranch->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_auditorBranch = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('auditorBranches', $this->paginate($this->AuditorBranch, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $auditorBranches = $this->AuditorBranch->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($auditorBranches as $auditorBranch) {     
                        foreach ($auditorBranch as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_auditorBranch[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_auditorBranch[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('auditorBranches', $data_auditorBranch);                
                }
		$auditorFirms = $this->AuditorBranch->AuditorFirm->find('list');
		//$addresses = $this->AuditorBranch->Address->find('list');
		$this->set(compact('auditorFirms', 'addresses'));
	}

	function admin_view($id = null)
	{
		$this->_set_auditorBranch($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->AuditorBranch->save($this->data))
			{
				$this->Session->setFlash(___('the auditor branch has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the auditor branch could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$auditorFirms = $this->AuditorBranch->AuditorFirm->find('list');
		//$addresses = $this->AuditorBranch->Address->find('list');
		$this->set(compact('auditorFirms', 'addresses'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->AuditorBranch->save($this->data))
			{
				$this->Session->setFlash(___('the auditor branch has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the auditor branch could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_auditorBranch($id);
		
		$auditorFirms = $this->AuditorBranch->AuditorFirm->find('list');
		//$addresses = $this->AuditorBranch->Address->find('list');
		$this->set(compact('auditorFirms', 'addresses'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->AuditorBranch->id = false;
			
			if ($this->AuditorBranch->save($this->data))
			{
				$this->Session->setFlash(___('the auditor branch has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['AuditorBranch'][$this->AuditorBranch->primaryKey] = $id;
				$this->Session->setFlash(___('the auditor branch could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_auditorBranch($id);
		
		$auditorFirms = $this->AuditorBranch->AuditorFirm->find('list');
		//$addresses = $this->AuditorBranch->Address->find('list');
		$this->set(compact('auditorFirms', 'addresses'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->AuditorBranch->delete($id))
		{
			$this->Session->setFlash(___('auditor branch deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('auditor branch was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'AuditorBranches/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/AuditorBranch/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->AuditorBranch->deactivateAll(array('AuditorBranch.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('auditorBranches deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('auditorBranches were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no auditorBranch to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/AuditorBranch/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->AuditorBranch->activateAll(array('AuditorBranch.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('auditorBranches activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('auditorBranches were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no auditorBranch to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/AuditorBranch/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->AuditorBranch->deleteAll(array('AuditorBranch.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('auditorBranches deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('auditorBranches were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no auditorBranch to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_auditorBranch($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->AuditorBranch->is_address_field_present()) {
                    $this->data = $this->AuditorBranch->read(null, $id);
                } else {
                    $this->data = $this->AuditorBranch->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('auditorBranch', $this->data);
	}
	
	
}
?>