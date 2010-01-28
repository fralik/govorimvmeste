<div class="cities index">
<h2><?php echo 'Cities';?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('country_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th class="actions"><?php echo 'Actions';?></th>
</tr>
<?php
$i = 0;
foreach ($cities as $city):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $city['City']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($city['Country']['name'], array('controller' => 'countries', 'action' => 'view', $city['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $city['City']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('View', array('action' => 'view', $city['City']['id'])); ?>
			<?php echo $html->link('Edit', array('action' => 'edit', $city['City']['id'])); ?>
			<?php echo $html->link('Delete', array('action' => 'delete', $city['City']['id']), null, sprintf('Are you sure you want to delete # %s?', $city['City']['id'])); ?>
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
		<li><?php echo $html->link('New City', array('action' => 'add')); ?></li>
		<li><?php echo $html->link('List Countries', array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Country', array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New User', array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
