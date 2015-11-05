<?php

class AppModel extends Model
{

    var $actsAs = array('Containable', 'WhoDidIt');
    static $export_excel;
    function beforeFind($queryData) {
    parent::beforeFind($queryData);
    if ($this->alias == 'Proposer1Representative') {
        $queryData['conditions']['Membership.member_status_id'] = 3;
        $queryData['conditions']['representative_type_id'] = 1;
        unset($queryData['page']);
    }
    if (($this->alias == 'Proposer1Representative') && !empty($queryData['list']) ) { //&& empty($queryData['list'])
                $queryData['conditions']['Membership.member_status_id'] = 3;
                $queryData['fields'][0] = str_replace('{n}.', '', $queryData['list']['keyPath']);
                $queryData['fields'][1] = str_replace('{n}.', '', $queryData['list']['valuePath']);
                $queryData['fields'][2] = 'Membership.name';
                $queryData['fields'][3] = 'Publication.publication_name';
                $queryData['fields'][4] = 'Prefix.prefix_name';
                $queryData['fields'][5] = 'Edition.city_name';
                $this->_proposer1RepresentativeCustomOverride = true;
                if ($this->alias == 'Proposer1Representative') {
                    $queryData['joins'][] = "JOIN `memberships` AS `Membership` ON `{$this->alias}`.`membership_id` = `Membership`.`id` AND `Membership`.`member_status_id` = 3 AND representative_type_id = 1";
                    $queryData['joins'][] = "JOIN `publications` AS `Publication` ON `Membership`.`publication_id` = `Publication`.`id`";
                    $queryData['joins'][] = "LEFT JOIN `prefixes` AS `Prefix` ON `Proposer1Representative`.`prefix_id` = `Prefix`.`id`";
                    $queryData['joins'][] = "JOIN `cities` AS `Edition` ON `Membership`.`edition_id` = `Edition`.`id`";
                }
                $queryData['contain'] = array();
                unset($queryData['page']);
        }        
        if (!empty($queryData['list']) && empty($queryData['order'][0])) {
            $queryData['order'] = array("{$this->alias}.{$this->displayField} ASC");
        }
        $role_id = null;        
        if (class_exists('CakeSession') && isset($_SESSION) && !empty($_SESSION['Auth'])) {            
            $auth = CakeSession::read('Auth');            
            if(!empty($auth)) {
                $user_id = @CakeSession::read('Auth.User.id');
                $role_id = @CakeSession::read('Auth.User.role_id');		    
            }        
        }        
        if ($role_id != 1 && $this->schema('active')) {
            $queryData['conditions']["{$this->alias}.active"] = 1;
        }
        return $queryData;
    }
    function beforeValidate() {
        if (!empty($this->data)) {
            foreach($this->data as $model => $data_array) {
                foreach($data_array as $field => $value) {
                    if (strpos($field, 'date') !== false) {        
                        $this->data[$model][$field] = $this->dateFormatBeforeSave($value);                        
                    }
                }
            }
        }        
        parent::beforeValidate();
        return true;
    }
    function dateFormatBeforeSave($dateString) {
        if (!empty($dateString)) {
            $date = explode('-', $dateString);
            if (is_array($date) && count($date) == 3)  {
                return "{$date[2]}-{$date[1]}-{$date[0]}"; // Direction is from
            }
        }
        return $dateString;
    }
    function deactivateAll($conditions) {
        return $this->updateAll(
            array("active" => 0),
            $conditions
        );    
    }
    
    function activateAll($conditions) {        
         return $this->updateAll(
            array("active" => 1),
            $conditions
        );            
    }
    function beforeSave($options = array()) {
        parent::beforeSave($options);        
        return true;
    }
    function afterSave($created) {
        parent::afterSave($created);
        $is_address_field_present = $this->is_address_field_present();
        if (!empty($is_address_field_present) && !empty($this->data) && (!empty($this->data[$this->alias]['id']) || $created)) {
            if (!empty($this->data['Address'])) {
                $this->Address->Save($this->data);
                $this->data[$this->alias]['address_id'] = $this->Address->id;
                $this->save($this->data, array('callbacks' => false, 'fieldList' => array('address_id')));
            }
        }
        return true;
    }
    function is_address_field_present() {
        return $this->schema('address_id');
    }
    
    function afterFind($results, $primary = false) {
        parent::afterFind($results, $primary);
        if ($this->alias == 'Proposer1Representative' && !empty($this->_proposer1RepresentativeCustomOverride)) {
            $this->_proposer1RepresentativeCustomOverride = false;
            foreach($results as $k => $v) {
                $results[$k]['Proposer1Representative']['representative_name'] .= $results[$k]['Membership']['name'] ? ' - ' . $results[$k]['Membership']['name'] : ' - ' . $results[$k]['Publication']['publication_name'] . ' - ' . $results[$k]['Edition']['city_name'];
                $results[$k]['Proposer1Representative']['representative_name'] = $results[$k]['Prefix']['prefix_name'] . ' ' . $results[$k]['Proposer1Representative']['representative_name'];
                unset($results[$k]['Membership']);
                unset($results[$k]['Publication']);
                unset($results[$k]['Edition']);
                unset($results[$k]['Prefix']);
            }
        }
        $is_address_field_present = $this->is_address_field_present();
        if (!empty($is_address_field_present) && !empty($results)) {
            if(isset($results[$this->alias]['address_id'])) {
                $results = $this->get_address_city_state($results);                
            } else if(isset($results[0][$this->alias]['address_id'])) {
                foreach($results as $k => $result) {
                    $results[$k] = $this->get_address_city_state($result);                    
                }
            }        
        }
        if (!empty(self::$export_excel)) {
            foreach($results as $k => $result) {
                if (is_array($result)) {
                    $indx = key($result);
                    unset($results[$indx]['created']);
                    unset($results[$indx]['created_by']);
                    unset($results[$indx]['modified']);
                    unset($results[$indx]['modified_by']);
                    unset($results[$k][$indx]['created']);
                    unset($results[$k][$indx]['created_by']);
                    unset($results[$k][$indx]['modified']);
                    unset($results[$k][$indx]['modified_by']);
                }
            }
        }
        return $results;
    }
    function get_address_city_state($result) {
        $options = array();            
        $options['conditions']["Address.id"] = $result[$this->alias]['address_id'];
        $options['recursive'] = 0;
        $objAddress = $this->Address->find('first', $options);   
        if (!empty($objAddress)) {
            return array_merge($result, $objAddress);
        }
        return $result;
    }
}