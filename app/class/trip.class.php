<?php
include_once 'class/user.class.php';
class Trip {
	private $data = array();
	
	public static function get($scrn) {
		try {
			$sweetQuery = array('scrn'=>$scrn);
			$res =MongoConnect::getInstance()->trips->find($sweetQuery);
			return $res;
		} catch (Exception $e) {
			throw new Exception(__METHOD__.'Trip(s) not found',_status_not_found);
		}
		
			
	}
	
	public function __construct() {
		self::setTripID();
	}
	
	public function update()
	{	
		try {
			$ds = MongoConnect::getInstance()->trips->insert($this->data);
		} catch (Exception $e) {
			throw  new Exception(__METHOD__.'could not create trip',_status_not_created);
		}	
			throw new Exception(__METHOD__. ' trip created sucessfully', _status_success);
		
	}
	public function setTripID() {
		$id = new MongoId();
		$this->data['_id']=$id;		
	}	
	public function setStartDate($sDate) {
		try{
		$this->data['sDate']=new MongoDate(strtotime($sDate));
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD.' not a date .',_status_mismatch);
		}
		return $this;
	}
	public function setEndDate($eDate) {
		try{
		$this->data['eDate']=new MongoDate(strtotime($eDate));
		}
		catch (Exception $e){
			throw new Exception(__METHOD.' not a date .',_status_mismatch);
		}
		return $this;
	}
	public function setUser($user) {
		if (User::find($user)) {
			$this->data['scrn']=$user;
		}
		else 
			throw new Exception(__METHOD__.' user not found ',_status_not_found);
		return $this;
		
	}
	public function setStartLocation($sLocation) {
		try{
		$this->data['sLoc']=new MongoId($sLocation);
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.' not a valid location',_status_mismatch);
		}
		return $this;
	}
	public function setEndLocation($eLocation) {
	try{
		$this->data['eLoc']=new MongoId($eLocation);
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.' not a valid location',_status_mismatch);
		}
		return $this;
	}
	public function setCountry($country) {
	if(is_string($country)){
			$this->data['cnty']=$country;
			return $this;
		}
		else{
			throw new Exception(__METHOD__.'country name is not valid', _status_mismatch);
		}
	}
	public function setChildren($children) {
		try {
			$this->data['chld']=new MongoInt32($children);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.' not a number ',_status_mismatch);
		}
		return $this;
		
	}
	public function setAdults($adults) {
	try {
			$this->data['adlt']=new MongoInt32($adults);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.' not a number ',_status_mismatch);
		}
		return $this;
	}
	
	
}

?>