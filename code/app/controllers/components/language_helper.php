<?php 
class LanguageHelperComponent extends Object
{ 
    var $components = array('Session', 'Cookie');

	function setLanguage($params) 
	{
		$locale = Configure::read('Config.language');
		//$locale = 'rus';
		
		//echo "set: locale: {$locale}\n";

		// first check cookie,
		// then parameter
		// then compare current config value with session
		
		if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) 
		{
			$this->Session->write('Config.language', $this->Cookie->read('lang'));
			$locale = $this->Cookie->read('lang');
			//echo "case 1\n";
		}
		else if (isset($params['lang']) && ($params['lang']
				 !=  $this->Session->read('Config.language'))) 
		{     
			$this->Session->write('Config.language', $params['lang']);
			$this->Cookie->write('lang', $params['lang'], null, '20 days');
			$locale = $params['lang'];
			//echo "case 2\n";
			
		} else if ($this->Session->check('Config.language') && $locale != $this->Session->read('Config.language'))
		{
			$locale = $this->Session->read('Config.language');
			// TODO: uncomment this if your languages  do not work
			if (strcmp($locale, 'rus') != 0 && strcmp($locale, 'eng') != 0)
				$this->Session->write('Config.language', 'rus');
			//echo "case 3\n";
		}
		//$locale = 'rus';
		//Configure::write('Config.language', $locale);
		return $locale;
	}
	
	function getLanguage($params)
	{
		$locale = Configure::read('Config.language');
		
		// first check cookie,
		// then parameter
		// then compare current config value with session
		
		if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) 
		{
			$locale = $this->Cookie->read('lang');
		}
		else if (isset($params['lang']) && ($params['lang']
				 !=  $this->Session->read('Config.language'))) 
		{     
			$locale = $params['lang'];
			
		} else if ($this->Session->check('Config.language') && $locale != $this->Session->read('Config.language'))
		{
			$locale = $this->Session->read('Config.language');
		}
		
		return $locale;
	}
	
	// this function is used to retrieve localized path to c_c.js file.
	// This file contains cities and countries name and it is localized.
	// It is stored under webroot/js/<3_digit_locale_name>/c_c.js
	function getJsPath($params)
	{
		$locale = $this->getLanguage($params);
		switch ($locale)
		{
			case "rus":
				$js_path = 'rus/';
				break;
			case "eng":
				$js_path = 'eng/';
				break;
			default:
				$js_path = 'eng/';
				break;
		}
		
		return $js_path;
	}
	
	//this function provide helper functionality in view
	function startup(&$controller)
	{
		$this->controller = &$controller;
		$this->controller->set('languageHelper', $this);
	}
} 
?>