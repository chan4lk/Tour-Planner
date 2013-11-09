<?php
class MongoConnect {
	
	static $instance = null;
	
	public static function connect(){
		return self::getInstance();
	}
	
	public static function getInstance(){
		
		if(!self::$instance instanceof Mongo){
			//$db = new Mongo('mongodb://admin:admin@127.0.0.1:27017', array('db'=> 'traveller','connect' => true));
			$db = new Mongo("mongodb://chan4lk:chan4cha2@dharma.mongohq.com:10075/traveller");				
			$ds = $db->selectDB('traveller');
			if($ds) {
				self::$instance = $ds;
			}
		}
		return self::$instance;
	}
}
?>