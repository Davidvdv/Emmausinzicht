<?php echo $this->Html->script('/ckeditor/ckeditor'); ?>
<h2>Voeg een activiteit toe</h2> 
<div id="events-form">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
<?php
	$current_year = date('Y');
	$min_year = $current_year;
	$max_year = $current_year+8;
	echo $this->Form->create('Event');
?>
	<fieldset>
<?php
	echo $this->Form->input('title', array('label' => 'Titel'));
	echo $this->Form->input('date',array('minYear'=> $current_year-8,'maxYear'=>$max_year, 'label' => 'Het is gebeurd of gaat gebeuren op', 'dateFormat' => 'DMY'));
	echo $this->Form->input('description', array('rows' => '7', 'label' => 'Tekst', 'class'=>'ckeditor'));
	echo $this->Form->input('publish_on',array('minYear'=>$min_year,'maxYear'=>$max_year, 'label' => 'Uitbrengen op', 'dateFormat' => 'DMY'));
?>
	</fieldset>

</div>
<div id="events-right">
	<?php 
	echo $this->Form->input('Group',array(
		'label' => 'Groepen',
		'multiple' => 'checkbox',
		'options' => $groups
	));
	echo $this->Form->end('Verstuur');
	?>
	
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Activiteiten', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>