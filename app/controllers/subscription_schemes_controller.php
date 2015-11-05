<?php
class SubscriptionSchemesController extends AppController {

	var $name = 'SubscriptionSchemes';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->SubscriptionScheme->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_subscriptionScheme = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('subscriptionSchemes', $this->paginate($this->SubscriptionScheme, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $subscriptionSchemes = $this->SubscriptionScheme->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($subscriptionSchemes as $subscriptionScheme) {     
                        foreach ($subscriptionScheme as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_subscriptionScheme[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_subscriptionScheme[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('subscriptionSchemes', $data_subscriptionScheme);                
                }
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}

	function admin_view($id = null)
	{
		$this->_set_subscriptionScheme($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->SubscriptionScheme->save($this->data))
			{
				$this->Session->setFlash(___('the subscription scheme has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the subscription scheme could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->SubscriptionScheme->save($this->data))
			{
				$this->Session->setFlash(___('the subscription scheme has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the subscription scheme could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_subscriptionScheme($id);
		
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->SubscriptionScheme->id = false;
			
			if ($this->SubscriptionScheme->save($this->data))
			{
				$this->Session->setFlash(___('the subscription scheme has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['SubscriptionScheme'][$this->SubscriptionScheme->primaryKey] = $id;
				$this->Session->setFlash(___('the subscription scheme could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_subscriptionScheme($id);
		
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->SubscriptionScheme->delete($id))
		{
			$this->Session->setFlash(___('subscription scheme deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('subscription scheme was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'SubscriptionSchemes/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/SubscriptionScheme/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SubscriptionScheme->deactivateAll(array('SubscriptionScheme.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no subscriptionScheme to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/SubscriptionScheme/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SubscriptionScheme->activateAll(array('SubscriptionScheme.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no subscriptionScheme to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/SubscriptionScheme/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SubscriptionScheme->deleteAll(array('SubscriptionScheme.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no subscriptionScheme to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_subscriptionScheme($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->SubscriptionScheme->is_address_field_present()) {
                    $this->data = $this->SubscriptionScheme->read(null, $id);
                } else {
                    $this->data = $this->SubscriptionScheme->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('subscriptionScheme', $this->data);
	}
	
	

	function client_index()
	{
		$this->SubscriptionScheme->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_subscriptionScheme = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('subscriptionSchemes', $this->paginate($this->SubscriptionScheme, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $subscriptionSchemes = $this->SubscriptionScheme->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($subscriptionSchemes as $subscriptionScheme) {     
                        foreach ($subscriptionScheme as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_subscriptionScheme[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_subscriptionScheme[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('subscriptionSchemes', $data_subscriptionScheme);                
                }
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}

	function client_view($id = null)
	{
		$this->_set_subscriptionScheme($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->SubscriptionScheme->save($this->data))
			{
				$this->Session->setFlash(___('the subscription scheme has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the subscription scheme could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->SubscriptionScheme->save($this->data))
			{
				$this->Session->setFlash(___('the subscription scheme has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the subscription scheme could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_subscriptionScheme($id);
		
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->SubscriptionScheme->id = false;
			
			if ($this->SubscriptionScheme->save($this->data))
			{
				$this->Session->setFlash(___('the subscription scheme has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['SubscriptionScheme'][$this->SubscriptionScheme->primaryKey] = $id;
				$this->Session->setFlash(___('the subscription scheme could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_subscriptionScheme($id);
		
		$qualifyingCirculations = $this->SubscriptionScheme->QualifyingCirculation->find('list');
		$saleTypes = $this->SubscriptionScheme->SaleType->find('list');
		$this->set(compact('qualifyingCirculations', 'saleTypes'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for subscription scheme', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->SubscriptionScheme->delete($id))
		{
			$this->Session->setFlash(___('subscription scheme deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('subscription scheme was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'SubscriptionSchemes/client_' . $this->data['_Tech']['action']))
	            {
	                $this->setAction('client_' . $this->data['_Tech']['action']);
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
                if(in_array(strtolower('client_' . $this->data['_Tech']['action']), $this->Auth->allowedActions))
                {
                    $this->setAction('client_' . $this->data['_Tech']['action']);
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
	    $ids = Set :: extract('/SubscriptionScheme/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SubscriptionScheme->deactivateAll(array('SubscriptionScheme.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no subscriptionScheme to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/SubscriptionScheme/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SubscriptionScheme->activateAll(array('SubscriptionScheme.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no subscriptionScheme to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/SubscriptionScheme/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SubscriptionScheme->deleteAll(array('SubscriptionScheme.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('subscriptionSchemes were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no subscriptionScheme to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>