<?php

class SpecialOffer{
	private $data=array();
	public function update()
	{
		try {
			$ds = MongoConnect::getInstance()->specialoffer->insert($this->data);
		} catch (Exception $e) {
			throw new Exception(__METHOD__.'special offer not created', _status_not_created);
		}
		throw new Exception(__METHOD__.'special offer created successfully', _status_success);
		
	}	
	
	public function setServiceId($service_id){
		$this->data['_id']=$service_id;
		return $this;	
	}

	public function setCloseDate($close_date){
		$this->data['cDate']=$close_date;
		return $this;	
	}
	
	public function setMinPrice($min_price){
		$this->data['mPris']=$min_price;
		return $this;	
	}
	


}
?>

