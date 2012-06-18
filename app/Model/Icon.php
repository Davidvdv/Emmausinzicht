<?php
App::uses('AppModel', 'Model');

class Icon extends AppModel {
	
		public $hasAndBelongsToMany = array(
		'Event' => array(
			'className' => 'Event',
			'joinTable' => 'events_icons',
			'foreignKey' => 'icon_id',
			'associationForeignKey' => 'event_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
			)
		);
		
		public $belongsTo = array(
		'Categorie' => array(
			'className' => 'Categorie',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
}
?>