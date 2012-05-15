<h2>Gegevens wijzigen</h2>
<div class="kids form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
<?php echo $this->Form->create('Kid');?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('date_of_birth', array(
		    'label' => 'Geboortedatum',
		    'dateFormat' => 'DMY',
		    'minYear' => date('Y') - 20,
		    'maxYear' => date('Y'),
		));
		echo $this->Form->input('group_id', array('label' => 'Groep'));
		echo $this->Form->input('Elder',array(
			'label' => 'Ouders',
			'multiple' => 'checkbox',
			'options' => $elders
		));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>

		<li><?php echo $this->Form->postLink('Verwijder', array('action' => 'delete', $this->Form->value('Kid.id')), null, __('Weet u zeker dat u dit kind wil verwijderen # %s?', $this->Form->value('Kid.id'))); ?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Lijst van groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe groep', array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Lijst van ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe ouder', array('controller' => 'elders', 'action' => 'add')); ?> </li>
	</ul>
</div>
