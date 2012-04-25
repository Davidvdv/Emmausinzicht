<?php
App::uses('AppModel', 'Model');
/**
 * EldersKid Model
 *
 * @property Elder $Elder
 * @property Kid $Kid
 */
class EldersKid extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Elder' => array(
			'className' => 'Elder',
			'foreignKey' => 'elder_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Kid' => array(
			'className' => 'Kid',
			'foreignKey' => 'kid_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
