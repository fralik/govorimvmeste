<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 *
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php is loaded
 * This is an application wide file to load any function that is not used within a class define.
 * You can also use this to include or require any files in your application.
 *
 */
/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * $modelPaths = array('full path to models', 'second full path to models', 'etc...');
 * $viewPaths = array('this path to views', 'second full path to views', 'etc...');
 * $controllerPaths = array('this path to controllers', 'second full path to controllers', 'etc...');
 *
 */
 config('environment');

 Environment::configure(
		'development',
		array(),
		array(
			'debug' => 2,
			'security' => 'low',
			'publickey' => '6LeT9QkAAAAAAGAKi6_FkC4H27iuaS8OWZwMqRDj',
			'privatekey' => '6LeT9QkAAAAAAF3y-t-b0E-bLiK-RdybOXoPzsya'
		)
);

Environment::configure(
		'production',
		true,
		array(
			'debug' => 1,
			'security' => 'high',
			'publickey' => '6LfwEwoAAAAAADNW2N58WEUuLkr5Q9P8GrVjQpv_',
			'privatekey' => '6LfwEwoAAAAAAO6oAh3VMk5ppXLpf9tDQxOdTzkE'
		)
);

/* used to create tables e.t.c. */
Environment::configure(
		'deploy',
		true,
		array(
			'debug' => 1,
			'security' => 'high',
			'publickey' => '6LfwEwoAAAAAADNW2N58WEUuLkr5Q9P8GrVjQpv_',
			'privatekey' => '6LfwEwoAAAAAAO6oAh3VMk5ppXLpf9tDQxOdTzkE'
		)
);

$env = 'production';
if (!isset($_SERVER['HTTP_HOST']) || strstr($_SERVER['HTTP_HOST'], 'localhost'))
{
	$env = 'development';
}

Environment::start($env);


//EOF
?>