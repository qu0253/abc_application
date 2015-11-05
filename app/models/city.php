<?php
class City extends AppModel {
	var $name = 'City';
	var $displayField = 'city_name';
	var $validate = array(
		'city_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'district_id' => array(
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
		'District' => array(
			'className' => 'District',
			'foreignKey' => 'district_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
//		'State' => array(
//			'className' => 'State',
//                        'foreignKey' => '',
//			'conditions' => 'State.id = District.state_id',
//			'fields' => '',
//			'order' => ''
//		)
	);

	var $hasMany = array(
		'Address' => array(
			'className' => 'Address',
			'foreignKey' => 'city_id',
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
//		'WhiteForm' => array(
//			'className' => 'WhiteForm',
//			'foreignKey' => 'city_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
	);
        function beforeFind($queryData) {
            parent::beforeFind($queryData);
            if ($this->alias == 'City' && empty($queryData['fields']) && empty($queryData['list'])) {
                $this->bindModel(array(
                'belongsTo' => array('State' => array(
			'className' => 'State',
			'foreignKey' => '',
			'conditions' => 'State.id = District.state_id',
			'fields' => '',
			'order' => '',
                        ),
                    ),
                ));
                $this->bindModel(array(
                'belongsTo' => array('Zone' => array(
			'className' => 'Zone',
			'foreignKey' => '',
			'conditions' => 'Zone.id = State.zone_id',
			'fields' => '',
			'order' => '',
                        ),
                    ),
                ));
            }
            return $queryData;
        }
}
