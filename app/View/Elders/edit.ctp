<h2>Ouder-account aanpassen</h2>
<div class="elders form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
<?php echo $this->Form->create('Elder');?>
	<fieldset>
	<?php
		echo $this->Form->input('firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('email', array('label' => 'E-mailadres'));
		echo $this->Form->input('Kid',array(
			'label' => 'Kinderen',
			'multiple' => 'checkbox',
			'options' => $kids
		));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
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
