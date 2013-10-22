<?php
	class User{
		const TYPE_TRAVELLER = 'trvlr';
		const TYPE_SUPPLIER = 'suplr';

		private $data = array();
		private $ds_users;
		public function setName($name){
			$this->data['urn'] = $name;
			return $this;
		}

		public function setScreenName($screenName){
			if(is_string($screenName) && strlen($screenName) >= 5 && strlen($screenName) <= 12 ) {
				$this->data['scrn'] = $screenName;
				return $this;
			}

			throw new Exception(__METHOD__.' screeName does not meet the criteria '.$screenName,4003);
		}

		private function isScreenNameAvailable(){
			$sweetQuery = array('scrn'=>$this->data['scrn']);
			$cursor = $this->ds_users->find($sweetQuery);
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
			$this->ds_users->insert($this->data);
			}
			throw new Exception(__METHOD__.' user added successful',200);
		}

		public function __construct(){			
			$this->setType(self::TYPE_TRAVELLER);
			$this->ds_users = MongoConnect::getInstance()->selectCollection('user');
		}

		public static function find($screenName){
			
			$sweetQuery = array('scrn'=>$screenName);
			$res = $this->ds_users->findOne($sweetQuery);
			if(empty($res)){
				throw new Exception(__METHOD__.' user not found',404);
			}
				throw new Exception(__METHOD__.' user not found',404);
				
			
		}
	}
?>