<?php echo $this->Html->script('/ckeditor/ckeditor'); ?>
<h2>Voeg een activiteit toe</h2>
<?php echo $this->Form->create('Event', array('type' => 'file')); ?>
 
<div id="event-page">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
	<fieldset class="event-view">
			<div class="event-view-title">
				<?php echo $this->Form->input('title', array('label' => 'Titel')); ?>
			</div>
			<div class="event-view-photo">
				<?php echo $this->Form->file('Image.file'); ?>
			</div>
			<div class="event-view-column">
				<?php echo $this->Form->input('description', array('class' => 'ckeditor', 'rows' => '7', 'label' => 'Tekst')); ?>
			</div>
	</fieldset>

</div>
<div id="event-right-column" class="form">
	
		<a href="#" id="all-groups">Selecteer alle groepen</a>
	<?php 
		echo $this->Form->input('Group',array(
			'label' => 'Groepen',
			'multiple' => 'checkbox',
			'options' => $groups
		)); ?>
	<div class="clear"></div>
	<?php	echo $this->Form->input('date',array('type' =>'text', 'id'=>'datetimepicker-date','label' => 'Het is gebeurd of gaat gebeuren op'));
		echo $this->Form->input('publish_on',array('type' =>'text', 'id'=>'datetimepicker-publish', 'label' => 'Uitbrengen op'));
	?>
	
	
</div>
<div id="picto">
	<?php
	//debug($icons);
	/*foreach($icons as $key => $value): 
		echo $this->Form->input('Icon',array(
			'label' => false,
			'multiple' => 'checkbox',
			'options' => $icons
		));
		echo $this->Html->image('icons/'.$value['Icon']['url'], array("alt" => $value['Icon']['name'])); 
	
	endforeach; */
	echo $this->Form->input('Pictogrammen',array(
			'multiple' => 'checkbox',
			'options' => $icons
		)); ?> 

		
	<?php echo $this->Form->end('Verstuur'); ?>
</div>
