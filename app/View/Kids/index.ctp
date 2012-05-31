<h2>Kinderen</h2>

<div class="kids index">
	<p>
	<?php echo $this->Html->image('aanmaken-button.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Nieuwe gegevens van een kind toevoegen', array('controller' => 'kids', 'action' => 'add')); ?>
	</p>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('firstname', 'Voornaam');?></th>
			<th><?php echo $this->Paginator->sort('lastname', 'Achternaam');?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth', 'Geboortedatum');?></th>
			<th><?php echo $this->Paginator->sort('group_id', 'Groep');?></th>
			<th class="actions">Acties</th>
	</tr>
	<?php
	$i = 0;
	foreach ($kids as $kid): ?>
	<tr>
		<td><?php echo $this->Html->link(h($kid['Kid']['firstname']), array('action' => 'view', $kid['Kid']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($kid['Kid']['lastname']), array('action' => 'view', $kid['Kid']['id'])); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['date_of_birth']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($kid['Group']['name'], array('controller' => 'groups', 'action' => 'view', $kid['Group']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('action' => 'edit', $kid['Kid']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('action' => 'delete', $kid['Kid']['id']), array('escape' => false), __('Weet je zeker dat je het kind wilt verwijderen # %s?', $kid['Kid']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} van de {:pages}, {:current} kind(eren) van de {:count} in totaal, begint bij {:start}, eindigt op {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< Vorige', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('Volgende >', array(), null, array('class' => 'next disabled'));
	?>
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
