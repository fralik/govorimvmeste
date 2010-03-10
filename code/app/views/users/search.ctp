<?php 
$js_path = $languageHelper->getJsPath($this->params);
$javascript->link($js_path . 'c_c.js', false);
$javascript->link('cc_logic.js', false);

App::import('Sanitize');
App::import('Controller', 'Countries');
// We need to load the class
$Countries = new CountriesController;
// If we want the model associations, components, etc to be loaded
$Countries->constructClasses();
$countries = $Countries->Country->find('all');

App::import('Controller', 'Languages');
// We need to load the class
$Languages = new LanguagesController;
// If we want the model associations, components, etc to be loaded
$Languages->constructClasses();
$languages = $Languages->Language->find('all');

foreach ($languages as $language)
{
	$value = $language['Language']['id'];
	$language_opt["$value"] = __($language['Language']['name'], true);
}
asort($language_opt);


App::import('Controller', 'users');
$Users = new UsersController;
$Users->constructClasses();
$isAdmin = $Users->isAdmin();

$int_lang = $languageHelper->getLanguage($this->params);
$lang_id = '0';
$country_id = '0';
$city_id = '0';

if (isset($this->params['url']['language']))
{
	$allowed = array('0','1','2','3','4','5','6','7','8','9');
	$lang_id = Sanitize::paranoid($this->params['url']['language']);
	
	if (isset($this->params['url']['country']))
		$country_id = Sanitize::paranoid($this->params['url']['country']);

	if (isset($this->params['url']['city']))
		$city_id = Sanitize::paranoid($this->params['url']['city']);

	$str = "?language=" . $lang_id . "&country=".$country_id . "&city=".$city_id;
}

//pr($this);
if (isset($paginator))
{
	$paginator->options(array('url' => array_merge(array('lang' => $int_lang))) );
	$paginator->options['url']['?'] = $str;
}

$users_count = 0;
if (isset($users))
{
	$users_count = count($users);
}
if ($users_count > 0)
{
	if (isset($paginator))
		echo $paginator->counter(array(
			'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
		));
}
	$selected_language = $lang_id;
?>
<div class="search options">
<h2><?php __('Search conditions');?></h2>
<?php
	echo $form->create(null, array('url' => array('controller' => 'users', 'action' => 'search' ), 'type' => 'get') );
	?>
	<dl>
		<dt class="altrow"><?php __('search_language');?></dt>
		<dd class="altrow"><?php 
		echo $form->select('language', $language_opt, $selected_language, array('class' => 'bigger'), false );
	    echo " "; ?>&nbsp;
		
		</dd>
		<dt><?php __('Country'); ?></dt>
		<dd><?php echo $form->select(
					'country', // field name
					array(), // choices
					null, // selected index
					array('label' => false, 'class' => 'bigger')
				); ?>&nbsp;
		</dd>
		<dt class="altrow"><?php __('City'); ?></dt>
		<dd class="altrow"><?php echo $form->select('city', array(), null, array('class' => 'bigger', 'label' => 'false')); ?>&nbsp;
		</dd>
	</dl>
	<?php
	echo $form->end(__('Search for the partner', true));
?>
</div>
<div class="users index">
<?php 
$sort_str = __('search_page_sort_by', true) . " ";
$pag_params = $paginator->params();
$paginator_sort_opt = $pag_params['options']['order'];
$sort_id = key($paginator_sort_opt);
$sort_type = $paginator_sort_opt[$sort_id];

// echo "<pre>";
// echo Sanitize::html(print_r($paginator, true));
// echo "</pre>";
if (strcmp($sort_id, "User.name") == 0)
{
}
$label = $sort_id . "_" . $sort_type;
echo __('cur_sort_type', true) . __($label, true) . ".<br />\n";
 $sort_str = $sort_str . $paginator->sort(array('asc' => __('User.name_asc', true), 'desc' => __('User.name_desc', true)), 'User.name') . ", " .
		$paginator->sort(array('asc' => __('User.surname_asc', true), 'desc' => __('User.surname_desc', true)), 'User.surname') . ", " . 
		$paginator->sort(__('sort_age', true)) . " " .
		$paginator->sort(__('sort_country', true)) . " " . $paginator->sort(__('sort_city', true));
echo $sort_str;?>
<table cellpadding="0" cellspacing="0">
<tr align="left">
	<td style="text-align:left;">Vadim Frolov, (25 лет, мужчина)<br />
	Местоположение: Россия, Санкт–Петербург<br />
	Посмотреть адрес электропочты</td>
	<td style="text-align:left;">
	Знает: Английский, Русский, Немецкий, ...<br />
	Хочет изучать: Немецкий
	</td><td style="text-align:left;"> Посмотреть полный профиль</td>
</tr>
</table><br /><br /><br /><br />
<?php
if (isset($users))
{
	if ($users_count == 0)
	{
		?><h2><?php __('Found no people for this search conditions');?></h2><?php
	}
	else
	{ ?>
		<h2><?php __('Found people');?></h2>
		<p></p>
		<table cellpadding="0" cellspacing="0">
		<tr>
		<?php
			if (isset($paginator))
			{ ?>
				<th><?php echo $paginator->sort(__('Name', true));?></th>
				<th><?php echo $paginator->sort(__('Surname', true));?></th>
				<th><?php echo $paginator->sort(__('Email', true));?></th>
				<th><?php echo $paginator->sort(__('Country', true));?></th>
				<th><?php echo $paginator->sort(__('City name', true));?></th>
				<th><?php echo $paginator->sort(__('Gender', true));?></th>
				<th><?php __('Speaks')?></th>
				<th><?php __('search_page_looking_for')?></th>
				<th class="actions"><?php __('Actions');?></th>
		<?php
			}
			else
			{ ?>
				<th><?php __('Name');?></th>
				<th><?php __('Surname');?></th>
				<th><?php __('Email');?></th>
				<th><?php __('Country');?></th>
				<th><?php __('City name');?></th>
				<th><?php __('Gender');?></th>
				<th><?php __('Speaks')?></th>
				<th><?php __('search_page_looking_for')?></th>
				<th class="actions"><?php __('Actions');?></th>
		<?php } ?>
		</tr>
		<?php
			$i = 0;
			foreach ($users as $user):
//pr($user);
				$class = null;
				if ($i++ % 2 == 0) 
				{
					$class = ' class="altrow"';
				}
		?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $user['User']['name']; ?>
		</td>
		<td>
			<?php echo $user['User']['surname']; ?>
		</td>
		<td>
			<?php //echo $user['User']['email']; 
			$mailto->createLink($user['User']['email'], $user['User']['id'], __('View email', true)); 
			?>
		</td>
		<td>
			<nobr><?php __($user['Country']['name']); ?></nobr>
		</td>
		<td>
			<nobr><?php __($user['City']['name']); ?></nobr>
		</td>
		<td>
			<?php __($user['User']['gender']); ?>
		</td>
		<td>
			<?php 
				$str = "";
				foreach ($user['Offer'] as $lang)
				{
					$lang_name = __($lang['name'], true);
					$str = $str . $lang_name . ", ";
				}
				$str = substr_replace($str, "", -2);
				echo $str;
			?>
		</td>
		<td>
			<?php 
				$str = "";
				foreach ($user['Want'] as $lang)
				{
					$lang_name = __($lang['name'], true);
					$str = $str . $lang_name . ", ";
				}
				$str = substr_replace($str, "", -2);
				echo $str;
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php 
				if ($isAdmin)
				{ ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			<?php } ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

	<?php
	} // close if found no people
?></div><?php
} // close if (isset($user)
	?>
</div> <?php // close content ?>
	
<?php
if ($users_count > 0 && isset($paginator))
{ ?>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), null, null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php } ?>
<?php
if ($isAdmin)
{ ?>
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
<?php } ?>
<script type="text/javascript">
var cities = new Array();
	var citySelector = new CitySelector();
	var params = new Object();
	
	params.select1_id = 'UserCountry';
	params.select2_id = 'UserCity';
	params.add_none = true;
	params.strings = new Array();
	params.strings['none'] = "<?php __('selection_none'); ?>";
	params.strings['country_first'] = "<?php __('selection_country_first'); ?>";
	<?php
		// if (isset($params['country']))
		// {
			// $country_id = $params['country'];
			// $city_id = $params['city'];
		// }
		// else
		// {
			// $country_id = '0';
			// $city_id = '0';
		// }
	?>
	params.selectedIndex1 = '<?php echo $country_id; ?>';
	params.selectedIndex2 = '<?php echo $city_id; ?>';

	citySelector.init(params);
</script>