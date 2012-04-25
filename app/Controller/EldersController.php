<?php
App::uses('AppController', 'Controller');
/**
 * Elders Controller
 *
 * @property Elder $Elder
 */
class EldersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('register');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Elder->recursive = 0;
		$this->set('elders', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Elder->id = $id;
		if (!$this->Elder->exists()) {
			throw new NotFoundException('Ongeldige ouder');
		}
		$this->set('elder', $this->Elder->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Elder->create();
			if ($this->Elder->saveAssociated($this->request->data)) {
				$this->Session->setFlash('Uw gegevens zijn opgeslagen.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Het opslaan is niet gelukt.');
			}
		}
		$kids = $this->Elder->Kid->find('list');
		$this->set(compact('kids'));
	}
	
	
	public function register() {
		if ($this->request->is('post')) {
			
			$this->Elder->create();
			
			if ($this->Elder->save($this->request->data)) {
				if($this->Elder->Kid->saveAll($this->request->data['Kid'])) {
					$this->Elder->EldersKid->save(array('elder_id' => $this->Elder->id, 'kid_id' => $this->Elder->Kid->id));

					$this->Session->setFlash('Uw gegevens zijn opgeslagen.');
					$this->redirect(array('action' => 'register'));
				}
			} else {
				$this->Session->setFlash('Het opslaan is niet gelukt.');
			}
			
		}
		$groups = $this->Elder->Kid->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Elder->id = $id;
		if (!$this->Elder->exists()) {
			throw new NotFoundException('Ongeldige ouder');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Elder->save($this->request->data)) {
				$this->Session->setFlash('De ouders is bewerkt.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('De ouder kon niet worden opgeslagen.');
			}
		} else {
			$this->request->data = $this->Elder->read(null, $id);
		}
		$kids = $this->Elder->Kid->find('list');
		$this->set(compact('kids'));
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
		$this->Elder->id = $id;
		if (!$this->Elder->exists()) {
			throw new NotFoundException('Ongeldige ouder');
		}
		if ($this->Elder->delete()) {
			$this->Session->setFlash('Ouder is verwijderd.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Ouder kon niet worden verwijderd.');
		$this->redirect(array('action' => 'index'));
	}
}
