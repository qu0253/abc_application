<?php
class RniDetailsController extends AppController {

	var $name = 'RniDetails';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->RniDetail->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_rniDetail = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('rniDetails', $this->paginate($this->RniDetail, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $rniDetails = $this->RniDetail->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($rniDetails as $rniDetail) {     
                        foreach ($rniDetail as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_rniDetail[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_rniDetail[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('rniDetails', $data_rniDetail);                
                }
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function admin_view($id = null)
	{
		$this->_set_rniDetail($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->RniDetail->save($this->data))
			{
				$this->Session->setFlash(___('the rni detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view', 'controller' => 'memberships', $this->data['RniDetail']['membership_id']));
			}
			else
			{
				$this->Session->setFlash(___('the rni detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->RniDetail->save($this->data))
			{
				$this->Session->setFlash(___('the rni detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view', 'controller' => 'memberships', $this->data['RniDetail']['membership_id']));
			}
			else
			{
				$this->Session->setFlash(___('the rni detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_rniDetail($id);
		
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->RniDetail->id = false;
			
			if ($this->RniDetail->save($this->data))
			{
				$this->Session->setFlash(___('the rni detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'view', 'controller' => 'memberships', $this->data['RniDetail']['membership_id']));
			}
			else
			{
				//reset id to copy
				$this->data['RniDetail'][$this->RniDetail->primaryKey] = $id;
				$this->Session->setFlash(___('the rni detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_rniDetail($id);
		
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->RniDetail->delete($id))
		{
			$this->Session->setFlash(___('rni detail deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('rni detail was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'RniDetails/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/RniDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RniDetail->deactivateAll(array('RniDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('rniDetails deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('rniDetails were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no rniDetail to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/RniDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RniDetail->activateAll(array('RniDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('rniDetails activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('rniDetails were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no rniDetail to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/RniDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RniDetail->deleteAll(array('RniDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('rniDetails deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('rniDetails were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no rniDetail to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_rniDetail($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->RniDetail->is_address_field_present()) {
                    $this->data = $this->RniDetail->read(null, $id);
                } else {
                    $this->data = $this->RniDetail->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('rniDetail', $this->data);
	}
	
	

	function client_index()
	{
		$this->RniDetail->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_rniDetail = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('rniDetails', $this->paginate($this->RniDetail, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $rniDetails = $this->RniDetail->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($rniDetails as $rniDetail) {     
                        foreach ($rniDetail as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_rniDetail[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_rniDetail[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('rniDetails', $data_rniDetail);                
                }
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function client_view($id = null)
	{
		$this->_set_rniDetail($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->RniDetail->save($this->data))
			{
				$this->Session->setFlash(___('the rni detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the rni detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->RniDetail->save($this->data))
			{
				$this->Session->setFlash(___('the rni detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the rni detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_rniDetail($id);
		
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->RniDetail->id = false;
			
			if ($this->RniDetail->save($this->data))
			{
				$this->Session->setFlash(___('the rni detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				//reset id to copy
				$this->data['RniDetail'][$this->RniDetail->primaryKey] = $id;
				$this->Session->setFlash(___('the rni detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_rniDetail($id);
		
		$memberships = $this->RniDetail->Membership->find('list');
		$this->set(compact('memberships'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for rni detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->RniDetail->delete($id))
		{
			$this->Session->setFlash(___('rni detail deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('rni detail was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'RniDetails/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/RniDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RniDetail->deactivateAll(array('RniDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('rniDetails deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('rniDetails were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no rniDetail to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/RniDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RniDetail->activateAll(array('RniDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('rniDetails activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('rniDetails were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no rniDetail to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/RniDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->RniDetail->deleteAll(array('RniDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('rniDetails deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('rniDetails were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no rniDetail to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>