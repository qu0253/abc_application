<?php
class AuditorFirmsController extends AppController {

	var $name = 'AuditorFirms';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->AuditorFirm->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_auditorFirm = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('auditorFirms', $this->paginate($this->AuditorFirm, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $auditorFirms = $this->AuditorFirm->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($auditorFirms as $auditorFirm) {     
                        foreach ($auditorFirm as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_auditorFirm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_auditorFirm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('auditorFirms', $data_auditorFirm);                
                }
		$auditorTypes = $this->AuditorFirm->AuditorType->find('list');
		$companyTypes = $this->AuditorFirm->CompanyType->find('list');
                $this->set(compact('auditorTypes', 'companyTypes'));
//		$auditorBranches = $this->AuditorFirm->AuditorBranch->find('list');
//		$this->set(compact('auditorTypes', 'companyTypes', 'auditorBranches'));
	}

	function admin_view($id = null)
	{
		$this->_set_auditorFirm($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->AuditorFirm->save($this->data))
			{
				$this->Session->setFlash(___('the auditor firm has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view'));
			}
			else
			{
				$this->Session->setFlash(___('the auditor firm could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$auditorTypes = $this->AuditorFirm->AuditorType->find('list');
		$companyTypes = $this->AuditorFirm->CompanyType->find('list');
		$this->set(compact('auditorTypes', 'companyTypes'));
//		$auditorBranches = $this->AuditorFirm->AuditorBranch->find('list');
//		$this->set(compact('auditorTypes', 'companyTypes', 'auditorBranches'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for auditor firm', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->AuditorFirm->save($this->data))
			{
				$this->Session->setFlash(___('the auditor firm has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the auditor firm could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_auditorFirm($id);
		
		$auditorTypes = $this->AuditorFirm->AuditorType->find('list');
		$companyTypes = $this->AuditorFirm->CompanyType->find('list');
                $options = array();
                $options['conditions'] = array('AuditorBranch.auditor_firm_id' => $id);
//                $options['fields'] = array('id', 'auditor_branch_name');
		$auditorBranches = $this->AuditorFirm->AuditorBranch->find('list', $options);
		$this->set(compact('auditorTypes', 'companyTypes', 'auditorBranches'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for auditor firm', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->AuditorFirm->id = false;
			
			if ($this->AuditorFirm->save($this->data))
			{
				$this->Session->setFlash(___('the auditor firm has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view'));
			}
			else
			{
				//reset id to copy
				$this->data['AuditorFirm'][$this->AuditorFirm->primaryKey] = $id;
				$this->Session->setFlash(___('the auditor firm could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_auditorFirm($id);
		
		$auditorTypes = $this->AuditorFirm->AuditorType->find('list');
		$companyTypes = $this->AuditorFirm->CompanyType->find('list');
		$this->set(compact('auditorTypes', 'companyTypes'));
//		$auditorBranches = $this->AuditorFirm->AuditorBranch->find('list');
//		$this->set(compact('auditorTypes', 'companyTypes', 'auditorBranches'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for auditor firm', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->AuditorFirm->delete($id))
		{
			$this->Session->setFlash(___('auditor firm deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('auditor firm was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'AuditorFirms/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/AuditorFirm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->AuditorFirm->deactivateAll(array('AuditorFirm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('auditorFirms deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('auditorFirms were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no auditorFirm to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/AuditorFirm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->AuditorFirm->activateAll(array('AuditorFirm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('auditorFirms activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('auditorFirms were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no auditorFirm to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/AuditorFirm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->AuditorFirm->deleteAll(array('AuditorFirm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('auditorFirms deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('auditorFirms were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no auditorFirm to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_auditorFirm($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->AuditorFirm->is_address_field_present()) {
                    $this->data = $this->AuditorFirm->read(null, $id);
                } else {
                    $this->data = $this->AuditorFirm->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for auditor firm', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('auditorFirm', $this->data);
	}
	
	
}
?>