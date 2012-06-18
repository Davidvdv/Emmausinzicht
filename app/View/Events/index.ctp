<h2>Activiteiten</h2>
<div id="events" class="index">
	
	<?php echo $this->Html->link('Uitgaves', array('action' => 'dates')) ?>
	
	<p>
	<?php echo $this->Html->image('aanmaken-button.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Nieuwe activiteit aanmaken', array('controller' => 'events', 'action' => 'add')); ?>
	</p>
	<?php
	$i = 0;
	foreach ($events as $event): ?>
	<div class="event">
		<div class="right">
		<?php echo $this->Form->postLink($this->Html->image('verwijderen-button.png', array('class' => 'right','alt' => '')), array( 'action' => 'delete', $event['Event']['id']), array('escape' => false), __('Weet je zeker dat je de activiteit wilt verwijderen # %s?', $event['Event']['id'])); ?>
		<?php 
			echo $this->Html->link($this->Html->image('wijzigen-button.png', array('class' => 'right','alt' => '')), array('action' => 'edit', $event['Event']['id']), array('escape' => false));?> 
		</div>
		<div class="event_header">
			<?php // titel afbreken als die langer dan 30 tekens is
				$title = $event['Event']['title']; 
				 if (strlen($title) >= 40){
					  echo substr($title, 0, 40)."...";
					}
					else {
						echo $title;
					}?>		 
		</div>
		<div class="event_info">
			 <?php echo $this->Html->image("activiteit.png", array('class' => 'event_image',
   					 	'url' => array('controller' => 'events', 'action' => 'view', $event['Event']['id']) )); ?>
		</div>
		<div class="create_on">
			<?php echo $event['User']['firstname'] . ' '. $event['User']['lastname']; ?>
			<?php echo $event['Event']['created_on']; ?>
		</div>
	</div>
	<?php
	endforeach; 
	?>
	<div class="clear"></div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} van de {:pages}, {:current} activteiten van de {:count} in totaal, Begint bij {:start}, eindigt op {:end}')
	));
	?>
	</p>

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