
<h2>Blik aanpassen</h2>
<div class=" form">

<?php
	echo $this->Form->create('Event', array('action' => 'edit'));
	echo $this->Form->input('title',array('label' => 'Titel'));
	echo $this->Form->input('description', array('rows' => '7', 'label' => 'Beschrijving'));
	//echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->end('Verstuur');
?>
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Vooruit- en terugblikken', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>
