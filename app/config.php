<?php

class Database {

    private static $conn;
    private $connection;

    private function __construct() {
        $this->conn = new MongoClient("mongodb://localhost");
		//$conn = new MongoClient("mongodb://chan4lk:chan4cha2@dharma.mongohq.com:10075/traveller");
		$db = $conn->selectDB('traveller');
			
    }

    function __destruct() {
        $this->conn->getConnections()->close();
        
    }

    public static function getConnection() {
        if ($db == null) {
            $db = new Database();
        }
        return $db->connection;
    }
}

?>