<div class="users index">
<h2><?php echo 'Users';?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('surname');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('password');?></th>
	<th><?php echo $paginator->sort('city_id');?></th>
	<th><?php echo $paginator->sort('message');?></th>
	<th><?php echo $paginator->sort('gender');?></th>
	<th><?php echo $paginator->sort('group_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php echo 'Actions';?></th>
</tr>
<?php
$i = 0;
foreach ($users as $user):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $user['User']['id']; ?>
		</td>
		<td>
			<?php echo $user['User']['name']; ?>
		</td>
		<td>
			<?php echo $user['User']['surname']; ?>
		</td>
		<td>
			<?php echo $user['User']['email']; ?>
		</td>
		<td>
			<?php echo $user['User']['password']; ?>
		</td>
		<td>
			<?php echo $html->link($user['City']['name'], array('controller' => 'cities', 'action' => 'view', $user['City']['id'])); ?>
		</td>
		<td>
			<?php echo $user['User']['message']; ?>
		</td>
		<td>
			<?php echo $user['User']['gender']; ?>
		</td>
		<td>
			<?php echo $user['User']['group_id']; ?>
		</td>
		<td>
			<?php echo $user['User']['created']; ?>
		</td>
		<td>
			<?php echo $user['User']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('View', array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $html->link('Delete', array('action' => 'delete', $user['User']['id']), null, sprintf('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('New User', array('action' => 'add')); ?></li>
		<li><?php echo $html->link('List Cities', array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New City', array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Countries', array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Country', array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Languages', array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Offer', array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
