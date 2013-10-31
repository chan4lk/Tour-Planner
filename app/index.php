<?php
/**
 * @author Chandima Ranaweera
 * @version 1.0
 */
	require_once __DIR__.'/class/mongo.class.php';
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	/*
	 * status codes 
	 */
	define('_status_success', 1000);
	define('_status_mismatch', 1001);
	define('_status_not_created', 1002);
	define('_status_not_found', 1004);
	define('_status_already_exists', 1005);
	
	/*
	 * end status codes
	 */
	
	$GLOBALS['data'] =array();    //json Array
	//
	define('__ROUTER_PATH', '/'.trim((string)parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));
	define('__METHOD', $_SERVER['REQUEST_METHOD']);	
	
	//
	switch (__ROUTER_PATH) {
		case '/':
			echo "we are on root";
			break;
		case '/rock':
			header("Location:/rockmongo");
			break;
		case (substr(__ROUTER_PATH,0,10) == '/users/get'):
		case (substr(__ROUTER_PATH,0,11) == '/users/find'):
        case '/users/add':
        case '/users/login':
        case '/users/find':     require_once __DIR__.'/ctrl/users.ctrl.php';  
        	break;
        case '/trips/add':
        case (substr(__ROUTER_PATH,0,11) == '/trips/find'):
        	require_once __DIR__.'/ctrl/trips.ctrl.php';
        	break;
        case '/preferances/find':
        	require_once __DIR__.'/ctrl/preferances.ctrl.php';
        	break;
        case '/locations/find':
        	require_once __DIR__.'/ctrl/locations.ctrl.php';
        	break;
        case '/services/add':
        	require_once __DIR__.'/ctrl/services.ctrl.php';
        	break;
		default:
			echo __ROUTER_PATH;
			break;
	}
?>

