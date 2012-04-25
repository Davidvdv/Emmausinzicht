<div class="users form">
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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
	</ul>
</div>
