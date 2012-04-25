<div class="elders form">
<?php echo $this->Form->create('Elder');?>
	<fieldset>
		<legend>Registreer een ouder</legend>
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
