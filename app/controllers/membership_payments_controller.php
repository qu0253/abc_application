<?php
class MembershipPaymentsController extends AppController {

	var $name = 'MembershipPayments';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->MembershipPayment->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_membershipPayment = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('membershipPayments', $this->paginate($this->MembershipPayment, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $membershipPayments = $this->MembershipPayment->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($membershipPayments as $membershipPayment) {     
                        foreach ($membershipPayment as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_membershipPayment[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_membershipPayment[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('membershipPayments', $data_membershipPayment);                
                }
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function admin_view($id = null)
	{
		$this->_set_membershipPayment($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->MembershipPayment->save($this->data))
			{
				$this->Session->setFlash(___('the membership payment has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the membership payment could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->MembershipPayment->save($this->data))
			{
				$this->Session->setFlash(___('the membership payment has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the membership payment could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membershipPayment($id);
		
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->MembershipPayment->id = false;
			
			if ($this->MembershipPayment->save($this->data))
			{
				$this->Session->setFlash(___('the membership payment has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['MembershipPayment'][$this->MembershipPayment->primaryKey] = $id;
				$this->Session->setFlash(___('the membership payment could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membershipPayment($id);
		
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->MembershipPayment->delete($id))
		{
			$this->Session->setFlash(___('membership payment deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('membership payment was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'MembershipPayments/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/MembershipPayment/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->MembershipPayment->deactivateAll(array('MembershipPayment.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('membershipPayments deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('membershipPayments were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membershipPayment to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/MembershipPayment/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->MembershipPayment->activateAll(array('MembershipPayment.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('membershipPayments activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('membershipPayments were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membershipPayment to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/MembershipPayment/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->MembershipPayment->deleteAll(array('MembershipPayment.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('membershipPayments deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('membershipPayments were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membershipPayment to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_membershipPayment($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->MembershipPayment->is_address_field_present()) {
                    $this->data = $this->MembershipPayment->read(null, $id);
                } else {
                    $this->data = $this->MembershipPayment->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('membershipPayment', $this->data);
	}
	
	

	function client_index()
	{
		$this->MembershipPayment->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_membershipPayment = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('membershipPayments', $this->paginate($this->MembershipPayment, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $membershipPayments = $this->MembershipPayment->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($membershipPayments as $membershipPayment) {     
                        foreach ($membershipPayment as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_membershipPayment[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_membershipPayment[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('membershipPayments', $data_membershipPayment);                
                }
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function client_view($id = null)
	{
		$this->_set_membershipPayment($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->MembershipPayment->save($this->data))
			{
				$this->Session->setFlash(___('the membership payment has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the membership payment could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->MembershipPayment->save($this->data))
			{
				$this->Session->setFlash(___('the membership payment has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the membership payment could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membershipPayment($id);
		
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->MembershipPayment->id = false;
			
			if ($this->MembershipPayment->save($this->data))
			{
				$this->Session->setFlash(___('the membership payment has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				//reset id to copy
				$this->data['MembershipPayment'][$this->MembershipPayment->primaryKey] = $id;
				$this->Session->setFlash(___('the membership payment could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membershipPayment($id);
		
		$memberships = $this->MembershipPayment->Membership->find('list');
		$this->set(compact('memberships'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for membership payment', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->MembershipPayment->delete($id))
		{
			$this->Session->setFlash(___('membership payment deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('membership payment was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->_login_redirect();
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'MembershipPayments/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/MembershipPayment/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->MembershipPayment->deactivateAll(array('MembershipPayment.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('membershipPayments deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('membershipPayments were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membershipPayment to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/MembershipPayment/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->MembershipPayment->activateAll(array('MembershipPayment.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('membershipPayments activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('membershipPayments were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membershipPayment to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/MembershipPayment/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->MembershipPayment->deleteAll(array('MembershipPayment.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('membershipPayments deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('membershipPayments were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membershipPayment to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>