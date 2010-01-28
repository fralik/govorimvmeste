<?php 
/* SVN FILE: $Id$ */
/* LanguagesUser Fixture generated on: 2009-12-09 17:45:35 : 1260377135*/

class LanguagesUserFixture extends CakeTestFixture {
	var $name = 'LanguagesUser';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'language_id' => array('type'=>'integer', 'null' => false),
		'user_id' => array('type'=>'integer', 'null' => false),
		'offer' => array('type'=>'boolean', 'null' => false),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'language_id'  => 1,
		'user_id'  => 1,
		'offer'  => 1
	));
}
?>