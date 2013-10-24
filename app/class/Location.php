<?php
class Location {
	private $data = array();
	private $collection;
	public function __construct() {
		$this->data['name'] = "Sri Lanka";		
		$this->data['longitude']=7.0;
		$this->data['latitude']=81.0;		
		$this->collection = MongoConnect::getInstance()->location;
	}
	
	public function setName($name) {
		if (strlen($name)>=0 && is_string($name)) {
			$this->data['name']=$name;
		}
		else 
		{
			throw new Exception("name is not long enough",505);
		}
		return $this;
	}
	public function setLatitude($latitude) {
		$this->data['latitude']=($latitude);
		return $this;
	}
	public function setLongitude($longitude) {
		$this->data['longitude']=($longitude);
		return $this;
	}
	public function update() {
		try {
			$this->collection->insert($this->data);
		} catch (Exception $e) {
			
		}
		
		throw new Exception(__METHOD__." Location added ".$this->data['name'],201);
	}
	
}

?>