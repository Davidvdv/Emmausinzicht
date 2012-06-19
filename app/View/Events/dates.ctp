<h2>Inzichten</h2>
<div class="index">
	<p>
	<?php echo $this->Html->image('pijl.png', array('alt' => '')); ?> 
	<?php echo $this->Html->link('Terug naar het overzicht', array('controller' => 'events', 'action' => 'index')); ?>
	</p>
	
		<div id="accordion">
		<?php foreach($inzichten as $k => $date): ?>
			<h3><a href="#"><?php echo $k ?></a></h3>
			<div>
				<?php echo $this->Html->link('Bekijk', array('action' => 'emmausinzicht', $k), array('class'=> 'float-right')); ?>
				<?php echo $this->Html->link('Verstuur', array('action' => 'send', $k), array('class'=> 'float-right')); ?>
				<?php echo $this->Html->image('view-button.png', array('class' => 'float-right'));?>
			<?php foreach($date as $inzicht): ?>
				<table cellpadding="0" cellspacing="0">
					<tr><td><?php echo $this->Html->link($inzicht['Event']['title'], array('action' => 'view', $inzicht['Event']['id'])); ?></td>
			<?php endforeach;?>
			<?php if(!empty($inzicht['Group'])) { ?>
				<td><?php
				foreach($inzicht['Group'] as $inz):?>
					<p><?php echo $this->Html->link($inz['name'], array('controller' => 'groups', 'action' => 'view', $inz['id'])); ?></p>
				<?php endforeach; ?>
				</td>
			<?php } else { ?>
				<td>Nog niet gekoppeld aan groepen</td>
			<?php } ?>
				</tr></table>
			</div>
		<?php endforeach; ?>
		</div>

</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Activiteiten', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>
