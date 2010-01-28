<?php 
$session->flash();
$session->flash('auth');

$js_path = $languageHelper->getJsPath($this->params);
$javascript->link($js_path . 'c_c.js', false);
$javascript->link('cc_logic.js', false);

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


?>
<div class="countries view">
<!--<h2><?php //__('Welcome');?></h2>-->
<p><?php 
$intro = __('main_page_intro', true); 
$intro = str_replace("<site_name>", $projectnameHelper->get(), $intro);
echo $intro;
?></p><br />
<p class="main_search_help"><?php __('main_page_search_help'); ?></p>
<?php 

	echo $form->create(null, array('url' => array('controller' => 'users', 'action' => 'search' ), 'type' => 'get') );
	?>
	<dl>
		<dt><?php __('search_language');?></dt>
		<dd><?php 
		echo $form->select('language', $language_opt, 0, array('class' => 'bigger'), false );
		echo " "; 
		?>&nbsp;
		</dd>
		<dt><?php __('Country'); ?></dt>
		<dd><?php echo $form->select(
					'country', // field name
					array(), // choices
					0, // selected index
					array('label' => false, 'class' => 'bigger')
				); ?>&nbsp;
		</dd>
		<dt><?php __('City'); ?></dt>
		<dd><?php echo $form->select('city', array(), 0, array('class' => 'bigger', 'label' => 'false')); ?>&nbsp;
		</dd>
	</dl>
<?php
	echo $form->end(__('Search for the partner', true));
?>
</div>

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

	citySelector.init(params);
	
// function createDynamicDropdown(dropDown1, dropDown2, dropDown3) {
 
// /*     dropdown1 = lists all the countries 
    // dropdown2 = this drop down is not used by users. Think of it as just a struture that holds ALL the cities for ALL countries from dropdown1. 
    // dropdown3 = is a dynamically generated dropdown list which changes based on what is selected in dropdown1. the <option> nodes are copied out from dropdown2 and dynamically rendered in dropdown3.
// */
 
        // var dropDown1 = document.getElementById(dropDown1);
        // var dropDown2 = document.getElementById(dropDown2);
        // var dropDown3 = document.getElementById(dropDown3);
        // var allDropDown2Elements = dropDown2.childNodes; // 'childNodes' used so you can also include <optgroup label="xxxxxxx" name="xxx"/> in dropDown2 if required
 
 
        // // remove all <option>s in dropDown3
        // while (dropDown3.hasChildNodes()){
            // dropDown3.removeChild(dropDown3.firstChild);
        // }  
 
        // // loop though and insert into dropDown3 all of the city <option>s in dropdown2 that relate to the country value selected in dropdown1
        // for(var i = 0; i < allDropDown2Elements.length; i++){
 
                // if (allDropDown2Elements[i].nodeType == 1 && allDropDown2Elements[i].getAttribute("name") == dropDown1.value) {
 
                    // newDropDown3Element = allDropDown2Elements[i].cloneNode(true);
                    // dropDown3.appendChild(newDropDown3Element);
                // }    
 
        // } // END - for loop
 
        // // if '-- Country --' is selected insert the 'default' node into dropDown3 
        // if(dropDown1.value == 0) {
              // dropDown3.options[0] = new Option("Please select a country first", "0")
        // }
 
        // // (if you have server side logic that adds selected="selected" in dropdown2) extra code for IE to display the correct 'slected="selected"' value in the select box dropdown3
        // if (navigator.userAgent.indexOf('MSIE') !=-1){
 
            // for (var i=0; i < dropDown3.length; i++) {
                // if(dropDown3[i].value == dropDown2.value) {
                    // dropDown3[i].selected = true;
                // }
            // }
 
        // }
// }

// function show_cities(countries_control)
// {
	// if (countries_control)
	// {
		// country_id = countries_control.options[countries_control.selectedIndex].value;
		// var cities_control = document.getElementById('city');
		// if (!cities_control)
			// return;
		// //var countries_control = document.getElementById('countries');
		// if (countries_control.options[0].value == 0)
		// {
			// countries_control.remove(0);
		// }
		
		// // remove all options
		// cities_control.length = 0;
		
		// var i=0;
		// for (key in cities[country_id])
		// {
			// var opt = new Option();
			// opt.text = cities[country_id][key];
			// opt.value = key;
			// // opt.onclick = function () {
					// // var city = document.getElementById('cities');
					// // if (!city)
						// // return;
					// // alert(city.options[city.selectedIndex].value);
				// // }
				
			// try
			// {
				// cities_control.add(opt, null);
			// }
			// catch (e)
			// {
				// // IE
				// cities_control.add(opt);
			// }
		// }
	// }
// }
//var countries_control = document.getElementById('countries');
//countries_control.focus();
</script>
