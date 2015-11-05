<?php
class OutgoingCertificatesController extends AppController {

	var $name = 'OutgoingCertificates';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter');

    function admin_generate($qcId) {
        App::import('Model', 'QualifyingCirculation');
        $qualifyingCirculationObj = new QualifyingCirculation();
        $qcOptions = array('contain' => array('PrintingCenter', 'PrintingCenter.Membership'), 'conditions' => array('QualifyingCirculation.active' => 1, 'QualifyingCirculation.id' => $qcId));
        $qc = $qualifyingCirculationObj->find('first', $qcOptions);
        $pubId = $qc['PrintingCenter']['Membership']['publication_id'];
        $editionId = $qc['PrintingCenter']['Membership']['edition_id'];
        $regularPeriodId = $qc['QualifyingCirculation']['regular_period_id'];

        App::import('Model', 'Membership');
        $membershipObj = new Membership();
        $memOptions = array('contain' => array('PrintingCenter.id'), 'conditions' => array('Membership.active' => 1, 'Membership.publication_id' => $pubId, 'Membership.edition_id' => $editionId,), 'fields' => array('Membership.id', 'Membership.certificate_group_id'));
        $members = $membershipObj->find('all', $memOptions);
        $printingCenterIds = Set::extract('/PrintingCenter/id', $members);
        $certificateGroups = Set::extract('/Membership/certificate_group_id', $members);

        if (!empty($certificateGroups[0])) {
            $membershipObj = new Membership();
            $memOptions = array('contain' => array('PrintingCenter.id'), 'conditions' => array('Membership.active' => 1, 'Membership.certificate_group_id' => $certificateGroups), 'fields' => array('Membership.id'));
            $members = $membershipObj->find('all', $memOptions);
            $printingCenterIds = Set::extract('/PrintingCenter/id', $members);
        }
        $qualifyingCirculationObj = new QualifyingCirculation();
        // qualifying_circulation_status_id needs to be in Under Consideration, Approved 1, Approved 2, Approved 3, Certified
        $qcOptions = array('contain' => array('NonQualifyingCirculation', 'PrintingCenter', 'PrintingCenter.Membership', 'PrintingCenter.Membership', 'Combo', 'CoverPrice'), 'conditions' => array('QualifyingCirculation.active' => 1, 'QualifyingCirculation.regular_period_id' => $regularPeriodId, 'QualifyingCirculation.printing_center_id' => $printingCenterIds, 'QualifyingCirculation.qualifying_circulation_status_id' => array(3, 4, 5, 6, 11)));
        $allQC = $qualifyingCirculationObj->find('all', $qcOptions);

        $publicationIds = Set::extract('/PrintingCenter/Membership/publication_id', $allQC);
        $this->data['OutgoingCertificate']['publication_id'] = $publicationIds[0];
        $languageIds = Set::extract('/PrintingCenter/Membership/language_id', $allQC);
        $this->data['OutgoingCertificate']['language_id'] = $languageIds[0];
        $frequencyTypeIds = Set::extract('/PrintingCenter/Membership/frequency_type_id', $allQC);
        $this->data['OutgoingCertificate']['frequency_type_id'] = $frequencyTypeIds[0];

        $this->data['OutgoingCertificate']['regular_period_id'] = $regularPeriodId;

        App::import('Model', 'HoldingCompany');
        $objHoldingCompany = new HoldingCompany();
        $qcHC = array('conditions' => array('HoldingCompany.active' => 1, 'HoldingCompany.membership_id' => $allQC[0]['PrintingCenter']['Membership']['id']));
        $holdingCompany = $objHoldingCompany->find('first', $qcHC);
        $this->data['OutgoingCertificate']['address'] = $holdingCompany['Address']['address_line_1'] . ' ' . $holdingCompany['Address']['address_line_2'] . ', ' . $holdingCompany['City']['city_name'] . ', ' . $holdingCompany['District']['district_name'] . ', ' . $holdingCompany['State']['state_name'] . ' - ' . $holdingCompany['Address']['pin'] ;

        $this->data['OutgoingCertificate']['published_printed'] = ''; // pending

        $this->data['OutgoingCertificate']['single_copy'] = implode(', ', Set::extract('/QualifyingCirculation/single_copy', $allQC));

        $this->data['OutgoingCertificate']['auditors'] = ''; // pending
        $this->data['OutgoingCertificate']['previous_1_regular_period_id'] = $regularPeriodId - 1;
        $this->data['OutgoingCertificate']['previous_2_regular_period_id'] = $regularPeriodId - 2;
        $this->data['OutgoingCertificate']['combo_copy'] = implode(', ', Set::extract('/QualifyingCirculation/combo_copy', $allQC));
        $this->data['OutgoingCertificate']['total_qualifying_sales'] = array_sum(Set::extract('/QualifyingCirculation/total_monthly_qualifying_circulation', $allQC));
        $this->data['OutgoingCertificate']['total_number_of_publishing_days'] = array_sum(Set::extract('/QualifyingCirculation/total_number_of_publishing_days', $allQC));
        $this->data['OutgoingCertificate']['average_total_qualifying_sales'] = array_sum(Set::extract('/QualifyingCirculation/total_ss_sa_average_monthly_qualifying_circulation_1', $allQC));
        $this->data['OutgoingCertificate']['ss_sa_single_copy_sales'] = array_sum(Set::extract('/QualifyingCirculation/ss_sa_single_copy_sales', $allQC));
        $this->data['OutgoingCertificate']['ss_sa_combo_sales_copies'] = array_sum(Set::extract('/QualifyingCirculation/ss_sa_combo_sales_copies', $allQC));
        $this->data['OutgoingCertificate']['ss_sa_single_copy_subscription'] = array_sum(Set::extract('/QualifyingCirculation/ss_sa_single_copy_subscription', $allQC));
        $this->data['OutgoingCertificate']['ss_sa_joint_subscription_copies'] = array_sum(Set::extract('/QualifyingCirculation/ss_sa_joint_subscription_copies', $allQC));
        $this->data['OutgoingCertificate']['ss_sa_institutional_subscription_copies'] = array_sum(Set::extract('/QualifyingCirculation/ss_sa_institutional_subscription_copies', $allQC));
        $this->data['OutgoingCertificate']['ss_sa_institutional_sale_copies'] = array_sum(Set::extract('/QualifyingCirculation/ss_sa_institutional_sale_copies', $allQC));
        $this->data['OutgoingCertificate']['total_ss_sa_average_monthly_qualifying_circulation_1'] = array_sum(Set::extract('/QualifyingCirculation/total_ss_sa_average_monthly_qualifying_circulation_1', $allQC));
        $this->data['OutgoingCertificate']['date_issue'] = date('d-m-Y');

        $this->data['OutgoingCertificate']['single_nnr_10'] = array_sum(Set::extract('/QualifyingCirculation/single_nnr_10', $allQC));
        $this->data['OutgoingCertificate']['single_nnr_20'] = array_sum(Set::extract('/QualifyingCirculation/single_nnr_20', $allQC));
        $this->data['OutgoingCertificate']['single_nnr_100'] = array_sum(Set::extract('/QualifyingCirculation/single_nnr_100', $allQC));
        $this->data['OutgoingCertificate']['single_nnr_below_nnr_within_qualifying'] = array_sum(Set::extract('/QualifyingCirculation/single_nnr_below_nnr_within_qualifying', $allQC));

        $this->data['OutgoingCertificate']['combo_nnr_10'] = array_sum(Set::extract('/QualifyingCirculation/combo_nnr_10', $allQC));
        $this->data['OutgoingCertificate']['combo_nnr_20'] = array_sum(Set::extract('/QualifyingCirculation/combo_nnr_20', $allQC));
        $this->data['OutgoingCertificate']['combo_nnr_100'] = array_sum(Set::extract('/QualifyingCirculation/combo_nnr_100', $allQC));
        $this->data['OutgoingCertificate']['combo_nnr_below_nnr_within_qualifying'] = array_sum(Set::extract('/QualifyingCirculation/combo_nnr_below_nnr_within_qualifying', $allQC));

        $this->data['OutgoingCertificate']['nss_incentive_single_nil'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_single_nil', $allQC));
        $this->data['OutgoingCertificate']['nss_incentive_single_50'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_single_50', $allQC));
        $this->data['OutgoingCertificate']['nss_incentive_single_100'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_single_100', $allQC));

        $this->data['OutgoingCertificate']['nss_incentive_combo_nil'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_combo_nil', $allQC));
        $this->data['OutgoingCertificate']['nss_incentive_combo_50'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_combo_50', $allQC));
        $this->data['OutgoingCertificate']['nss_incentive_combo_100'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_combo_100', $allQC));

        $this->data['OutgoingCertificate']['nss_incentive_instn_nil'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_instn_nil', $allQC));
        $this->data['OutgoingCertificate']['nss_incentive_instn_50'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_instn_50', $allQC));
        $this->data['OutgoingCertificate']['nss_incentive_instn_100'] = array_sum(Set::extract('/QualifyingCirculation/nss_incentive_instn_100', $allQC));

        $this->data['OutgoingCertificate']['instn_airlines'] = array_sum(Set::extract('/QualifyingCirculation/instn_airlines', $allQC));
        $this->data['OutgoingCertificate']['instn_body_corporates'] = array_sum(Set::extract('/QualifyingCirculation/instn_body_corporates', $allQC));
        $this->data['OutgoingCertificate']['instn_edu_inst'] = array_sum(Set::extract('/QualifyingCirculation/instn_edu_inst', $allQC));
        $this->data['OutgoingCertificate']['instn_hotels'] = array_sum(Set::extract('/QualifyingCirculation/instn_hotels', $allQC));
        $this->data['OutgoingCertificate']['instn_libraries'] = array_sum(Set::extract('/QualifyingCirculation/instn_libraries', $allQC));
        $this->data['OutgoingCertificate']['instn_others'] = array_sum(Set::extract('/QualifyingCirculation/instn_others', $allQC));
        $this->data['OutgoingCertificate']['total_corporates_average_monthly_qualifying_circulation'] = array_sum(Set::extract('/QualifyingCirculation/total_corporates_average_monthly_qualifying_circulation', $allQC));

        $this->data['OutgoingCertificate']['single_non_qualifying_sales_other_than_nnr'] = array_sum(Set::extract('/NonQualifyingCirculation/single_non_qualifying_sales_other_than_nnr', $allQC));
        $this->data['OutgoingCertificate']['combo_non_qualifying_sales_other_than_nnr'] = array_sum(Set::extract('/NonQualifyingCirculation/combo_non_qualifying_sales_other_than_nnr', $allQC));
        $this->data['OutgoingCertificate']['subscription_non_qualifying_sales_other_than_nnr'] = array_sum(Set::extract('/NonQualifyingCirculation/subscription_non_qualifying_sales_other_than_nnr', $allQC));
        $this->data['OutgoingCertificate']['institutional_non_qualifying_sales_other_than_nnr'] = array_sum(Set::extract('/NonQualifyingCirculation/institutional_non_qualifying_sales_other_than_nnr', $allQC));
        $this->data['OutgoingCertificate']['single_single_copy_sales'] = array_sum(Set::extract('/NonQualifyingCirculation/single_single_copy_sales', $allQC));
        $this->data['OutgoingCertificate']['combo_combo_sales_copies'] = array_sum(Set::extract('/NonQualifyingCirculation/combo_combo_sales_copies', $allQC));
        $this->data['OutgoingCertificate']['subscription_single_copy_subscription'] = array_sum(Set::extract('/NonQualifyingCirculation/subscription_single_copy_subscription', $allQC));
        $this->data['OutgoingCertificate']['subscription_joint_subscription_copies'] = array_sum(Set::extract('/NonQualifyingCirculation/subscription_joint_subscription_copies', $allQC));
        $this->data['OutgoingCertificate']['institutional_institutional_subscription_copies'] = array_sum(Set::extract('/NonQualifyingCirculation/institutional_institutional_subscription_copies', $allQC));
        $this->data['OutgoingCertificate']['institutional_institutional_sale_copies'] = array_sum(Set::extract('/NonQualifyingCirculation/institutional_institutional_sale_copies', $allQC));
        $this->data['OutgoingCertificate']['free_copies_free_copies'] = array_sum(Set::extract('/NonQualifyingCirculation/free_copies_free_copies', $allQC));
        debug($this->OutgoingCertificate->invalidFields());
        $this->OutgoingCertificate->save($this->data);
        $outgoingCertificateId = $this->OutgoingCertificate->getInsertID();
        foreach ($allQC as $k => $qcForm) {
            $data = array();
            $data['OutgoingCertificateDetail']['id'] = null;
            $data['OutgoingCertificateDetail']['outgoing_certificate_id'] = $outgoingCertificateId;
            $data['OutgoingCertificateDetail']['edition_id'] = $qcForm['PrintingCenter']['Membership']['edition_id'];
            $data['OutgoingCertificateDetail']['printing_center_id'] = $qcForm['PrintingCenter']['id'];
            $data['OutgoingCertificateDetail']['total_qualifying_sales'] = $qcForm['QualifyingCirculation']['total_monthly_qualifying_circulation'];
            $data['OutgoingCertificateDetail']['total_number_of_publishing_days'] = $qcForm['QualifyingCirculation']['total_number_of_publishing_days'];
            $data['OutgoingCertificateDetail']['average_total_qualifying_sales'] = $qcForm['QualifyingCirculation']['total_ss_sa_average_monthly_qualifying_circulation_1'];
            $this->OutgoingCertificate->OutgoingCertificateDetail->save($data);
            debug($this->OutgoingCertificate->OutgoingCertificateDetail->invalidFields());
            foreach($qcForm['CoverPrice'] as $kCoverPrice => $CoverPriceDetails) {
                $dataCoverprices['OutgoingCertificateCoverprice']['id'] = null;
                $dataCoverprices['OutgoingCertificateCoverprice']['outgoing_certificate_id'] = $outgoingCertificateId;
                $dataCoverprices['OutgoingCertificateCoverprice']['edition_id'] = $qcForm['PrintingCenter']['Membership']['edition_id'];
                $dataCoverprices['OutgoingCertificateCoverprice']['printing_center_id'] = $qcForm['PrintingCenter']['id'];
                $dataCoverprices['OutgoingCertificateCoverprice']['cover_price_id'] = $CoverPriceDetails['id'];
                $dataCoverprices['OutgoingCertificateCoverprice']['no_of_publishing_days'] = $CoverPriceDetails['no_of_publishing_days'];
                $dataCoverprices['OutgoingCertificateCoverprice']['cover_price'] = $CoverPriceDetails['cover_price'];
                $dataCoverprices['OutgoingCertificateCoverprice']['total_copies'] = $CoverPriceDetails['total_copies'];
                $dataCoverprices['OutgoingCertificateCoverprice']['copies_per_publishing_day'] = $CoverPriceDetails['copies_per_publishing_day'];
                $dataCoverprices['OutgoingCertificateCoverprice']['single_combo_other_variant'] = $CoverPriceDetails['single_combo_other_variant'];
                $this->OutgoingCertificate->OutgoingCertificateCoverprice->save($dataCoverprices);
                debug($this->OutgoingCertificate->OutgoingCertificateCoverprice->invalidFields());
            }
            
            $dataCombo = array();
            foreach ($qcForm['Combo'] as $ck => $comboForm) {
                $comboName = trim($comboForm['combo_name']);
                $dataCombo[$comboName]['OutgoingCertificateCombo']['id'] = null;
                $dataCombo[$comboName]['OutgoingCertificateCombo']['combo_id'] = $comboForm['id'];
                $dataCombo[$comboName]['OutgoingCertificateCombo']['combo_name'] = $comboName;
                $dataCombo[$comboName]['OutgoingCertificateCombo']['outgoing_certificate_id'] = $outgoingCertificateId;
                $dataCombo[$comboName]['OutgoingCertificateCombo']['cover_price'] .= $comboForm['cover_price'] . ', ';
                $dataCombo[$comboName]['OutgoingCertificateCombo']['combo'] += $comboForm['combo'];
            }
        }
        foreach ($dataCombo as $combo_name => $comboDetails) {
            $comboDetails['OutgoingCertificateCombo']['cover_price'] = trim($comboDetails['OutgoingCertificateCombo']['cover_price']);
            $comboDetails['OutgoingCertificateCombo']['cover_price'] = substr($comboDetails['OutgoingCertificateCombo']['cover_price'], 0, strlen($comboDetails['OutgoingCertificateCombo']['cover_price']) - 1);
            $this->OutgoingCertificate->OutgoingCertificateCombo->save($comboDetails);
        }
        $resOutgoingCertificateCoverprice = $this->OutgoingCertificate->OutgoingCertificateCoverprice->find('all', array('contain' => array('Edition', 'PrintingCenter.PrintedAt'), 'conditions' => array('OutgoingCertificateCoverprice.outgoing_certificate_id' => $outgoingCertificateId)));
        $editionIds = array_unique(Set::extract('/Edition/id', $resOutgoingCertificateCoverprice));
        foreach($editionIds as $k => $editionIdToBeSearched) {
            $edition = array_unique(Set::extract('/Edition[id=' . $editionIdToBeSearched . ']/city_name', $resOutgoingCertificateCoverprice));
            $printedAt = array_unique(Set::extract('/Edition[id=' . $editionIdToBeSearched . ']/../PrintingCenter/PrintedAt/city_name', $resOutgoingCertificateCoverprice));
            $editionDetails[] = $edition[0] . ' Edition Printed At ' . implode(', ', $printedAt);
        }
//        $this->OutgoingCertificate->find('first', array('conditions' => array('OutgoingCertificate.id' => $outgoingCertificateId)))
        $this->data['OutgoingCertificate']['id'] = $outgoingCertificateId;
        $this->data['OutgoingCertificate']['published_printed'] = implode('; ', $editionDetails);
        $this->OutgoingCertificate->save($this->data);
        debug($this->OutgoingCertificate->invalidFields());
    }
	function admin_index()
	{
		$this->OutgoingCertificate->recursive = 0;
		$filters = $this->AlaxosFilter->get_filter();
		$data_outgoingCertificate = array();
                if(empty($this->params['named']['export_excel'])) {
                    $this->set('outgoingCertificates', $this->paginate($this->OutgoingCertificate, $filters));
                } else {
                    Configure::write('debug', 0);
                    $options = array();
                    $this->set('export_to_excel', 1);
                    $i = 0;
                    $outgoingCertificates = $this->OutgoingCertificate->find('all', array_merge_recursive($options, array('conditions' => $filters)));                    
                    foreach ($outgoingCertificates as $outgoingCertificate) {     
                        foreach ($outgoingCertificate as $indx => $module) {
                            foreach ($module as $k => $v) {
                                $arr_fields_in_xls = array();
                                if(!empty($arr_fields_in_xls) && in_array($k , $arr_fields_in_xls[$indx])) {
                                    $data_outgoingCertificate[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                } else {
                                    $data_outgoingCertificate[$i][ __($indx, true) . ' ' . __($k, true)] = $module[$k];
                                }
                            } 
                        }
                        $i++;
                    }
                    $this->set('outgoingCertificates', $data_outgoingCertificate);                
                }
		$publications = $this->OutgoingCertificate->Publication->find('list');
		$languages = $this->OutgoingCertificate->Language->find('list');
		$frequencyTypes = $this->OutgoingCertificate->FrequencyType->find('list');
		$regularPeriods = $this->OutgoingCertificate->RegularPeriod->find('list');
		$certificateStatuses = $this->OutgoingCertificate->CertificateStatus->find('list');
		$previous1RegularPeriods = $this->OutgoingCertificate->Previous1RegularPeriod->find('list');
		$previous2RegularPeriods = $this->OutgoingCertificate->Previous2RegularPeriod->find('list');
		$createdBies = $this->OutgoingCertificate->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificate->ModifiedBy->find('list');
		$this->set(compact('publications', 'languages', 'frequencyTypes', 'regularPeriods', 'certificateStatuses', 'previous1RegularPeriods', 'previous2RegularPeriods', 'createdBies', 'modifiedBies'));
	}

	function admin_view($id = null)
	{
		$this->admin_print($id);
//                $this->render('admin_print');
	}
	function admin_print($id = null)
	{
                $opt = array('contain' => array('RegularPeriod', 'Publication', 'Language', 'FrequencyType', 'OutgoingCertificateDetail', 'OutgoingCertificateDetail.Edition', 'OutgoingCertificateDetail.PrintingCenter.PrintedAt', 'Previous1RegularPeriod', 'Previous2RegularPeriod', 'OutgoingCertificateCoverprice.Edition', 'OutgoingCertificateCoverprice' => array('order' => array('OutgoingCertificateCoverprice.single_combo_other_variant DESC', 'OutgoingCertificateCoverprice.cover_price ASC'),), 'OutgoingCertificateCoverprice.PrintingCenter.PrintedAt', 'OutgoingCertificateCombo'), 'conditions' => array('OutgoingCertificate.id' => $id));
                $this->data = $this->OutgoingCertificate->find('first', $opt);
		if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for outgoing certificate', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
                $this->set('outgoingCertificate', $this->data);
	}

	function admin_add()
	{
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificate->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$publications = $this->OutgoingCertificate->Publication->find('list');
		$languages = $this->OutgoingCertificate->Language->find('list');
		$frequencyTypes = $this->OutgoingCertificate->FrequencyType->find('list');
		$regularPeriods = $this->OutgoingCertificate->RegularPeriod->find('list');
		$certificateStatuses = $this->OutgoingCertificate->CertificateStatus->find('list');
		$previous1RegularPeriods = $this->OutgoingCertificate->Previous1RegularPeriod->find('list');
		$previous2RegularPeriods = $this->OutgoingCertificate->Previous2RegularPeriod->find('list');
		$createdBies = $this->OutgoingCertificate->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificate->ModifiedBy->find('list');
		$this->set(compact('publications', 'languages', 'frequencyTypes', 'regularPeriods', 'certificateStatuses', 'previous1RegularPeriods', 'previous2RegularPeriods', 'createdBies', 'modifiedBies'));
	}

	function admin_edit($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->OutgoingCertificate->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the outgoing certificate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificate($id);
		
		$publications = $this->OutgoingCertificate->Publication->find('list');
		$languages = $this->OutgoingCertificate->Language->find('list');
		$frequencyTypes = $this->OutgoingCertificate->FrequencyType->find('list');
		$regularPeriods = $this->OutgoingCertificate->RegularPeriod->find('list');
		$certificateStatuses = $this->OutgoingCertificate->CertificateStatus->find('list');
		$previous1RegularPeriods = $this->OutgoingCertificate->Previous1RegularPeriod->find('list');
		$previous2RegularPeriods = $this->OutgoingCertificate->Previous2RegularPeriod->find('list');
		$createdBies = $this->OutgoingCertificate->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificate->ModifiedBy->find('list');
		$this->set(compact('publications', 'languages', 'frequencyTypes', 'regularPeriods', 'certificateStatuses', 'previous1RegularPeriods', 'previous2RegularPeriods', 'createdBies', 'modifiedBies'));
	}

	function admin_copy($id = null)
	{
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			/*
		     * Delete automatically set id to ensure the save() won't make an update
		     */
			$this->OutgoingCertificate->id = false;
			
			if ($this->OutgoingCertificate->save($this->data))
			{
				$this->Session->setFlash(___('the outgoing certificate has been saved', true), 'flash_message', array('plugin' => 'alaxos'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				//reset id to copy
				$this->data['OutgoingCertificate'][$this->OutgoingCertificate->primaryKey] = $id;
				$this->Session->setFlash(___('the outgoing certificate could not be saved. Please, try again.', true), 'flash_error', array('plugin' => 'alaxos'));
			}
		}
		
		$this->_set_outgoingCertificate($id);
		
		$publications = $this->OutgoingCertificate->Publication->find('list');
		$languages = $this->OutgoingCertificate->Language->find('list');
		$frequencyTypes = $this->OutgoingCertificate->FrequencyType->find('list');
		$regularPeriods = $this->OutgoingCertificate->RegularPeriod->find('list');
		$certificateStatuses = $this->OutgoingCertificate->CertificateStatus->find('list');
		$previous1RegularPeriods = $this->OutgoingCertificate->Previous1RegularPeriod->find('list');
		$previous2RegularPeriods = $this->OutgoingCertificate->Previous2RegularPeriod->find('list');
		$createdBies = $this->OutgoingCertificate->CreatedBy->find('list');
		$modifiedBies = $this->OutgoingCertificate->ModifiedBy->find('list');
		$this->set(compact('publications', 'languages', 'frequencyTypes', 'regularPeriods', 'certificateStatuses', 'previous1RegularPeriods', 'previous2RegularPeriods', 'createdBies', 'modifiedBies'));
	}
	
	function admin_delete($id = null)
	{
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for outgoing certificate', true), 'flash_error', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->OutgoingCertificate->delete($id))
		{
			$this->Session->setFlash(___('outgoing certificate deleted', true), 'flash_message', array('plugin' => 'alaxos'));
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('outgoing certificate was not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
		$this->redirect(array('action' => 'index'));
	}
	
	function admin_actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
        	if(isset($this->Acl))
	        {
	            if($this->Acl->check($this->Auth->user(), 'OutgoingCertificates/admin_' . $this->data['_Tech']['action']))
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
	    $ids = Set :: extract('/OutgoingCertificate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificate->deactivateAll(array('OutgoingCertificate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificates deactivated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificates were not deactivated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificate to deactivate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
        
	function admin_activateAll()
	{
	    $ids = Set :: extract('/OutgoingCertificate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificate->activateAll(array('OutgoingCertificate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificates activated', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificates were not activated', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificate to activate was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function admin_deleteAll()
	{
	    $ids = Set :: extract('/OutgoingCertificate/id', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->OutgoingCertificate->deleteAll(array('OutgoingCertificate.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(___('outgoingCertificates deleted', true), 'flash_message', array('plugin' => 'alaxos'));
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(___('outgoingCertificates were not deleted', true), 'flash_error', array('plugin' => 'alaxos'));
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(___('no outgoingCertificate to delete was found', true), 'flash_error', array('plugin' => 'alaxos'));
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_outgoingCertificate($id)
	{
            if(empty($this->data))
	    {
            
                if ($this->OutgoingCertificate->is_address_field_present()) {
                    $this->data = $this->OutgoingCertificate->read(null, $id);
                } else {
                    $this->data = $this->OutgoingCertificate->read(null, $id, 1);
                }
                if($this->data === false)
                {
                    $this->Session->setFlash(___('invalid id for outgoing certificate', true), 'flash_error', array('plugin' => 'alaxos'));
                    $this->redirect(array('action' => 'index'));
                }
	    }
	    
	    $this->set('outgoingCertificate', $this->data);
	}
	
	
}
?>