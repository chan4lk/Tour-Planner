<?php
	include 'class/User.php';
	class UsersController {
		private $users;
		public function __construct(){
			$conn = new MongoClient("mongodb://localhost");
			$db = $conn->selectDB('Users');
			$this->users = new MongoCollection($db, 'user');
		}
		public function GETAction($param) {
			$scrn = $param[2];				
		
			$sweetQuery = array('scrn'=>$scrn);
			$cursor = $this->users->findOne($sweetQuery);	
			header('201 Created', true, 201);		
			header('Content-Type: application/json; charset=utf-8');			
			return $cursor ;
			}

		public function POSTAction(){			
			$data = $_POST;

			if(isset($data['urN'])){
			$urN  = $data['urN'];
			$scrn = $data['scrn'];
			$mail = $data['mail'];
			$urTy = 'tourist';
			$did  = $data['did'];
			
			$user = new User($urN, $scrn, $mail,$urTy, $did);
			$this->users->insert($user);
			
			header('201 Created', true, 201);
			header('Content-Type: application/json; charset=utf-8');	
			header('Location: http://api.local/users/'.$scrn);
			return $user;
			}
			else
			return 'not submited';
			}
		public function PUTAction() {
			// sanitise and validate data please!
			parse_str(file_get_contents('php://input'), $data);
			// create a user from params
			$user['name'] = $data['name'];
			// save the user, return the new id
			// redirect user
			header('201 Created', true, 201);
			header('Location: http://api.local/users/5');
			return $user;
			}
		}

	class tourController{
		public function GETAction($param) {
			if($param[2]=='add')
			header("Location: http://api.local/tours/addUser.html");
			else
			return;
			}
		}
?>
