<?php
class EventsController extends AppController {
	    
    public function index()
    {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
    }
    
    public function add(){
		
        $date = date('Y/m/d h:i:s', time());
          if ($this->request->is('post')) {
              $this->request->data['Event']['user_id']= $this->Auth->user('id');
              $this->request->data['Event']['created_on']= $date;

			if ($this->Event->save($this->request->data)) {
			    $this->Session->setFlash('De activiteit is succesvol opgeslagen.');
			    $this->redirect(array('action' => 'index'));
			} 
			else {
			    $this->Session->setFlash('Het opslaan is niet gelukt.');
			}
        }
		$groups = $this->Event->Group->find('list');
		$this->set(compact('groups'));
    }

	public function view($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException('Ongeldige activiteit');
		}
		$this->set('event', $this->Event->read(null, $id));
	}    
        
	public function edit($id = null) {
		$this->Event->id = $id;
		if (empty($this->request->data)) {
			$this->data = $this->Event->read();
		} else {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash('De activiteit is succesvol aangepast.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Het aanpassen is niet gelukt.');
			}
		}
		$groups = $this->Event->Group->find('list');
		$this->set(compact('groups'));
	}       
}