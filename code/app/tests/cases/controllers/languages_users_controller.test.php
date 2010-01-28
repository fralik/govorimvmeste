<?php 
/* SVN FILE: $Id$ */
/* LanguagesUsersController Test cases generated on: 2009-12-09 17:45:35 : 1260377135*/
App::import('Controller', 'LanguagesUsers');

class TestLanguagesUsers extends LanguagesUsersController {
	var $autoRender = false;
}

class LanguagesUsersControllerTest extends CakeTestCase {
	var $LanguagesUsers = null;

	function startTest() {
		$this->LanguagesUsers = new TestLanguagesUsers();
		$this->LanguagesUsers->constructClasses();
	}

	function testLanguagesUsersControllerInstance() {
		$this->assertTrue(is_a($this->LanguagesUsers, 'LanguagesUsersController'));
	}

	function endTest() {
		unset($this->LanguagesUsers);
	}
}
?>