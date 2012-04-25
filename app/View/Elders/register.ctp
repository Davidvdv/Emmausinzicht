<div class="elders form">
<?php echo $this->Form->create('Elder');?>
	<fieldset>
		<legend>Registreer als ouder</legend>
	<?php
		echo $this->Form->input('Elder.firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('Elder.lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('Elder.email', array('label' => 'E-mailadres'));
	?>
	</fieldset>
	
	<fieldset>
		<legend>Registreer uw kind</legend>
	<?php
		echo $this->Form->input('Kid.0.firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('Kid.0.lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('Kid.0.date_of_birth', array(
		    'label' => 'Geboortedatum',
		    'dateFormat' => 'DMY',
		    'minYear' => date('Y') - 20,
		    'maxYear' => date('Y'),
		));
		echo $this->Form->input('Kid.0.group_id', array('label' => 'Groep'));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>
