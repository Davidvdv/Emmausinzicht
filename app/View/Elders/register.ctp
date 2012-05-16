<div class="elders form">
<?php echo $this->Form->create('Elder');?>
	<fieldset>
		<legend>Registreer als ouder</legend>
	<?php
		echo $this->Form->input('Elder.firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('Elder.lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('Elder.email', array('label' => 'E-mailadres'));
	?>
	
		<div class="input select">
			<label>Hier gaat het erom hoeveel van uw kinderen naar de Emmaus gaan.</label>
			<select id="amount-of-children">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
		</div>
	
	</fieldset>
	
	<div class="register-child">
		<fieldset>
			<legend>Registreer een kind</legend>
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
	</div>
	<div class="childs"></div>
<?php echo $this->Form->end('Verstuur');?>
</div>
