<?php
class QualifyingCirculationsController extends AppController {

	var $name = 'QualifyingCirculations';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->QualifyingCirculation->recursive = 0;
                if (empty($filters) && isset($this->params['named']['qualifying_circulation_status_id']) && !empty($this->params['named']['qualifying_circulation_status_id'])) {
                    $this->data['QualifyingCirculation']['qualifying_circulation_status_id'] = $this->params['named']['qualifying_circulation_status_id'];
                }
                $filters = $this->AlaxosFilter->get_filter();
		$data_qualifyingCirculation = array();
                if(empty($this->params['named']['export_excel'])) {
                    $qualifyingCirculations = $this->paginate($this->QualifyingCirculation, $filters);
                    $this->set('qualifyingCirculations', $qualifyingCirculations);
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $qualifyingCirculations = $this->QualifyingCirculation->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($qualifyingCirculations as $qualifyingCirculation) {     
                        foreach ($qualifyingCirculation as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_qualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_qualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('qualifyingCirculations', $data_qualifyingCirculation);                
                }
                $this->_setSubDivData(true);
                                
                $printingCenters = $this->_getPcToNamed();
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$qualifyingCirculationStatuses = $this->QualifyingCirculation->QualifyingCirculationStatus->find('list');
		$this->set(compact('printingCenters', 'regularPeriods', 'qualifyingCirculationStatuses'));
	}

	function admin_view($id = null)
	{
		$this->_set_qualifyingCirculation($id);
	}

	function admin_add()
	{
                $options = array();
		if (!empty($this->data))
		{
			if ($this->QualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list');
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$this->set(compact('printingCenters', 'regularPeriods'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->QualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_qualifyingCirculation($id);
		$qualifyingCirculationStatuses = $this->QualifyingCirculation->QualifyingCirculationStatus->find('list');
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list');
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
                $recheckAuditorBranches = $this->_getAuditorBranch();
		$this->set(compact('qualifyingCirculationStatuses', 'printingCenters', 'regularPeriods', 'recheckAuditorBranches'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->QualifyingCirculation->id = false;
			
			if ($this->QualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['QualifyingCirculation'][$this->QualifyingCirculation->primaryKey] = $id;
				$this->Session->setFlash(___('the qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_qualifyingCirculation($id);
		
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list');
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$this->set(compact('printingCenters', 'regularPeriods'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->QualifyingCirculation->delete($id))
		{
			$this->Session->setFlash(___('qualifying circulation deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('qualifying circulation was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'QualifyingCirculations/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/QualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculation->deactivateAll(array('QualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculation to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/QualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculation->activateAll(array('QualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculation to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/QualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculation->deleteAll(array('QualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculation to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_qualifyingCirculation($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->QualifyingCirculation->is_address_field_present()) {
                    $this->data = $this->QualifyingCirculation->read(null, $id);
                } else {
                    $this->data = $this->QualifyingCirculation->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('qualifyingCirculation', $this->data);
	}
	
	

	function client_index()
	{
		$this->QualifyingCirculation->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_qualifyingCirculation = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('qualifyingCirculations', $this->paginate($this->QualifyingCirculation, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $qualifyingCirculations = $this->QualifyingCirculation->find('all', array_merge_recursive($options, array('conditions' => $filters)));
                    foreach ($qualifyingCirculations as $qualifyingCirculation) {     
                        foreach ($qualifyingCirculation as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_qualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_qualifyingCirculation[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('qualifyingCirculations', $data_qualifyingCirculation);                
                }
		$this->_setSubDivData(true);
		$options = array('conditions' => array('id' => $this->data['QualifyingCirculation']['printing_center_id']));
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list', $options);		
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$this->set(compact('printingCenters', 'regularPeriods'));
	}

	function client_view($id = null)
	{
		$this->_set_qualifyingCirculation($id);
	}

	function client_add()
	{
                $options = array();
		if (!empty($this->data))
		{
			if ($this->QualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
                $this->_setSubDivData(true);
		$options = array('conditions' => array('id' => $this->data['QualifyingCirculation']['printing_center_id']));
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list', $options);
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$this->set(compact('printingCenters', 'regularPeriods'));
	}

	function client_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
		}
		
		if (!empty($this->data))
		{
			if ($this->QualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
                                if(empty($this->params['named'])) {
                                    $this->params['named'] = array();
                                }
				$this->redirect(array_merge(array('controller' => 'dynamic_pages', 'action' => 'showpage', 'client' => true, 'yellow_form'), $this->params['named']));
			}
			else
			{
				$this->Session->setFlash(___('the qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_qualifyingCirculation($id);
		
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list');
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$this->set(compact('printingCenters', 'regularPeriods'));
	}

	function client_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->QualifyingCirculation->id = false;
			
			if ($this->QualifyingCirculation->save($this->data))
			{
				$this->Session->setFlash(___('the qualifying circulation has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['QualifyingCirculation'][$this->QualifyingCirculation->primaryKey] = $id;
				$this->Session->setFlash(___('the qualifying circulation could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_qualifyingCirculation($id);
		
		$printingCenters = $this->QualifyingCirculation->PrintingCenter->find('list');
		$regularPeriods = $this->QualifyingCirculation->RegularPeriod->find('list');
		$this->set(compact('printingCenters', 'regularPeriods'));
	}
	
	function client_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for qualifying circulation', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->QualifyingCirculation->delete($id))
		{
			$this->Session->setFlash(___('qualifying circulation deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('qualifying circulation was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function client_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'QualifyingCirculations/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/QualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculation->deactivateAll(array('QualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculation to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function client_activateAll()
	{
	    $ids = Set :: extract('/QualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculation->activateAll(array('QualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculation to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function client_deleteAll()
	{
	    $ids = Set :: extract('/QualifyingCirculation/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->QualifyingCirculation->deleteAll(array('QualifyingCirculation.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('qualifyingCirculations were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no qualifyingCirculation to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        function _approval() {
            return 1;
        }
        function client_submit_for_approval() {            
            $regularPeriodId = $this->_setRegularPeriods();
            $qualifyingCirculation = $this->_setQualifyingCirculation($this->Session->read('PrintingCenter.id'), $regularPeriodId);
            $clear_all_steps = $this->_approval($qualifyingCirculation);
            $qualifying_circulation_status_id = $qualifyingCirculation['QualifyingCirculation']['qualifying_circulation_status_id'];
            if ($clear_all_steps == 1 && ($qualifying_circulation_status_id < 1 || empty($qualifying_circulation_status_id))) {
                $this->data['QualifyingCirculation']['id'] = $qualifyingCirculation['QualifyingCirculation']['id'];
                $this->data['QualifyingCirculation']['qualifying_circulation_status_id'] = 2;
                App::import('Model', 'RegularPeriod');
                $RegularPeriod = new RegularPeriod();
                $op = array('conditions' => array('RegularPeriod.id' => $regularPeriodId));
                $objRegularPeriod = $RegularPeriod->find('first', $op);
                if (strtotime($objRegularPeriod['RegularPeriod']['cut_off_date']) < strtotime(date('Y-m-d'))) {
                    $this->data['QualifyingCirculation']['qualifying_circulation_status_id'] = 8;
                }
                if ($this->QualifyingCirculation->save($this->data, array('fieldList' => array('qualifying_circulation_status_id')))) {
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
                        $data['QualifyingCirculation']['id'] = $this->data['QualifyingCirculation']['id'];
                        $this->sendEmail($data['User']['email_address'], 'membership_incoming_form_submitted', $data);
                    }
                    $this->redirect('/dynamic_pages/showpage/yellow_form/');
                }
            }
            $this->_login_redirect();
        }
        
        function client_print_for_approval() {
            $qualifying_circulation_id = $this->params['named']['qualifying_circulation_id'];
            $printing_centers = $this->Session->read('Auth.PrintingCenter');
            $printing_center_ids = Set::extract('/id', $printing_centers);
            App::import('Model', 'QualifyingCirculation');
            $QualifyingCirculation = new QualifyingCirculation();
            $options = array(
                'conditions' => array(
                    'QualifyingCirculation.id' => $qualifying_circulation_id,
                    'QualifyingCirculation.printing_center_id' => $printing_center_ids,
                ),
            );
            $qualifyingCirculation = $QualifyingCirculation->find('first', $options);
            App::import('Model', 'Address');
            $objAddress = new Address();
            $options = array(                
                'conditions' => array(
                    'Address.id' => $qualifyingCirculation['DuplicateCopy']['0']['address_id'],
                ),
            );
            $addr = $objAddress->find('first', $options);
            $qualifyingCirculation['DuplicateCopy'][0]['Address'] = $addr['Address'];
            $qualifyingCirculation['DuplicateCopy'][0]['City'] = $addr['City'];
            $qualifyingCirculation['DuplicateCopy'][0]['State'] = $addr['State'];
            $qualifyingCirculation['DuplicateCopy'][0]['Zone'] = $addr['Zone'];
            $qualifyingCirculation['DuplicateCopy'][0]['Country'] = $addr['Country'];
            // Printing Center Details
            App::import('Model', 'PrintingCenter');
            $objPrintingCenter = new PrintingCenter();
            $optionsPrintingCenter = array(
                'contain' => array(
                    'Address', 'Membership', 'PrintedAt', 'Membership.Publication', 'Membership.Edition'
                ),
                'conditions' => array(
                    'PrintingCenter.id' => $qualifyingCirculation['PrintingCenter']['id'],
                ),
            );
            $printingCenter = $objPrintingCenter->find('first', $optionsPrintingCenter);
            unset($qualifyingCirculation['PrintingCenter']['PrintingCenter']);
            unset($qualifyingCirculation['PrintingCenter']['QualifyingCirculation']);
            unset($qualifyingCirculation['PrintingCenter']['CreatedBy']);
            unset($qualifyingCirculation['PrintingCenter']['ModifiedBy']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['User']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['Address']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['Proposer1Representative']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['Proposer2Representative']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['CreatedBy']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['ModifiedBy']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['MembershipPayment']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['PrintingCenter']);
            unset($qualifyingCirculation['PrintingCenter']['Membership']['Representative']);

            // HoldingCompany.Address
            App::import('Model', 'HoldingCompany');
            $objHoldingCompany = new HoldingCompany();
            $optionsHoldingCompany = array(
                'contain' => array(
                    'Address'
                ),
                'conditions' => array(
                    'HoldingCompany.id' => $printingCenter['Membership']['HoldingCompany'][0]['id'],
                ),
            );
            $holdingCompany = $objHoldingCompany->find('first', $optionsHoldingCompany);
            // PrintingCenterAuditorBranch
            App::import('Model', 'PrintingCenterAuditorBranch');
            $objPrintingCenterAuditorBranch = new PrintingCenterAuditorBranch();
            $optionsPrintingCenterAuditorBranch = array(
                'contain' => array(
                    'AuditorBranch', 'AuditorBranch.AuditorFirm'
                ),
                'conditions' => array(
                    'PrintingCenterAuditorBranch.printing_center_id' => $printingCenter['PrintingCenter']['id'],
                    'PrintingCenterAuditorBranch.regular_period_id' => $qualifyingCirculation['QualifyingCirculation']['regular_period_id'],
                ),
            );
            $printingCenterAuditorBranch = $objPrintingCenterAuditorBranch->find('first', $optionsPrintingCenterAuditorBranch);
            $options = array(
                'conditions' => array(
                    'Address.id' => $printingCenterAuditorBranch['AuditorBranch']['Address']['id'],
                ),
                'contain' => array(
                    'Country', 'Zone', 'State', 'District', 'City'
                ),
            );
            $addr = $objAddress->find('first', $options);
            $printingCenterAuditorBranch['AuditorBranch']['Address'] = $addr['Address'];
            $printingCenterAuditorBranch['AuditorBranch']['Address']['Country'] = $addr['Country'];
            $printingCenterAuditorBranch['AuditorBranch']['Address']['Zone'] = $addr['Zone'];
            $printingCenterAuditorBranch['AuditorBranch']['Address']['State'] = $addr['State'];
            $printingCenterAuditorBranch['AuditorBranch']['Address']['District'] = $addr['District'];
            $printingCenterAuditorBranch['AuditorBranch']['Address']['City'] = $addr['City'];
            App::import('Model', 'SaleType');
            App::import('Model', 'TradeTerm');
            $SaleType = new SaleType();
            $TradeTerm = new TradeTerm();
            $saleTypes = $SaleType->find('list');
            $subscriptionTypes = $TradeTerm->SubscriptionType->find('list');
            App::import('Model', 'City');
            $objCities = new City();
            $cities = $objCities->find('all', array(
                            'conditions' => array(
                                'City.id' => Set::extract('/city_id', $qualifyingCirculation['WhiteForm'])
                            )
                        )
                    );
            $this->set(compact('saleTypes', 'subscriptionTypes', 'qualifyingCirculation', 'cities', 'printingCenter', 'holdingCompany', 'printingCenterAuditorBranch'));
        }
	
	function admin_login_to_edit($id = null) {            
            if (!empty($id)) {
                $options = array(
                        'conditions' => array('QualifyingCirculation.id' => $id),
                        'contain' => array('PrintingCenter', 'PrintingCenter.Membership', 'PrintingCenter.Membership.User'),
                    );
                $q = $this->QualifyingCirculation->find('first', $options);
                $user_id = Set::extract('/PrintingCenter/Membership/user_id', $q);
                App::import('Model', 'User');
                $User = new User();
                $objUser = $User->read(null, $user_id['0'], 1);
                $this->Session->write('Access_admin_permitted', $objUser);
                $this->redirect('/users/logout');
            }
        }
}
?>