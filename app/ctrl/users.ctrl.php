<?php
	include_once 'class/user.class.php';

/**
* @author Chandima Ranaweera
*/
	$GLOBALS['data'] =array();    //json Array
	$data=array();	
	$ds = MongoConnect::connect();
	 try {
                if(__ROUTER_PATH == '/users/add'){
                        $n = new User();
                        $name = $screenName = $email = null;
                        extract($_POST,EXTR_IF_EXISTS);
                        $n->setName($name)->setEmail($email)->setScreenName($screenName)->update();
                }

                if(substr(__ROUTER_PATH,0,10) == '/users/get'){
                        $matches = array();
                        if(preg_match('/^\/users\/get\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {
                                $user = User::get($matches[1]);
                        }
                        else {
                                throw new Exception(__METHOD__.'invalid username',200);
                        }
                }

				 if(substr(__ROUTER_PATH,0,11) == '/users/find'){
                        $matches = array();
                        if(preg_match('/^\/users\/find\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {
                                $user = User::find($matches[1]);
                                echo json_encode($user);
                        }
                        else {
                                throw new Exception(__METHOD__.'invalid username',200);
                        }
                }
        }
        catch (Exception $e){
                echo json_encode(array(
                                'code' => $e->getCode(),
                                'msg' => $e->getMessage()
                ));
        }

	
	

?>	
