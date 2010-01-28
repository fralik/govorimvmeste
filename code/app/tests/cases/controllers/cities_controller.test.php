<?php 
/* SVN FILE: $Id$ */
/* CitiesController Test cases generated on: 2009-12-09 15:01:05 : 1260367265*/
App::import('Controller', 'Cities');

class TestCities extends CitiesController {
	var $autoRender = false;
}

class CitiesControllerTest extends CakeTestCase {
	var $Cities = null;

	function startTest() {
		$this->Cities = new TestCities();
		$this->Cities->constructClasses();
	}

	function testCitiesControllerInstance() {
		$this->assertTrue(is_a($this->Cities, 'CitiesController'));
	}

	function endTest() {
		unset($this->Cities);
	}
}
?>