<?php

//require_once 'components/Mobile_Detect.php';
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller 
{    
    var $components = array('AutoLogin', 'Session', 'Acl', 'Auth', 'RequestHandler', 'Alaxos.AlaxosFilter', 'Email');    
    var $helpers = array('Session', 'Html', 'Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml', 'Javascript', 'Support', 'Excel');      
    /**
     * Run whenever auto login is successful
     * @param array $user - The Auth user session
     * @access private
     */
    function _autoLogin($user) {
        
    }

    /**
     * Run whenever auto login fails
     * @param array $cookie - The login cookie data
     * @access private
     */
    function _autoLoginError($cookie) {
        
    }
    function _restrict($funtion_name) {
	if (!empty($this->params['prefix']) && strtolower($this->params['prefix']) != 'admin') {
	    $controller = strtolower($this->name);
	    $restrict = "_restrict_{$funtion_name}_{$controller}";
            if (method_exists ($this, $restrict)) {                
                $this->$restrict();
            }
	}
    }
    public function __call($name, $arguments) {	
    }
    function _restrictAddingSecondIfFirstExists() {
        $arrHasOne = array('HoldingCompany' => 'holdingcompanies', 'RniDetail' => 'rnidetails', 'Membership' => 'memberships', 'User' => 'users');
        foreach($arrHasOne as $model => $controller) {
            $pkId = Set::extract('/id', $this->Session->read("Auth.{$model}"));            
            if (!empty($pkId) && $this->action == 'client_add' && strtolower($this->name) == $controller) {
                unset($this->data);
//                $model = lcfirst($model);
//                $func = "_set_$model";
//                $this->$func($pkId[0]);   
                $this->_login_redirect();
            }
        }
    }
    function _restrictEditing() {
        $arrRestrictUpdate = array(
                            'HoldingCompany' => 'holdingcompanies', 
                            'RniDetail' => 'rnidetails', 
                            'MembershipPayment' => 'membershippayments',
                            'PrintingCenter' => 'printingcenters',
                        );
        foreach($arrRestrictUpdate as $model => $controller) {
            $mem_status_id = $this->Session->read('Auth.Membership.member_status_id');
            $pkId = Set::extract('/id', $this->Session->read("Auth.{$model}"));
            if (strtolower($this->name) == 'printingcenters' && $this->action == 'client_add' ||
                strtolower($this->name) == 'membershippayments' && $this->action == 'client_add') {
                continue;
            }
            if (!empty($pkId) && strtolower($this->name) == $controller && $mem_status_id > 1 && (
                                    $this->action == 'client_add' || 
                                    $this->action == 'client_edit' || 
                                    $this->action == 'client_copy' || 
                                    $this->action == 'client_delete' || 
                                    $this->action == 'client_actionAll' || 
                                    $this->action == 'client_deactivateAll' || 
                                    $this->action == 'client_activateAll' || 
                                    $this->action == 'client_deleteAll'
                                )) {
                unset($this->data);
                $this->_login_redirect();
            }
        }
    }
    function _restrict_beforerender_users() {
        if ($this->params['prefix'] == 'client') {
            $this->data['User']['id'] = $this->Session->read('Auth.User.id');
            $this->data['User']['role_id'] = 2;
        }
    }
    function _restrict_beforefilter_users() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['User']['id'] = $this->Session->read('Auth.User.id');
            $this->data['User']['role_id'] = 2;
        }
        if ($this->action == 'client_edit') {
            $this->params['pass'][0] = $this->Session->read('Auth.User.id');
        }
    }
    function _restrict_beforerender_printingcenters() {
        if ($this->params['prefix'] == 'client') {
            $this->data['PrintingCenter']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforefilter_printingcenters() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['PrintingCenter']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforerender_certificategroups() {
        if ($this->params['prefix'] == 'client') {
            $this->data['CertificateGroup']['language_id'] = $this->Session->read('Auth.Membership.language_id');
            $this->data['CertificateGroup']['frequency_type_id'] = $this->Session->read('Auth.Membership.frequency_type_id');
            $this->data['CertificateGroup']['publication_id'] = $this->Session->read('Auth.Membership.publication_id');
        }
    }
    function _restrict_beforefilter_certificategroups() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['CertificateGroup']['language_id'] = $this->Session->read('Auth.Membership.language_id');
            $this->data['CertificateGroup']['frequency_type_id'] = $this->Session->read('Auth.Membership.frequency_type_id');
            $this->data['CertificateGroup']['publication_id'] = $this->Session->read('Auth.Membership.publication_id');
        }
    }
    function _restrict_beforerender_holdingcompanies() {
        if ($this->params['prefix'] == 'client') {
            $this->data['HoldingCompany']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforefilter_holdingcompanies() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['HoldingCompany']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforerender_membershippayments() {
        if ($this->params['prefix'] == 'client') {
            $this->data['MembershipPayment']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforefilter_membershippayments() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['MembershipPayment']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforerender_representatives() {
        if ($this->params['prefix'] == 'client') {            
            $this->data['Representative']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforefilter_representatives() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['Representative']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforerender_rnidetails() {
        if ($this->params['prefix'] == 'client') {            
            $this->data['RniDetail']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforefilter_rnidetails() {
        if (($this->params['prefix'] == 'client' && !empty($this->data)) || $this->action == 'client_index') {
            $this->data['RniDetail']['membership_id'] = $this->Session->read('Auth.Membership.id');
        }
    }
    function _restrict_beforerender_memberships() {
        if ($this->params['prefix'] == 'client') {
            $this->data['Membership']['user_id'] = $this->Session->read('Auth.User.id');
            $mem_id = $this->Session->read('Auth.Membership.id');
            if (!empty($mem_id)) {
                $this->data['Membership']['id'] = $this->Session->read('Auth.Membership.id');
            }            
            $users[$this->Session->read('Auth.User.id')] = $this->Session->read('Auth.User.username');
            $this->set(compact('users'));
        }
        if ($this->action == 'client_edit' || $this->action == 'client_copy') {
            $mem_id = $this->Session->read('Auth.Membership.id');
            if (!empty($mem_id)) {
                $editions[$this->Session->read('Auth.Edition.id')] = $this->Session->read('Auth.Edition.city_name');
                $this->set(compact('editions'));
            }
        }
    }
    function _restrict_beforefilter_memberships() {
        if ($this->params['prefix'] == 'client' && !empty($this->data)) {
            $this->data['Membership']['user_id'] = $this->Session->read('Auth.User.id');
            $mem_id = $this->Session->read('Auth.Membership.id');
            if (!empty($mem_id)) {
                $this->data['Membership']['id'] = $this->Session->read('Auth.Membership.id');
            }
        }
    }
    
    function beforeFilter() {
        if(!empty($this->params['named']['export_excel'])) {
            AppModel::$export_excel = 1;
        }
        $this->_checkRoleInSession();
//        $this->Auth->allow('*');
        $this->_setSubDivData(false);
        $this->_restrictEditing();
        $this->_restrict(strtolower(__FUNCTION__));
        $this->AutoLogin->cookieName = 'abcAppRememberMe'; 
        $this->AutoLogin->expires = '+1 month';
        $this->_configure_authentication();

        /* SMTP Options */
        $this->Email->smtpOptions = array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => 465,
            'username' => 'qu0253@gmail.com',
            'password' => 'Shreekrishna321!@#',
        );
        /* Set delivery method */
        $this->Email->delivery = 'smtp';
//        if (empty($this->params['prefix']) && false === strpos($this->here, 'auth-') && false === strpos($this->here, 'memlogin')) {
//            $this->Auth->allow('*');
//        }
//        if (strpos($this->action, 'index') !== false && !empty($this->data[$this->modelClass])) {            
//            foreach($this->data[$this->modelClass] as $k => $v) {
//                if(!is_numeric($v) && !empty($v) && !is_array($v)) {
//                    $this->data[$this->modelClass][$k] = "%$v%";
//                }
//            }            
//        }
    }
    function _checkRoleInSession() {
        $session = $this->Session->read();
        if (!empty($session['Auth']['User']['id']) && empty($session['Auth']['Role'])) {
	    App::import('Model', 'User');
	    $objUser = new User();
	    $user = $objUser->find('first', array('recursive' => 1, 'conditions' => array('User.id' => $session['Auth']['User']['id'])));
	    $this->Session->write('Auth.Role', $user['Role']);
//            echo '<pre>';print_r($membership);die;
	} else if (empty($session['Auth']['User']['id']) && !empty($session['Auth']['Role'])) {
            $this->Session->delete('Auth.Role');
        }
        if (!empty($session['Auth']['User']['id']) && !empty($session['Auth']['Role']) && $session['Auth']['Role']['id'] == 2) {
            App::import('Model', 'Membership');
	    $objMembership = new Membership();
            $contain = array('Publication', 'FrequencyType', 'Language', 'PublicationType', 'MembershipType', 'HoldingCompany', 'Representative', 'Representative.Prefix', 'PrintingCenter', 'PrintingCenter.PrintedAt', 'MembershipPayment', 'RniDetail', 'Edition');
            $membership = $objMembership->find('first', array('conditions' => array('Membership.user_id' => $session['Auth']['User']['id']), 'contain' => $contain));            
            $contain[] = 'Membership';
            foreach ($contain as $k => $model_name) {
                if (!empty($membership[$model_name])) {
                    $this->Session->write("Auth.{$model_name}", $membership[$model_name]);
                }
            }
        }
    }
    function getDistrict($stateId, $return = null) {
        App::import('Model', 'District');
        $districtObj = new District();
        $options = array('conditions' => array('state_id' => $stateId));
        $districts = $districtObj->find('list', $options);
        if ($return) {
            return $districts;
        }
        header('Content-type: application/json');
        echo json_encode($districts);
        die();
    }
    function getCityState($modelName) { 
        if ($this->RequestHandler->isAjax() || 1) {                         
            App::import('Model', $modelName);
            $modelObj = new $modelName();
            $options = array();
            $options['conditions'] = array("$modelName.active" => 1);   
            if (!empty($this->params['named'])) {
                $options['conditions'] = array_merge($options['conditions'], $this->params['named']);
            }            
            $options['contain'] = array();
            $options['fields'] = array('City.id', 'City.city_name', 'District.id', 'District.district_name', 'State.state_name',  'State.id', 'Zone.zone_name', 'Zone.id', 'Country.country_name', 'Country.id');
            $options['joins'][] = "JOIN districts as District ON City.district_id = District.id";     
            $options['joins'][] = "JOIN states as State ON District.state_id = State.id";     
            $options['joins'][] = "JOIN zones as Zone ON State.zone_id = Zone.id";     
            $options['joins'][] = "JOIN countries as Country ON Zone.country_id = Country.id";     
            $results = $modelObj->find('all', $options);
            $final = array();
            foreach($results as $k => $v) {
                $final[$k]['city_name'] = $v['City']['city_name'];
                $final[$k]['city_id'] = $v['City']['id'];
                $final[$k]['district_name'] = $v['District']['district_name'];
                $final[$k]['district_id'] = $v['District']['id'];
                $final[$k]['state_name'] = $v['State']['state_name'];
                $final[$k]['state_id'] = $v['State']['id'];
                $final[$k]['zone_name'] = $v['Zone']['zone_name'];
                $final[$k]['zone_id'] = $v['Zone']['id'];
                $final[$k]['country_name'] = $v['Country']['country_name'];
                $final[$k]['country_id'] = $v['Country']['id'];
            }
            $this->set('results', $final); 
            header('Content-type: application/json');
            echo json_encode($final);
            die();
            $this->view = 'Json';  
            $this->set('json', array('results'));
        } 
    } 
    function autocomplete($modelName) { 
        if ($this->RequestHandler->isAjax() || 1) {             
            App::import('Model', $modelName);
            $modelObj = new $modelName();
            $options = array();
            $options['conditions'] = array("$modelName.active" => 1);     
            if (!empty($this->params['named']['display_field'])) {
                $options['fields'] = array($this->params['named']['display_field'], $this->params['named']['display_field']);
                unset($this->params['named']['display_field']);
            }
            if (!empty($this->params['named'])) {
                foreach($this->params['named'] as $k => $v) {
                    $this->params['named'][$k] = str_replace("%---", "%", $v);
                }
                $options['conditions'] = array_merge($options['conditions'], $this->params['named']);
            }            
            $results = $modelObj->find('list', $options);
            $this->set('results', $results); 
            header('Content-type: application/json');
            echo json_encode($results);
            die();
            $this->view = 'Json';  
            $this->set('json', array('results'));
        } 
    } 
    function download($filename = '', $extenstion = 'pdf', $folder_path = '/files/', $download = true) {
        if ($folder_path[0] != '/') {
            $folder_path = base64_decode($folder_path);
        }
	$this->view = 'Media';
	$params = array(
	    'id' => "{$filename}.{$extenstion}",
	    'name' => $filename,
	    'download' => $download,
	    'extension' => $extenstion, // must be lower case
	    'path' => WWW_ROOT . $folder_path . DS // . $extenstion . DS // don't forget terminal 'DS'
	);        
	$this->set($params);
    }
    protected function _login_redirect() {
        $user_role = $this->Session->read('Auth.Role.name');        
        $this->redirect('/' . $user_role);
    }
	function _configure_authentication()
	{
	    $this->Auth->authorize     = 'actions';
            if(empty($this->params['prefix']))
            {
		    $this->Auth->allow('*');
            }
        }
    function _setRegularPeriods() {
        App::import('Model', 'RegularPeriod');
        $RegularPeriod = new RegularPeriod();
        $options = array('order' => 'id DESC');
        $regularPeriods = $RegularPeriod->find('list', $options);
        $regularPeriodId = key ($regularPeriods);
        $regularPeriodName = current ($regularPeriods);
        $this->set(compact('regularPeriodId', 'regularPeriodName'));
        return $regularPeriodId;
    }    
    function _setQualifyingCirculation($printing_center_id, $regularPeriodId) {
        App::import('Model', 'QualifyingCirculation');
        $QualifyingCirculation = new QualifyingCirculation();
        $options = array(
                'conditions' => array(
                    'QualifyingCirculation.printing_center_id' => $printing_center_id,
                    'QualifyingCirculation.regular_period_id' => $regularPeriodId,
                ),
            );
        $qualifyingCirculation = $QualifyingCirculation->find('first', $options);
        App::import('Model', 'Address');
        $objAddress = new Address();
        if (!empty($qualifyingCirculation['DuplicateCopy'])) {
            $options = array(
                'conditions' => array(
                    'Address.id' => $qualifyingCirculation['DuplicateCopy']['0']['address_id'],
                ),
            );
            $addr = $objAddress->find('first', $options);
            $qualifyingCirculation['DuplicateCopy'][0]['Address'] = $addr['Address'];
            $qualifyingCirculation['DuplicateCopy'][0]['City'] = $addr['City'];
            $qualifyingCirculation['DuplicateCopy'][0]['District'] = $addr['District'];
            $qualifyingCirculation['DuplicateCopy'][0]['State'] = $addr['State'];
            $qualifyingCirculation['DuplicateCopy'][0]['Zone'] = $addr['Zone'];
            $qualifyingCirculation['DuplicateCopy'][0]['Country'] = $addr['Country'];
        }
            
        return $qualifyingCirculation;
    }
    function _getQcToNamed() {
        App::import('Model', 'QualifyingCirculation');
        $QualifyingCirculation = new QualifyingCirculation();
        $qc = $QualifyingCirculation->query("SELECT 
                                            QualifyingCirculation.id, QualifyingCirculation.printing_center_id, 
                                            QualifyingCirculation.regular_period_id, PrintingCenter.id, 
                                            PrintingCenter.printed_at_id, PrintedAt.city_name, PrintedAt.id, PrintingCenter.membership_id,
                                            Publication.publication_name, Edition.city_name, Edition.id
                                            FROM qualifying_circulations as `QualifyingCirculation` 
                                            LEFT JOIN printing_centers as `PrintingCenter` on QualifyingCirculation.printing_center_id = PrintingCenter.id 
                                            LEFT JOIN cities as `PrintedAt` on PrintingCenter.printed_at_id = PrintedAt.id 
                                            LEFT JOIN memberships as `Membership` on PrintingCenter.membership_id = Membership.id 
                                            LEFT JOIN cities as `Edition` on Membership.edition_id = Edition.id 
                                            LEFT JOIN publications as `Publication` on Membership.publication_id = Publication.id
                                            ");
        foreach($qc as $k => $v) {
            $qualifyingCirculations[$v['QualifyingCirculation']['id']] = "{$v['Publication']['publication_name']} - {$v['Edition']['city_name']} - {$v['PrintedAt']['city_name']} ({$v['QualifyingCirculation']['id']})";
        }
        return $qualifyingCirculations;
    }
    function _getAuditorBranch() {
        App::import('Model', 'AuditorBranch');
        $AuditorBranch = new AuditorBranch();
        $ab = $AuditorBranch->query("
                                    SELECT 
                                    AuditorBranch.id, AuditorBranch.auditor_branch_name, AuditorFirm.auditor_firm_name, AuditorBranch.address_id, Address.address_line_1, Address.address_line_2
                                    FROM auditor_branches as `AuditorBranch` 
                                    LEFT JOIN auditor_firms as `AuditorFirm` on AuditorFirm.id = AuditorBranch.auditor_firm_id
                                    LEFT JOIN addresses as `Address` on Address.id = AuditorBranch.address_id
                                    ");
        foreach($ab as $k => $v) {
            $auditorBranches[$v['AuditorBranch']['id']] = "{$v['AuditorFirm']['auditor_firm_name']} - {$v['Address']['address_line_1']} {$v['Address']['address_line_2']} {$v['AuditorBranch']['auditor_branch_name']} ({$v['AuditorBranch']['id']})";
        }
        return $auditorBranches;
    }
    function _getPcToNamed() {
        App::import('Model', 'QualifyingCirculation');
        $PrintingCenter = new PrintingCenter();
        $pc = $PrintingCenter->query("SELECT 
                                            PrintingCenter.id, 
                                            PrintingCenter.printed_at_id, PrintedAt.city_name, PrintedAt.id, PrintingCenter.membership_id,
                                            Publication.publication_name, Edition.city_name, Edition.id
                                            FROM qualifying_circulations as `QualifyingCirculation` 
                                            LEFT JOIN printing_centers as `PrintingCenter` on QualifyingCirculation.printing_center_id = PrintingCenter.id 
                                            LEFT JOIN cities as `PrintedAt` on PrintingCenter.printed_at_id = PrintedAt.id 
                                            LEFT JOIN memberships as `Membership` on PrintingCenter.membership_id = Membership.id 
                                            LEFT JOIN cities as `Edition` on Membership.edition_id = Edition.id 
                                            LEFT JOIN publications as `Publication` on Membership.publication_id = Publication.id
                                            ");
        foreach($pc as $k => $v) {
            $printingCenters[$v['PrintingCenter']['id']] = "{$v['Publication']['publication_name']} - {$v['Edition']['city_name']} Edition - Printed At {$v['PrintedAt']['city_name']} ({$v['PrintingCenter']['id']})";
        }
        return $printingCenters;
    }
    function beforeRender() {        
        if ($this->RequestHandler->isAjax()) {
                $this->layout = 'ajax';
        }
//        if (!empty($this->params['prefix']) && strtolower($this->params['prefix']) == 'admin') {
//            $this->layout = 'admin';
//        }
        if(isset($this->params['named']['print'])) {
            $this->layout = 'print';
        }
        if(isset($this->params['named']['copy_address']) && $this->params['named']['copy_address'] == 1) {        
            $model_name = $this->params['named']['model'];
            $pk_id = $this->params['named']['id'];
            App::import('Model', $model_name);
            $obj = new $model_name();
            $options = array('conditions' => array("$model_name.id" => $pk_id));
            if (isset($this->params['named']['field_to_set'])) {
                $this->data[$this->modelClass][$this->params['named']['field_to_set']] = $pk_id;
            }
            $res = $obj->find('first', $options);
            $this->data['Address'] = $res['Address'];
            $this->data['Country'] = $res['Country'];
            $this->data['Zone'] = $res['Zone'];
            $this->data['State'] = $res['State'];
            $this->data['District'] = $res['District'];
            $this->data['City'] = $res['City'];
            unset($this->data['Address']['id']);
            $this->set(lcfirst($this->modelClass), $this->data);
        }
        $this->_setSubDivData(true);
        $keys = array();
        foreach($this->params['named'] as $k => $v) {
            $arr = explode('-', $v);
            if (is_array($arr) && count($arr) > 1) {
                $keys["{$arr[0]}_id"] = $arr[1];
            }
        }
        if (empty($keys['printing_center_id'])) {
            $keys['printing_center_id'] = $this->Session->read('PrintingCenter.id');
        }
        if (isset($keys['printing_center_id']) || !empty($keys['printing_center_id'])) {
            $regularPeriodId = $this->_setRegularPeriods();
            $qualifyingCirculation = $this->_setQualifyingCirculation($keys['printing_center_id'], $regularPeriodId);
            if (!empty($qualifyingCirculation['QualifyingCirculation'])) {
                $this->data[$this->modelClass]['qualifying_circulation_id'] = $qualifyingCirculation['QualifyingCirculation']['id'];
                $this->set(compact('qualifyingCirculation'));
            }
        }
        $this->_restrict(strtolower(__FUNCTION__));
        $action = strtolower(str_replace(@$this->params['prefix'] . '_', '', $this->action));
        if (!empty($this->{$this->modelClass}) && $this->{$this->modelClass}->is_address_field_present() && $action != 'view') {
            $this->addressMetaData($action);
        }
         $this->_restrictAddingSecondIfFirstExists();
//        $this->_checkRoleInSession();
    }
    function _getMessage($notification, $data) {
        $template = null;
        $arrSearch = array();
        foreach ($data as $model => $fields) {
            $arrSearch = array_merge($arrSearch, $this->_getSearchEmailString($model, $fields));
        }
        if (!empty($arrSearch)) {
            $template = wordwrap(str_replace(array_keys($arrSearch), array_values($arrSearch), $notification['Notification']['html_email_content']), 70);
        }
        return $template;
    }
    function _getSearchEmailString($model, $fields) {
        if (!empty($fields) && is_array($fields)) {
            foreach ($fields as $field => $value) {
                $arrSearch['-$$__['. strtolower($model) . '][' . strtolower($field) . ']__$$-'] = $value;
            }
        }
        return $arrSearch;
    }
    function sendEmail($toEmail, $notification_title, $data = null) {
        $sent = false;
        if (!empty($toEmail)) {
            $config = $this->getConfiguration();
            $this->Email->from = $config['domain_name'] . '<' . $config['donotreplay_email'] . '>';
            $this->Email->to = $toEmail;
            $this->Email->sendAs = 'html';
            App::import('Model', 'Notification');
            $objNotification = new Notification();
            $options = array('conditions' => array('title' => $notification_title));
            $notification = $objNotification->find('first', $options);
            if (!empty($notification)) {
                $this->Email->subject = $notification['Notification']['subject'];
                $this->Email->cc = $notification['Notification']['cc'];
                $this->Email->bcc = $notification['Notification']['bcc'];
                $message = $this->_getMessage($notification, $data);
                $sent = $this->Email->send($message);
            }
            return $sent;
        }
        
    }
    function _moveStatusPostApprovedChanges() {
        $mem_id = $this->Session->read('Auth.Membership.id');
        if ($mem_id) {
            App::import('Model', 'Membership');
            $objMembership = new Membership();
            $member_details = $objMembership->read(null, $mem_id, 1);
            if ($member_details['Membership']['member_status_id'] == 3) {
                $this->data['Membership']['id'] = $mem_id;
                $this->data['Membership']['member_status_id'] = 4;
                if ($objMembership->save($this->data, array('fieldList' => array('member_status_id')))) {
                    $this->Session->setFlash(___('Under review.', true), 'flash_message', array('plugin' => 'alaxos'));
                }
            }
        }
    }
    function addressMetaData($action) {                        
        
//        $optionState = array();
//        $optionState['order'] = array('state_name' => 'asc', 'active' => '1');
//        $optionState['conditions'] = array('zone_id' => $address['zone_id'], 'active' => '1');
        
        if (isset($this->params['named']['copy_address']) || $action == 'edit' || $action == 'copy') {        
            App::import('Model', 'Country');
            $objCountry = new Country();
        
            App::import('Model', 'Zone');
            $objZone = new Zone();
            
            App::import('Model', 'State');
            $objState = new State();
        
            App::import('Model', 'District');
            $objDistrict = new District();

            App::import('Model', 'City');
            $objCity = new City();

            $optionZone = array();            
            $optionDistrict = array();
            $optionCity = array();  
            if (!empty($this->viewVars[lcfirst($this->modelClass)]['Address'])) {
                $address = $this->viewVars[lcfirst($this->modelClass)]['Address'];
                $optionCountry['conditions'] = array('id' => $address['country_id'], 'active' => '1');
                $optionZone['conditions'] = array('id' => $address['zone_id'], 'active' => '1');
                $optionState['conditions'] = array('id' => $address['state_id'], 'active' => '1');
                $optionDistrict['conditions'] = array('id' => $address['district_id'], 'active' => '1');
                $optionCity['conditions'] = array('id' => $address['city_id'], 'active' => '1');          
            }                   
            $countries = $objCountry->find('list', $optionCountry);
            $zones = $objZone->find('list', $optionZone);
            $states = $objState->find('list', $optionState);
            $districts = $objDistrict->find('list', $optionDistrict);
            $cities = $objCity->find('list', $optionCity);
            
            $this->set(compact('countries', 'zones', 'states', 'districts', 'cities')); 
        }
    }
    function getConfiguration() {
        App::import('Model', 'Configuration');
        $Configuration = new Configuration();
        return $Configuration->getConfiguration();
    }
    protected function _append_to_href($url) {
	if(!empty($this->params['named'])) {
        $tmp_url = array();
	    foreach($this->params['named'] as $k => $v) {
		if(!empty($this->params['named'][$k])) {
		    if(is_array($url) && count($url) == 1 && !empty($url['action'])) {
			$tmp_url[$k] = $this->params['named'][$k];
		    }
		}
	    }
	    $url = array_merge($url, $tmp_url);
	}
	return $url;
    }
    public function redirect($url, $status = null, $exit = true) {
	$url = $this->_append_to_href($url);
	parent::redirect($url, $status, $exit);
    }
    function _getCustomNamedParams() {
	$model_pk = array();
	if(!empty($this->params['named'])) {	    
	    foreach($this->params['named'] as $k => $v) {
		if(!empty($this->params['named'][$k])) {
		    $tmp = explode('-', $this->params['named'][$k]);
		    if(is_array($tmp) && count($tmp) == 2) {
			$model_pk[$tmp[0]] = $tmp[1];
		    }
		}
	    }
	}	
	return $model_pk;
    }
    function _getAction() {
	$pure_action = false;
	if(!empty($this->params['prefix'])) {
	    $pure_action = strtolower(str_replace($this->params['prefix'] . '_', '', strtolower($this->action)));
	}
	return $pure_action;
    }
    function getNamedParamsAsArr() {
        $arr = array();
        $arr_model_pk = $this->_getCustomNamedParams();
        foreach($arr_model_pk as $model => $pk) {		
            $column_name = $model . '_id';
            $arr[$column_name] = $pk;
        }
        return $arr;
    }
            function _setSubDivData($check) {
	$pure_action = $this->_getAction();
	$avoid_actions = array('add', 'edit', 'copy', 'view');
	
	if(!empty($this->params['named']) && (in_array($pure_action, $avoid_actions) == $check)) {	    
	    $arr_model_pk = $this->_getCustomNamedParams();	    
	    foreach($arr_model_pk as $model => $pk) {		
		$column_name = $model . '_id';
		if(!empty($this->{$this->modelClass}) && array_key_exists($column_name, $this->{$this->modelClass}->schema())) {
		    $this->data[$this->modelClass][$column_name] = $pk;
		}
	    }	    
	}	
    }
    
    function _join($mem_id, $certificate_group_id) {
        App::import('Model', 'Membership');
        $membershipObj = new Membership();
        $membershipObj->id = $mem_id;
        $membershipObj->saveField('certificate_group_id', $certificate_group_id);
    }
    
    function isEditable($mem_status_id) {  
        return true;
        return ($mem_status_id < 2) ? true : false;
    }
    function setMemObjForAdmin() {
        $arr = $this->getNamedParamsAsArr();
        $mem_id = $arr['membership_id'];
        App::import('Model', 'Membership');
        $objMem = new Membership();
        $options = array('conditions' => array('Membership.id' => $mem_id));
        $memData = $objMem->find('first', $options);
        $this->set('Membership', $memData);
    }
}
