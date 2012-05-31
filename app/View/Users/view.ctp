<h2>Docent</h2>
<div class="users view">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('action' => 'index')); ?>
	</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Gebruikersnaam</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>E-mailadres</th>
			<th>Acties</th>
		</tr>
		<tr>
			<td><?php echo h($user['User']['username']); ?>
			&nbsp;</td>
			<td><?php echo h($user['User']['firstname']); ?>
			&nbsp;</td>
			<td><?php echo h($user['User']['lastname']); ?>
			&nbsp;</td>
			<td><?php echo h($user['User']['email']); ?>
			&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link($this->Html->image('wijzigen-button.png', array('alt' => '')), array('controller' => 'users','action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('alt' => '')), array('controller' => 'users','action' => 'delete', $user['User']['id']), array('escape' => false), __('Weet je zeker dat je dit docent-account wilt verwijderen # %s?', $user['User']['id'])); ?>
			</td>
		</tr>
	</table>
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
