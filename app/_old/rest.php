<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	include '../class/controllers.php';
	include '../class/User.php';
	include '../class/default.php';

	// route the request (filter input!)
	$verb = $_SERVER['REQUEST_METHOD'];
	$action_name = strtoupper($verb) . 'Action';
	$url_params = explode('/', $_SERVER['PATH_INFO']);

	if(!isset($url_params[1])){
		echo 'no command specified';
	}
	else {
		$controller_name = ucfirst($url_params[1]) . 'Controller';
		$controller = new $controller_name();
		$data = $controller->$action_name($url_params);

		echo $data;
	}
?>
