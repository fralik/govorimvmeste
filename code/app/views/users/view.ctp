<?php
App::import('Controller', 'users');
$Users = new UsersController;
$Users->constructClasses();
$isAdmin = $Users->isAdmin();
$user_id = $session->read('Auth.User.id');


foreach ($user['Offer'] as &$lang)
{
	$offers[] = array(__($lang['name'], true), __($lang['LanguagesUser']['level'], true));
}
asort($offers);

foreach ($user['Want'] as &$lang)
{
	$lang_name = __($lang['name'], true);
	$wants[] = array($lang_name);
}
asort($wants);
?>
<div class="users view">
<h2><?php  __('Personal information');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<?php
			if ($isAdmin)
			{ 
		?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<?php } ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Surname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['surname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			//echo $mailto->createLink($user['User']['email'], __('Send a message', true)); 
			$mailto->createLink($user['User']['email'], $user['User']['id'], __('View email', true)); 
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php __($user['Country']['name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('City'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php __($user['City']['name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gender'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo __($user['User']['gender'], true); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Age'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo __($user['User']['age'], true); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php 
			if (strlen($user['User']['message']) > 0)
			{
				__('Message'); 
			}
			?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
				if (strlen($user['User']['message']) > 0)
				{
					echo $user['User']['message'];
				}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Speaks'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				$str = "";
				foreach ($offers as $lang)
				{
					//$lang_name = __($lang['name'], true);
					//$level = __($lang['LanguagesUser']['level'], true);
					$lang_name = $lang[0];
					$level = $lang[1];
					$str = $str . $lang_name . " ({$level}), ";
				}
				$str = substr_replace($str, "", -2);
				echo $str;
			?>
			&nbsp;
		</dd>
		<!-- Want to learn -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('search_page_looking_for'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				$str = "";
				foreach ($wants as $lang)
				{
					//$lang_name = __($lang['name'], true);
					$lang_name = $lang[0];
					$str = $str . $lang_name . ", ";
				}
				$str = substr_replace($str, "", -2);
				echo $str;
			?>
			&nbsp;
		</dd>
		<?php
			if ($isAdmin)
			{ 
		?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['group_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Last login'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['last_login']; ?>
			&nbsp;
		</dd>
		<?php } ?>
	</dl>
</div>
<?php
if ($isAdmin)
{
?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
<?php
}
else
{
	if (isset($user_id) && $user_id == $user['User']['id'])
	{
		?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
	</ul>
</div>
	<?php
	}
}
?>

