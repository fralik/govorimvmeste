<?php
$js_path = $languageHelper->getJsPath($this->params);
$javascript->link($js_path . 'c_c.js', false);
$javascript->link('cc_logic.js', false);
$javascript->link('levels.js', false);
//echo "use" . $this->params['data']['User']['country_id'];
//print_r($this);

App::import('Controller', 'users');
$Users = new UsersController;
$Users->constructClasses();
$isAdmin = $Users->isAdmin();

$offer_selected = array();
if (isset($this->data['User']['offer']))
	$offer_selected = $this->data['User']['offer'];
	
$want_selected = array();
if (isset($this->data['User']['want']))
	$want_selected = $this->data['User']['want'];

$offer_levels = array();
if (isset($this->data['User']['level']['offer']))
{
	for ($j = 0; $j < count($offer_selected); $j++)
	{
		// take value from offer_selected, find index 
		$level_index = $offer_selected[$j] - 1;
		$level_value = $this->data['User']['level']['offer'][$level_index];
		$offer_levels[$offer_selected[$j]] = $level_value;
	}
}

if (isset($errors))
	echo $this->element('errors', array('errors' => $errors));
?>
<script language="JavaScript" type="text/javascript">
RecaptchaOptions = new Object();
//RecaptchaOptions.lang = 'ru';
RecaptchaOptions.theme = 'clean';
</script>
<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Register user');?></legend>
	<?php
		echo $form->input('name', array('label' => __('Name', true), 'error' => false ));
		echo $form->input('surname', array('label' => __('Surname', true), 'error' => false ));
		echo $form->input('gender', array('label' => __('Gender', true), 'error' => false ));
		echo $form->input('age', array('label' => __('Age', true), 'error' => false ));
		echo $form->input('email', array('label' => __('Email', true), 'error' => false ));
		echo $form->input('password', array('label' => __('Password', true), 'error' => false ));
		echo $form->input('country_id', array('label' => __('Country', true), 'class' => 'wide', 'error' => false ));
		echo $form->input('city_id', array('label' => __('City', true), 'class' => 'wide', 'error' => false ));
		?>
		<?php
			echo $multicheckbox->create($offer, $offer_selected, 'User', 'offer', __('Speak', true), $offer_levels);
			echo $multicheckbox->create($want, $want_selected, 'User', 'want', __('Looking for', true), array(), false);
			//echo $form->input('offer', array('label' => __('Speak', true), 'multiple' => true, 'options' => $offer) );
			//echo $form->input('want', array('label' => __('Looking for', true), 'multiple' => true, 'options' => $want) );
			echo $form->input('message', array('label' => __('Message', true), 'class' => 'wide' ));
			if ($isAdmin)
				echo $form->input('group_id', array('label' => 'Group' ));
		$recaptcha->display_form('echo');
	?>
	<p><?php __('disclaimer_link_left'); echo $html->link(__('disclaimer_link', true), array('controller' => 'pages', 'action' => 'regulations')); ?></p>
	</fieldset>
<?php echo $form->end(__('Submit', true) ); ?>
</div>
<?php 
if ($isAdmin)
{?>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Users', array('action' => 'index'));?></li>
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
			//echo "citySelector.init(\"UserCountryId\", \"UserCityId\", \"{$country_id}\", \"{$city_id}\");\n";
	}
	?>
	citySelector.init(params);
</script>
