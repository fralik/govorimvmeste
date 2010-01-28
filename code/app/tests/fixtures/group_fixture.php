<?php 
/* SVN FILE: $Id$ */
/* Group Fixture generated on: 2009-12-11 13:32:58 : 1260534778*/

class GroupFixture extends CakeTestFixture {
	var $name = 'Group';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'length' => 100),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2009-12-11 13:32:58',
		'modified'  => '2009-12-11 13:32:58'
	));
}
?>