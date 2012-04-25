<div class="elders form">
<?php echo $this->Form->create('Elder');?>
	<fieldset>
		<legend>Bewerk ouder</legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink('Verwijder', array('action' => 'delete', $this->Form->value('Elder.id')), null, __('Weet u zeker dat u de ouder wilt verwijderen # %s?', $this->Form->value('Elder.id'))); ?></li>
		<li><?php echo $this->Html->link('Lijst van ouders', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
