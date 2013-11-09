<?php
/**
 * @author Chandima Ranaweera
 */
include_once 'class/user.class.php';
include_once 'class/location.class.php';
class Trip {
	private $data = array();
	private $i=0;
	
	public function setTags($tag) {		
		if(!empty($tag)){
		$this->data['tag'][$this->i]=$tag;
		$this->i++;
		}
		return $this;
	}
	public static function get($scrn) {
		try {
			$sweetQuery = array('scrn'=>$scrn);
			$res =MongoConnect::getInstance()->trips->find($sweetQuery);
			return $res;
		} catch (Exception $e) {
			throw new Exception(__METHOD__.'Trip(s) not found',_status_not_found);
		}
		
			
	}

	public static function getOne($Id) {
		try {
			$sweetQuery = array('_id'=>$Id);
			$res =MongoConnect::getInstance()->trips->findOne($sweetQuery);
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
			self::updateServices();		
			$ds = MongoConnect::getInstance()->trips->insert($this->data);
		} catch (Exception $e) {
			throw  new Exception(__METHOD__.'could not create trip',_status_not_created);
		}	
			throw new Exception(__METHOD__. ' trip created sucessfully', _status_success);
		
	}
	
	public function updateServices()
	{
		$services = MongoConnect::getInstance()->services->find(array('loc.name'=> $this->data['eLoc']['name']));
		foreach ($services as $s) {
			$insert = array('sid'=>$s['_id'],'sname'=>$s['scrn'],'tData'=>$this->data);
			MongoConnect::getInstance()->bidrips->insert($insert);
		}
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
		$this->data['sLoc']['name']=$sLocation;
		$this->data['sLoc']['lat']=Location::getLat($sLocation);
		$this->data['sLoc']['lng']=Location::getLong($sLocation);
		return $this;
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.' not a valid location',_status_mismatch);
		}
		
	}
	public function setEndLocation($eLocation) {
	try{
		
		$this->data['eLoc']['name']=$eLocation;
		$this->data['eLoc']['lat']=Location::getLat($eLocation);
		$this->data['eLoc']['lng']=Location::getLong($eLocation);
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.' not a valid location',_status_mismatch);
		}
		return $this;
	}
	public function setCountry($country) {
	if(is_string($country) && !strcasecmp($country, "Sri Lanka")){
			$this->data['cnty']['name']=$country;			
			return $this;
		}
		else{
			throw new Exception(__METHOD__.'country name is not valid', _status_mismatch);
		}
	}	
	public function setMembers($members) {
	try {
			$this->data['members']=new MongoInt32($members);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.' not a number ',_status_mismatch);
		}
		return $this;
	}
	
	
}

?>