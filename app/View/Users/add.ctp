<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Registreer een docent</legend>
	<?php
		echo $this->Form->input('username', array('label' => 'Gebruikersnaam'));
		echo $this->Form->input('password', array('label' => 'Wachtwoord'));
		echo $this->Form->input('passwordConfirm', array('label' => 'Herhaal wachtwoord', 'type' => 'password'));
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

		<li><?php echo $this->Html->link('Lijst van docenten', array('action' => 'index'));?></li>
	</ul>
</div>
