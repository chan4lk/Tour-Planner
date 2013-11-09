<?php
class Location {
	private $data = array();
	private $collection;
	
	static function getLat($address) {
		try{	
		$getJSON = "http://maps.googleapis.com/maps/api/geocode/json?address=" .$address."&components=country:LK". "&sensor=false";
		$contentJSON = file_get_contents($getJSON);
		$Geocode_array = @json_decode($contentJSON, true);
		return $Geocode_array ['results'][0]['geometry']['location']['lat'];
		}
		catch (Exception $e)
		{
			throw new Exception($e->getMessage(),$e->getCode());
		}
		
		
	}
	static function getLong($address) {
		try {
		$getJSON = "http://maps.googleapis.com/maps/api/geocode/json?address=" .$address."&components=country:LK". "&sensor=false";
		$contentJSON = file_get_contents($getJSON);
		$Geocode_array = @json_decode($contentJSON, true);
		return $Geocode_array ['results'][0]['geometry']['location']['lng'];
		}
		catch (Exception $e)
		{
		throw new Exception($e->getMessage(),$e->getCode());
		}
	}
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
			throw new Exception("name is not long enough",_status_mismatch);
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
			throw new Exception(__METHOD__." Location adding failed ".$this->data['name'],_status_success);
		}
		
		throw new Exception(__METHOD__." Location added ".$this->data['name'],_status_success);
	}
	
}

?>