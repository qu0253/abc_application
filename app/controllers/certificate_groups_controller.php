<?php
class CertificateGroupsController extends AppController {

	var $name = 'CertificateGroups';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{                
                $this->CertificateGroup->contain = array('Language', 'FrequencyType', 'Publication', 'Membership');
                $this->setMemObjForAdmin();
                $this->data['CertificateGroup']['frequency_type_id'] = $this->viewVars['Membership']['Membership']['frequency_type_id'];
                $this->data['CertificateGroup']['publication_id'] = $this->viewVars['Membership']['Membership']['publication_id'];
                $this->data['CertificateGroup']['language_id'] = $this->viewVars['Membership']['Membership']['language_id'];
		$filters = $this->AlaxosFilter->get_filter();
		$data_certificateGroup = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('certificateGroups', $this->paginate($this->CertificateGroup, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $certificateGroups = $this->CertificateGroup->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($certificateGroups as $certificateGroup) {     
                        foreach ($certificateGroup as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_certificateGroup[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_certificateGroup[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('certificateGroups', $data_certificateGroup);                
                }
                App::import('Model', 'City');                
                foreach($this->viewVars['certificateGroups'] as $k1 => $certificateGroups) {
                    if(!empty($certificateGroups['Membership'])) {
                        foreach($certificateGroups['Membership'] as $k2 => $membership) {                            
                            $options = array('conditions' => array('City.id' => $membership['edition_id']));
                            $objCity = new City();
                            $objCity->recursive = 0;
                            $edition = $objCity->find('first', $options);
                            $this->viewVars['certificateGroups'][$k1]['Membership'][$k2] = array_merge($this->viewVars['certificateGroups'][$k1]['Membership'][$k2], $edition);
                        }
                    }
                }
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}

	function admin_view($id = null)
	{
		$this->_set_certificateGroup($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->CertificateGroup->save($this->data))
			{
				$this->Session->setFlash(___('the certificate group has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the certificate group could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		$this->setMemObjForAdmin();
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->CertificateGroup->save($this->data))
			{
				$this->Session->setFlash(___('the certificate group has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the certificate group could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_certificateGroup($id);
                $this->setMemObjForAdmin();
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->CertificateGroup->id = false;
			
			if ($this->CertificateGroup->save($this->data))
			{
				$this->Session->setFlash(___('the certificate group has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['CertificateGroup'][$this->CertificateGroup->primaryKey] = $id;
				$this->Session->setFlash(___('the certificate group could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_certificateGroup($id);
		
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->CertificateGroup->delete($id))
		{
			$this->Session->setFlash(___('certificate group deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('certificate group was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'CertificateGroups/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/CertificateGroup/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->CertificateGroup->deactivateAll(array('CertificateGroup.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('certificateGroups deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('certificateGroups were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no certificateGroup to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/CertificateGroup/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->CertificateGroup->activateAll(array('CertificateGroup.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('certificateGroups activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('certificateGroups were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no certificateGroup to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/CertificateGroup/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->CertificateGroup->deleteAll(array('CertificateGroup.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('certificateGroups deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('certificateGroups were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no certificateGroup to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_certificateGroup($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->CertificateGroup->is_address_field_present()) {
                    $this->data = $this->CertificateGroup->read(null, $id);
                } else {
                    $this->data = $this->CertificateGroup->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('certificateGroup', $this->data);
	}
	
	

	function client_index()
	{
                $this->CertificateGroup->contain = array('Language', 'FrequencyType', 'Publication', 'Membership');
		$filters = $this->AlaxosFilter->get_filter();
		$data_certificateGroup = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('certificateGroups', $this->paginate($this->CertificateGroup, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $certificateGroups = $this->CertificateGroup->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($certificateGroups as $certificateGroup) {     
                        foreach ($certificateGroup as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_certificateGroup[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_certificateGroup[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('certificateGroups', $data_certificateGroup);                
                }
                App::import('Model', 'City');                
                foreach($this->viewVars['certificateGroups'] as $k1 => $certificateGroups) {
                    if(!empty($certificateGroups['Membership'])) {
                        foreach($certificateGroups['Membership'] as $k2 => $membership) {                            
                            $options = array('conditions' => array('City.id' => $membership['edition_id']));
                            $objCity = new City();
                            $objCity->recursive = 0;
                            $edition = $objCity->find('first', $options);
                            $this->viewVars['certificateGroups'][$k1]['Membership'][$k2] = array_merge($this->viewVars['certificateGroups'][$k1]['Membership'][$k2], $edition);
                        }
                    }
                }
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}

	function client_view($id = null)
	{
		$this->_set_certificateGroup($id);
	}

	function client_add()
	{
		if (!empty($this->data))
		{
			if ($this->CertificateGroup->save($this->data))
			{
				$this->Session->setFlash(___('the certificate group has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the certificate group could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->CertificateGroup->save($this->data))
			{
				$this->Session->setFlash(___('the certificate group has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the certificate group could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_certificateGroup($id);
		
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->CertificateGroup->id = false;
			
			if ($this->CertificateGroup->save($this->data))
			{
				$this->Session->setFlash(___('the certificate group has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['CertificateGroup'][$this->CertificateGroup->primaryKey] = $id;
				$this->Session->setFlash(___('the certificate group could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_certificateGroup($id);
		
		$languages = $this->CertificateGroup->Language->find('list');
		$frequencyTypes = $this->CertificateGroup->FrequencyType->find('list');
		$publications = $this->CertificateGroup->Publication->find('list');
		$this->set(compact('languages', 'frequencyTypes', 'publications'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->CertificateGroup->delete($id))
		{
			$this->Session->setFlash(___('certificate group deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('certificate group was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'CertificateGroups/client_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/CertificateGroup/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->CertificateGroup->deactivateAll(array('CertificateGroup.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('certificateGroups deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('certificateGroups were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no certificateGroup to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/CertificateGroup/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->CertificateGroup->activateAll(array('CertificateGroup.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('certificateGroups activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('certificateGroups were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no certificateGroup to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/CertificateGroup/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->CertificateGroup->deleteAll(array('CertificateGroup.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('certificateGroups deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('certificateGroups were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no certificateGroup to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        function _joinGroup($mem_id, $certificate_group_id, $leave) {
            if(!empty($mem_id) && (!empty($certificate_group_id) || $leave == 1)) {
                $this->_join($mem_id, $certificate_group_id);
                if (!$leave) {
                    $this->Session->setFlash(___('joined certificate group', true), 'flash_message', array('plugin' => 'alaxos'));
                } else {
                    $this->Session->setFlash(___('Left certificate group', true), 'flash_message', array('plugin' => 'alaxos'));
                }
            } else {
                $this->Session->setFlash(___('could not joined certificate group', true), 'flash_error', array('plugin' => 'alaxos'));
            }
            $this->redirect(array('action' => 'index'));
        }
        function admin_join($certificate_group_id = null) {
            $arr = $this->getNamedParamsAsArr();
            $mem_id = $arr['membership_id'];
            $leave = !empty($this->params['named']['leave']) ? $this->params['named']['leave'] : null;
            $this->_joinGroup($mem_id, $certificate_group_id, $leave);
        }		
        function client_join($certificate_group_id = null) {
            $mem_id = $this->Session->read('Auth.Membership.id');
            $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
            $leave = !empty($this->params['named']['leave']) ? $this->params['named']['leave'] : null;
            if ($this->isEditable($mem_status_id)) {
                $this->_joinGroup($mem_id, $certificate_group_id, $leave);
            }
        }		
}
?>