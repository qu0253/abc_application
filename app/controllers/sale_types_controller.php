<?php
class SaleTypesController extends AppController {

	var $name = 'SaleTypes';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->SaleType->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_saleType = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('saleTypes', $this->paginate($this->SaleType, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $saleTypes = $this->SaleType->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($saleTypes as $saleType) {     
                        foreach ($saleType as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_saleType[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_saleType[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('saleTypes', $data_saleType);                
                }
	}

	function admin_view($id = null)
	{
		$this->_set_saleType($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->SaleType->save($this->data))
			{
				$this->Session->setFlash(___('the sale type has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the sale type could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for sale type', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->SaleType->save($this->data))
			{
				$this->Session->setFlash(___('the sale type has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the sale type could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_saleType($id);
		
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for sale type', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->SaleType->id = false;
			
			if ($this->SaleType->save($this->data))
			{
				$this->Session->setFlash(___('the sale type has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['SaleType'][$this->SaleType->primaryKey] = $id;
				$this->Session->setFlash(___('the sale type could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_saleType($id);
		
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for sale type', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->SaleType->delete($id))
		{
			$this->Session->setFlash(___('sale type deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('sale type was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'SaleTypes/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/SaleType/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SaleType->deactivateAll(array('SaleType.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('saleTypes deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('saleTypes were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no saleType to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/SaleType/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SaleType->activateAll(array('SaleType.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('saleTypes activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('saleTypes were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no saleType to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/SaleType/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->SaleType->deleteAll(array('SaleType.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('saleTypes deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('saleTypes were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no saleType to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_saleType($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->SaleType->is_address_field_present()) {
                    $this->data = $this->SaleType->read(null, $id);
                } else {
                    $this->data = $this->SaleType->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for sale type', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('saleType', $this->data);
	}
		
	
}
?>