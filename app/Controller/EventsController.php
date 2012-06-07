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

			if ($this->Event->save($this->request->data['Event'])) {
				
				if (!empty($this->request->data['Image']['file']['name']) ) {
					/** Controleer of het een afbeelding is door de extentie te strippen van de bestandsnaam. 
					 *In [0] zit de naam en in [1] zit de extentie zonder punt 
					**/
					$ext = explode('.',$this->request->data['Image']['file']['name']);
				
					$validTypes = array(
						'jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'
					);
				
					/** Check of de extentie in de array van valide types voorkomt. **/
					if( in_array($ext[1], $validTypes )) {
					
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
		if (!$this->Event->exists()) {
			throw new NotFoundException('Ongeldige activiteit');
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->Event->save($this->data)) {
				if (!empty($this->request->data['Image']['file']['name']) ) {
					/** Controleer of het een afbeelding is door de extentie te strippen van de bestandsnaam. 
					 *In [0] zit de naam en in [1] zit de extentie zonder punt 
					**/
					$ext = explode('.',$this->request->data['Image']['file']['name']);
				
					$validTypes = array(
						'jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'
					);
				
					/** Check of de extentie in de array van valide types voorkomt. **/
					if( in_array($ext[1], $validTypes )) {
					
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
				$this->Session->setFlash('De activiteit is succesvol aangepast.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Het aanpassen is niet gelukt.');
			}
		}
		else {
			$this->request->data = $this->Event->read(null, $id);
		}
		$groups = $this->Event->Group->find('list');
		$this->set(compact('groups'));
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
	
	public function emmausinzicht() {
		// Als geen een datum gekozen is
		if(!$this->request->is('post')) {
			
			$dates = $this->Event->find('all', array('fields' => 'DISTINCT Event.publish_on'));
			foreach($dates as $date) {
				$data[$date['Event']['publish_on']] = $this->Event->findAllByPublishOn($date['Event']['publish_on']);
			}
			/*echo '<pre>';
			print_r($data);
			echo '</pre>';*/
			$this->set('inzichten', $data);
			
		} else {
			
		}
	}
}