<div class="languagesUsers view">
<h2><?php  echo 'LanguagesUser';?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Id'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Language Id'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['language_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'User Id'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo 'Offer'; ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['offer']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit LanguagesUser', array('action' => 'edit', $languagesUser['LanguagesUser']['id'])); ?> </li>
		<li><?php echo $html->link('Delete LanguagesUser', array('action' => 'delete', $languagesUser['LanguagesUser']['id']), null, sprintf('Are you sure you want to delete # %s?', $languagesUser['LanguagesUser']['id'])); ?> </li>
		<li><?php echo $html->link('List LanguagesUsers', array('action' => 'index')); ?> </li>
		<li><?php echo $html->link('New LanguagesUser', array('action' => 'add')); ?> </li>
	</ul>
</div>
