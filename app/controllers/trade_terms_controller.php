<?php
class TradeTermsController extends AppController {

	var $name = 'TradeTerms';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->TradeTerm->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_tradeTerm = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('tradeTerms', $this->paginate($this->TradeTerm, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $tradeTerms = $this->TradeTerm->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($tradeTerms as $tradeTerm) {     
                        foreach ($tradeTerm as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_tradeTerm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_tradeTerm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('tradeTerms', $data_tradeTerm);                
                }
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}

	function admin_view($id = null)
	{
		$this->_set_tradeTerm($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->TradeTerm->save($this->data))
			{
				$this->Session->setFlash(___('the trade term has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the trade term could not be saved. Duplicate values.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->TradeTerm->save($this->data))
			{
				$this->Session->setFlash(___('the trade term has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the trade term could not be saved. Duplicate values.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_tradeTerm($id);
		
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->TradeTerm->id = false;
			
			if ($this->TradeTerm->save($this->data))
			{
				$this->Session->setFlash(___('the trade term has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['TradeTerm'][$this->TradeTerm->primaryKey] = $id;
				$this->Session->setFlash(___('the trade term could not be saved. Duplicate values.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_tradeTerm($id);
		
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->TradeTerm->delete($id))
		{
			$this->Session->setFlash(___('trade term deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('trade term was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'TradeTerms/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/TradeTerm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->TradeTerm->deactivateAll(array('TradeTerm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tradeTerms deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tradeTerms were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tradeTerm to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/TradeTerm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->TradeTerm->activateAll(array('TradeTerm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tradeTerms activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tradeTerms were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tradeTerm to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/TradeTerm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->TradeTerm->deleteAll(array('TradeTerm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tradeTerms deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tradeTerms were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tradeTerm to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_tradeTerm($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->TradeTerm->is_address_field_present()) {
                    $this->data = $this->TradeTerm->read(null, $id);
                } else {
                    $this->data = $this->TradeTerm->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('tradeTerm', $this->data);
	}
	
	

	function client_index()
	{
		$this->TradeTerm->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_tradeTerm = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('tradeTerms', $this->paginate($this->TradeTerm, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $tradeTerms = $this->TradeTerm->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($tradeTerms as $tradeTerm) {     
                        foreach ($tradeTerm as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_tradeTerm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_tradeTerm[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('tradeTerms', $data_tradeTerm);                
                }
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}

	function client_view($id = null)
	{
		$this->_set_tradeTerm($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->TradeTerm->save($this->data))
			{
				$this->Session->setFlash(___('the trade term has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
//				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
                                $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the trade term could not be saved. Duplicate values.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                            $this->params['named'] = array();
                        }
//                        $this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
                        $this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->TradeTerm->save($this->data))
			{
				$this->Session->setFlash(___('the trade term has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
//				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
                                $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the trade term could not be saved. Duplicate values.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_tradeTerm($id);
		
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                            $this->params['named'] = array();
                        }
//                        $this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
                        $this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->TradeTerm->id = false;
			
			if ($this->TradeTerm->save($this->data))
			{
				$this->Session->setFlash(___('the trade term has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
//				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
                                $this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['TradeTerm'][$this->TradeTerm->primaryKey] = $id;
				$this->Session->setFlash(___('the trade term could not be saved. Duplicate values.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_tradeTerm($id);
		
		$saleTypes = $this->TradeTerm->SaleType->find('list');
		$subscriptionTypes = $this->TradeTerm->SubscriptionType->find('list');
		$qualifyingCirculations = $this->TradeTerm->QualifyingCirculation->find('list');
		$this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculations'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for trade term', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->TradeTerm->delete($id))
		{
			$this->Session->setFlash(___('trade term deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('trade term was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'TradeTerms/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/TradeTerm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->TradeTerm->deactivateAll(array('TradeTerm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tradeTerms deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tradeTerms were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tradeTerm to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/TradeTerm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->TradeTerm->activateAll(array('TradeTerm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tradeTerms activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tradeTerms were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tradeTerm to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/TradeTerm/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->TradeTerm->deleteAll(array('TradeTerm.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('tradeTerms deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('tradeTerms were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no tradeTerm to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	
}
?>