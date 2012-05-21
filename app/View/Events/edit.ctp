
<h1>Blik aanpassen</h1>
<?php
	echo $this->Form->create('Event', array('action' => 'edit'));
	echo $this->Form->input('title',array('label' => 'Titel'));
	echo $this->Form->input('description', array('rows' => '7', 'label' => 'Beschrijving'));
	//echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->end('Verstuur');
?>
