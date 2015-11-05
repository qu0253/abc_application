<?php
class MembershipsController extends AppController {

	var $name = 'Memberships';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->Membership->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_membership = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('memberships', $this->paginate($this->Membership, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $memberships = $this->Membership->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($memberships as $membership) {     
                        foreach ($membership as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_membership[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_membership[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('memberships', $data_membership);                
                }
		$membershipTypes = $this->Membership->MembershipType->find('list');
		$users = $this->Membership->User->find('list');
		$publications = $this->Membership->Publication->find('list');
//		$editions = $this->Membership->Edition->find('list');
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}

	function admin_view($id = null)
	{
		$this->_set_membership($id);
	}

	function admin_add()
	{
                $membership_type_id = !empty($this->params['named']['membership_type_id']) ? $this->params['named']['membership_type_id'] : 1;
		if (!empty($this->data))
		{
			if ($this->Membership->save($this->data))
			{
				$this->Session->setFlash(___('the membership has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the membership could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		if (!empty($membership_type_id)) {
                    $this->data['Membership']['membership_type_id'] = $membership_type_id;
                }
		$membershipTypes = $this->Membership->MembershipType->find('list');
                $options = array('fields' => array('user_id', 'user_id'));
                $memberUsers = $this->Membership->find('list', $options);
                $options = array('conditions' => array('NOT' => array('id' => $memberUsers)));
		$users = $this->Membership->User->find('list', $options);
		$publications = $this->Membership->Publication->find('list');
//		$editions = $this->Membership->Edition->find('list');
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'addresses', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->Membership->save($this->data))
			{
				$this->Session->setFlash(___('the membership has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the membership could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membership($id);
		
		$membershipTypes = $this->Membership->MembershipType->find('list');
		$users = $this->Membership->User->find('list');
		$publications = $this->Membership->Publication->find('list');
		$editions = $this->Membership->Edition->find('list', array('conditions' => array('id' => $this->data['Membership']['edition_id'])));
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$proposer1Representatives = $this->Membership->Proposer1Representative->find('list');
                $proposer2Representatives = $proposer1Representatives;
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Membership->id = false;
			
			if ($this->Membership->save($this->data))
			{
				$this->Session->setFlash(___('the membership has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Membership'][$this->Membership->primaryKey] = $id;
				$this->Session->setFlash(___('the membership could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membership($id);
		
		$membershipTypes = $this->Membership->MembershipType->find('list');
                $options = array('fields' => array('user_id', 'user_id'));
                $memberUsers = $this->Membership->find('list', $options);
                $options = array('conditions' => array('NOT' => array('id' => $memberUsers)));
		$users = $this->Membership->User->find('list', $options);
		$publications = $this->Membership->Publication->find('list');
		$editions = $this->Membership->Edition->find('list', array('conditions' => array('id' => $this->data['Membership']['edition_id'])));
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$proposer1Representatives = $this->Membership->Proposer1Representative->find('list');
                $proposer2Representatives = $proposer1Representatives;
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'addresses', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Membership->delete($id))
		{
			$this->Session->setFlash(___('membership deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('membership was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Memberships/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Membership/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Membership->deactivateAll(array('Membership.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('memberships deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('memberships were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membership to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/Membership/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Membership->activateAll(array('Membership.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('memberships activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('memberships were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membership to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/Membership/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Membership->deleteAll(array('Membership.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('memberships deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('memberships were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membership to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_membership($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->Membership->is_address_field_present()) {
                    $this->data = $this->Membership->read(null, $id);
                } else {
                    $this->data = $this->Membership->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('membership', $this->data);
	}
	
	

	function client_index()
	{
		$this->Membership->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_membership = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('memberships', $this->paginate($this->Membership, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $memberships = $this->Membership->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($memberships as $membership) {     
                        foreach ($membership as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_membership[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_membership[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('memberships', $data_membership);                
                }
		$membershipTypes = $this->Membership->MembershipType->find('list');
		$users = $this->Membership->User->find('list');
		$publications = $this->Membership->Publication->find('list');
//		$editions = $this->Membership->Edition->find('list');
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$proposer1Representatives = $this->Membership->Proposer1Representative->find('list');
//		$proposer2Representatives = $this->Membership->Proposer2Representative->find('list');
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}

	function client_view($id = null)
	{
		$this->_set_membership($id);
	}

        function _get_user_options() {
            $options = array(
                            'fields' => array(
                                'user_id',
                            ),
                        );
            $exclude_registered_users = $this->Membership->find('list', $options);            
            return array(
                            'conditions' => array(
                                'NOT' => array('id ' => array_values($exclude_registered_users)),
                            ),
                        );             
        }
	function client_add()
	{                
                $membership_type_id = !empty($this->params['named']['membership_type_id']) ? $this->params['named']['membership_type_id'] : $this->data['Membership']['membership_type_id'];
                $publication_id = !empty($this->params['named']['publication_id']) ? $this->params['named']['publication_id'] : null;
                if (!empty($this->data))
		{                        
			if ($this->Membership->save($this->data))
			{
				$this->Session->setFlash(___('the membership has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the membership could not be saved. Published From / Edition already exists for Publication. Contact Administrator.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
                if (!empty($publication_id) && is_numeric($publication_id) && $publication_id > 0) {
                    $this->data['Membership']['publication_id'] = $publication_id;
                }
                if (!empty($membership_type_id)) {
                    $this->data['Membership']['membership_type_id'] = $membership_type_id;
                } else if (empty($this->data['Membership']['membership_type_id'])) {
                    $this->redirect('/');
                }
                $options = $this->_get_user_options(); 
//		$users = $this->Membership->User->find('list', $options);                
		$publications = $this->Membership->Publication->find('list');
                $membershipTypes = $this->Membership->MembershipType->find('list');
//		$editions = $this->Membership->Edition->find('list');
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
                $proposer1Representatives = $this->get_primary_representative(1);
                $proposer2Representatives = $proposer1Representatives;
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'addresses', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
                
                if (empty($addresses['Address']['email'])) {
                    $this->data['Address']['email'] = $this->Session->read('Auth.User.email_address');
                }
	}

	function client_edit($id = null)
	{
                $publication_id = !empty($this->params['named']['publication_id']) ? $this->params['named']['publication_id'] : null;
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->_login_redirect();
		}
		
		if (!empty($this->data))
		{
			if ($this->Membership->save($this->data))
			{
				$this->Session->setFlash(___('the membership has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->_login_redirect();
			}
			else
			{
				$this->Session->setFlash(___('the membership could not be saved. Published From / Edition already exists for Publication. Contact Administrator.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membership($id);
		if ($publication_id) {
                    $this->data['Membership']['publication_id'] = $publication_id;
                }
		$membershipTypes = $this->Membership->MembershipType->find('list');
//		$users = $this->Membership->User->find('list');
		$publications = $this->Membership->Publication->find('list');
//		$editions = $this->Membership->Edition->find('list');
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$proposer1Representatives = $this->get_primary_representative(1);
                $proposer2Representatives = $proposer1Representatives;
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'proposer2Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->Membership->id = false;
			
			if ($this->Membership->save($this->data))
			{
				$this->Session->setFlash(___('the membership has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['Membership'][$this->Membership->primaryKey] = $id;
				$this->Session->setFlash(___('the membership could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_membership($id);
		
		$membershipTypes = $this->Membership->MembershipType->find('list');
//		$users = $this->Membership->User->find('list');
		$publications = $this->Membership->Publication->find('list');
		$editions = $this->Membership->Edition->find('list');
		//$addresses = $this->Membership->Address->find('list');
		$publicationTypes = $this->Membership->PublicationType->find('list');
		$languages = $this->Membership->Language->find('list');
		$frequencyTypes = $this->Membership->FrequencyType->find('list');
		$categories = $this->Membership->Category->find('list');
		$proposer1Representatives = $this->Membership->Proposer1Representative->find('list');
                $proposer2Representatives = $proposer1Representatives;
		$companyTypes = $this->Membership->CompanyType->find('list');
		
		$memberStatuses = $this->Membership->MemberStatus->find('list');
		$reasons = $this->Membership->Reason->find('list');
		$this->set(compact('membershipTypes', 'users', 'publications', 'editions', 'addresses', 'publicationTypes', 'languages', 'frequencyTypes', 'categories', 'proposer1Representatives', 'companyTypes', 'holdingCompanies', 'memberStatuses', 'reasons'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for membership', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->Membership->delete($id))
		{
			$this->Session->setFlash(___('membership deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('membership was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'Memberships/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/Membership/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Membership->deactivateAll(array('Membership.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('memberships deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('memberships were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membership to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/Membership/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Membership->activateAll(array('Membership.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('memberships activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('memberships were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membership to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/Membership/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->Membership->deleteAll(array('Membership.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('memberships deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('memberships were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no membership to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	function client_proposed_representative() {
            $proposer1Representatives = array();
            $edition_id = !empty($this->params['named']['edition_id']) ? $this->params['named']['edition_id'] : null;
            if(!empty($edition_id)) {
                $options = array('conditions' => array('edition_id' => $edition_id));
                $proposer1Representatives = $this->Membership->Proposer1Representative->find('list', $options);
            }
            header('Content-type: application/json');
            echo json_encode($proposer1Representatives);
            die();
        }
        function _approval() {            
            $mem_type_id = $this->Session->read('Auth.Membership.membership_type_id');            
            $representative_type_ids = Set::extract('/representative_type_id', $this->Session->read('Auth.Representative'));
            $printingCentersIds = Set::extract('/membership_id', $this->Session->read('Auth.PrintingCenter'));
            $holdingCompanyId = Set::extract('/id', $this->Session->read('Auth.HoldingCompany'));
            $rniDetailsId = Set::extract('/id', $this->Session->read('Auth.RniDetail'));
            $applied_for_rni_no = $this->Session->read('Auth.Membership.applied_for_rni_no');
            $clear_all_steps = 1;
            if (!in_array(1, $representative_type_ids)) {      
                $clear_all_steps = 0;
            }
            if (!in_array(2, $representative_type_ids)) {
                $clear_all_steps = 0;
            }
            if ($mem_type_id == 5 && empty($printingCentersIds)) {
                $clear_all_steps = 0;
            }
            if ($mem_type_id == 5 && empty($rniDetailsId)) {
                if (!$applied_for_rni_no) {
                    $clear_all_steps = 0;
                }
            }
            if ($mem_type_id == 5 && empty($holdingCompanyId)) {
                $clear_all_steps = 0;
            }
            return $clear_all_steps;
        }
        function client_submit_for_approval() {
            $mem_id = $this->Session->read('Auth.Membership.id');
            $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
            $clear_all_steps = $this->_approval();
            if ($clear_all_steps == 1 && ($mem_status_id < 2 || empty($mem_status_id))) {
                $this->data['Membership']['id'] = $mem_id;
                $this->data['Membership']['member_status_id'] = 2;
                if ($this->Membership->save($this->data, array('fieldList' => array('member_status_id')))) {
                    $this->Session->setFlash(___('Your application has been submitted.', true), 'flash_message', array('plugin' => 'alaxos'));
                    $config = $this->getConfiguration();
                    $options['conditions'] = array(
                        'User.id' => $config['membership_form_submitted'],
                        );
                    App::import('Model', 'User');
                    $objUser = new User();
                    $account = $objUser->find('first', $options);
                    if (!empty($account['User']['email_address'])) {
                        $data = array();
                        $data['User']['first_name'] = $account['User']['first_name'];
                        $data['User']['last_name'] = $account['User']['last_name'];
                        $data['User']['email_address'] = $account['User']['email_address'];
                        $data['Membership']['id'] = $this->data['Membership']['id'];
                        $this->sendEmail($data['User']['email_address'], 'membership_form_submitted', $data);
                    }
//                    $this->redirect('/client/memberships/print_for_approval/print:1');
                }
            }
            $this->_login_redirect();
        }
        function client_print_for_approval() {
            $clear_all_steps = $this->_approval();
            $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
            $mem_id = $this->Session->read('Auth.Membership.id');
            // http://mantis.quadzero.in/view.php?id=869
            if (1 || $clear_all_steps == 1 && $mem_status_id == 2) {
                $this->layout = false;
                $session = $this->Session->read();
                $contain = array(
                                'MembershipType', 'User', 'Publication', 'Edition', 'Address', 'PublicationType', 'Language', 'FrequencyType', 'Category', 'Proposer1Representative', 'Proposer2Representative', 'MemberStatus',
                                'HoldingCompany', 'HoldingCompany.Address', 'HoldingCompany.Address.Country', 'HoldingCompany.Address.Zone', 'HoldingCompany.Address.State', 'HoldingCompany.Address.District', 'HoldingCompany.Address.City', 
                                'Representative', 'Representative.RepresentativeType', 'Representative.Address', 'Representative.Address.Country', 'Representative.Address.Zone', 'Representative.Address.State', 'Representative.Address.District', 'Representative.Address.City',  
                                'PrintingCenter.PrintedAt', 'PrintingCenter.Address', 'PrintingCenter.Address.Country', 'PrintingCenter.Address.Zone', 'PrintingCenter.Address.State', 'PrintingCenter.Address.District', 'PrintingCenter.Address.City',  
                                'MembershipPayment', 
                                'RniDetail', 
                                'Edition'
                                );
                $membership = $this->Membership->find('first', array('conditions' => array('Membership.user_id' => $session['Auth']['User']['id']), 'contain' => $contain));
                $this->set('print', $membership);
            } else {
                $this->_login_redirect();
            }
        }
        function client_applied_for_rni_no($bool) {
            if ($bool == 'true') {
                $bool = 1;
            } else {
                $bool = 0;
            }
            $this->Membership->id = $this->Session->read('Auth.Membership.id');
            $this->Membership->saveField('applied_for_rni_no', $bool);
            $this->_login_redirect();
        }
        
        function get_primary_representative($ret = 0) {
            $final = array();
            $options['conditions'] = array();
            if (!empty($this->params['named'])) {
                foreach($this->params['named'] as $k => $v) {
                    $this->params['named'][$k] = str_replace("%---", "%", $v);
                }
            }
//            $options['conditions'] = array('Membership.member_status_id' => 3, 'representative_type_id' => 1);
            $options['conditions'] = array_merge($options['conditions'], $this->params['named']);
            $options['contain'] = array('Membership.Edition', 'Membership.Publication');            
            $proposer1Representatives = $this->Membership->Proposer1Representative->find('list', $options);
            foreach($proposer1Representatives as $k => $v) {
                if ($v) {
                    $final[] = array(
                                    'id' => $k,
                                    'representative_name' => $v,
                                );
                }
            }
            if ($ret) {
                return $proposer1Representatives;
            }
            $final[] = $final;
            header('Content-type: application/json');
            echo json_encode($final);
            die();
        }
}
?>