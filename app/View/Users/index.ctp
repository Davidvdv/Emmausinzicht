<h2>Docenten</h2>

<div class="users index">
	<p>
	<?php echo $this->Html->image('aanmaken-button.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Nieuw docent-account aanmaken', array('controller' => 'users', 'action' => 'add')); ?>
	</p>
	<table cellpadding="0" cellspacing="0">
	<tr>
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
		<td><?php echo $this->Html->link(h($user['User']['username']), array('action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($user['User']['firstname']), array('action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($user['User']['lastname']), array('action' => 'view', $user['User']['id'])); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
			<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Weet je zeker dat je het docent-account wilt verwijderen # %s?', $user['User']['id'])); ?>
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
	<h3>Gegevens</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Vooruit- en terugblikken', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>
