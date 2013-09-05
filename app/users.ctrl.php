<?php
	require_once 'class/User.php';

	if(__ROUTER_PATH == '/users/add'){
		try{
			$n = new User();
			$name = $screenName = $email = null;
			extract($_POST,EXTR_IF_EXISTS);
			$n->setName($name)->setEmail($email)->setScreenName($screenName)->update();
		}
		catch(Exception $e){
			echo json_encode(array(
				'code' => $e->getCode(),
				'msg' => $e->getMessage()
			));
		}
	}

	if(__ROUTER_PATH == '/users/find'){
		User::find($screenName);
	}
?>