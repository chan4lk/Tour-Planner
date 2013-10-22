<?php
	require_once __DIR__.'/class/mongo.class.php';
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	

	define('__ROUTER_PATH', '/'.trim((string)parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));
	define('__METHOD', $_SERVER['REQUEST_METHOD']);	
	switch (__ROUTER_PATH) {
		case '/':
			echo "we are on root";
			break;
			case '/rock':
				header("Location:/rockmongo");
		case (substr(__ROUTER_PATH,0,10) == '/users/get'):
		case (substr(__ROUTER_PATH,0,11) == '/users/find'):
        case '/users/add':
        case '/users/find':     require_once __DIR__.'/ctrl/users.ctrl.php';  
        	break;
		default:
			echo __ROUTER_PATH;
			break;
	}
?>

