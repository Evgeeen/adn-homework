<?php 
	date_default_timezone_set('Asia/Krasnoyarsk');
	define('ROOT', dirname(__FILE__));

	require_once 'core/components/Loader.php';


	$router = new Router();
	$router->run();

	


?>