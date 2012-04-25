<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

	public function login() {
		if ($this->request->is('post')) {
			if($this->Auth->login()) {
				$this->Session->setFlash('U bent nu ingelogd.');
				$this->redirect($this->Auth->redirect());
			}
			else {
				$this->Session->setFlash('De gebruikersnaam en/of wachtwoord is onjuist.');
			}
		}
	}
	
	public function logout() {
		$this->Session->setFlash('U bent nu uitgelogd.');
		$this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Ongeldige docent.');
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('De docent is opgeslagen.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('De docent kon NIET worden opgeslagen.');
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Ongeldige docent.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('De wijzigingen van de docent zijn opgeslagen.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('De wijzigingen konden NIET worden opgeslagen.');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Ongeldige docent.');
		}
		if ($this->User->delete()) {
			$this->Session->setFlash('Docent is verwijderd.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Docent is NIET verwijderd.');
		$this->redirect(array('action' => 'index'));
	}
}
