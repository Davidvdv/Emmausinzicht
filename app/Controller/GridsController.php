<?php
App::uses('AppController', 'Controller');

class GridsController extends AppController {
	
	public function index() {
		$this->Grid->recursive = 0;
		$this->set('grids', $this->Grid->find('list'));
	}
}