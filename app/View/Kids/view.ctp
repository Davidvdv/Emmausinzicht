<h2>Kind</h2>

<div class="kids view">
	<dl>
		<dt>Voornaam</dt>
		<dd>
			<?php echo h($kid['Kid']['firstname']); ?>
			&nbsp;
		</dd>
		<dt>Achternaam</dt>
		<dd>
			<?php echo h($kid['Kid']['lastname']); ?>
			&nbsp;
		</dd>
		<dt>Geboortedatum</dt>
		<dd>
			<?php echo h($kid['Kid']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt>Groep</dt>
		<dd>
			<?php echo $this->Html->link($kid['Group']['name'], array('controller' => 'groups', 'action' => 'view', $kid['Group']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="related">
		<h3>Ouders van het kind</h3>
		<?php if (!empty($kid['Elder'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>E-mailadres</th>
			<th class="actions">Acties</th>
		</tr>
		<?php
			$i = 0;
			foreach ($kid['Elder'] as $elder): ?>
			<tr>
				<td><?php echo $elder['firstname'];?></td>
				<td><?php echo $elder['lastname'];?></td>
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
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Vooruit- en terugblikken', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>