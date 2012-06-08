<h2>Nieuwe gegevens van een kind toevoegen</h2>
<div class="kids form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
<?php echo $this->Form->create('Kid');?>
	<fieldset>
	<?php
		echo $this->Form->input('firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('date_of_birth', array(
		    'type' =>'text', 
		    'class'=>'datetimepicker-dateOfBirth',
			'label' => 'Geboortedatum',
		));
		echo $this->Form->input('group_id',array('label' => 'Groep'));
		echo $this->Form->input('Elder', array(
			'label' => 'Ouders',
			'multiple' => 'checkbox',
			'options' => $elders
		));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Activiteiten', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>