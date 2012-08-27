<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// determine the config file to use
$configFile = APPLICATION_PATH . '/configs/application.ini';

// check to see if there is a hostname specific config
if(is_file(APPLICATION_PATH . '/configs/' . $_SERVER['HTTP_HOST'] . '.ini')){
	$configFile = APPLICATION_PATH . '/configs/' . $_SERVER['HTTP_HOST'] . '.ini';
}

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    $configFile
);
$application->bootstrap()
            ->run();