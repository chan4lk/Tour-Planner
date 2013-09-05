<?php
	class UsersController {
		public function __construct(){
			//mongo dharma.mongohq.com:10075/traveller -u <user> -p<password>
			//mongodb://chan4lk:chan4cha2@dharma.mongohq.com:10075/traveller
			//mongodb://<user>:<password>@paulo.mongohq.com:10089/chan1
			//mongo paulo.mongohq.com:10089/chan1 -u <user> -p<password>
			//$conn = new MongoClient("mongodb://localhost");
			$conn = new MongoClient("mongodb://chan4lk:chan4cha2@dharma.mongohq.com:10075/traveller");
			$db = $conn->selectDB('traveller');
			$this->users = new MongoCollection($db, 'user');
		}
		public function GETAction($param) {

			if($param[2]=='find'){
				if(isset($param[3])){
					$scrn = $param[3];
					$sweetQuery = array('scrn'=>$scrn);
					$cursor = $this->users->findOne($sweetQuery);
					header('201 Created', true, 201);
					header('Content-Type: application/json; charset=utf-8');
					return json_encode($cursor) ;
				}
				else{
					$form = "<form id='myfrm' method='POST' action='/users/find'>
						<table>
							<tr>
							<td>Screen Name:</td>
							<td><input type='text' name='scrn'/></td>
							</tr>
							<tr>
							<td></td>
							<td><input type='submit' value='find' name='submit'/></td>
							</tr>
						</table>
						</form>". '<br/>'.json_encode($param);
				return $form;
				}
			}//end find
			else if($param[2]=='add'){
				$form = "<form id='myfrm' method='POST' action='/users/add'><table><tr><td>Name :</td>
				<td><input type='text' name='urN'/></td></tr><tr><td>Screen Name:</td>
				<td><input type='text' name='scrn'/></td></tr><tr><td>Email:</td>
				<td><input type='text' name='mail'/></td></tr><tr><td>User Type:</td>
				<td><select name='UrTy'>
					<option value='tourist'>Tourist</option>
					<option value='service provider'>Service provider</option>
				    </select>
				</td></tr><tr><td>Device ID:</td><td><input type='text' name='did'/></td>
				</tr><tr><td></td><td><input type='submit' value='submit' name='submit'/></td>
				</tr></table></form>";
				return $form;
				}//end add
			}//end GETAction

		public function POSTAction($param){
			$data = $_POST;
			if($param[2]=='add'){
			if(isset($data['submit'])){
				$urN  = $data['urN'];
				$scrn = $data['scrn'];
				$mail = $data['mail'];
				$urTy = 'tourist';
				$did  = $data['did'];

				$user = new User($urN, $scrn, $mail,$urTy, $did);
				$this->users->insert($user);

				//header('201 Created', true, 201);
				//header('Content-Type: application/json; charset=utf-8');
				header("Location: /users/find/$scrn");
				return json_encode($user);
			}
			else
			return 'not submited';
			}//end addd
			if($param[2]=='find'){
				$scrn =$data['scrn'];
				header("Location: /users/find/$scrn");
				return $html;
			}//end find
			else
			return;
			}
		public function PUTAction() {
			// sanitise and validate data please!
			parse_str(file_get_contents('php://input'), $data);
			// create a user from params
			$user = $data['name'];
			// save the user, return the new id
			// redirect user
			//header('201 Created', true, 201);
			header("Location: /users/find/$user");
			return json_encode($user);
			}
		}
?>
