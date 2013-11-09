<?php
	/**
	 * @author Chandima Ranaweera
	 */
	
	include_once 'class/service.class.php';
	$data=array();
	$i=0;
	try
	{
		if(__ROUTER_PATH=='/services/add')
			{
				$s = new Service();
				$name=$user=$type=$cost_unit=$price=$country=$contact_no=$addition_data=$location=null;
				extract($_POST,EXTR_IF_EXISTS);
				$s->setName($name)->setLocation($location)->setAdditionalData($addition_data)->setContactNum($contact_no)->setCostUnit($cost_unit)->setCountry($country)->
				setType($type)->setPrice($price)->setUser($user)->update();
				 
			}
			if(substr(__ROUTER_PATH,0,14) == '/services/find'){
				$matches = array();
				if(preg_match('/^\/services\/find\/([0-9a-z-_A-Z]{2,50})$/', __ROUTER_PATH, $matches)) {
					$t = Service::get($matches[1]);
						foreach ($t as $doc) {
							$data[$i]['_id']=$doc['_id'];
							$data[$i]['name']=$doc['name'];					
							$i++;
				}
						 
					if(empty($data))
					{
						throw new Exception(__METHOD__.'service not found',_status_not_found);
					}
					throw new Exception(__METHOD__.'service found',_status_success);
				}
				else {
					throw new Exception(__METHOD__.'error loading services',_status_not_found);
				}
			}
			
		if(substr(__ROUTER_PATH,0,13) == '/services/get'){
                	$matches = array();
                	if(preg_match('/^\/services\/get\/([0-9a-z-_A-Z]{2,50})$/', __ROUTER_PATH, $matches)) {
                		$service= Service::get($matches[1]);                		
                		$i=0;
						foreach ($service as $f) {
							$data[$i]=$f;
							$i++;
						}
          	      			
                		if(empty($data))
                		{
                			throw new Exception(__METHOD__.'service not found',_status_not_found);
                		}
                		throw new Exception(__METHOD__.'service found',_status_success);
                	}
                	else {
                		throw new Exception(__METHOD__.'error loading services',_status_not_found);
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