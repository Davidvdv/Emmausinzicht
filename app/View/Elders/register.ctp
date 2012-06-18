
<h2>Registreer als ouder</h2>

<div id="elder-register">
	<div id="intro">
	<?php echo $this->Html->image('visual.png', array('id'=> 'visual')); ?>
	
	<p>Emmausschool houdt u graag op de hoogte van ontwikkelingen van de school en uw kind. Daarvoor kunt u zich registreren en geeft u aan wie uw kinderen zijn.</p>
	</div>
<?php echo $this->Form->create('Elder');?>
	<fieldset>
		<div id="personal-info">
			<h3>Persoonlijke gegevens</h3>
	<?php
		echo $this->Form->input('Elder.firstname', array('label' => 'Voornaam'));
		echo $this->Form->input('Elder.lastname', array('label' => 'Achternaam'));
	?>
		</div>
		<div id="email">
			<h3>E-mailadres waarop u de Emmaus In Zicht wilt ontvangen</h3>
	<?php
		echo $this->Form->input('Elder.email', array('label' => 'E-mailadres'));
	?>
		</div>
		
		<div id="about-childs">
			<h3>Gegevens van de kinderen</h3>
			<div class="input select">
				<label>Hoeveel kinderen heeft u op de Emmausschool?</label>
				<select id="amount-of-children">
					<option value="0"></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
	
			<div class="register-child">
				<fieldset>
					<h3>Registreer uw kind</h3>
				<?php
					echo $this->Form->input('Kid.0.firstname', array('label' => 'Voornaam'));
					echo $this->Form->input('Kid.0.lastname', array('label' => 'Achternaam'));
					echo $this->Form->input('Kid.0.date_of_birth', array(
						'label' => 'Geboortedatum',
						'dateFormat' => 'DMY',
						'minYear' => date('Y') - 16,
						'maxYear' => date('Y') - 70,
					));
					echo $this->Form->input('Kid.0.group_id', array('label' => 'Groep'));
				?>
				</fieldset>
			</div>
			<div class="childs"></div>
	
			<div class="center">
				<button id="prev">Uw vorige kind</button>
				<button id="next">Uw volgende kind</button>
			</div>
		</div>
	</fieldset>
	
	<?php echo $this->Form->end(array(
									'label' => 'Verstuur',
									'div' => array(
										'id' => 'submit-register'
									)
								)); ?>
</div>
