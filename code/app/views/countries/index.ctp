<div class="countries index">
<h2><?php echo 'Countries';?></h2>
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
	<th class="actions"><?php echo 'Actions';?></th>
</tr>
<?php
$i = 0;
foreach ($countries as $country):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $country['Country']['id']; ?>
		</td>
		<td>
			<?php echo $country['Country']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('View', array('action' => 'view', $country['Country']['id'])); ?>
			<?php echo $html->link('Edit', array('action' => 'edit', $country['Country']['id'])); ?>
			<?php echo $html->link('Delete', array('action' => 'delete', $country['Country']['id']), null, sprintf('Are you sure you want to delete # %s?', $country['Country']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.'previous', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('next'.' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('New Country', array('action' => 'add')); ?></li>
		<li><?php echo $html->link('List Cities', array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New City', array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
