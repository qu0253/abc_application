<?php
class PartnersController extends AppController {

	var $name = 'Partners';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->Partner->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_partner = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('partners', $this->paginate($this->Partner, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $partners = $this->Partner->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($partners as $partner) {     
                        foreach ($partner as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_partner[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_partner[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('partners', $data_partner);                
                }
		$auditorBranches = $this->Partner->AuditorBranch->find('list');
		$auditorFirms = $this->Partner->AuditorFirm->find('list');
		//$addresses = $this->Partner->Address->find('list');
		$this->set(compact('auditorBranches', 'auditorFirms', 'addresses'));
	}

	function admin_view($id = null)
	{
		$this->_set_partner($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->Partner->save($this->data))
			{
				$this->Session->setFlash(___('the partner has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the partner could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
                $this->_setSubDivData(true);
                $options = array();
                if(!empty($this->data['Partner']['auditor_branch_id'])) {
                    $this->params['named']['copy_address'] = 1;
                    $this->params['named']['field_to_set'] = 'auditor_branch_id';
                    $this->params['named']['model'] = 'AuditorBranch';
                    $this->params['named']['id'] = $this->data['Partner']['auditor_branch_id'];
                    $options = array(
                        'conditions' => array('AuditorBranch.id' => $this->data['Partner']['auditor_branch_id']),
                    );
                }
		$auditorBranches = $this->Partner->AuditorBranch->find('list', $options);
		//$addresses = $this->Partner->Address->find('list');
		$this->set(compact('auditorBranches', 'addresses'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for partner', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Partner->save($this->data))
			{
				$this->Session->setFlash(___('the partner has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the partner could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_partner($id);
		
		$auditorBranches = $this->Partner->AuditorBranch->find('list');
		//$addresses = $this->Partner->Address->find('list');
		$this->set(compact('auditorBranches', 'addresses'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for partner', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Partner->id = false;
			
			if ($this->Partner->save($this->data))
			{
				$this->Session->setFlash(___('the partner has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Partner'][$this->Partner->primaryKey] = $id;
				$this->Session->setFlash(___('the partner could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_partner($id);
		
		$auditorBranches = $this->Partner->AuditorBranch->find('list');
		//$addresses = $this->Partner->Address->find('list');
		$this->set(compact('auditorBranches', 'addresses'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for partner', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Partner->delete($id))
		{
			$this->Session->setFlash(___('partner deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('partner was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Partners/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Partner/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Partner->deactivateAll(array('Partner.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('partners deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('partners were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no partner to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/Partner/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Partner->activateAll(array('Partner.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('partners activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('partners were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no partner to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/Partner/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Partner->deleteAll(array('Partner.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('partners deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('partners were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no partner to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_partner($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->Partner->is_address_field_present()) {
                    $this->data = $this->Partner->read(null, $id);
                } else {
                    $this->data = $this->Partner->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for partner', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('partner', $this->data);
	}
	
	
}
?>