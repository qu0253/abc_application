<?php
class OutgoingCertificateCombosController extends AppController {

	var $name = 'OutgoingCertificateCombos';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->OutgoingCertificateCombo->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_outgoingCertificateCombo = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('outgoingCertificateCombos', $this->paginate($this->OutgoingCertificateCombo, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $outgoingCertificateCombos = $this->OutgoingCertificateCombo->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($outgoingCertificateCombos as $outgoingCertificateCombo) {     
                        foreach ($outgoingCertificateCombo as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_outgoingCertificateCombo[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_outgoingCertificateCombo[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('outgoingCertificateCombos', $data_outgoingCertificateCombo);                
                }
		$outgoingCertificates = $this->OutgoingCertificateCombo->OutgoingCertificate->find('list');
		$createdBies = $this->OutgoingCertificateCombo->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCombo->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'createdBies', 'modifiedBies'));
	}

	function admin_view($id = null)
	{
		$this->_set_outgoingCertificateCombo($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificateCombo->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate combo has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate combo could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$outgoingCertificates = $this->OutgoingCertificateCombo->OutgoingCertificate->find('list');
		$createdBies = $this->OutgoingCertificateCombo->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCombo->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'createdBies', 'modifiedBies'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate combo', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificateCombo->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate combo has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate combo could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificateCombo($id);
		
		$outgoingCertificates = $this->OutgoingCertificateCombo->OutgoingCertificate->find('list');
		$createdBies = $this->OutgoingCertificateCombo->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCombo->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'createdBies', 'modifiedBies'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate combo', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->OutgoingCertificateCombo->id = false;
			
			if ($this->OutgoingCertificateCombo->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate combo has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['OutgoingCertificateCombo'][$this->OutgoingCertificateCombo->primaryKey] = $id;
				$this->Session->setFlash(___('the outgoing certificate combo could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificateCombo($id);
		
		$outgoingCertificates = $this->OutgoingCertificateCombo->OutgoingCertificate->find('list');
		$createdBies = $this->OutgoingCertificateCombo->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCombo->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'createdBies', 'modifiedBies'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate combo', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->OutgoingCertificateCombo->delete($id))
		{
			$this->Session->setFlash(___('outgoing certificate combo deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('outgoing certificate combo was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'OutgoingCertificateCombos/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/OutgoingCertificateCombo/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateCombo->deactivateAll(array('OutgoingCertificateCombo.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCombos deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCombos were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateCombo to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/OutgoingCertificateCombo/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateCombo->activateAll(array('OutgoingCertificateCombo.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCombos activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCombos were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateCombo to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/OutgoingCertificateCombo/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateCombo->deleteAll(array('OutgoingCertificateCombo.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCombos deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCombos were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateCombo to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_outgoingCertificateCombo($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->OutgoingCertificateCombo->is_address_field_present()) {
                    $this->data = $this->OutgoingCertificateCombo->read(null, $id);
                } else {
                    $this->data = $this->OutgoingCertificateCombo->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for outgoing certificate combo', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('outgoingCertificateCombo', $this->data);
	}
	
	
}
?>