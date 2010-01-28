<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'name' => array(
			'required' => array('rule' => 'notEmpty', 'message' => 'user_name_required_msg' ),
			'length' => array('rule' => array('maxLength', 60), 'message' => 'user_name_length_msg' )
		),
		'surname' => array(
			'required' => array('rule' => 'notEmpty', 'message' => 'user_surname_required_msg' ),
			'length' => array('rule' => array('maxLength', 60), 'message' => 'user_surname_length_msg' )
		),
		'email' => array(
			'required' => array('rule' => 'isUnique', 'message' => 'user_email_unique', 'field' => 'email'),
			'email1' => array('rule' => 'email', 'message' => 'user_email_invalid' ),
			'req' => array('rule' => 'notEmpty', 'message' => 'user_email_enter' )
			//'message' => 'Please enter your email address',
			//'unique' => array('rule' => array('validateUniqueEmail'), 'message' => 'This email is already in use, please try another.')
		),
		'password' => array(
			'required' => array('rule' => array('custom','/[a-zA-Z0-9\_\-]{4,}$/i'), 'message' => 'user_password_4' )
		),
		'city_id' => array(
			'rule' => array('comparison', '>',  0),
			'message' => 'user_city_enter' ,
			'required' => true
		),
		'country_id' => array(
			'rule' => array('comparison', '>',  0),
			'message' => 'user_country_enter' ,
			'required' => true
		),
		'offer' => array(
			'rule' => array('multiple', array('min' => 1)),
			'message' => 'user_offer_enter' ,
			'required' => true
		),
		'want' => array(
			'rule' => array('multiple', array('min' => 1)),
			'message' => 'user_want_enter' ,
			'required' => true
		),
		'level' => array(
			'rule' => array('multiple', array('min' => 1)),
			'message' => 'user_level_incorrect',
			'required' => 'true'
		),
		'gender' => array(
			'allowedChoice' => array(
				'rule' => array('inList', array('---', 'male', 'female')),
				'message' => 'user_gender_rule' ,
				'required' => true)
		),
		'age' => array(
			'allowedChoice' => array(
				'rule' => array('inList', array('---','< 18','18-20','21-25','26-30','31-40','> 41')),
				'message' => 'user_age_rule',
				'required' => true)
		),
		'group_id' => array('numeric')
	);
	
	

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'City' => array(
			'className' => 'City',
			'foreignKey' => 'city_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => '',
			'conditions' => 'City.country_id = Country.id',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasAndBelongsToMany = array(
		'Offer' => array(
			'className' => 'Language',
			'joinTable' => 'languages_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'language_id',
			'unique' => true,
			'conditions' => 'offer = 1',
			'fields' => '',
			'order' => '',
			'dependent' => true,
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Want' => array(
			'className' => 'Language',
			'joinTable' => 'languages_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'language_id',
			'unique' => true,
			'conditions' => 'offer = 0',
			'fields' => '',
			'order' => '',
			'dependent' => true,
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	var $actsAs = array('Acl' => 'requester');
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
		if (!array_key_exists('group_id', $data['User']) || !$data['User']['group_id']) 
		{
			return null;
		} else 
		{
			return array('Group' => array('id' => $data['User']['group_id']));
		}
	}
	
	/**    
	 * After save callback
	 *
	 * Update the aro for the user.
	 *
	 * @access public
	 * @return void
	 */
	function afterSave($created) 
	{
			if (!$created) 
			{
				$parent = $this->parentNode();
				$parent = $this->node($parent);
				$node = $this->node();
				$aro = $node[0];
				$aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
				$this->Aro->save($aro);
			}
	}
	
	function _fake()
	{
		__('user_name_required_msg', true);
		__('user_name_required_msg', true);
		__('user_surname_required_msg', true);
		__('user_surname_length_msg', true);
		__('user_email_unique', true);
		__('user_email_invalid', true);
		__('user_email_enter', true);
		__('user_password_4', true);
		__('user_city_enter', true);
		__('user_country_enter', true);
		__('user_offer_enter', true);
		__('user_want_enter', true);
		__('user_gender_rule', true);
		__('user_age_rule', true);
		__('user_level_incorrect', true);
	}
	
	/**
	 * Creates an activation hash for the current user.
	 *
	 *      @param Void
	 *      @return String activation hash.
	*/
	function getActivationHash()
	{
			if (!isset($this->id)) 
			{
					return false;
			}
			return substr(Security::hash(Configure::read('Security.salt') . $this->field('created') . date('Ymd')), 0, 8);
	}
}
?>