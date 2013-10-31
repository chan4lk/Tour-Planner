<?php
	class Bid{
		private $data = array();
		private $collection;
		
		public function __construct(){
			//$conn = new MongoClient("mongodb://localhost");
			$conn = new MongoClient("mongodb://chan4lk:chan4cha2@dharma.mongohq.com:10075/traveller");
			$db = $conn->selectDB('traveller');
			$this->collection = new MongoCollection($db, 'bids');
		}
		public function setScreenName($screenName) {
			$this->data['scrN']=$screenName;
			return $this;
		}
		
		public function setTimeStamp($timeStamp) {
			if (is_int($timeStamp)) {
				$this->data['tstm']=$timeStamp;
			}
			else {
				throw new Exception(__METHOD__."not a time stamp", 505);
			}
			return $this;
		}
		
		
		public function update() {
			
			$this->collection->insert($this->data);
			throw new Exception(__METHOD__."bid sucessfully added", 200);
		}
		
	}

?>