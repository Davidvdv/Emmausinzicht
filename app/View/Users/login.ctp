<div id="login">
	<div id="login-header">
		<?php echo $this->Html->image('logo.png') ?>
	</div>
	
	<div id="login-content-left">
		<p>Hier kunnen de docenten van de Emmausschool Rotterdam inloggen met de door school verkregen gegevens. </p>
	
		<p>Ben je docent en heb je nog geen inloggegevens ontvangen?</p>
	
		<p>Neem <a href="mailto:mvdlinden@emmaus-rotterdam.nl">contact</a> op met de beheerder.</p>
	
	</div>
	
	<div id="login-content-right">
		<?php
			echo $this->Form->create();
			echo $this->Form->input('username', array('label' => 'Gebruikersnaam'));
			echo $this->Form->input('password', array('label' => 'Wachtwoord', 'type' => 'password'));
			echo $this->Form->end('Login');
		?>	
	</div>
</div>