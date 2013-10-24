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
		}

		public function setScreenName($screenName){
			if(is_string($screenName) && preg_match('([0-9a-z-_A-Z]{5,12})',$screenName) ) {
				$this->data['scrn'] = $screenName;
				return $this;
			}

			throw new Exception(__METHOD__.' screeName does not meet the criteria '.$screenName,4003);
		}

		private function isScreenNameAvailable(){
			$sweetQuery = array('scrn'=>$this->data['scrn']);
			$cursor = MongoConnect::getInstance()->user->find($sweetQuery);
			if($cursor->hasNext())
				throw new Exception(__METHOD__.' screeName already exists',4001);			
			else 
				return true;
		}

		public function setEmail($email){
			$this->data['mail'] = $email;
			return $this;
		}

		public function setDeviceID($deviceId){
			$this->data['did'] = $deviceId;
			return $this;
		}

		public function setType($type){
			if(in_array($type, array(User::TYPE_SUPPLIER,User::TYPE_TRAVELLER))) {
				$this->data['urTy'] = $type;
				return $this;
			}

			throw new Exception(__METHOD__.' invalid type specified',4003);
		}

		public function update(){	
			if($this->isScreenNameAvailable()){		
			MongoConnect::getInstance()->user->insert($this->data);
			}
			throw new Exception(__METHOD__.' user added successful',200);
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
				throw new Exception(__METHOD__.' user not found',404);
			}
			
		}
		public static function get($screenName){				
			$sweetQuery = array('scrn'=>$screenName);
			$res =MongoConnect::getInstance()->user->findOne($sweetQuery);
			if(empty($res)){
				throw new Exception(__METHOD__.' user not found',404);
			}
			return $res;
			}
			
				
				
		
	}
?>