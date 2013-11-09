<?php
/**
 * @author Chandima Ranaweera
 */
	include_once 'class/trip.class.php';
	$data= array();
	try {
		if(__ROUTER_PATH=='/trips/add')
			{
			$t = new Trip();
			
			$user=$sDate=$eDate=$sLocation=$eLocation=$country=$members=$tag1=$tag2=$tag3=null;
			
			extract($_POST,EXTR_IF_EXISTS);			
			$t->setUser($user)->setMembers($members)->
			setCountry($country)->setStartDate($sDate)->setEndDate($eDate)->
			setStartLocation($sLocation)->setEndLocation($eLocation)->setTags($tag1)->setTags($tag2)->setTags($tag3)->update();
			} //  trips/add
			
		if(substr(__ROUTER_PATH,0,11) == '/trips/find'){
                        $matches = array();
                        if(preg_match('/^\/trips\/find\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {                        		
                                $t = Trip::get($matches[1]); 
                       			 $i=0;
		
								foreach ($t as $doc) {
									$data[$i]['_id']=$doc['_id'];
									$data[$i]['sLoc']=$doc['sLoc']['name'];
									$data[$i]['eLoc']=$doc['eLoc']['name'];
									$i++;
								}
							
                                if(empty($data))
                                {
                                	throw new Exception(__METHOD__.'trip not found',_status_not_found);
                                }
                                throw new Exception(__METHOD__.'trip found',_status_success);
                        }
                        else {
                                throw new Exception(__METHOD__.'trip not found',_status_not_found);
                        }
                }
                if(substr(__ROUTER_PATH,0,10) == '/trips/get'){
                	$matches = array();
                	if(preg_match('/^\/trips\/get\/([0-9a-z-_A-Z]{2,50})$/', __ROUTER_PATH, $matches)) {
                		$t = Trip::get($matches[1]);         		
                
                       			 $i=0;
		
								foreach ($t as $doc) {
									$data[$i]=$doc;
									
									$i++;
								}
                			
                		if(empty($data))
                		{
                			throw new Exception(__METHOD__.'trip not found',_status_not_found);
                		}
                		throw new Exception(__METHOD__.'trip found',_status_success);
                	}
                	else {
                		throw new Exception(__METHOD__.'trip not found',_status_not_found);
                	}
                }
	}
	catch (Exception $e) 
		{
		header('Content-Type:application/json');
		echo json_encode(
				array('msg'=>$e->getMessage(),
						'data'=>$data,
						'code'=>$e->getCode()));
		}
?>