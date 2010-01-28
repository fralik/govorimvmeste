<div class="languages view">
<h2><?php  echo 'Language';?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Id'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $language['Language']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Name'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $language['Language']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Language', array('action' => 'edit', $language['Language']['id'])); ?> </li>
		<li><?php echo $html->link('Delete Language', array('action' => 'delete', $language['Language']['id']), null, sprintf('Are you sure you want to delete # %s?', $language['Language']['id'])); ?> </li>
		<li><?php echo $html->link('List Languages', array('action' => 'index')); ?> </li>
		<li><?php echo $html->link('New Language', array('action' => 'add')); ?> </li>
		<li><?php echo $html->link('List Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link('New User', array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php 'Related Users');?></h3>
	<?php if (!empty($language['User'])):?>
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
		<th><?php echo 'Group Id'; ?></th>
		<th><?php echo 'Created'; ?></th>
		<th><?php echo 'Modified'; ?></th>
		<th class="actions"><?php 'Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($language['User'] as $user):
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
			<td><?php echo $user['group_id'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
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
