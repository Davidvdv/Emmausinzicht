

<?php foreach ($events as $event): ?>
    <tr>
        <td><?php echo $event['Event']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($event['Event']['title'],
array('controller' => 'events', 'action' => 'view', $event['Event']['id'])); ?>
        </td>
        <td><?php echo $event['Event']['created_on']; ?></td>
    </tr>
    <?php endforeach; ?>