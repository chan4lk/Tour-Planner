<?php
/**
 * @author chandima ranaweera
 */
include_once 'class/bid.class.php';
$data = array();
try {
	if(substr(__ROUTER_PATH,0,9) == '/bids/get'){
             $matches = array();
		if(preg_match('/^\/bids\/get\/([0-9a-z-_A-Z]{2,32})$/', __ROUTER_PATH, $matches)) {			
			$tips=Bid::get($matches[1]);			
			if (!empty($tips)) {
				$i=0;
				foreach ($tips as $t) {
					$data[$i]['tData']=$t['tData'];
					$data[$i]['sData']=$t['sid'];
					$i++;
					throw new Exception('bids found',_status_success);
				}
				}
				else
				{
					throw new Exception('no bids found',_status_not_found);
				}
				if(empty($data))
				{
					throw new Exception('empty bids',_status_not_found);
				}
			}		
			
		}
		if(substr(__ROUTER_PATH,0,10) == '/bids/find'){
			$matches = array();
			if(preg_match('/^\/bids\/find\/([0-9a-z-_A-Z]{2,50})$/', __ROUTER_PATH, $matches)) {
				$tips=Bid::find($matches[1]);
				if (!empty($tips)) {
					$i=0;
					foreach ($tips as $t) {	
						$data[$i]['_id']=$t['_id'];				
						$data[$i]['sData']=$t['sData'];
						$data[$i]['acpt']=$t['acpt'];
						$i++;
					}
					throw new Exception('bids found',_status_success);
				}
				else
				{
					throw new Exception('no bids found',_status_not_found);
				}
					
			}
		}
		if(__ROUTER_PATH=='/bids/add')
		{
			$sid=$tid=null;
			extract($_POST,EXTR_IF_EXISTS);
			Bid::add($sid,$tid);
		}
	if(__ROUTER_PATH=='/bids/acpt')
		{
			$bid=null;
			extract($_POST,EXTR_IF_EXISTS);
			Bid::accept($bid);
		}
	}
	 catch (Exception $e) {
	 	header('Content-Type:application/json');
	 	echo json_encode(array(
	 			'msg' => $e->getMessage(),
	 			'data'=> $data,
	 			'code' => $e->getCode()
	 	));
	}
?>