
<h2>Registreer als ouder</h2>

<div class="elders form">
	<?php echo $this->Html->image('visual-register.jpg', array('id'=> 'visual')); ?>
	
	<p>Emmausschool houdt u graag op de hoogte van ontwikkelingen van de school en uw kind. Daarvoor kunt u zich registreren en geeft u aan wie uw kinderen zijn.</p>
	
<?php echo $this->Form->create('Elder');?>
	<fieldset>
	<?php
		echo $this->Form->input('Elder.firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('Elder.lastname', array('label' => 'Achternaam'));
		echo $this->Form->input('Elder.email', array('label' => 'E-mailadres'));
	?>
	
		<div class="input select">
			<label>Geef aan hoeveel van uw kinderen op de Emmaus zitten.</label>
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
			<h3>Registreer uw kind</h3>
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
