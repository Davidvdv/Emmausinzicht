<h2>Groepgegevens wijzigen</h2>

<div class="groups form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
<?php echo $this->Form->create('Group');?>
	<fieldset>
	<?php
		echo $this->Form->input('name', array('label', 'Naam van de groep'));
	?>
	</fieldset>
<?php echo $this->Form->end('Verstuur');?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink('Groep verwijderen', array('action' => 'delete', $this->Form->value('Group.id')), null, __('Weet u zeker dat u de groep wilt verwijderen # %s?', $this->Form->value('Group.id'))); ?></li>
		<li><?php echo $this->Html->link('Groepen', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe gegevens van een kind toevoegen', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
