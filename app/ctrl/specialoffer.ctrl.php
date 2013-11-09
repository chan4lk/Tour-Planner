<?php
/**
 * @author	chandima ranaweera
 */
include_once 'class/specialoffer.class.php';
	try
	{
		if(__ROUTER_PATH=='/specialoffer/add')
		{
			$service_id=$min_price=$close_date=$screenName=null;
			extract($_POST,EXTR_IF_EXISTS);
			$se = new SpecialOffer();
			$se->setCloseDate($close_date)->setMinPrice($min_price)->setServiceId($service_id)->setUser($screenName)->update();
			
		}
		if(__ROUTER_PATH=='/specialoffer/find')
		{
			$offer = SpecialOffer::find();
			$i=0;
			foreach ($offer as $f) {
				$data[$i]=$f;
				$i++;
			}
			
			if(empty($data))
			{
				throw new Exception(__METHOD__.'offer not found',_status_not_found);
			}
			throw new Exception(__METHOD__.'offer found',_status_success);
		}
	if(substr(__ROUTER_PATH,0,17) == '/specialoffer/get'){
                	$matches = array();
                	if(preg_match('/^\/specialoffer\/get\/([0-9a-z-_A-Z]{2,50})$/', __ROUTER_PATH, $matches)) {
                		$offer = SpecialOffer::get($matches[1]);
                		$i=0;
						foreach ($offer as $f) {
							$data[$i]=$f;
							$i++;
						}
                			
                		if(empty($data))
                		{
                			throw new Exception(__METHOD__.'offer not found',_status_not_found);
                		}
                		throw new Exception(__METHOD__.'offer found',_status_success);
                	}
                	else {
                		throw new Exception(__METHOD__.'offer not found',_status_not_found);
                	}
                }
	}
	
	catch (Exception $e)
	{
		header('Content-Type:application/json');
		echo json_encode(array(
				"msg"=>$e->getMessage(),
				"data"=>$data,
				"code"=>$e->getCode()
		));
	}
?>