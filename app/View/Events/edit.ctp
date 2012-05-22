<?php echo $this->Html->script('/ckeditor/ckeditor'); ?>

<h2>Blik aanpassen</h2>
<div class="form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
<?php
	echo $this->Form->create('Event', array('action' => 'edit'));
	echo $this->Form->input('title',array('label' => 'Titel'));
	echo $this->Form->input('description', array('rows' => '7', 'label' => 'Beschrijving', 'class' => 'ckeditor'));
	//echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->end('Verstuur');
?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Vooruit- en terugblikken', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>