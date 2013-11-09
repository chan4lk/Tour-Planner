<?php
	class Bid{
		private $data = array();
		private $collection;
		
		public static function get($screenName) {
			$rips = MongoConnect::getInstance()->bidrips->find(array('sname'=>$screenName));
			return $rips;			
		}
		public static function find($id) {
			$bids= MongoConnect::getInstance()->tripbids->find(array('tData._id'=>new MongoId($id)));
			return $bids;
		}
		public static function accept($id) {
			try{
			$bids= MongoConnect::getInstance()->tripbids->update(array('_id'=>new MongoId($id)),array('$set'=>array('acpt'=>true)));
			throw new Exception("bid accpeted suucessfully",_status_success);		
			
			} catch (Exception $e) {
				throw new Exception($e->getMessage(),_status_not_created);
			}
		}
		public static function add($sid,$tid) {
			try {
				
			
			$trip = MongoConnect::getInstance()->trips->findOne(array('_id' => new MongoId($tid)));
			$service = MongoConnect::getInstance()->services->findOne(array('_id'=>new MongoId($sid)));
			if (empty($trip) || empty($service)) {
				throw new Exception('trip or service is not exist',_status_not_created);
			}
			else{
			MongoConnect::getInstance()->tripbids->insert(array('tData'=>$trip,'sData'=>$service,'acpt'=>false));
			throw new Exception("bid added suucessfully",_status_success);
			}
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage(),_status_not_created);
			}
		}
		
	}

?>