<?php
class CountriesController extends AppController {

	var $name = 'Countries';
	//var $helpers = array('Html', 'Form');
	//var $components = array('LanguageHelper', 'ProjectnameHelper');

	var $helpers = array('Html', 'Form', 'Javascript', 'Mailto', 'Multicheckbox');
	var $components = array('Recaptcha', 'PasswordHelper', 'Mailer', 'LanguageHelper','ProjectnameHelper');

	function index() 
	{
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
		print_r($this->paginate());
	}

	function beforeFilter() 
	{
		parent::beforeFilter(); 
		// TODO: do not forget to change this:
		//$this->Auth->allowedActions = array('*');
		$this->Auth->allowedActions = array('search', 'add');
	}

	function _genRandStr($minLen, $maxLen, $alphaLower = 1, $alphaUpper = 1, $num = 1, $batch = 1) 
	{
    
		$alphaLowerArray = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		$alphaUpperArray = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		$numArray = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    
		if (isset($minLen) && isset($maxLen)) 
		{
			if ($minLen == $maxLen) 
			{
				$strLen = $minLen;
			} else 
			{
				$strLen = rand($minLen, $maxLen);
			}
			$merged = array_merge($alphaLowerArray, $alphaUpperArray, $numArray);
        
			// if ($alphaLower == 1 && $alphaUpper == 1 && $num == 1) {
				// $finalArray = array_merge($alphaLowerArray, $alphaUpperArray, $numArray);
			// } elseif ($alphaLower == 1 && $alphaUpper == 1 && $num == 0) {
				// $finalArray = array_merge($alphaLowerArray, $alphaUpperArray);
			// } elseif ($alphaLower == 1 && $alphaUpper == 0 && $num == 1) {
				// $finalArray = array_merge($alphaLowerArray, $numArray);
			// } elseif ($alphaLower == 0 && $alphaUpper == 1 && $num == 1) {
				// $finalArray = array_merge($alphaUpperArray, $numArray);
			// } elseif ($alphaLower == 1 && $alphaUpper == 0 && $num == 0) {
				// $finalArray = $alphaLowerArray;
			// } elseif ($alphaLower == 0 && $alphaUpper == 1 && $num == 0) {
				// $finalArray = $alphaUpperArray;                        
			// } elseif ($alphaLower == 0 && $alphaUpper == 0 && $num == 1) {
				// $finalArray = $numArray;
			// } else {
				// return FALSE;
			// }
			
			$finalArray = array_merge($alphaLowerArray, $alphaUpperArray);
        
			$count = count($finalArray);
        
			if ($batch == 1) 
			{
				$str = '';
				$i = 1;
				while ($i <= $strLen) 
				{
					$rand = rand(0, $count);
					if (!array_key_exists($rand, $finalArray))
						continue;
					$newChar = $finalArray[$rand];
					$str .= $newChar;
					$i++;
				}
				$result = $str;
			} 
			else 
			{
				$j = 1;
				$result = array();
				while ($j <= $batch) 
				{ 
					$str = '';
					$i = 1;
					while ($i <= $strLen) 
					{
						$rand = rand(0, $count);
						$newChar = $finalArray[$rand];
						$str .= $newChar;
						$i++;
					}
					$result[] = $str;
					$j++;
				}
			}
        }
        return $result;
    }

	
	/* Saves all countries and cities in a .js file, encoded in UTF-8
	 * with correct translation*/
	function dump($name = "c_c.js")
	{
		$params = array(
			'conditions' => array(),
			'order' => array('Country.name'),
			'recursive' => 0
			);
		$countries = $this->Country->find('all', $params);
		foreach ($countries as &$country_not_full)
		{
			$country = $this->Country->read(null, $country_not_full['Country']['id']);
			$country_id = $country_not_full['Country']['id'];
			$country_names[$country_id] = __($country_not_full['Country']['name'], true);
			
			$cities = $country['City']; 
			foreach ($cities as &$city)
			{
				$cities_names[$country_id][$city['id']] = __($city['name'], true);
				//pr($city);
			}
			asort($cities_names[$country_id]);
		}
		asort($country_names);
		//pr($country_names);
		//pr($cities_names);
		
		$locale = $this->LanguageHelper->getLanguage($this->params);
		if (isset($locale) && strlen($locale) > 0)
		{
			$name = "js/{$locale}/{$name}";
		}
		else
		{
			$name = "js/eng/{$name}";
		}
		
		
		$fp = fopen($name, "w");
		if ($fp == FALSE)
			return;
		fwrite($fp, utf8_encode("var countriesAndCites = new Array ();\n\n"));
		
		$var_name = $this->_genRandStr(5, 5, 1, 0, 0, 1);
		foreach ($country_names as $country_id => &$country_name)
		{
			$str = utf8_encode("var ") . $var_name . utf8_encode(" = [ ");
			foreach ($cities_names[$country_id] as $city_id => &$city_name)
			{
				$left_id = utf8_encode("[");
				$right_id = utf8_encode(", \"");
				$right_city = utf8_encode("\"], ");
				
				//$str = $str . "[{$city['id']}, \"{$city['name']}\"], ";
				$str = $str . $left_id . $city_id. $right_id . $city_name . $right_city;
			}
			$str = substr_replace($str ,"", -2); // remove last blank and comma
			$str = $str . utf8_encode("];\n");
			$str = $str . utf8_encode("countriesAndCites[") . $country_id . utf8_encode("] = new Array();\n" .
					"countriesAndCites[") . $country_id . utf8_encode("][\"") . $country_name .
					utf8_encode("\"] = ") . $var_name . utf8_encode(";\n\n");
			fwrite($fp, $str);
			$var_name = $this->_genRandStr(3, 3, 1, 0, 1, 1);
		}
		
		
		// foreach ($countries as &$country_not_full)
		// {
			// $country = $this->Country->read(null, $country_not_full['Country']['id']);
			// $con_id = $country['Country']['id'];
			// $con_name_tr = __($country['Country']['name'], true);
			// $con_name = $country['Country']['name'];
			// $cities = $country['City']; 
			// $str = utf8_encode("var ") . $con_name . utf8_encode(" = [ ");
			// foreach ($cities as &$city)
			// {
				// $left_id = utf8_encode("[");
				// $right_id = utf8_encode(", \"");
				// $right_city = utf8_encode("\"], ");
				// $city_name = __($city['name'], true);
				
				// //$str = $str . "[{$city['id']}, \"{$city['name']}\"], ";
				// $str = $str . $left_id . $city['id']. $right_id . $city_name . $right_city;
			// }
			// $str = substr_replace($str ,"", -2); // remove last blank and comma
			// $str = $str . utf8_encode("];\n");
			// $str = $str . utf8_encode("countriesAndCites[") . $con_id . utf8_encode("] = new Array();\n" .
					// "countriesAndCites[") . $con_id . utf8_encode("][\"") . $con_name_tr .
					// utf8_encode("\"] = ") . $con_name . utf8_encode(";\n\n");
			// fwrite($fp, $str);
		// }
		fwrite($fp, utf8_encode("// Note, that you should also link to cc_logic.js from the calling file\n"));
		fclose($fp);
		$this->Session->setFlash('Everything has been done.'));
		//$this->redirect(array('action'=>'index'));
	}
	
	function dump_php($name = "c_c.php")
	{
		$countries = $this->Country->find('all');
		
		$fp = fopen($name, "w");
		if ($fp == FALSE)
			return;
		fwrite($fp, utf8_encode("<?php \n"));
		foreach ($countries as &$country_not_full)
		{
			$country = $this->Country->read(null, $country_not_full['Country']['id']);
			$con_id = $country['Country']['id'];
			$con_name = $country['Country']['name'];
			$cities = $country['City']; 
			$str = utf8_encode("echo __(\"") . $con_name .utf8_encode("\");\n");
			foreach ($cities as &$city)
			{
				$str = $str . utf8_encode("echo __(\"") . $city['name'] . utf8_encode("\");\n");
			}
			fwrite($fp, $str);
		}
		fwrite($fp, utf8_encode("__('male');\n__('female');\n"));
		fwrite($fp, utf8_encode("?>"));
		fclose($fp);
		$this->Session->setFlash('Everything has been done.');
		//$this->redirect(array('action'=>'index'));
	}

	function view($id = null) 
	{
		if (!$id) 
		{
			$this->Session->setFlash('Invalid country');
			$this->redirect(array('action'=>'index'));
		}
		print_r($this->Country->read(null, $id));
		$this->set('country', $this->Country->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Country->create();
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash('Country has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Country could not be saved. Please, try again.');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid country');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash('Country has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Country could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Country->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Country');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Country->del($id)) {
			$this->Session->setFlash('Country deleted');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>