<?php 
/* SVN FILE: $Id$ */
/* City Fixture generated on: 2009-12-09 15:01:05 : 1260367265*/

class CityFixture extends CakeTestFixture {
	var $name = 'City';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'country_id' => array('type'=>'integer', 'null' => false),
		'name' => array('type'=>'string', 'null' => false, 'length' => 120),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'country_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>