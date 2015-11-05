<?php
class HoldingCompany extends AppModel {
	var $name = 'HoldingCompany';
	var $displayField = 'holding_company_name';
	var $validate = array(
		'membership_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'holding_company_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address_id' => array(
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
		'Membership' => array(
			'className' => 'Membership',
			'foreignKey' => 'membership_id',
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

}
