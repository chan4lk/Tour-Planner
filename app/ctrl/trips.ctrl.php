<?php
/**
 * @author Chandima Ranaweera
 */
	include_once 'class/trip.class.php';
	
	try {
		if(__ROUTER_PATH=='/trips/add')
			{
			$t = new Trip();
			$user=$sDate=$eDate=$sLocation=$eLocation=$country=$children=$adults=null;
			extract($_POST,EXTR_IF_EXISTS);
			$t->setUser($user)->setAdults($adults)->setChildren($children)->
			setCountry($country)->setStartDate($sDate)->setEndDate($eDate)->
			setStartLocation($sLocation)->setEndLocation($eLocation)->update();
			} //  trips/add
			
		if(__ROUTER_PATH=='/trips/find')
		{
			
		}
		} 
	catch (Exception $e) 
		{
		echo json_encode(array('message'=>$e->getMessage(),
						'code'=>$e->getCode()));
		}
?>