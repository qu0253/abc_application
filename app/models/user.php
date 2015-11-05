<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
//        var $actsAs = array('Acl' => 'requester');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

        var $validate = array(
		'username' => array(
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
                        'alphaNumeric' => array(
                                'rule' => 'alphaNumeric',
                                'message' => 'Username must contain alphabets and numbers only.',
                            ),
                        ),
		'email_address' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
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
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'role_id' => array(
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
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        var $hasOne = array(
		'Membership' => array(
			'className' => 'Membership',
			'foreignKey' => 'user_id',
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
        function parentNode()
        {
            if (!$this->id && empty($this->data))
            {
                return null;
            }

            $data = $this->data;

            if (empty($this->data))
            {
                $data = $this->read();
            }
            elseif(isset($this->id) && empty($data['User']['role_id']))
            {
                /*
                 * The role_id field was not intended to be saved,
                 * but we need it in order to find the parent node in the Aros
                 */
                $data['User']['role_id'] = $this->field('role_id', array('User.id' => $this->id));
            }

            if (empty($data['User']['role_id']))
            {
                return null;
            }
            else
            {
                return array('Role' => array('id' => $data['User']['role_id']));
            }
        }

        function beforeDelete()
        {
            parent::beforeDelete();
            return ($this->id != 1);
        }
}
