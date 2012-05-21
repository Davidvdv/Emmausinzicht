<h2>Groep</h2>

<div class="groups view">
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="related">
		<h3>Kinderen in deze groep</h3>
		<?php if (!empty($group['Kid'])):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Firstname'); ?></th>
			<th><?php echo __('Lastname'); ?></th>
			<th><?php echo __('Date Of Birth'); ?></th>
			<th><?php echo __('Group Id'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($group['Kid'] as $kid): ?>
			<tr>
				<td><?php echo $kid['firstname'];?></td>
				<td><?php echo $kid['lastname'];?></td>
				<td><?php echo $kid['date_of_birth'];?></td>
				<td><?php echo $kid['group_id'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'kids', 'action' => 'view', $kid['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'kids', 'action' => 'edit', $kid['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'kids', 'action' => 'delete', $kid['id']), null, __('Are you sure you want to delete # %s?', $kid['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</div>
	
</div>
<div class="actions">
	<h3>Acties</h3>
	<ul>
		<li><?php echo $this->Html->link('Docenten', array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link('Ouders', array('controller' => 'elders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Kinderen', array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Groepen', array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Vooruit- en terugblikken', array('controller' => 'events', 'action' => 'index')); ?> </li>
	</ul>
</div>