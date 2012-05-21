<h2>Layouts</h2>

<div class="grids index">
	<p>Kies een layout waarin de vooruit- en terugblikken van de Emmausschool worden geladen.</p>
	<?php foreach ($grids as $grid): ?>
	<p><?php echo $grid['Grid']['name']; ?></p>
	<?php endforeach; ?>

</div>
<div class="actions">
	<h3>Gegevens</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
	</ul>
</div>
