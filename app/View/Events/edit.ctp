<?php echo $this->Html->script('/ckeditor/ckeditor'); ?>
<h2>Pas een activiteit aan</h2>
<?php echo $this->Form->create('Event'); ?>
 
<div id="event-page">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
	<fieldset class="event-view">
			<div id="event-view-title">
				<?php echo $this->Form->input('title', array('label' => 'Titel')); ?>
			</div>
			<div class="event-view-photo">
				&nbsp;
				<?php
				if(!empty($this->request->data['Image'])):
				foreach($this->request->data['Image'] as $image): ?>
					<?php echo $this->Html->image('uploads/'.$image['url'], array("alt" => $image['url'])); ?>
				<?php endforeach; endif; ?>
			</div>
			<div class="event-view-column">
				<?php echo $this->Form->input('description', array('class' => 'ckeditor', 'rows' => '7', 'label' => 'Tekst')); ?>
			</div>
	</fieldset>

</div>
<div id="event-right-column" class="form">
	<a href="#" id="all-groups">Selecteer alle groepen</a>
	<fieldset>
	<?php 
		echo $this->Form->input('Group',array(
			'label' => 'Groepen',
			'multiple' => 'checkbox',
			'options' => $groups
		));
	?>
	<div class="clear"></div>
	<?php
		echo $this->Form->input('date',array('type' =>'text', 'id'=>'datetimepicker-date','label' => 'Het is gebeurd of gaat gebeuren op'));
		echo $this->Form->input('publish_on',array('type' =>'text', 'id'=>'datetimepicker-publish', 'label' => 'Uitbrengen op'));
	?>
	</fieldset>
</div>
<div id="picto">
	<h2>Pictogrammen</h2>
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
	echo $this->Form->input('Icon',array(
			'label' => 'Iconen',
			'multiple' => 'checkbox',
			'options' => $icons
		));
		
	echo $this->Form->end('Verstuur'); ?>
</div>