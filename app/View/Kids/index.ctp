<div class="kids index">
	<h2>Kinderen</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
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
		<td><?php echo h($kid['Kid']['id']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($kid['Kid']['date_of_birth']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($kid['Group']['name'], array('controller' => 'groups', 'action' => 'view', $kid['Group']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link('Bekijk', array('action' => 'view', $kid['Kid']['id'])); ?>
			<?php echo $this->Html->link('Bewerk', array('action' => 'edit', $kid['Kid']['id'])); ?>
			<?php echo $this->Form->postLink('Verwijder', array('action' => 'delete', $kid['Kid']['id']), null, __('Weet je zeker dat je het kind wilt verwijderen # %s?', $kid['Kid']['id'])); ?>
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
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Nieuw kind', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Lijst van groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe groep', array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link('Lijst van ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe ouder', array('controller' => 'elders', 'action' => 'add')); ?> </li>
	</ul>
</div>
