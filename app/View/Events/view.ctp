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
			<div class="clear"></div>
			<div class="right">
			<?php
			foreach($event['Icon'] as $icon) {
				echo $this->Html->image('icons/'.$icon['url']);
			}
			?>
			</div>
	</fieldset>

</div>
<div id="event-right-column" class="form">
	<fieldset>
		<h3>Activiteit voor de groepen</h3>
		
		<?php if(!empty($event['Group'])) { 
				foreach($event['Group'] as $group):?>
					<p><?php echo $this->Html->link($group['name'], array('controller' => 'groups', 'action' => 'view', $group['id'])); ?></p>
				<?php endforeach; 
				} else { 
				echo "Nog niet gekoppeld aan groepen";
			} ?>
				
	<p><h3>Activiteit datum + tijd</h3>
	<?php echo $this->EuropeanTime->createEUdateTime($event['Event']['date']); ?></p>
	<p><h3>Publiceren op</h3>
	<?php echo $this->EuropeanTime->createEUdate($event['Event']['publish_on']); ?></p>
	<p><h3>Gemaakt op</h3>
	<?php echo $this->EuropeanTime->createEUdate($event['Event']['created_on']); ?></p>
	</fieldset>
</div>
