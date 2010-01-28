<?php 
/* SVN FILE: $Id$ */
/* Country Test cases generated on: 2009-12-09 15:01:01 : 1260367261*/
App::import('Model', 'Country');

class CountryTestCase extends CakeTestCase {
	var $Country = null;
	var $fixtures = array('app.country');

	function startTest() {
		$this->Country =& ClassRegistry::init('Country');
	}

	function testCountryInstance() {
		$this->assertTrue(is_a($this->Country, 'Country'));
	}

	function testCountryFind() {
		$this->Country->recursive = -1;
		$results = $this->Country->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Country' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>