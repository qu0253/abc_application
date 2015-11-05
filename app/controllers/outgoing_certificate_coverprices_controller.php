<?php
class OutgoingCertificateCoverpricesController extends AppController {

	var $name = 'OutgoingCertificateCoverprices';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->OutgoingCertificateCoverprice->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_outgoingCertificateCoverprice = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('outgoingCertificateCoverprices', $this->paginate($this->OutgoingCertificateCoverprice, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $outgoingCertificateCoverprices = $this->OutgoingCertificateCoverprice->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($outgoingCertificateCoverprices as $outgoingCertificateCoverprice) {     
                        foreach ($outgoingCertificateCoverprice as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_outgoingCertificateCoverprice[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_outgoingCertificateCoverprice[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('outgoingCertificateCoverprices', $data_outgoingCertificateCoverprice);                
                }
		$outgoingCertificates = $this->OutgoingCertificateCoverprice->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateCoverprice->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateCoverprice->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateCoverprice->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCoverprice->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}

	function admin_view($id = null)
	{
		$this->_set_outgoingCertificateCoverprice($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificateCoverprice->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate coverprice has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate coverprice could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$outgoingCertificates = $this->OutgoingCertificateCoverprice->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateCoverprice->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateCoverprice->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateCoverprice->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCoverprice->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate coverprice', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificateCoverprice->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate coverprice has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate coverprice could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificateCoverprice($id);
		
		$outgoingCertificates = $this->OutgoingCertificateCoverprice->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateCoverprice->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateCoverprice->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateCoverprice->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCoverprice->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate coverprice', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->OutgoingCertificateCoverprice->id = false;
			
			if ($this->OutgoingCertificateCoverprice->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate coverprice has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['OutgoingCertificateCoverprice'][$this->OutgoingCertificateCoverprice->primaryKey] = $id;
				$this->Session->setFlash(___('the outgoing certificate coverprice could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificateCoverprice($id);
		
		$outgoingCertificates = $this->OutgoingCertificateCoverprice->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateCoverprice->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateCoverprice->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateCoverprice->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateCoverprice->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate coverprice', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->OutgoingCertificateCoverprice->delete($id))
		{
			$this->Session->setFlash(___('outgoing certificate coverprice deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('outgoing certificate coverprice was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'OutgoingCertificateCoverprices/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/OutgoingCertificateCoverprice/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateCoverprice->deactivateAll(array('OutgoingCertificateCoverprice.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCoverprices deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCoverprices were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateCoverprice to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/OutgoingCertificateCoverprice/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateCoverprice->activateAll(array('OutgoingCertificateCoverprice.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCoverprices activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCoverprices were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateCoverprice to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/OutgoingCertificateCoverprice/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateCoverprice->deleteAll(array('OutgoingCertificateCoverprice.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCoverprices deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateCoverprices were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateCoverprice to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_outgoingCertificateCoverprice($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->OutgoingCertificateCoverprice->is_address_field_present()) {
                    $this->data = $this->OutgoingCertificateCoverprice->read(null, $id);
                } else {
                    $this->data = $this->OutgoingCertificateCoverprice->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for outgoing certificate coverprice', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('outgoingCertificateCoverprice', $this->data);
	}
	
	
}
?>