<?php
class WhiteForm extends AppModel {
	var $name = 'WhiteForm';
        var $order = array('WhiteForm.id DESC');
	var $validate = array(
		'qualifying_circulation_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'circulation' => array(
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
		'QualifyingCirculation' => array(
			'className' => 'QualifyingCirculation',
			'foreignKey' => 'qualifying_circulation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        function beforeFind($queryData) {
            parent::beforeFind($queryData);
            if ($this->alias == 'WhiteForm' && empty($queryData['fields']) && empty($queryData['list'])) {
                $this->bindModel(array(
                'belongsTo' => array('District' => array(
			'className' => 'District',
			'foreignKey' => '',
			'conditions' => 'District.id = City.district_id',
			'fields' => '',
			'order' => '',
                        ),
                    ),
                ));
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
