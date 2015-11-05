<?php
class FeeSlabsController extends AppController {

	var $name = 'FeeSlabs';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

	function admin_index()
	{
		$this->FeeSlab->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_feeSlab = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('feeSlabs', $this->paginate($this->FeeSlab, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $feeSlabs = $this->FeeSlab->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($feeSlabs as $feeSlab) {     
                        foreach ($feeSlab as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_feeSlab[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_feeSlab[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('feeSlabs', $data_feeSlab);                
                }
		$membershipTypes = $this->FeeSlab->MembershipType->find('list');
		$frequencies = $this->FeeSlab->Frequency->find('list');
		$publicationTypes = $this->FeeSlab->PublicationType->find('list');
		$this->set(compact('membershipTypes', 'frequencies', 'publicationTypes'));
	}

	function admin_view($id = null)
	{
		$this->_set_feeSlab($id);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->FeeSlab->save($this->data))
			{
				$this->Session->setFlash(___('the fee slab has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the fee slab could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$membershipTypes = $this->FeeSlab->MembershipType->find('list');
		$frequencies = $this->FeeSlab->Frequency->find('list');
		$publicationTypes = $this->FeeSlab->PublicationType->find('list');
		$this->set(compact('membershipTypes', 'frequencies', 'publicationTypes'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for fee slab', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->FeeSlab->save($this->data))
			{
				$this->Session->setFlash(___('the fee slab has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the fee slab could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_feeSlab($id);
		
		$membershipTypes = $this->FeeSlab->MembershipType->find('list');
		$frequencies = $this->FeeSlab->Frequency->find('list');
		$publicationTypes = $this->FeeSlab->PublicationType->find('list');
		$this->set(compact('membershipTypes', 'frequencies', 'publicationTypes'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for fee slab', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->FeeSlab->id = false;
			
			if ($this->FeeSlab->save($this->data))
			{
				$this->Session->setFlash(___('the fee slab has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['FeeSlab'][$this->FeeSlab->primaryKey] = $id;
				$this->Session->setFlash(___('the fee slab could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_feeSlab($id);
		
		$membershipTypes = $this->FeeSlab->MembershipType->find('list');
		$frequencies = $this->FeeSlab->Frequency->find('list');
		$publicationTypes = $this->FeeSlab->PublicationType->find('list');
		$this->set(compact('membershipTypes', 'frequencies', 'publicationTypes'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for fee slab', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->FeeSlab->delete($id))
		{
			$this->Session->setFlash(___('fee slab deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('fee slab was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'FeeSlabs/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/FeeSlab/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->FeeSlab->deactivateAll(array('FeeSlab.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('feeSlabs deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('feeSlabs were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no feeSlab to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/FeeSlab/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->FeeSlab->activateAll(array('FeeSlab.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('feeSlabs activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('feeSlabs were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no feeSlab to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/FeeSlab/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->FeeSlab->deleteAll(array('FeeSlab.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('feeSlabs deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('feeSlabs were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no feeSlab to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_feeSlab($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->FeeSlab->is_address_field_present()) {
                    $this->data = $this->FeeSlab->read(null, $id);
                } else {
                    $this->data = $this->FeeSlab->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for fee slab', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('feeSlab', $this->data);
	}
	
	function client_get_fee_slab() {
            $membership_id = !empty($this->params['named']['membership_id']) ? $this->params['named']['membership_id'] : null;
            if ($this->params['prefix'] == 'client') {
//                $membership_id = $this->Session->read('Auth.Membership.id');
            }
            App::import('Model', 'Membership');
            $objMembership = new Membership();
            $options = array(
                                'conditions' => array('Membership.id' => $membership_id),
                                'contain' => array('PrintingCenter', 'PrintingCenter.PrintedAt'),
                            );
            $Membership = $objMembership->find('first', $options);
            if ($Membership['Membership']['membership_type_id'] == 1) {
                $conditions['membership_type_id'] = $Membership['Membership']['membership_type_id'];
                $conditions['annual_expenditure_from <='] = $Membership['Membership']['total_exp_on_press_adver_during_prev_yr'];
                $conditions['annual_expenditure_to >='] = $Membership['Membership']['total_exp_on_press_adver_during_prev_yr'];
            } else if ($Membership['Membership']['membership_type_id'] == 2) {
                $conditions['membership_type_id'] = $Membership['Membership']['membership_type_id'];
                $conditions['annual_turnover_from <='] = $Membership['Membership']['total_exp_on_press_adver_during_prev_yr'];;
                $conditions['annual_turnover_to >='] = $Membership['Membership']['total_exp_on_press_adver_during_prev_yr'];
            } else if ($Membership['Membership']['membership_type_id'] == 5) {
                $conditions['membership_type_id'] = $Membership['Membership']['membership_type_id'];
                $conditions['FrequencyType.id'] = $Membership['Membership']['frequency_type_id'];
                $conditions['publication_type_id'] = $Membership['Membership']['publication_type_id'];
                $feeSlabsTotal['entrance_fee'] = 0;
                $feeSlabsTotal['application_fee'] = 0;
                foreach ($Membership['PrintingCenter'] as $k => $pc) { 
                    $conditions['circulation_from <='] = $pc['claimed_circulation'];
                    $conditions['circulation_to >='] = $pc['claimed_circulation'];
                    $feeSlabsTemp = $this->_getFees($conditions);
                    if (!empty($feeSlabsTemp)) {
                        $feeSlabsTemp[0]['printed_at'] = $pc['PrintedAt']['city_name'];
                        $feeSlabsTotal['entrance_fee'] += $feeSlabsTemp[0]['entrance_fee']['orig_total_fee'];
                        $feeSlabsTotal['application_fee'] += $feeSlabsTemp[0]['application_fee']['orig_total_fee'];
                    }
                }
                App::import('Model', 'Tax');
                $objTax = new Tax();
                $resultTax = $objTax->getTaxes();
                $feeSlabs['entrance_fee'] = $this->_getTaxOnAmt($resultTax, $feeSlabsTotal['entrance_fee']);
                $feeSlabs['application_fee'] = $this->_getTaxOnAmt($resultTax, $feeSlabsTotal['application_fee']);
            } else if ($Membership['Membership']['membership_type_id'] == 3 || $Membership['Membership']['membership_type_id'] == 4) {
                $conditions['membership_type_id'] = $Membership['Membership']['membership_type_id'];
            }
            if ($Membership['Membership']['membership_type_id'] != 5) {
                $feeSlabs = $this->_getFees($conditions);
            }
            if (empty($feeSlabs)) {
                $feeSlabs = array();
            }
            header('Content-type: application/json');
            echo json_encode($feeSlabs);
            die();
        }
        function _getFees($conditions) {
            if (empty($conditions)) {
                return;
            }
            $this->FeeSlab->bindModel(array(
                'belongsTo' => array('FrequencyType' => array(
			'className' => 'FrequencyType',
			'foreignKey' => '',
			'conditions' => 'FeeSlab.frequency_id = FrequencyType.frequency_id',
			'fields' => '',
			'order' => '',
                        ),
                    ),
            ));
            $resFeeSlabs = $this->FeeSlab->find('all', array('conditions' => $conditions));
            App::import('Model', 'Tax');
            $objTax = new Tax();
            $resultTax = $objTax->getTaxes();
            $feeSlabs = array();
            $x = array();
            foreach ($resFeeSlabs as $k => $v) {
                if (!empty($v['FeeSlab']['entrance_fee'])) {
                    $x['entrance_fee'] = $this->_getTaxOnAmt($resultTax, $v['FeeSlab']['entrance_fee']);
                }
                if (!empty($v['FeeSlab']['application_fee'])) {
                    $x['application_fee'] = $this->_getTaxOnAmt($resultTax, $v['FeeSlab']['application_fee']);
                }
                $feeSlabs[] = $x;                 
            }
            return $feeSlabs;
        }
        
        function _getTaxOnAmt($resultTax, $amt) {
            $v = array();
            $tax1 = $resultTax[0]['Tax']['tax_percentage'] * $amt / 100;
                    $tax2 = $resultTax[1]['Tax']['tax_percentage'] * $tax1 / 100;
                    $tax3 = $resultTax[2]['Tax']['tax_percentage'] * $tax1 / 100;
                    $v[$resultTax[0]['Tax']['tax_name']] = $tax1;
                    $v[$resultTax[1]['Tax']['tax_name']] = $tax2;
                    $v[$resultTax[2]['Tax']['tax_name']] = $tax3;
                    $v['total_fee'] = 'Total INR ' . number_format($amt + $tax1 + $tax2 + $tax3, 2). ' (Fee INR ' . $amt . ' + ' .  $resultTax[0]['Tax']['tax_name'] . ' INR ' . ($tax1) . ' + ' . $resultTax[1]['Tax']['tax_name'] . ' INR ' .  ($tax2) . ' + ' . $resultTax[2]['Tax']['tax_name'] . ' INR ' .  ($tax3) .')';
                    $v['total_fee_amt'] = round($amt + $tax1 + $tax2 + $tax3, 2);
                    $v['orig_total_fee'] = $amt;
                    return $v;
            }
}
?>