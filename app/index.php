<?php
	define('__ROUTER_PATH', '/'.trim((string)parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));

	$conn = new MongoClient("mongodb://chan4lk:chan4cha2@dharma.mongohq.com:10075/traveller");
	define(__DS, $conn->selectDB('traveller'));

	switch (__ROUTER_PATH){
		case (substr(__ROUTER_PATH,0,10) == '/users/get'):
		case '/users/add':
		case '/users/find':	require_once 'users.ctrl.php';	break;

		case '/':	require_once 'default.ctrl.php';	break;
	}
?>