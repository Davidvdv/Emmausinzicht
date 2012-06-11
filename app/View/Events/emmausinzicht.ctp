<div id="emmausinzicht">
	<?php foreach($emmausinzicht as $inz): ?>
	<div class="event-view">
			<div class="event-view-title">
				<h1><?php echo $inz['Event']['title']; ?></h1>
			</div>
			<div class="event-view-photo">
				&nbsp;
				<?php if(!empty($inz['Image'])):
				foreach($inz['Image'] as $image): ?>
					<?php echo $this->Html->image('uploads/'.$image['url'], array("alt" => $image['url'])); ?>
				<?php endforeach; endif; ?>
			</div>
			<div class="event-view-column">
				<?php echo $inz['Event']['description']; ?>
			</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
</div>