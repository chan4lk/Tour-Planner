<?php
/**
 * 
 * @author Chandima Ranaweera
 *
 */
	include_once 'class/user.class.php';
	include_once 'class/location.class.php';
class Service {
	private $data=array();
	
	public static function get($screenName) {
		if(User::find($screenName))
		{
			$sweetQuery=array("scrn"=>$screenName);
			$s=MongoConnect::getInstance()->services->find($sweetQuery);
			return $s;
		}
		else {
			throw new Exception('user has no services',_status_mismatch);
		}
	}
	public function update()	
	{
		try {
			$ds = MongoConnect::getInstance()->services->insert($this->data);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.'service not created', _status_not_created);
		}
		throw new Exception(__METHOD__.'service created successfully', _status_success);
		
	}
	public function setUser($user) {
		if (User::find($user)) {
			$this->data['scrn']=$user;
		}
		else
			throw new Exception(__METHOD__.' user not found '.$user,_status_not_found);
		return $this;
	
	}
	public function __construct() {
		self::setID();
	}
	public function setLocation($location) {		
		$this->data['loc']['name']=$location;
		$this->data['loc']['lat']=Location::getLat($location);
		$this->data['loc']['lng']=Location::getLong($location);
		
		return $this;
	}
	public function setID()
	{
		$this->data['_id']=new MongoId();		
	}
	public function setCostUnit($cost_unit) {
		$this->data['ctUt']=$cost_unit;
			return $this;
	} 
	
	public function setPrice($price) {
		
		try{		
			if(preg_match('([0-9])',$price)){
			$this->data['prce']=new MongoInt32($price);
			}
			else
				throw new Exception(__METHOD__.'not a valid price',_status_mismatch);
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.'price not valid',_status_mismatch);
		}
		return $this;
	}
	
	public function setContactNum($contact_no) {
		if(preg_match('([0-9])',$contact_no)){
		$this->data['cNum']=$contact_no;
		return $this;
		}
		else
		{
			throw new Exception(__METHOD__.'not a phone number',_status_mismatch);
		}
	}
	
	public function setAdditionalData($addition_data) {
		if(is_string($addition_data)){
		$this->data['data']=$addition_data;
		return $this;
		}
		else {
			throw new Exception(__METHOD__.'not a string',_status_mismatch);
		}
	}
	public function setName($name) {
		if(is_string($name)){
			$this->data['name']=$name;
			return $this;
		}
		else {
			throw new Exception(__METHOD__.'not a string',_status_mismatch);
		}
	}
	
	public function setCountry($country) {
	if(is_string($country) && trim($country=='sri lanka')){
			$this->data['cnty']['name']=$country;			
			return $this;
		}
		else{
			throw new Exception(__METHOD__.'country name is not valid', _status_mismatch);
		}
	}
	
	public function setType($type) {
		$this->data['type']=$type;
		return $this;
	}
}

?>