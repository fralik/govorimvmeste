<?php 
/* SVN FILE: $Id$ */
/* Country Fixture generated on: 2009-12-09 15:01:01 : 1260367261*/

class CountryFixture extends CakeTestFixture {
	var $name = 'Country';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'length' => 120),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>