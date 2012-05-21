<h2>Vooruit- en terugblikken</h2>
<div id="events">

	<?php
	$i = 1; 
	foreach ($events as $event): ?>
	<div class="event">
	<?php echo $this->Html->link($event['Event']['title'], array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>
	<p><?php echo $event['Event']['description']; ?></p>
	<?php 
		echo $event['Event']['created_on'];
		echo $event['User']['firstname'] . ' '. $event['User']['lastname'];
	?>
	</div>
	<?php
	if($i == 3) {
		$i = 0;
		echo '<div class="clear"></div>';
	}
	$i++;
	
	endforeach; 
	?>
	<div class="clear"></div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} van de {:pages}, {:current} blikken van de {:count} in totaal, Begint bij {:start}, eindigt op {:end}')
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