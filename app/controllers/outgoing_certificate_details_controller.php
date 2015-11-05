<?php
class OutgoingCertificateDetailsController extends AppController {

	var $name = 'OutgoingCertificateDetails';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->OutgoingCertificateDetail->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_outgoingCertificateDetail = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('outgoingCertificateDetails', $this->paginate($this->OutgoingCertificateDetail, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $outgoingCertificateDetails = $this->OutgoingCertificateDetail->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($outgoingCertificateDetails as $outgoingCertificateDetail) {     
                        foreach ($outgoingCertificateDetail as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_outgoingCertificateDetail[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_outgoingCertificateDetail[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('outgoingCertificateDetails', $data_outgoingCertificateDetail);                
                }
		$outgoingCertificates = $this->OutgoingCertificateDetail->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateDetail->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateDetail->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateDetail->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateDetail->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}

	function admin_view($id = null)
	{
		$this->_set_outgoingCertificateDetail($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificateDetail->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$outgoingCertificates = $this->OutgoingCertificateDetail->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateDetail->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateDetail->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateDetail->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateDetail->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificateDetail->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificateDetail($id);
		
		$outgoingCertificates = $this->OutgoingCertificateDetail->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateDetail->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateDetail->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateDetail->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateDetail->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->OutgoingCertificateDetail->id = false;
			
			if ($this->OutgoingCertificateDetail->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate detail has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['OutgoingCertificateDetail'][$this->OutgoingCertificateDetail->primaryKey] = $id;
				$this->Session->setFlash(___('the outgoing certificate detail could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificateDetail($id);
		
		$outgoingCertificates = $this->OutgoingCertificateDetail->OutgoingCertificate->find('list');
		$editions = $this->OutgoingCertificateDetail->Edition->find('list');
		$printingCenters = $this->OutgoingCertificateDetail->PrintingCenter->find('list');
		$createdBies = $this->OutgoingCertificateDetail->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificateDetail->ModifiedBy->find('list');
		$this->set(compact('outgoingCertificates', 'editions', 'printingCenters', 'createdBies', 'modifiedBies'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate detail', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->OutgoingCertificateDetail->delete($id))
		{
			$this->Session->setFlash(___('outgoing certificate detail deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('outgoing certificate detail was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'OutgoingCertificateDetails/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/OutgoingCertificateDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateDetail->deactivateAll(array('OutgoingCertificateDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateDetails deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateDetails were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateDetail to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/OutgoingCertificateDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateDetail->activateAll(array('OutgoingCertificateDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateDetails activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateDetails were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateDetail to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/OutgoingCertificateDetail/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificateDetail->deleteAll(array('OutgoingCertificateDetail.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateDetails deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificateDetails were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificateDetail to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_outgoingCertificateDetail($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->OutgoingCertificateDetail->is_address_field_present()) {
                    $this->data = $this->OutgoingCertificateDetail->read(null, $id);
                } else {
                    $this->data = $this->OutgoingCertificateDetail->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for outgoing certificate detail', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('outgoingCertificateDetail', $this->data);
	}
	
	
}
?>