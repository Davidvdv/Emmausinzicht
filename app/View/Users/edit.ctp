<h2>Gegevens wijzigen</h2>

<div class="users form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Bewerk een docent</legend>
	<?php
		echo $this->Form->input('username', array('label' => 'Gebruikersnaam'));
		echo $this->Form->input('firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('email', array('label' => 'E-mailadres'));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>

		<li><?php echo $this->Form->postLink('Verwijder docent-account', array('action' => 'delete', $this->Form->value('User.id')), null, __('Weet u zeker dat dit docent-account verwijderd wordt # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link('Docenten', array('action' => 'index'));?></li>
	</ul>
</div>
