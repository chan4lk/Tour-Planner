<?php
class BidsController{
		public function GETAction($param) {			
						
			}
		public function POSTAction($param) {
				$data = $_POST;
				$json = array();
				if($param[2]=='add'){
					$b = new Bid();
					try {
						$b->setScreenName($data['scrn'])->setTimeStamp((int)$data['tstm'])->update();
					} catch (Exception $e) {
						$json['message']=$e->getMessage();
						$json['code']=$e->getCode();
					}
					return json_encode($json);
				}
			
		}
}
?>