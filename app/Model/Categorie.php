<?php
App::uses('AppModel', 'Model');

class Categorie extends AppModel {
	
	public $hasMany = array(
		'Icon' => array(
			'className' => 'Icon',
			'foreignKey' => 'category_id',
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
	
}
?>