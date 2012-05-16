<div class="groups view">
<h2>Groep</h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Kids'), array('controller' => 'kids', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add')); ?> </li>
	</ul>
</div>
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

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Kid'), array('controller' => 'kids', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
