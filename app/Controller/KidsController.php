<?php
App::uses('AppController', 'Controller');
/**
 * Kids Controller
 *
 * @property Kid $Kid
 */
class KidsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Kid->recursive = 0;
		$this->set('kids', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Kid->id = $id;
		if (!$this->Kid->exists()) {
			throw new NotFoundException(__('Invalid kid'));
		}
		$this->set('kid', $this->Kid->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Kid->create();
			if ($this->Kid->save($this->request->data)) {
				$this->Session->setFlash('Het kind is opgeslagen.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Het kind kon niet worden opgeslagen.');
			}
		}
		$groups = $this->Kid->Group->find('list');
		$elders = $this->Kid->Elder->find('list');
		$this->set(compact('groups', 'elders'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Kid->id = $id;
		if (!$this->Kid->exists()) {
			throw new NotFoundException('Ongeldig kind');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Kid->save($this->request->data)) {
				$this->Session->setFlash('Het kind is opgeslagen.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Het kind kon niet worden opgeslagen.');
			}
		} else {
			$this->request->data = $this->Kid->read(null, $id);
		}
		$groups = $this->Kid->Group->find('list');
		$elders = $this->Kid->Elder->find('list');
		$this->set(compact('groups', 'elders'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Kid->id = $id;
		if (!$this->Kid->exists()) {
			throw new NotFoundException('Ongeldig kind');
		}
		if ($this->Kid->delete()) {
			$this->Session->setFlash('Kind verwijderd.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Kind kan niet worden verwijderd.');
		$this->redirect(array('action' => 'index'));
	}
}
