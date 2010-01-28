<?php 
/* SVN FILE: $Id$ */
/* LanguagesUser Test cases generated on: 2009-12-09 17:45:35 : 1260377135*/
App::import('Model', 'LanguagesUser');

class LanguagesUserTestCase extends CakeTestCase {
	var $LanguagesUser = null;
	var $fixtures = array('app.languages_user');

	function startTest() {
		$this->LanguagesUser =& ClassRegistry::init('LanguagesUser');
	}

	function testLanguagesUserInstance() {
		$this->assertTrue(is_a($this->LanguagesUser, 'LanguagesUser'));
	}

	function testLanguagesUserFind() {
		$this->LanguagesUser->recursive = -1;
		$results = $this->LanguagesUser->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('LanguagesUser' => array(
			'id'  => 1,
			'language_id'  => 1,
			'user_id'  => 1,
			'offer'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>