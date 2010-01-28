<div class="cities view">
<h2><?php  echo 'City';?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Id'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $city['City']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Country'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($city['Country']['name'], array('controller' => 'countries', 'action' => 'view', $city['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Name'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $city['City']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit City', array('action' => 'edit', $city['City']['id'])); ?> </li>
		<li><?php echo $html->link('Delete City', array('action' => 'delete', $city['City']['id']), null, sprintf('Are you sure you want to delete # %s?', $city['City']['id'])); ?> </li>
		<li><?php echo $html->link('List Cities', array('action' => 'index')); ?> </li>
		<li><?php echo $html->link('New City', array('action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Countries', array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Country', array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New User', array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo 'Related Users';?></h3>
	<?php if (!empty($city['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo 'Id'; ?></th>
		<th><?php echo 'Name'; ?></th>
		<th><?php echo 'Surname'; ?></th>
		<th><?php echo 'Email'; ?></th>
		<th><?php echo 'Password'; ?></th>
		<th><?php echo 'City Id'; ?></th>
		<th><?php echo 'Message'; ?></th>
		<th><?php echo 'Gender'; ?></th>
		<th class="actions"><?php echo 'Actions';?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($city['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['name'];?></td>
			<td><?php echo $user['surname'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['city_id'];?></td>
			<td><?php echo $user['message'];?></td>
			<td><?php echo $user['gender'];?></td>
			<td class="actions">
				<?php echo $html->link('View', array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $html->link('Edit', array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $html->link('Delete', array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link('New User', array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
