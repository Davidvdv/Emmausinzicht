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
					<?php echo $this->Html->link('Bekijk', array('controller' => 'elders', 'action' => 'view', $elder['id'])); ?>
					<?php echo $this->Html->link('Bewerk', array('controller' => 'elders', 'action' => 'edit', $elder['id'])); ?>
					<?php echo $this->Form->postLink('Verwijder', array('controller' => 'elders', 'action' => 'delete', $elder['id']), null, __('Weet u zeker dat u deze ouder wilt verwijderen # %s?', $elder['id'])); ?>
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
		<li><?php echo $this->Html->link('Gegevens van een kind aanpassen', array('action' => 'edit', $kid['Kid']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Verwijder gegevens van een kind', array('action' => 'delete', $kid['Kid']['id']), null, __('Weet u zeker dat u dit kind wilt verwijderen # %s?', $kid['Kid']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe gegevens van een kind toevoegen', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe groep', array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuw ouder-account', array('controller' => 'elders', 'action' => 'add')); ?> </li>
	</ul>
</div>