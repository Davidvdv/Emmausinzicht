<h2>Ouder</h2>

<div class="elders view">
	<dl>
		<dt>Voornaam</dt>
		<dd>
			<?php echo h($elder['Elder']['firstname']); ?>
			&nbsp;
		</dd>
		<dt>Achternaam</dt>
		<dd>
			<?php echo h($elder['Elder']['lastname']); ?>
			&nbsp;
		</dd>
		<dt>E-mailadres</dt>
		<dd>
			<?php echo h($elder['Elder']['email']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="related">
		<h3>Kinderen van de ouders</h3>
		<?php if (!empty($elder['Kid'])):?>
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
			foreach ($elder['Kid'] as $kid): ?>
			<tr>
				<td><?php echo $this->Html->link($kid['firstname'], array('action' => 'view', $kid['id']));?></td>
				<td><?php echo $this->Html->link($kid['lastname'], array('action' => 'view', $kid['id']));?></td>
				<td><?php echo $kid['date_of_birth'];?></td>
				<td><?php echo $kid['group_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('action' => 'edit', $elder['Elder']['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('action' => 'delete', $elder['Elder']['id']), array('escape' => false), __('Weet je zeker dat je het ouder-account wilt verwijderen # %s?', $elder['Elder']['id'])); ?>
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
		<li><?php echo $this->Html->link('Ouder-accountgegevens aanpassen', array('action' => 'edit', $elder['Elder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Verwijder ouder-account', array('action' => 'delete', $elder['Elder']['id']), null, __('Are you sure you want to delete # %s?', $elder['Elder']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Ouders', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuw ouder-account aanmaken', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe gegevens van een kind toevoegen', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>

