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
			
		if(substr(__ROUTER_PATH,0,11) == '/trips/find'){
                        $matches = array();
                        if(preg_match('/^\/trips\/find\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {
                                $GLOBALS['trip'] = Trip::get($matches[1]); 
                                throw new Exception(__METHOD__.'trip found',_status_success);
                        }
                        else {
                                throw new Exception(__METHOD__.'trip not found',_status_not_found);
                        }
                }
	}
	catch (Exception $e) 
		{
		echo json_encode(
				array('msg'=>$e->getMessage(),
						'data'=>json_encode($GLOBALS['trip']),
						'code'=>$e->getCode()));
		}
?>