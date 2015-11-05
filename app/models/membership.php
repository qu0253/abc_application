<?php
class Membership extends AppModel {
	var $name = 'Membership';
	var $displayField = 'name';
	var $validate = array(
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
		'user_id' => array(
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Duplicate value. Please enter unique value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
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
		'member_status_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Publication' => array(
			'className' => 'Publication',
			'foreignKey' => 'publication_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Edition' => array(
			'className' => 'City',
			'foreignKey' => 'edition_id',
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
		),
		'PublicationType' => array(
			'className' => 'PublicationType',
			'foreignKey' => 'publication_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Language' => array(
			'className' => 'Language',
			'foreignKey' => 'language_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'FrequencyType' => array(
			'className' => 'FrequencyType',
			'foreignKey' => 'frequency_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proposer1Representative' => array(
			'className' => 'Representative',
			'foreignKey' => 'proposer_1_representative_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proposer2Representative' => array(
			'className' => 'Representative',
			'foreignKey' => 'proposer_2_representative_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CompanyType' => array(
			'className' => 'CompanyType',
			'foreignKey' => 'company_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MemberStatus' => array(
			'className' => 'MemberStatus',
			'foreignKey' => 'member_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CertificateGroup' => array(
			'className' => 'CertificateGroup',
			'foreignKey' => 'certificate_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Reason' => array(
			'className' => 'Reason',
			'foreignKey' => 'reason_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'HoldingCompany' => array(
			'className' => 'HoldingCompany',
			'foreignKey' => 'membership_id',
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
		'MembershipPayment' => array(
			'className' => 'MembershipPayment',
			'foreignKey' => 'membership_id',
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
		'PrintingCenter' => array(
			'className' => 'PrintingCenter',
			'foreignKey' => 'membership_id',
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
		'Representative' => array(
			'className' => 'Representative',
			'foreignKey' => 'membership_id',
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
		'RniDetail' => array(
			'className' => 'RniDetail',
			'foreignKey' => 'membership_id',
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
            $this->data['Membership']['edition_id'] = $this->data['Address']['city_id'];
            parent::beforeSave($options);
            return $this->data;
        }
        public $actsAs =
            array('FileModel' =>
                    array(
                        'file_db_file' => array('file_pub_confr_letter', 'file_letter_of_auth'),
                        'file_field' => array('file_pub_confr_letter', 'file_letter_of_auth'),
                        'dir' => array('uploads/memberships/file_pub_confr_letter', 'uploads/memberships/file_letter_of_auth'),
                    ),
                );
}
