<?php
$js_path = $languageHelper->getJsPath($this->params);
$javascript->link($js_path . 'c_c.js', false);
$javascript->link('cc_logic.js', false);
$javascript->link('levels.js', false);

App::import('Controller', 'users');
$Users = new UsersController;
$Users->constructClasses();
$isAdmin = $Users->isAdmin();

//pr($this);

/*
 * Use this function to get position of languages that
 * should be selected. List of languages is organized in form
 * [lang_id] => [lang_name]. Array $to_select is organized as follows:
 * [id] => array([lang_id], [lang_name], ...)
 * 
 * This function extracts lang_id from $to_select and finds
 * corresponding key position in $list_languages.
 * Returns array of positions
 */
// function get_selected_languages($list_languages, $to_select)
// {
	// $selected = array();
	// $i = 0;
	// foreach ($to_select as $language)
	// {
		// list($pos) = array_keys(array_keys($list_languages), $language['id']);
		// $pos = $pos + 1;
		// //echo "Searched for: " . $language['name'] . ", found " . $pos . "\n";
		// array_push($selected, $pos);
	// }
	// return $selected;
// }


//$selected_offer = get_selected_languages($offer, $this->data['Offer']);
//$selected_want = get_selected_languages($offer, $this->data['Want']);
$selected_offer = array();
$selected_want = array();
if (isset($this->data['Offer']))
	$selected_offer = $this->data['Offer'];
if (isset($this->data['Want']))
	$selected_want = $this->data['Want'];

$offer_levels = array();
if (isset($this->data['User']['level']['offer']))
{
	for ($j = 0; $j < count($selected_offer); $j++)
	{
		// take value from selected_offer, find index 
		$level_index = $selected_offer[$j] - 1;
		$level_value = $this->data['User']['level']['offer'][$level_index];
		$offer_levels[$selected_offer[$j]] = $level_value;
	}
}
else
{
	if (isset($levels))
		$offer_levels = $levels;
}
?>
<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Edit user');?></legend>
	<?php
		$session_user = $session->read('Auth.User');
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('surname');
		echo $form->input('gender');
		echo $form->input('age');
		echo $form->input('email');
		//echo $form->input('password');
		//echo $form->button('Change password', array('type' => 'button', 'style' => 'width: 200px;', 'onclick' => '));
		if (isset($session_user))
		{
			//echo $html->link(__('Change password', true), array('controller' => 'users', 'action' => 'changePassword', $session_user['id']));
			echo $form->input('oldpassword', array('label' => __('Old password', true), 'type' => 'password') );
			echo $form->input('newpassword', array('label' => __('New password', true), 'type' => 'password') );
		}
		echo $form->input('country_id', array('class' => 'wide'));
		echo $form->input('city_id', array('class' => 'wide'));
		echo $multicheckbox->create($offer, $selected_offer, 'User', 'offer', __('Speak', true), $offer_levels);
		echo $multicheckbox->create($want, $selected_want, 'User', 'want', __('Looking for', true), array(), false);
		//echo $form->input('offer', array('label' => 'Offer language', 'multiple' => true, 'options' => $offer, 'selected' => $selected_offer) );
		//echo $form->input('want', array('label' => 'Want language', 'multiple' => true, 'options' => $want, 'selected' => $selected_want) );
		echo $form->input('message', array('class' => 'wide'));
		if ($isAdmin)
			echo $form->input('group_id');
	?>
	</fieldset>
<?php echo $form->end(__('Submit', true));?>
</div>

<?php
if ($isAdmin)
{ ?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('User.id')), null, sprintf(__('Are you sure you want to delete user %s %s?', true), $form->value('User.name'), $form->value('User.surname'))); ?></li>
		<li><?php echo $html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php } else { ?>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('User.id')), null, sprintf(__('Are you sure you want to delete user %s %s?', true), $form->value('User.name'), $form->value('User.surname'))); ?></li>
	</ul>
</div>
<?php } ?>
<script type="text/javascript">
	var citySelector = new CitySelector();
	var params = new Object();
	
	params.select1_id = 'UserCountryId';
	params.select2_id = 'UserCityId';
	params.add_none = false;
<?php
	if (isset($this->params['data']))
	{
			$country_id = $this->params['data']['User']['country_id'];
			$city_id = $this->params['data']['User']['city_id'];
			echo "params.selectedIndex1 = \"{$country_id}\";\n";
			echo "params.selectedIndex2 = \"{$city_id}\";\n";
	}
	else if (isset($this->data['User']['city_id']) && isset($this->data['City']['country_id']))
	{
			$country_id = $this->data['City']['country_id'];
			$city_id = $this->data['User']['city_id'];
			echo "params.selectedIndex1 = \"{$country_id}\";\n";
			echo "params.selectedIndex2 = \"{$city_id}\";\n";
	}
	?>
	citySelector.init(params);
</script>
