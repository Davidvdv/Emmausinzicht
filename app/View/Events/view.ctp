<h2>Bekijk een activiteit</h2>
 
<div id="event-page">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
	<fieldset class="event-view">
			<div class="event-view-title">
				<h1><?php echo $event['Event']['title']; ?></h1>
			</div>
			<div class="event-view-photo">
				&nbsp;
				<?php if(!empty($event['Image'])):
				foreach($event['Image'] as $image): ?>
					<?php echo $this->Html->image('uploads/'.$image['url'], array("alt" => $image['url'])); ?>
				<?php endforeach; endif; ?>
			</div>
			<div class="event-view-column">
				<?php echo $event['Event']['description']; ?>
			</div>
	</fieldset>

</div>
<div id="event-right-column" class="form">
	<fieldset>
		<h3>Activiteit voor de groepen</h3>
		<ul>
	<?php foreach ($event['Group'] as $group): ?>
		<li><?php echo $group['name'];?></li>
	<?php endforeach; ?>
	</ul>
	
	<h3>Publiceren op</h3>
	<?php echo $event['Event']['date']; ?>
	<h3>Publiceren op</h3>
	<?php echo $event['Event']['publish_on']; ?>
	<h3>Gemaakt op</h3>
	<?php echo $event['Event']['created_on']; ?>
	</fieldset>
</div>
