<?php
class QualifyingCirculation extends AppModel {
	var $name = 'QualifyingCirculation';
	var $validate = array(
		'printing_center_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'regular_period_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_monthly_qualifying_circulation' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ss_sa_single_copy_sales' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ss_sa_combo_sales_copies' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ss_sa_single_copy_subscription' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ss_sa_joint_subscription_copies' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ss_sa_institutional_subscription_copies' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ss_sa_institutional_sale_copies' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'avg_rate_in_waste_per_kg' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'verified_wastage' => array(
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
		'PrintingCenter' => array(
			'className' => 'PrintingCenter',
			'foreignKey' => 'printing_center_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RegularPeriod' => array(
			'className' => 'RegularPeriod',
			'foreignKey' => 'regular_period_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'QualifyingCirculationStatus' => array(
			'className' => 'QualifyingCirculationStatus',
			'foreignKey' => 'qualifying_circulation_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RecheckAuditorBranch' => array(
			'className' => 'AuditorBranch',
			'foreignKey' => 'recheck_auditor_branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Combo' => array(
			'className' => 'Combo',
			'foreignKey' => 'qualifying_circulation_id',
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
		'CoverPrice' => array(
			'className' => 'CoverPrice',
			'foreignKey' => 'qualifying_circulation_id',
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
		'DistributionCenter' => array(
			'className' => 'DistributionCenter',
			'foreignKey' => 'qualifying_circulation_id',
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
                'DuplicateCopy' => array(
                            'className' => 'DuplicateCopy',
                            'foreignKey' => 'qualifying_circulation_id',
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
		'NrrCalculation' => array(
			'className' => 'NrrCalculation',
			'foreignKey' => 'qualifying_circulation_id',
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
                'NonQualifyingCirculation' => array(
			'className' => 'NonQualifyingCirculation',
			'foreignKey' => 'qualifying_circulation_id',
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
                'PrintingPress' => array(
			'className' => 'PrintingPress',
			'foreignKey' => 'qualifying_circulation_id',
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
		'StatementANewsprint' => array(
			'className' => 'StatementANewsprint',
			'foreignKey' => 'qualifying_circulation_id',
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
		'StatementBNewsprint' => array(
			'className' => 'StatementBNewsprint',
			'foreignKey' => 'qualifying_circulation_id',
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
		'SubscriptionScheme' => array(
			'className' => 'SubscriptionScheme',
			'foreignKey' => 'qualifying_circulation_id',
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
			'foreignKey' => 'qualifying_circulation_id',
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
		'TradeTerm' => array(
			'className' => 'TradeTerm',
			'foreignKey' => 'qualifying_circulation_id',
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
		'WasteRate' => array(
			'className' => 'WasteRate',
			'foreignKey' => 'qualifying_circulation_id',
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
		'WeekdaysSunday' => array(
			'className' => 'WeekdaysSunday',
			'foreignKey' => 'qualifying_circulation_id',
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
		'WhiteForm' => array(
			'className' => 'WhiteForm',
			'foreignKey' => 'qualifying_circulation_id',
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
    function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (!empty($this->data['QualifyingCirculation']['qualifying_circulation_status_id']) && $this->data['QualifyingCirculation']['qualifying_circulation_status_id'] == 7) {
            $this->data['QualifyingCirculation']['active'] = 0;
        }
        return true;
    }

}
