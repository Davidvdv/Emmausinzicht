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
				$this->Event->save($this->request->data['Group']);
				$this->Event->save($this->request->data['Icon']);
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
				
		if($date) {
			$this->set('date', $date);
			
			$this->Event->Behaviors->attach('Containable');
			$this->Event->contain('Icon', 'Image');
			
			$emmausinzicht = $this->Event->find('all', array(
				'conditions' => array('Event.publish_on' => $date),
				'contain' => array(
					'Group' => array('order' => 'Group.id ASC')
					)
				));
			
			$this->set('emmausinzicht', $emmausinzicht);
			
		} else {
			$this->redirect(array('action' => 'dates'));
		}
	}
	
	public function send($date = null){
		// emailen
		$to = 'team1emedia2012@gmail.com';
		$subject = 'Emmaus In Zicht van '.$date;
		$headers = 'From: team1emedia2012@gmail.com'. "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		$message = '
		<html>
		<head>
		</head>
		<body>
			<h2>Emmaus in zicht</h2>
			<p>De Emmaus heeft een nieuwe Emmaus In Zicht uitgebracht.</p>
			<p><a href="project.cmi.hr.nl/2011_2012/emedia_med2d_t1/emedia/events/emmausinzicht/'.$date.'">Emmaus In Zicht van '.$date.'</a></p>
		</body>
		</html>';
		//CakeEmail::deliver('team1emedia2012@gmail.com', 'Emmaus in zicht', $message, array('from' => 'me@example.com'));
			
		mail($to, $subject, $message, $headers);
		
		$this->Session->setFlash('De Emmaus In Zicht is verzonden');
		$this->redirect(array('action' => 'dates'));
	}
   
}