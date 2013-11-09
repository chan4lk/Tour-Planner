<?php
include_once 'class/user.class.php';
class SpecialOffer{
	private $data=array();
	
	
	public static function get($scrn) {
	try {
			$sweetQuery = array('scrn'=>$scrn);
			$res =MongoConnect::getInstance()->specialoffer->find($sweetQuery);
			return $res;
		} catch (Exception $e) {
			throw new Exception('Offer(s) not found',_status_not_found);
		};
	}
	public static function find() {
		try {
			$sweetQuery = array();
			$res =MongoConnect::getInstance()->specialoffer->find($sweetQuery);
			return $res;
		} catch (Exception $e) {
			throw new Exception('Offer(s) not found',_status_not_found);
		};
	}
	public function update()
	{
		try {
			$ds = MongoConnect::getInstance()->specialoffer->insert($this->data);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.'special offer not created', _status_not_created);
		}
		throw new Exception('special offer created successfully', _status_success);
		
	}	
	public function setUser($user) {
		if (User::find($user)) {
			$this->data['scrn']=$user;
		}
		else
			throw new Exception(__METHOD__.' user not found ',_status_not_found);
		return $this;
	
	}
	
	public function setServiceId($service_id){
		try {
		$this->data['sid']=new MongoId($service_id);
		return $this;	
		}
		catch (Exception $e)
		{
			throw new Exception('service is not vallid',_status_mismatch);
		}
	}

	public function setCloseDate($close_date){
		try{		
			$this->data['clDt']=new MongoDate(strtotime($close_date)+"00:00:00");	
			return $this;				
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.'dates not valid', _status_mismatch);
		}
			
		}	
	
	public function setMinPrice($min_price){
		if(!empty($min_price) && (doubleval($min_price)>0))
		{
			$this->data['mPris']=$min_price;
			return $this;	
		}
		else
		{
			throw new Exception('price is not valid', _status_mismatch);
		}
	}
	


}
?>

