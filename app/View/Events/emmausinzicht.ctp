
<div id="emmausinzicht">
	<?php echo $this->Html->image('logo.png', array('style'=>'text-align:center'))?>
	<?php foreach($emmausinzicht as $inz): ?>
	<div class="event-view">
		<div class="event-view-title">
		<h1><?php echo $inz['Event']['title']; ?></h1>
			
		<?php if(!empty($inz['Group'])): ?>
			<p class="right">
		<?php foreach($inz['Group'] as $group): ?>
			<?php echo $group['name'] ?>
		<?php endforeach; ?>
		</p>
		<?php endif; ?>
		</div>
		<div class="event-view-photo">
			&nbsp;
			<?php if(!empty($inz['Image'])):
			foreach($inz['Image'] as $image): ?>
				<?php echo $this->Html->image('uploads/'.$image['url'], array("alt" => $image['url'])); ?>
			<?php endforeach; endif; ?>
		</div>
		<div class="event-view-column">
			<p class="right">Op: <?php echo $this->EuropeanTime->createEUdate($inz['Event']['date']) ?></p>
			<?php echo $inz['Event']['description']; ?>
		</div>
		<?php if(!empty($inz['Icon'])): ?>
		<div class="clear"></div>
		<div class="event-view-icons">
			<?php foreach($inz['Icon'] as $icon): ?>
				<?php echo $this->Html->image('icons/'.$icon['url']); ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
</div>