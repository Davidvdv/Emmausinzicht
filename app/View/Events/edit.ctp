<?php echo $this->Html->script('/ckeditor/ckeditor'); ?>
<h2>Pas een activiteit aan</h2>
<?php echo $this->Form->create('Event'); ?>
 
<div id="event-page">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
	<?php
		$current_year = date('Y');
		$min_year = $current_year;
		$max_year = $current_year+8;
	?>
	<fieldset id="event-view">
			<div id="event-view-title">
				<?php echo $this->Form->input('title', array('label' => 'Titel')); ?>
			</div>
			<div id="event-view-photo">
				&nbsp;
			</div>
			<div id="event-view-column">
				<?php echo $this->Form->input('description', array('class' => 'ckeditor', 'rows' => '7', 'label' => 'Tekst')); ?>
			</div>
	</fieldset>

</div>
<div id="event-right-column" class="form">
	<fieldset>
	<?php 
		echo $this->Form->input('Group',array(
			'label' => 'Groepen',
			'multiple' => 'checkbox',
			'options' => $groups
		));
	
		echo $this->Form->input('date',array('minYear'=> $current_year-8,'maxYear'=>$max_year, 'label' => 'Het is gebeurd of gaat gebeuren op', 'dateFormat' => 'DMY'));
		echo $this->Form->input('publish_on',array('minYear'=>$min_year,'maxYear'=>$max_year, 'label' => 'Uitbrengen op', 'dateFormat' => 'DMY'));
	?>
	</fieldset>
	<?php echo $this->Form->end('Verstuur'); ?>
</div>
