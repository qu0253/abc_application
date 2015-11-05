<?php
class Tax extends AppModel {
	var $name = 'Tax';
	var $displayField = 'tax_name';
        public static $Tax;
	var $validate = array(
		'tax_name' => array(
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
		'tax_percentage' => array(
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
        public function getTaxes() {
            if(!empty(self::$Tax) && is_array(self::$Tax) && count(self::$Tax) > 0) {
               return self::$Tax;
            } else {
               self::$Tax = $this->find('all', array('fields' => array('tax_name', 'tax_percentage')));
               return self::$Tax;
}
        }
}
