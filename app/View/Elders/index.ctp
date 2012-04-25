<div class="elders index">
	<h2>Ouders</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('firstname', 'Voornaam');?></th>
			<th><?php echo $this->Paginator->sort('lastname', 'Achternaam');?></th>
			<th><?php echo $this->Paginator->sort('email', 'E-mailadres');?></th>
			<th class="actions">Acties</th>
	</tr>
	<?php
	$i = 0;
	foreach ($elders as $elder): ?>
	<tr>
		<td><?php echo h($elder['Elder']['id']); ?>&nbsp;</td>
		<td><?php echo h($elder['Elder']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($elder['Elder']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($elder['Elder']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('Bekijk', array('action' => 'view', $elder['Elder']['id'])); ?>
			<?php echo $this->Html->link('Bewerk', array('action' => 'edit', $elder['Elder']['id'])); ?>
			<?php echo $this->Form->postLink('Verwijder', array('action' => 'delete', $elder['Elder']['id']), null, __('Are you sure you want to delete # %s?', $elder['Elder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} van de {:pages}, {:current} ouder(s) van de {:count} in totaal, Begint bij {:start}, eindigt op {:end}')
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
		<li><?php echo $this->Html->link('Nieuwe ouder', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuw kind', array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
