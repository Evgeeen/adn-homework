<?php 

	function printt($variable)
	{
		echo '<pre>';
		var_dump($variable);
		echo '</pre>';
	}
	date_default_timezone_set('Asia/Krasnoyarsk');
	define('ROOT', dirname(__FILE__));

	require_once 'core/components/Loader.php';

	$router = new Router();
	$router->run();
?>