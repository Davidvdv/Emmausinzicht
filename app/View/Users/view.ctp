<div class="users view">
<h2>Docent</h2>
	<dl>
		<dt>Gebruikersnaam</dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt>Voornaam</dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt>Achternaam</dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt>E-mailadres</dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>Actie</h3>
	<ul>
		<li><?php echo $this->Html->link('Bewerk docent', array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Verwijder docent', array('action' => 'delete', $user['User']['id']), null, __('Weet u zeker dat u deze docent wilt verwijderen # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Lijst van docenten', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Nieuwe docent', array('action' => 'add')); ?> </li>
	</ul>
</div>
