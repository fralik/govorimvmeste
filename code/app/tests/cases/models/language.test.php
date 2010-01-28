<?php 
/* SVN FILE: $Id$ */
/* Language Test cases generated on: 2009-12-09 10:38:56 : 1260351536*/
App::import('Model', 'Language');

class LanguageTestCase extends CakeTestCase {
	var $Language = null;
	var $fixtures = array('app.language');

	function startTest() {
		$this->Language =& ClassRegistry::init('Language');
	}

	function testLanguageInstance() {
		$this->assertTrue(is_a($this->Language, 'Language'));
	}

	function testLanguageFind() {
		$this->Language->recursive = -1;
		$results = $this->Language->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Language' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>