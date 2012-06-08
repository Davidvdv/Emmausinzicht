<h2>Kind</h2>

<div class="kids view">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>Geboortedatum</th>
		<th>Groep</th>
		<th class="actions">Acties</th>
	</tr>
	<tr>
		<td><?php echo h($kid['Kid']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($kid['Group']['name'], array('controller' => 'groups', 'action' => 'view', $kid['Group']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'kids','action' => 'edit', $kid['Kid']['id']), array('escape' => false)); ?>
		<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('controller' => 'kids','action' => 'delete', $kid['Kid']['id']), array('escape' => false), __('Weet je zeker dat je de gegevens van het kind wilt verwijderen # %s?', $kid['Kid']['id'])); ?></td>
	</tr>
	</table>

	<div class="related">
		<?php if (!empty($kid['Elder'])):?>
		<h3>Ouders van het kind</h3>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>E-mailadres</th>
			<th class="actions">Acties</th>
		</tr>
		<?php
			foreach ($kid['Elder'] as $elder): ?>
			<tr>
				<td><?php echo $this->Html->link($elder['firstname'], array('controller' => 'elders', 'action' => 'view', $elder['id']));?></td>
				<td><?php echo $this->Html->link($elder['lastname'], array('controller' => 'elders', 'action' => 'view', $elder['id']));?></td>
				<td><?php echo $elder['email'];?></td>
				<td class="actions">
					<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'elders','action' => 'edit', $elder['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('controller' => 'elders','action' => 'delete', $elder['id']), array('escape' => false), __('Weet je zeker dat je het ouder-account wilt verwijderen # %s?', $elder['id'])); ?>
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