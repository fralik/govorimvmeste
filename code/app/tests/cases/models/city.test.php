<?php 
/* SVN FILE: $Id$ */
/* City Test cases generated on: 2009-12-09 15:01:05 : 1260367265*/
App::import('Model', 'City');

class CityTestCase extends CakeTestCase {
	var $City = null;
	var $fixtures = array('app.city');

	function startTest() {
		$this->City =& ClassRegistry::init('City');
	}

	function testCityInstance() {
		$this->assertTrue(is_a($this->City, 'City'));
	}

	function testCityFind() {
		$this->City->recursive = -1;
		$results = $this->City->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('City' => array(
			'id'  => 1,
			'country_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>