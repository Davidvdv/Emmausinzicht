<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	public $insertedIDs = array();

    public function afterSave($created) {
        if($created) {
            $this->insertedIDs[] = $this->getInsertID();
        }
        return true;
    }
    
	public function afterFind($results) {
 	   foreach ($results as $key => $val) {
 	       if (isset($val['Event']['created_on'])) {
 	           $results[$key]['Event']['created_on'] = $this->dateFormatAfterFind($val['Event']['created_on']);
 	       }
 	   }
  	  return $results;
	}

	public function dateFormatAfterFind($dateString) {
  	  return date('d-m-Y', strtotime($dateString));
	}
}
