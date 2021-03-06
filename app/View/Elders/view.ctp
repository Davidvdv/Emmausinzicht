<h2>Ouder</h2>

<div class="elders view">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>E-mailadres</th>
		<th class="actions">Acties</th>
	</tr>
	<tr>
		<td><?php echo h($elder['Elder']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($elder['Elder']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($elder['Elder']['email']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'elders','action' => 'edit', $elder['Elder']['id']), array('escape' => false)); ?>
		<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('controller' => 'elders','action' => 'delete', $elder['Elder']['id']), array('escape' => false), __('Weet je zeker dat je deze ouder wilt verwijderen # %s?', $elder['Elder']['id'])); ?></td>
	</tr>
	</table>
	
	<div class="related">
		<?php if (!empty($elder['Kid'])):?>
		<h3>Kinderen van de ouders</h3>
			
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Geboortedatum</th>
			<th>Groep</th>
			<th class="actions">Acties</th>
		</tr>
		<?php
			foreach ($elder['Kid'] as $kid): ?>
			<tr>
				<td><?php echo $this->Html->link($kid['firstname'], array('controller' => 'kids','action' => 'view', $kid['id']));?></td>
				<td><?php echo $this->Html->link($kid['lastname'], array('controller' => 'kids','action' => 'view', $kid['id']));?></td>
				<td><?php echo $kid['date_of_birth'];?></td>
				<td><?php echo $kid['group_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'kids','action' => 'edit', $kid['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('action' => 'delete', $elder['Elder']['id']), array('escape' => false), __('Weet je zeker dat je het ouder-account wilt verwijderen # %s?', $elder['Elder']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Activiteiten', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>

