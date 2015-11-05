<?php
class PrintingCenterAuditorBranchesController extends AppController {

	var $name = 'PrintingCenterAuditorBranches';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->PrintingCenterAuditorBranch->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_printingCenterAuditorBranch = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('printingCenterAuditorBranches', $this->paginate($this->PrintingCenterAuditorBranch, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $printingCenterAuditorBranches = $this->PrintingCenterAuditorBranch->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($printingCenterAuditorBranches as $printingCenterAuditorBranch) {     
                        foreach ($printingCenterAuditorBranch as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_printingCenterAuditorBranch[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_printingCenterAuditorBranch[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('printingCenterAuditorBranches', $data_printingCenterAuditorBranch);                
                }
                $printingCenters = $this->_getPcToNamed();
                $auditorBranches = $this->_getAuditorBranch();
                $regularPeriods = $this->PrintingCenterAuditorBranch->RegularPeriod->find('list');
                $this->set(compact('printingCenters', 'auditorBranches', 'regularPeriods'));
	}

	function admin_view($id = null)
	{
		$this->_set_printingCenterAuditorBranch($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->PrintingCenterAuditorBranch->save($this->data))
			{
				$this->Session->setFlash(___('the printing center auditor branch has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the printing center auditor branch could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
                $printingCenters = $this->_getPcToNamed();
                $auditorBranches = $this->_getAuditorBranch();
                $regularPeriods = $this->PrintingCenterAuditorBranch->RegularPeriod->find('list');
                $this->set(compact('printingCenters', 'auditorBranches', 'regularPeriods'));
		
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing center auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->PrintingCenterAuditorBranch->save($this->data))
			{
				$this->Session->setFlash(___('the printing center auditor branch has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the printing center auditor branch could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingCenterAuditorBranch($id);
                $printingCenters = $this->_getPcToNamed();
                $auditorBranches = $this->_getAuditorBranch();
                $regularPeriods = $this->PrintingCenterAuditorBranch->RegularPeriod->find('list');
                $this->set(compact('printingCenters', 'auditorBranches', 'regularPeriods'));		
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing center auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->PrintingCenterAuditorBranch->id = false;
			
			if ($this->PrintingCenterAuditorBranch->save($this->data))
			{
				$this->Session->setFlash(___('the printing center auditor branch has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['PrintingCenterAuditorBranch'][$this->PrintingCenterAuditorBranch->primaryKey] = $id;
				$this->Session->setFlash(___('the printing center auditor branch could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingCenterAuditorBranch($id);
                $printingCenters = $this->_getPcToNamed();
                $auditorBranches = $this->_getAuditorBranch();
                $regularPeriods = $this->PrintingCenterAuditorBranch->RegularPeriod->find('list');
                $this->set(compact('printingCenters', 'auditorBranches', 'regularPeriods'));		
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for printing center auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->PrintingCenterAuditorBranch->delete($id))
		{
			$this->Session->setFlash(___('printing center auditor branch deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('printing center auditor branch was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'PrintingCenterAuditorBranches/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/PrintingCenterAuditorBranch/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenterAuditorBranch->deactivateAll(array('PrintingCenterAuditorBranch.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenterAuditorBranches deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenterAuditorBranches were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenterAuditorBranch to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/PrintingCenterAuditorBranch/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenterAuditorBranch->activateAll(array('PrintingCenterAuditorBranch.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenterAuditorBranches activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenterAuditorBranches were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenterAuditorBranch to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/PrintingCenterAuditorBranch/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenterAuditorBranch->deleteAll(array('PrintingCenterAuditorBranch.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenterAuditorBranches deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenterAuditorBranches were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenterAuditorBranch to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_printingCenterAuditorBranch($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->PrintingCenterAuditorBranch->is_address_field_present()) {
                    $this->data = $this->PrintingCenterAuditorBranch->read(null, $id);
                } else {
                    $this->data = $this->PrintingCenterAuditorBranch->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for printing center auditor branch', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('printingCenterAuditorBranch', $this->data);
	}			
	
}
?>