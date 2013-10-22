<?php
	class User{
		const TYPE_TRAVELLER = 'trvlr';
		const TYPE_SUPPLIER = 'suplr';

		private $data = array();

		public function setName($name){
			$this->data['urn'] = $name;
			return $this;
		}

		public function setScreenName($screenName){
			if(is_string($screenName) && strlen($screenName) >= 5 && strlen($screenName) <= 12 && $this->isScreenNameAvailable($screenName)) {
				$this->data['scrn'] = $screenName;
				return $this;
			}

			throw new Exception(__METHOD__.' screeName does not meet the criteria',4003);
		}

		private function isScreenNameAvailable($screenName){
			///
			return true;
		}

		public function setEmail($email){
			$this->data['mail'] = $email;
			return $this;
		}

		public function setDeviceID($deviceId){
			$this->data['did'] = $deviceId;
		}

		public function setType($type){
			if(in_array($type, array(User::TYPE_SUPPLIER,User::TYPE_TRAVELLER))) {
				$this->data['urTy'] = $type;
				return $this;
			}

			throw new Exception(__METHOD__.' invalid type specified',4003);
		}

		public function update(){
			$ds_users = new MongoCollection(__DS, 'user');
			$ds_users->insert($this->data);

			throw new Exception(__METHOD__.' user added successful',200);
		}

		public function __construct(){
			$this->setType(self::TYPE_TRAVELLER);
		}

		public static function get($userName){
			throw new Exception(__METHOD__.' user `'.$userName.'` not found',200);
		}

		public static function find(){

		}
	}
?>