<?php
class CertificateStatus extends AppModel {
	var $name = 'CertificateStatus';
	var $displayField = 'certificate_status_name';
	var $validate = array(
		'certificate_status_name' => array(
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
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'OutgoingCertificate' => array(
			'className' => 'OutgoingCertificate',
			'foreignKey' => 'certificate_status_id',
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
		'QualifyingCirculation' => array(
			'className' => 'QualifyingCirculation',
			'foreignKey' => 'certificate_status_id',
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

}
