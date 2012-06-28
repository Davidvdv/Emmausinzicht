<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $helpers = array('Session', 'Html', 'Form', 'EuropeanTime');
	
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller'=> 'users', 'action' => 'index'),
			'logoutRedirect' => array('controller'=> 'users', 'action' => 'index'),
			'authError' => 'U heeft geen toegang tot deze pagina.',
			'authorize' => array('Controller') // De plaats waar je controleert.
		)
	);
	
	public function isAuthorized($user) {
		return true;
	}
	
	public function beforeFilter()	{
		// Niet-ingelogde gebruikers kunnen op de volgende pagina's
		$this->Auth->allow('registersucceed', 'emmausinzicht');
		
		// Basis url voor <base /> in default.ctp
		$this->set('baseUrl', 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].Router::url('/'));
		
		$this->set('loggedIn', $this->Auth->loggedIn());
		$this->set('currentUser', $this->Auth->user());
	}
	
}
