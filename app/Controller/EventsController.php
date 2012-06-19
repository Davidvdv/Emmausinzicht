<?php
App::uses('CakeEmail', 'Network/Email');


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

			if ($this->Event->save($this->request->data['Event'])) {
				$this->Event->save($this->request->data['Group']);
				$this->Event->save($this->request->data['Icon']);
				if (!empty($this->request->data['Image']['file']['name']) ) {
					/** Controleer of het een afbeelding is door de extentie te strippen van de bestandsnaam. 
					 *In [0] zit de naam en in [1] zit de extentie zonder punt 
					**/
					$ext = explode('.',$this->request->data['Image']['file']['name']);
				
					$validTypes = array(
						'jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'
					);
				
					/** Check of de extentie in de array van valide types voorkomt. **/
					if( in_array(end($ext), $validTypes )) {
					
						/** Als de het bestand het upgeloade bestand is, zet 'm dan in de map op de server **/
						if( is_uploaded_file($this->request->data['Image']['file']['tmp_name']) && move_uploaded_file($this->request->data['Image']['file']['tmp_name'],
						WWW_ROOT.'img/uploads/'.$this->data['Image']['file']['name']) )
						{
							$data = array(
								'url' => $this->request->data['Image']['file']['name'], 
								'event_id' => $this->Event->getLastInsertID()
							);
							$this->Event->Image->save($data);
						}
					}
				}
				$this->Session->setFlash('De activiteit is succesvol opgeslagen.');
			    $this->redirect(array('action' => 'index'));
			
			}
			else {
			    $this->Session->setFlash('Het opslaan is niet gelukt.');
			}
			
        }
        $icons = $this->Event->Icon->find('list');
        //$iconsByCat = $this->Event->Icon->findAllByCategoryId('1', array('Icon.name', 'Icon.url'));
		$groups = $this->Event->Group->find('list');
		$this->set(compact('groups','icons'));
		
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
		if (!$this->Event->exists()) {
			throw new NotFoundException('Ongeldige activiteit');
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->Event->save($this->data)) {
				/*
				if (!empty($this->request->data['Image']['file']['name']) ) {
					/** Controleer of het een afbeelding is door de extentie te strippen van de bestandsnaam. 
					 *In [0] zit de naam en in [1] zit de extentie zonder punt 
					**/
					/*
					$ext = explode('.',$this->request->data['Image']['file']['name']);
				
					$validTypes = array(
						'jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'
					);
				
					/* Check of de extentie in de array van valide types voorkomt. **/
					/*
					if( in_array(end($ext), $validTypes )) {
					
						/** Als de het bestand het upgeloade bestand is, zet 'm dan in de map op de server **/
						/*
						if( is_uploaded_file($this->request->data['Image']['file']['tmp_name']) && move_uploaded_file($this->request->data['Image']['file']['tmp_name'],
						WWW_ROOT.'img/uploads/'.$this->data['Image']['file']['name']) )
						{
							$data = array(
								'url' => $this->request->data['Image']['file']['name'], 
								'event_id' => $this->Event->getLastInsertID()
							);
							$this->Event->Image->save($data);
						}
					}
				}*/
				$this->Session->setFlash('De activiteit is succesvol aangepast.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Het aanpassen is niet gelukt.');
			}
		}
		else {
			$this->request->data = $this->Event->read(null, $id);
		}
		$icons = $this->Event->Icon->find('list');
		$groups = $this->Event->Group->find('list');
		
		$this->set(compact('groups', 'icons'));
	}
	
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException('Ongeldige activiteit');
		}
		if ($this->Event->delete()) {
			$this->Session->setFlash('De activiteit is verwijderd.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('De activiteit kon niet worden verwijderd.');
		$this->redirect(array('action' => 'index'));
	}
	
	public function dates() {
		$dates = $this->Event->find('all', array('fields' => 'DISTINCT Event.publish_on'));
		
		foreach($dates as $date) {
			$data[$date['Event']['publish_on']] = $this->Event->findAllByPublishOn($date['Event']['publish_on']);
		}
		
		$this->set('inzichten', $data);
	}
	
	public function emmausinzicht($date = null) {
		$this->layout = 'emmausinzicht';
		
    
		CakeEmail::deliver('team1emedia2012@gmail.com', 'Subject', 'Message', array('from' => 'me@example.com'));
		
		if($date) {
			$this->set('date', $date);
			$this->set('emmausinzicht', $this->Event->findAllByPublishOn($date));
			
			/*$email = new CakeEmail('smtp');
			$email->template('default', 'default')
			    ->emailFormat('html')
				->from('team1emedia2012@gmail.com')
			    ->to('team1emedia2012@gmail.com')
			    ->send();*/

			CakeEmail::deliver('team1emedia2012@gmail.com', 'Subject', 'Message', array('from' => 'me@example.com'));			
			
			/*$email = new CakeEmail('gmail');
			$email->template('default', 'default')
			    ->emailFormat('html')
				->from('team1emedia2012@gmail.com')
			    ->to('team1emedia2012@gmail.com')
			    ->send();*/
		} else {
			$this->redirect(array('action' => 'dates'));
		}
	}
   
}