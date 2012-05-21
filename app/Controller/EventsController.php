<?php
class EventsController extends AppController {
    
    public $helpers = array('Html', 'Form');
    public function index()
    {
                $this->set('events', $this->Event->find('all'));
    }
    
    public function add(){
        $date = date('Y/m/d h:i:s', time());
          if ($this->request->is('post')) {
              $this->request->data['Event']['user_id']= $this->Auth->user('id');
              $this->request->data['Event']['created_on']= $date;
              
             
          if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            } 
            else {
                $this->Session->setFlash('Unable to add your post.');
            }
              echo '<pre>';
              print_r($this->request->data);
              echo '</pre>';
        }
    }
            
}

?>
