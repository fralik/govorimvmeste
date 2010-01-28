<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php //__('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');

		echo $scripts_for_layout;
	?>
<script language="JavaScript" type="text/javascript">
	function _init()
	{
		if (typeof(init) == 'function')
		{
			init();
		}
	}
</script>
</head>
<body onload="_init();">
	<div id="container">
		<div id="header">
			<h1><?php //echo $html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); 
				if (isset($projectnameHelper))
					echo $html->link($projectnameHelper->get(), array('controller' => 'users', 'action' => 'home')); ?></h1>
			<?php
				$tmp = $session->read('Auth.User');
				$menus = array('search', 'logged', 'edit_sign', 'out', 'terms', 'about');
				if (isset($languageHelper))
					$locale = $languageHelper->getLanguage($this->params);
				else
					$locale = 'eng';
				?><div id="navbar"><span class="inbar"><ul>
			<?php
				foreach ($menus as &$menu)
				{
					echo "<li><span>";
					$selected = $session->read('current_menu');
					$class = '';
                    $arrow_properties = array('vertical-align' => 'middle', 'align' => 'center');
					switch ($menu)
					{
						case "search":
							if (strcmp($selected, $menu) == 0)
							{
								$class = 'selected';
								echo $html->image('down_arrow.jpg', $arrow_properties);
							}
							else
							{
								echo $html->image('arrow.jpg', $arrow_properties);
							}

							echo $html->link(__("Search for the partner", true), array('controller'=>'users', 'action'=>'search', 'lang' => $locale), array('class' => $class));
							break;
						
						case "logged":
							if (strcmp($selected, $menu) == 0)
							{
								$class = 'selected';
								echo $html->image('down_arrow.jpg', $arrow_properties);
							}
							else
							{
								echo $html->image('arrow.jpg', $arrow_properties);
							}

							if (isset($tmp))
							{
								$str = __("Logged in as ", true) . $tmp['name'] . " " . $tmp['surname'];
								echo $str;
							}	
							else
							{
								$str = __('Create an account', true);
								echo $html->link($str, array('controller' => 'users', 'action' => 'add', 'lang' => $locale), array('class' => $class));
							}
							break;
						
						case "edit_sign":
							if (strcmp($selected, $menu) == 0)
							{
								$class = 'selected';
								echo $html->image('down_arrow.jpg', array('align' => 'center'));
							}
							else
							{
								echo $html->image('arrow.jpg', array('align' => 'center'));
							}
							
							if (isset($tmp))
							{
								echo $html->link(__('Edit profile', true), array('controller' => 'users', 'action' => 'edit', $tmp['id'], 'lang' => $locale ), array('class' => $class));
							}
							else
							{
								echo $html->link(__('Sign in', true), array('controller' => 'users', 'action' => 'login', 'lang' => $locale), array('class' => $class));
							}
							break;
						
						case "out":
							if (strcmp($selected, $menu) == 0)
							{
								$class = 'selected';
								echo $html->image('down_arrow.jpg', array('align' => 'center'));
							}
							else
							{
								echo $html->image('arrow.jpg', array('align' => 'center'));
							}

							if (isset($tmp))
							{
								echo $html->link(__('Sign out', true), array('controller' => 'users', 'action' => 'logout', 'lang' => $locale));
							}
							else
							{
								echo $html->link(__('Forgot your password?', true), array('controller' => 'users', 'action' => 'forgot', 'lang' => $locale), array('class' => $class));
							}
							break;
						
						case "terms":
							if (strcmp($selected, $menu) == 0)
							{
								$class = 'selected';
								echo $html->image('down_arrow.jpg', array('align' => 'center'));
							}
							else
							{
								echo $html->image('arrow.jpg', array('align' => 'center'));
							}

							echo $html->link(__('Regulations', true), array('controller' => 'info', 'action' => 'regulations', 'lang' => $locale), array('class' => $class));
							break;
						
						case "about":
							if (strcmp($selected, $menu) == 0)
							{
								$class = 'selected';
								echo $html->image('down_arrow.jpg', array('align' => 'center'));
							}
							else
							{
								echo $html->image('arrow.jpg', array('align' => 'center'));
							}

							echo $html->link(__('About', true), array('controller' => 'info', 'action' => 'about', 'lang' => $locale), array('class' => $class));
							break;
					}
					echo "</span></li>\n";
				}
				echo "</ul></span></div>";
			?>
					<!--<li><span><?php //echo __("Logged in as ", true) . $tmp['name'] . " " . $tmp['surname']; ?></span></li>
					<li><span><?php //echo $html->link(__('Edit profile', true), array('controller' => 'users', 'action' => 'edit', $tmp['id'] ));?>
							</span></li>
					<li><span><?php //echo $html->link(__('Sign out', true), array('controller' => 'users', 'action' => 'logout'));?>
							</span></li>
					<li><span><?php //echo $html->link(__('Regulations', true), array('controller' => 'pages', 'action' => 'regulations')); ?></span></li>
					<li><span><?php //echo $html->link(__('About', true), array('controller' => 'pages', 'action' => 'about')); ?></span></li>
					</ul></span></div>
				<?php
				//}
				//else
				//{
				?><div id="navbar"><span class="inbar"><ul>
					<li><span><?php //echo $html->link(__('Create an account', true), array('controller' => 'users', 'action' => 'add')); ?></span></li>
					<li><span><?php //echo $html->link(__('Sign in', true), array('controller' => 'users', 'action' => 'login'));?></span></li>
					<li><span><?php //echo $html->link(__('Forgot your password?', true), array('controller' => 'users', 'action' => 'forgot'));?></span></li>
					<li><span><?php //echo $html->link(__('Regulations', true), array('controller' => 'pages', 'action' => 'regulations')); ?></span></li>
					<li><span><?php //echo $html->link(__('About', true), array('controller' => 'pages', 'action' => 'about')); ?></span></li>
				</ul></span></div>-->
				<?php
				//}
				?>
		</div>
		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php 
				//echo "Current language: {$locale}<br>\n";
				switch ($locale)
				{
					case "rus":
						echo $html->link('In English', array('lang' => 'eng') + $this->params['pass']);
						break;
					case "eng":
						echo $html->link('По–русски', array('lang' => 'rus') + $this->params['pass']);
						break;
					//default:
						//echo $html->link('English', array('controller' => 'users', 'action' => 'lang', 'eng'));
						//break;
				}
			?><br>
			<p align="right"><?php __('developed'); ?></p>
			<?php //$domain = Router::url('/', true); echo $domain; ?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>