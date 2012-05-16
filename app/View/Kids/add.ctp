<h2>Nieuwe gegevens van een kind toevoegen</h2>
<div class="kids form">
<?php echo $this->Form->create('Kid');?>
	<fieldset>
		<legend>Registreer een kind</legend>
	<?php
		echo $this->Form->input('firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('date_of_birth', array(
		    'label' => 'Geboortedatum',
		    'dateFormat' => 'DMY',
		    'minYear' => date('Y') - 20,
		    'maxYear' => date('Y'),
		));
		echo $this->Form->input('group_id');
		echo $this->Form->input('Elder', array(
			'label' => 'Ouders',
			'multiple' => 'checkbox',
			'options' => $elders
		));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>