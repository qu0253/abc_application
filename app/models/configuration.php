<?php
class Configuration extends AppModel {
	var $name = 'Configuration';
	var $displayField = 'name';
        public static $Configuration;
	var $validate = array(
		'name' => array(
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
        public function getConfiguration() {
            if(!empty(self::$Configuration) && is_array(self::$Configuration) && count(self::$Configuration) > 0) {
               return self::$Configuration;
            } else {
               self::$Configuration = $this->find('list', array('fields' => array('name', 'value')));
               return self::$Configuration;
            }
        }
}
