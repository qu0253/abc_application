<?php
class PrintingCentersController extends AppController {

	var $name = 'PrintingCenters';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->PrintingCenter->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_printingCenter = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('printingCenters', $this->paginate($this->PrintingCenter, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $printingCenters = $this->PrintingCenter->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($printingCenters as $printingCenter) {     
                        foreach ($printingCenter as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_printingCenter[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_printingCenter[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('printingCenters', $data_printingCenter);                
                }
		$memberships = $this->PrintingCenter->Membership->find('list');
		//$printedAts = $this->PrintingCenter->PrintedAt->find('list');
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships'));
	}

	function admin_view($id = null)
	{
		$this->_set_printingCenter($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->PrintingCenter->save($this->data))
			{
				$this->Session->setFlash(___('the printing center has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view', 'controller' => 'memberships', $this->data['PrintingCenter']['membership_id']));
			}
			else
			{
				$this->Session->setFlash(___('the printing center could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->PrintingCenter->Membership->find('list');
		//$printedAts = $this->PrintingCenter->PrintedAt->find('list');
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships', 'printedAts', 'addresses'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->PrintingCenter->save($this->data))
			{
				$this->Session->setFlash(___('the printing center has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view', 'controller' => 'memberships', $this->data['PrintingCenter']['membership_id']));
			}
			else
			{
				$this->Session->setFlash(___('the printing center could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingCenter($id);
		
		$memberships = $this->PrintingCenter->Membership->find('list');
		$printedAts = $this->PrintingCenter->PrintedAt->find('list', array('conditions' => array('id' => $this->data['PrintingCenter']['printed_at_id'])));
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships', 'printedAts', 'addresses'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->PrintingCenter->id = false;
			
			if ($this->PrintingCenter->save($this->data))
			{
				$this->Session->setFlash(___('the printing center has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['PrintingCenter'][$this->PrintingCenter->primaryKey] = $id;
				$this->Session->setFlash(___('the printing center could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingCenter($id);
		
		$memberships = $this->PrintingCenter->Membership->find('list');
		$printedAts = $this->PrintingCenter->PrintedAt->find('list', array('conditions' => array('id' => $this->data['PrintingCenter']['printed_at_id'])));
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships', 'printedAts', 'addresses'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->PrintingCenter->delete($id))
		{
			$this->Session->setFlash(___('printing center deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('printing center was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'PrintingCenters/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/PrintingCenter/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenter->deactivateAll(array('PrintingCenter.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenters deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenters were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenter to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/PrintingCenter/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenter->activateAll(array('PrintingCenter.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenters activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenters were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenter to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/PrintingCenter/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenter->deleteAll(array('PrintingCenter.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenters deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenters were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenter to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_printingCenter($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->PrintingCenter->is_address_field_present()) {
                    $this->data = $this->PrintingCenter->read(null, $id);
                } else {
                    $this->data = $this->PrintingCenter->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('printingCenter', $this->data);
	}
	
	

	function client_index()
	{
		$this->PrintingCenter->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_printingCenter = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('printingCenters', $this->paginate($this->PrintingCenter, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $printingCenters = $this->PrintingCenter->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($printingCenters as $printingCenter) {     
                        foreach ($printingCenter as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_printingCenter[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_printingCenter[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('printingCenters', $data_printingCenter);                
                }
		$memberships = $this->PrintingCenter->Membership->find('list');
		//$printedAts = $this->PrintingCenter->PrintedAt->find('list');
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships'));
	}

	function client_view($id = null)
	{
		$this->_set_printingCenter($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
                        $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
                        if ($mem_status_id == 3 || $mem_status_id == 4 || $mem_status_id == 5) {
                            $this->data['PrintingCenter']['active'] = 0;
                        }
			if ($this->PrintingCenter->save($this->data))
			{
				$this->Session->setFlash(___('the printing center has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the printing center could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->PrintingCenter->Membership->find('list');
		//$printedAts = $this->PrintingCenter->PrintedAt->find('list');
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships', 'printedAts', 'addresses'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->PrintingCenter->save($this->data))
			{
				$this->Session->setFlash(___('the printing center has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the printing center could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingCenter($id);
		
		$memberships = $this->PrintingCenter->Membership->find('list');
		$printedAts = $this->PrintingCenter->PrintedAt->find('list', array('conditions' => array('id' => $this->data['PrintingCenter']['printed_at_id'])));
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships', 'printedAts', 'addresses'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->PrintingCenter->id = false;
			
			if ($this->PrintingCenter->save($this->data))
			{
				$this->Session->setFlash(___('the printing center has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['PrintingCenter'][$this->PrintingCenter->primaryKey] = $id;
				$this->Session->setFlash(___('the printing center could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_printingCenter($id);
		
		$memberships = $this->PrintingCenter->Membership->find('list');
		$printedAts = $this->PrintingCenter->PrintedAt->find('list', array('conditions' => array('id' => $this->data['PrintingCenter']['printed_at_id'])));
		//$addresses = $this->PrintingCenter->Address->find('list');
		$this->set(compact('memberships', 'printedAts', 'addresses'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for printing center', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->PrintingCenter->delete($id))
		{
			$this->Session->setFlash(___('printing center deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('printing center was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'PrintingCenters/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/PrintingCenter/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenter->deactivateAll(array('PrintingCenter.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenters deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenters were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenter to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/PrintingCenter/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenter->activateAll(array('PrintingCenter.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenters activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenters were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenter to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/PrintingCenter/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->PrintingCenter->deleteAll(array('PrintingCenter.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('printingCenters deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('printingCenters were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no printingCenter to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>