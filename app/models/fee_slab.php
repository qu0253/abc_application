<?php
class FeeSlab extends AppModel {
	var $name = 'FeeSlab';
	var $displayField = 'fee_slab_name';
	var $validate = array(
		'fee_slab_name' => array(
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Duplicate value. Please enter unique value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'membership_type_id' => array(
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
		'MembershipType' => array(
			'className' => 'MembershipType',
			'foreignKey' => 'membership_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Frequency' => array(
			'className' => 'Frequency',
			'foreignKey' => 'frequency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PublicationType' => array(
			'className' => 'PublicationType',
			'foreignKey' => 'publication_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
