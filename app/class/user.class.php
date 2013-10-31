<?php
/**
 * @author Chandima Ranaweera
 */
	class User{
		const TYPE_TRAVELLER = 'trvlr';
		const TYPE_SUPPLIER = 'suplr';

		private $data = array();		
		public function setName($name){
			$this->data['urn'] = $name;
			return $this;
		}
		public function setPassword($password)
		{
			if(is_string($password) && preg_match('([0-9a-z-_A-Z]{5,12})',$password) ) {
				$this->data['pass'] = sha1($password);
				return $this;
			}
			else {
				throw new Exception(__METHOD__.'password is not valid', _status_mismatch);
			}
		}

		public function setScreenName($screenName){
			if(is_string($screenName) && preg_match('([0-9a-z-_A-Z]{5,12})',$screenName) ) {
				$this->data['scrn'] = $screenName;
				return $this;
			}

			throw new Exception(__METHOD__.' screeName does not meet the criteria '.$screenName,_status_mismatch);
		}

		private function isScreenNameAvailable(){
			$sweetQuery = array('scrn'=>$this->data['scrn']);
			$cursor = MongoConnect::getInstance()->user->find($sweetQuery);
			if($cursor->hasNext())
				throw new Exception(__METHOD__.' screeName already exists',_status_already_exists);			
			else 
				return true;
		}

		public function setEmail($email){
			if(is_string($email)){
			$this->data['mail'] = $email;
			return $this;
			}
			else {
				throw new Exception(__METHOD__.' email not valid ',_status_mismatch);
			}
		}

		public function setDeviceID($deviceId){
			$this->data['did'] = $deviceId;
			return $this;
		}

		public function setType($type){
			if(in_array($type, array(User::TYPE_SUPPLIER,User::TYPE_TRAVELLER))) {
				$this->data['type'] = $type;
				return $this;
			}

			throw new Exception(__METHOD__.' invalid type specified',_status_mismatch);
		}

		public function update(){	
			if($this->isScreenNameAvailable()){		
			MongoConnect::getInstance()->user->insert($this->data);
			}
			throw new Exception(__METHOD__.' user added successful',_status_success);
		}

		public function __construct(){			
			$this->setType(self::TYPE_TRAVELLER);			
		}

		public static function find($screenName){
			try {
			$sweetQuery = array('scrn'=>$screenName);
			$res = MongoConnect::getInstance()->user-> findOne($sweetQuery);
			if(empty($res)){
				return false;
			}
				return true;
			}
			catch (Exception $e)
			{
				throw new Exception(__METHOD__.' user not found',_status_not_found);
			}
			
		}
		public static function get($screenName){				
			$sweetQuery = array('scrn'=>$screenName);
			$res =MongoConnect::getInstance()->user->findOne($sweetQuery);
			if(empty($res)){
				throw new Exception(__METHOD__.' user not found',_status_not_found);
			}
			return $res;
			}
			
				
				
		
	}
?>