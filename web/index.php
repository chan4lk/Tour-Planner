<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php

include 'controllers.php';
// route the request (filter input!)
$verb = $_SERVER['REQUEST_METHOD'];
$action_name = strtoupper($verb) . 'Action';
$url_params = explode('/', $_SERVER['PATH_INFO']);

if(!isset($url_params[1])){
	echo 'no command specified';
}
else{	

$controller_name = ucfirst($url_params[1]) . 'Controller';
$controller = new $controller_name();
$data = $controller->$action_name($url_params);


echo json_encode($data);
}
// output appropriately
//$view->render($data);
?>
