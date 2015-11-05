<?php
class Prefix extends AppModel {
	var $name = 'Prefix';
	var $displayField = 'prefix_name';
	var $validate = array(
		'prefix_name' => array(
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Duplicate value. Please enter unique value.',			),
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);
}
