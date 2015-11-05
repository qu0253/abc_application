<?php
class AuditorBranch extends AppModel {
	var $name = 'AuditorBranch';
	var $displayField = 'auditor_branch_name';
        var $order = array('AuditorBranch.auditor_branch_name ASC');
	var $validate = array(
		'auditor_branch_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'auditor_firm_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'AuditorFirm' => array(
			'className' => 'AuditorFirm',
			'foreignKey' => 'auditor_firm_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'address_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Partner' => array(
			'className' => 'Partner',
			'foreignKey' => 'auditor_branch_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
                'SurpriseCheck' => array(
                        'className' => 'SurpriseCheck',
                        'foreignKey' => 'auditor_branch_id',
                        'dependent' => false,
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                ),
	);
	var $hasOne = array(
		'AuditorFirmHO' => array(
			'className' => 'AuditorFirm',
			'foreignKey' => 'auditor_branch_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        function beforeFind($queryData) {
            parent::beforeFind($queryData);
            if (empty($queryData['list'])) {
                $queryData['order'] = array('AuditorFirm.auditor_firm_name ASC', 'AuditorBranch.auditor_branch_name ASC');
            }
            return $queryData;
        }
        function afterFind($results, $primary = false) {
            parent::afterFind($results, $primary);
            foreach($results as $k => $auditorBranch) {
                if (!empty($auditorBranch['AuditorFirmHO']['id'])) {
                    $results[$k]['AuditorBranch']['auditor_branch_name'] .= ' (HO)';
                }
            }
            return $results;
        }
}
