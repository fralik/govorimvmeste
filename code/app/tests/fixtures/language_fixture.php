<?php 
/* SVN FILE: $Id$ */
/* Language Fixture generated on: 2009-12-09 10:38:56 : 1260351536*/

class LanguageFixture extends CakeTestFixture {
	var $name = 'Language';
	var $table = 'languages';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'length' => 50),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>