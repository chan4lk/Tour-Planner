<?php
/**
 * 
 * @author Chandima Ranaweera
 *
 */
class Service {
	private $data=array();

	public function update()
	{
		try {
			$ds = MongoConnect::getInstance()->service->insert($this->data);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.'service not created', _status_not_created);
		}
		throw new Exception(__METHOD__.'service created successfully', _status_success);
		
	}
	public function __construct() {
		self::setID();
	}
	public function setLocation($location) {
		$this->data['loc']=$location;
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
	
	public function setCountry($country) {
		if(is_string($country)){
		$this->data['cnty']=$country;
		return $this;
		}
		else 
		{
			throw new Exception(__METHOD__.'country name not vaild',_status_mismatch);
		}
	}
	
	public function setType($type) {
		$this->data['type']=$type;
		return $this;
	}
}

?>