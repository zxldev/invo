<?php

error_reporting(E_ALL);

use Phalcon\Mvc\Application;

//$_GET['_url'] = '/contact/send';
//$_SERVER['REQUEST_METHOD'] = 'POST';

try {

	define('APP_PATH', realpath('..') . '/');

	/**
	 * Read the configuration
	 */
	$config = include APP_PATH . "app/config/config.php";

	/**
	 * Auto-loader configuration
	 */
	require APP_PATH . 'app/config/loader.php';

	/**
	 * Load application services
	 */
	require APP_PATH . 'app/config/services.php';

	$application = new Application($di);

	echo $application->handle()->getContent();

} catch (Exception $e){
	echo $e->getMessage();
}
