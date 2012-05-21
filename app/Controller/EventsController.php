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
			    $this->Session->setFlash('Dit is succesvol opgeslagen.');
			    $this->redirect(array('action' => 'index'));
			} 
			else {
			    $this->Session->setFlash('Het opslaan is niet gelukt.');
			}
        }
    }

	public function view() {
		
	}    
}