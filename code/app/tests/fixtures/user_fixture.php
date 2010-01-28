<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2009-12-09 10:50:41 : 1260352241*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'length' => 60),
		'surname' => array('type'=>'string', 'null' => false, 'length' => 60),
		'email' => array('type'=>'string', 'null' => false, 'length' => 60),
		'password' => array('type'=>'string', 'null' => false, 'length' => 64),
		'city_id' => array('type'=>'integer', 'null' => false),
		'message' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'sex' => array('type'=>'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'surname'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet',
		'city_id'  => 1,
		'message'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'sex'  => 1
	));
}
?>