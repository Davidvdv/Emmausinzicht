<?php foreach($emmausinzicht as $inz): ?>
<div class="event-view">
		<div id="event-view-title">
			<h1><?php echo $inz['Event']['title']; ?></h1>
		</div>
		<div id="event-view-photo">
			&nbsp;
			<?php if(!empty($inz['Image'])):
			foreach($inz['Image'] as $image): ?>
				<?php echo $this->Html->image('uploads/'.$image['url'], array("alt" => $image['url'])); ?>
			<?php endforeach; endif; ?>
		</div>
		<div id="event-view-column">
			<?php echo $inz['Event']['description']; ?>
		</div>
</div>
<?php endforeach; ?>