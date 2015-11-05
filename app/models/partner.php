<?php
class Partner extends AppModel {
	var $name = 'Partner';
	var $displayField = 'partner_name';
        var $order = array('Partner.partner_name ASC');
	var $validate = array(
		'partner_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'registration_number' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
                        'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Duplicate value. Please enter unique value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'auditor_branch_id' => array(
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
		'AuditorBranch' => array(
			'className' => 'AuditorBranch',
			'foreignKey' => 'auditor_branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AuditorFirm' => array(
			'className' => 'AuditorFirm',
			'foreignKey' => '',
			'conditions' => 'AuditorFirm.id = AuditorBranch.auditor_firm_id',
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
        function beforeFind($queryData) {
            parent::beforeFind($queryData);
            if (empty($queryData['list'])) {
                $queryData['order'] = array('AuditorFirm.auditor_firm_name ASC', 'AuditorBranch.auditor_branch_name ASC', 'Partner.partner_name ASC');
            }
            return $queryData;
        }
}
