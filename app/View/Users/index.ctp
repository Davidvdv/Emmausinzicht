<div class="users index">
	<h2>Docenten</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username', 'Gebruikersnaam');?></th>
			<th><?php echo $this->Paginator->sort('firstname', 'Voornaam');?></th>
			<th><?php echo $this->Paginator->sort('lastname', 'Achternaam');?></th>
			<th><?php echo $this->Paginator->sort('email', 'E-mailadres');?></th>
			<th class="actions"><?php echo 'Acties';?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('Bekijk', array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link('Bewerk', array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink('Verwijder', array('action' => 'delete', $user['User']['id']), null, __('Weet je zeker dat je de docent wilt verwijderen # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} van de {:pages}, {:current} docent(en) van de {:count} in totaal, begint bij {:start}, eindigt op {:end}')
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
		<li><?php echo $this->Html->link('Nieuwe docent', array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link('Lijst van ouders', array('controller' => 'elders', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Lijst van kinderen', array('controller' => 'kids', 'action' => 'index')); ?></li>
	</ul>
</div>
