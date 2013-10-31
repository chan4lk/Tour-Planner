<?php
	/**
	 * @author Chandima Ranaweera
	 */
	
	include_once 'class/service.class.php';
	try
	{
		if(__ROUTER_PATH=='/services/add')
			{
				$s = new Service();
				$type=$cost_unit=$price=$country=$contact_no=$addition_data=$location=null;
				extract($_POST,EXTR_IF_EXISTS);
				$s->setLocation($location)->setAdditionalData($addition_data)->setContactNum($contact_no)->setCostUnit($cost_unit)->setCountry($country)->
				setType($type)->setPrice($price)->update();
				 
			}
	}
	catch (Exception $e)
	{
		echo json_encode(array(
					"msg"=>$e->getMessage(),
					"code"=>$e->getCode()
		));
	}
?>