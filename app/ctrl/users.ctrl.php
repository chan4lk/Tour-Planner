<?php
/**
 * @author Chandima Ranaweera
 */	
	include_once 'class/user.class.php';
		
	 try {
                if(__ROUTER_PATH == '/users/add'){
                        $n = new User();
                        $name = $screenName =$password= $email =$type= null;
                        extract($_POST,EXTR_IF_EXISTS);
                        $n->setName($name)->setType($type)->setEmail($email)->setScreenName($screenName)->setPassword($password)->update();
                }

                if(substr(__ROUTER_PATH,0,10) == '/users/get'){
                        $matches = array();
                        if(preg_match('/^\/users\/get\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {
                                $user = User::get($matches[1]);
                        }
                        else {
                                throw new Exception(__METHOD__.'invalid username',_status_not_found);
                        }
                        echo json_encode($user);
                }

				 if(substr(__ROUTER_PATH,0,11) == '/users/find'){
                        $matches = array();
                        if(preg_match('/^\/users\/find\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {
                                $user = User::find($matches[1]);
                                echo json_encode($user);
                        }
                        else {
                                throw new Exception(__METHOD__.'invalid username',_status_not_found);
                        }
                }
                if(__ROUTER_PATH=='/users/login')
                {                	
                	$screenName=$password=null;
                	extract($_POST,EXTR_IF_EXISTS);
                	$login=array('scrn'=>$screenName,'pass'=>$password);
                	$u=User::get($screenName);
                	if($u['pass']==sha1($password))
                	{
                		throw new Exception($u['type'],_status_success);
                	}
                	else 
                	{
                		throw new Exception(__METHOD__.'user not found',_status_not_found);
                	}
                }
        }
        catch (Exception $e){
                echo json_encode(array(
                                'msg' => $e->getMessage(),
                				'code' => $e->getCode()
                ));
        }	

?>	
