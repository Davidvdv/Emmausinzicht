<div class="elders view">
<h2>Ouder</h2>
	<dl>
		<dt>Id</dt>
		<dd>
			<?php echo h($elder['Elder']['id']); ?>
			&nbsp;
		</dd>
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
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Bewerk ouder', array('action' => 'edit', $elder['Elder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Verwijder ouder', array('action' => 'delete', $elder['Elder']['id']), null, __('Are you sure you want to delete # %s?', $elder['Elder']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Lijst van ouders', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe ouder', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuw kind', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3>Kinderen van de ouders</h3>
	<?php if (!empty($elder['Kid'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Id</th>
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
			<td><?php echo $kid['id'];?></td>
			<td><?php echo $kid['firstname'];?></td>
			<td><?php echo $kid['lastname'];?></td>
			<td><?php echo $kid['date_of_birth'];?></td>
			<td><?php echo $kid['group_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link('Bekijk', array('controller' => 'kids', 'action' => 'view', $kid['id'])); ?>
				<?php echo $this->Html->link('Bewerk', array('controller' => 'kids', 'action' => 'edit', $kid['id'])); ?>
				<?php echo $this->Form->postLink('Verwijder', array('controller' => 'kids', 'action' => 'delete', $kid['id']), null, __('Weet u zeker dat u het kind wil verwijderen # %s?', $kid['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link('Nieuw kind', array('controller' => 'kids', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
