<?php
class PrintingCenter extends AppModel {
	var $name = 'PrintingCenter';
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
		'printed_at_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'claimed_circulation' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                'file_advertising_rate_card' => array(
                            'notempty' => array(
                                    'rule' => array('notempty'),
                                    'message' => 'Please upload file advertising rate card',
                                    //'allowEmpty' => false,
                                    //'required' => false,
                                    //'last' => false, // Stop validation after this rule
                                    'on' => 'create', // Limit validation to 'create' or 'update' operations
                            ),
                    ),
                    'file_specimen_copy' => array(
                            'notempty' => array(
                                    'rule' => array('notempty'),
                                    'message' => 'Please upload file specimen copy',
                                    //'allowEmpty' => false,
                                    //'required' => false,
                                    //'last' => false, // Stop validation after this rule
                                    'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'PrintedAt' => array(
			'className' => 'City',
			'foreignKey' => 'printed_at_id',
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
		'OutgoingCertificateCoverprice' => array(
			'className' => 'OutgoingCertificateCoverprice',
			'foreignKey' => 'printing_center_id',
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
		'OutgoingCertificateDetail' => array(
			'className' => 'OutgoingCertificateDetail',
			'foreignKey' => 'printing_center_id',
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
		'PrintingCenterAuditorBranch' => array(
			'className' => 'PrintingCenterAuditorBranch',
			'foreignKey' => 'printing_center_id',
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
			'foreignKey' => 'printing_center_id',
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

        public $actsAs =
            array('FileModel' =>
                    array(
                        'file_db_file' => array('file_advertising_rate_card', 'file_specimen_copy'),
                        'file_field' => array('file_advertising_rate_card', 'file_specimen_copy'),
                        'dir' => array('uploads/printing_centers/file_advertising_rate_card', 'uploads/printing_centers/file_specimen_copy'),
                    )
                );
            function beforeSave($options = array()) {
                $this->data['PrintingCenter']['printed_at_id'] = $this->data['Address']['city_id'];
                parent::beforeSave($options);
                return $this->data;
            }
}
