<div class="languagesUsers view">
<h2><?php  __('LanguagesUser');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Language Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['language_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Offer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $languagesUser['LanguagesUser']['offer']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit LanguagesUser', true), array('action' => 'edit', $languagesUser['LanguagesUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete LanguagesUser', true), array('action' => 'delete', $languagesUser['LanguagesUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $languagesUser['LanguagesUser']['id'])); ?> </li>
		<li><?php echo $html->link(__('List LanguagesUsers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New LanguagesUser', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
