<div class="countries view">
<h2><?php  echo 'Country';?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Id'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $country['Country']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Name'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $country['Country']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Country', array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $html->link('Delete Country', array('action' => 'delete', $country['Country']['id']), null, sprintf('Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
		<li><?php echo $html->link('List Countries', array('action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Country', array('action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Cities', array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New City', array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo 'Related Cities';?></h3>
	<?php if (!empty($country['City'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php 'Id'); ?></th>
		<th><?php echo 'Country Id'; ?></th>
		<th><?php echo 'Name'; ?></th>
		<th class="actions"><?php echo 'Actions';?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['City'] as $city):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $city['id'];?></td>
			<td><?php echo $city['country_id'];?></td>
			<td><?php echo $city['name'];?></td>
			<td class="actions">
				<?php echo $html->link('View', array('controller' => 'cities', 'action' => 'view', $city['id'])); ?>
				<?php echo $html->link('Edit', array('controller' => 'cities', 'action' => 'edit', $city['id'])); ?>
				<?php echo $html->link('Delete', array('controller' => 'cities', 'action' => 'delete', $city['id']), null, sprintf('Are you sure you want to delete # %s?', $city['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link('New City', array('controller' => 'cities', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
