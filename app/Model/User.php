<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Dit veld mag niet leeg zijn.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Deze gebruikersnaam is al in gebruik. Een gebruikersnaam moet uniek zijn.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Dit veld mag niet leeg zijn.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'Match Passwords' => array(
				'rule' => 'matchPasswords',
				'message' => 'De wachtwoorden zijn niet gelijk.'
			),
		),
		'passwordConfirm' => array(
		'notempty' => array(
			'rule' => array('notempty'),
			'message' => 'Dit veld mag niet leeg zijn.',
			//'allowEmpty' => false,
			//'required' => false,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'firstname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Dit veld mag niet leeg zijn.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lastname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Dit veld mag niet leeg zijn.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Dit veld mag niet leeg zijn.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Dit is geen geldig e-mailadres',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function matchPasswords($data) {
		if($data['password'] == $this->data['User']['passwordConfirm']) {
			return true;
		}
		$this->invalidate('passwordConfirm', 'De wachtwoorden zijn niet gelijk.');
		
		return false;
	}
	
	public function beforeSave() {
		if(isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		return true;
	}
}
