<div class="groups index">
	<h2>Groepen</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name', 'Naam van de groep');?></th>
			<th class="actions">Acties</th>
	</tr>
	<?php
	$i = 0;
	foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('Bekijk', array('action' => 'view', $group['Group']['id'])); ?>
			<?php echo $this->Html->link('Bewerk', array('action' => 'edit', $group['Group']['id'])); ?>
			<?php echo $this->Form->postLink('Verwijder', array('action' => 'delete', $group['Group']['id']), null, __('Weet u zeker dat u de groep wilt verwijderen? # %s?', $group['Group']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} van de {:pages}, {:current} groep(en) van de {:count} in totaal, begint bij {:start}, eindigt op {:end}')
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
		<li><?php echo $this->Html->link('Nieuwe groep', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuw kind', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
