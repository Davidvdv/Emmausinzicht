<h2>Groep</h2>

<div class="groups view">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Naam</dt>
		<th class="actions">Acties</th>
	</tr>
	<tr>
		<td><?php echo h($group['Group']['name']); ?>
		&nbsp;</td>
		<td><?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'groups','action' => 'edit', $group['Group']['id']), array('escape' => false)); ?>
		<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('controller' => 'elders','action' => 'delete', $group['Group']['id']), array('escape' => false), __('Weet je zeker dat je deze groep wilt verwijderen # %s?', $group['Group']['id'])); ?></td>
	</tr>
	</table>
	<div class="related">
		<h3>Kinderen in deze groep</h3>
		<?php if (!empty($group['Kid'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Geboortedatum</th>
			<th>Groep</th>
			<th class="actions">Acties</th>
		</tr>
		<?php
			$i = 0;
			foreach ($group['Kid'] as $kid): ?>
			<tr>
				<td><?php echo $this->Html->link($kid['firstname'], array('controller' => 'kids','action' => 'view', $kid['id']));?></td>
				<td><?php echo $this->Html->link($kid['lastname'], array('controller' => 'kids','action' => 'view', $kid['id']));?></td>
				<td><?php echo $kid['date_of_birth'];?></td>
				<td><?php echo $kid['group_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'kids','action' => 'edit', $kid['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('controller' => 'kids','action' => 'delete', $kid['id']), array('escape' => false), __('Weet je zeker dat je de gegevens van het kind wilt verwijderen # %s?', $kid['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</div>
	
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Vooruit- en terugblikken', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>