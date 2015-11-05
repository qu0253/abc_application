<?php
class PrintingCenterAuditorBranch extends AppModel {
	var $name = 'PrintingCenterAuditorBranch';
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
		'from_date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'to_date' => array(
			'date' => array(
				'rule' => array('date'),
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
		'AuditorBranch' => array(
			'className' => 'AuditorBranch',
			'foreignKey' => 'auditor_branch_id',
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
		)
	);
}
