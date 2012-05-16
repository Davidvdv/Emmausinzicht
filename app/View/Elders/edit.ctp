<h2>Ouder-account aanpassen</h2>
<p>
<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
</p>
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
		<li><?php echo $this->Form->postLink('Verwijder de gegevens van deze ouder', array('action' => 'delete', $this->Form->value('Elder.id')), null, __('Weet u zeker dat u de gegevens van deze ouder wilt verwijderen # %s?', $this->Form->value('Elder.id'))); ?></li>
		<li><?php echo $this->Html->link('Lijst van ouders', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe gegevens van een kind toevoegen', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
