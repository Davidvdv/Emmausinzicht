<h2>Voeg een groep toe</h2>

<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
	<?php
		echo $this->Form->input('name', array('label' => 'Naam van de groep'));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>

		<li><?php echo $this->Html->link('Lijst van groepen', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuw kind', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
