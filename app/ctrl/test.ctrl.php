<?php
/*	include_once 'class/trip.class.php';
	$data=array();
	$t = Trip::get('hansi');
	$i=0;
	
	foreach ($t as $doc) {
		$data[$i]['sLoc']=$doc['sLoc'];
		$data[$i]['eLoc']=$doc['eLoc'];
		$i++;
	}
	echo json_encode($data);
	try{
			$test_arr  = explode('/', $close_date);
			if (count($test_arr) == 3) {
				if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
					$this->data['clDt']=new MongoDate(strtotime($close_date));
					return $this;
				} else {
					throw new Exception(__METHOD__.'date is not valid', _status_mismatch);
				}
			} else {
				throw new Exception(__METHOD__.'dates not valid', _status_mismatch);
			}
		}
		catch (Exception $e)
		{
			throw new Exception(__METHOD__.'dates not valid', _status_mismatch);
		}
	$name='chan';
	$data=array();
	try {
		$t = Trip::get('chan4lk');
		$data=iterator_to_array($t);
		if(empty($data))
		{
			echo 'empty array\n';
		}
		
		$i=0;
		foreach ($t as $doc) {
   			 $data[$i]=$doc;
   			 $i++;
			}
		//print_r ($data);
		if($name='chan'){
		$in = array('name'=>$name, 'age'=>23);		
		$out= array('person1'=>$in,'person2'=>$in);
		throw new Exception('go');
		}
	} catch (Exception $e) {
		echo json_encode($data);
	}
	
	echo $_SERVER['SERVER_NAME'];
		extract($_POST);
		
		//set POST variables
		$url = 'http://domain.com/get-post.php';
		$fields = array(
				'lname' => urlencode($last_name),
				'fname' => urlencode($first_name)
				
		);
		
		//url-ify the data for the POST
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');
		
		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		
		//execute post
		$result = curl_exec($ch);
		
		//close connection
		curl_close($ch);
			
		$fields_string="";
			$fields = array(
					'lname' => urlencode('chan'),
					'fname' => urlencode('chan ideals')
			
			);
			
			//url-ify the data for the POST
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, "http://traveller-viento.rhcloud.com/trips/add");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		
		curl_setopt($curl,CURLOPT_POST, count($fields));		
		curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
		
		$result = curl_exec ($curl);
		curl_close ($curl);
		var_dump($result);
		$data=$result[1]['msg'];
		echo '</br>';
		var_dump($data);
		//$data=array();
		//
		//$assocArray = json_decode($data, true);
		//print $assocArray['msg'];
		
		
		$tags=array(array("tag"=>"culture","location"=>array("sigiriya","Kandy","Anuradhapura","Polonnaruwa","Polonnaruwa")),
		array("tag"=>"wildlife","location"=>array("yala","udawalawa","hortans place","bundala national park",
						"pinnawala elepant orpanage")),
		array("tag"=>"nature","location"=>array("sinharaja","yala","udawalawa","hortan place","hatton","bogawanthalawa")));
		
		echo json_encode($tags);
		MongoConnect::getInstance()->tags->insert($tags);
		*/
		$json='{
			  "results": [{
			    "address_components": [{
			      "long_name": "Kandy",
			      "short_name": "Kandy",
			      "types": ["locality", "political"]
			    }, {
			      "long_name": "Kandy",
			      "short_name": "Kandy",
			      "types": ["administrative_area_level_2", "political"]
			    }, {
			      "long_name": "Central Province",
			      "short_name": "Central Province",
			      "types": ["administrative_area_level_1", "political"]
			    }, {
			      "long_name": "Sri Lanka",
			      "short_name": "LK",
			      "types": ["country", "political"]
			    }],
			    "formatted_address": "Kandy, Sri Lanka",
			    "geometry": {
			      "bounds": {
			        "northeast": {
			          "lat": 7.330587100000001,
			          "lng": 80.6596685
			        },
			        "southwest": {
			          "lat": 7.258503500000001,
			          "lng": 80.5918944
			        }
			      },
			      "location": {
			        "lat": 7.284459,
			        "lng": 80.63745900000001
			      },
			      "location_type": "APPROXIMATE",
			      "viewport": {
			        "northeast": {
			          "lat": 7.330587100000001,
			          "lng": 80.6596685
			        },
			        "southwest": {
			          "lat": 7.258503500000001,
			          "lng": 80.5918944
			        }
			      }
			    },
			    "types": ["locality", "political"]
			  }],
			  "status": "OK"
			}';
/*	$tags=array(array("tag"=>"culture","location"=>array("sigiriya","Kandy","Anuradhapura","Polonnaruwa","Polonnaruwa")),
		array("tag"=>"wildlife","location"=>array("yala","udawalawa","hortans pains","bundala national park","pinnawala elepant orpanage")),
		array("tag"=>"nature","location"=>array("sinharaja","yala","udawalawa","hortans pains","hatton","bogawanthalawa")));
		//$address=$tags->location;
		//foreach ($address as $town){
		$url="http://maps.google.com/maps/api/geocode/json?address="."Kandy"."&sensor=false";
		$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);		
		$result = curl_exec ($curl);
		curl_close ($curl);
		header('Content-Type:application/json');
		echo $result;
		
		//}
		$getJSON = "http://maps.googleapis.com/maps/api/geocode/json?address=" . str_replace(" ", "", $_POST['postcode']) . "&sensor=false";
		$contentJSON = file_get_contents($getJSON);
		$Geocode_array = json_decode($contentJSON, true);
		$data = json_decode(@$json);
		//var_dump($data);
		foreach($data->results as $arr){
		foreach($arr->address_components as $v){
		if (in_array("locality",$v->types)){
			echo $v->long_name . "<br>";
				}
			}
		}
		$address='Kandy';

		function getLat($address) {
			
		$getJSON = "http://maps.googleapis.com/maps/api/geocode/json?address=" .$address."&components=country:LK". "&sensor=false";
		$contentJSON = file_get_contents($getJSON);		
		$Geocode_array = json_decode(@$contentJSON, true);		
		return $Geocode_array ['results'][0]['geometry']['location']['lat'];
		}
		function getLong($address) {
				
			$getJSON = "http://maps.googleapis.com/maps/api/geocode/json?address=" .$address."&components=country:LK". "&sensor=false";
			$contentJSON = file_get_contents($getJSON);
			$Geocode_array = json_decode(@$contentJSON, true);
			return $Geocode_array ['results'][0]['geometry']['location']['lng'];
		}
		
		if(getLat('Kandy')>getLat('colombo'))
		{
			echo 'inside';
		}
		else 
		{
			echo 'out side';
		}
		
		$country = urlencode('sri lanka');
		echo $country;
		
		echo getLat($country).'<br/>';
		
		*/
		/*foreach($data->results as $arr){
			foreach($arr->geometry as $v){
				foreach($v->location as $l){				
				echo $l->lat.'<br/>';
				}		
			}	
		}
		if((($t['sLoc']['lat']==$s['loc']['lat']) &&($t['sLoc']['lng']==$s['loc']['lng'])) && (($t['eLoc']['lat']==$s['loc']['lat']) && ($t['eLoc']['lng']==$s['loc']['lng'])))
					{
						$data[$i]['sid']=$s['_id'];
						$data[$i]['tid']=$t['_id'];
						
						$col[$i]['_id']=$s['_id'];
						$newData[$i]['scrn'] = $t['scrn'] ;
						$newData[$i]['sDate']	=$t['sDate'];
						$newData[$i]['eDate']	=$t['eDate'];
						$newData[$i]['sloc']	=$t['sLoc'];
						$newData[$i]['eloc']	=$t['eLoc'];						
					}
					$i++;
		*/
/*
		$i=0;		
		$ds = MongoConnect::getInstance();
		$q = array();
		$trips = $ds->trips->find($q);		
		$services = $ds->services->find($q);
		
		foreach ($trips as $t)
		{
			foreach($services as $s)
			{
				if($s['loc']['name']==$t['eLoc']['name'])
				{
					$data=array('sid'=>$s['_id'],'tid'=>$t['_id']);
					$ds->bidtrips->insert($data);
				}
			}
				
			
		}
		
		foreach ($col as $c){
		$ds->services->update( array("_id"=>$c['_id']),array('$set'=>array("trips"=>$newData)) );
		
		$sweetQuery = array('loc.name'=>$this->data['eLoc']['name']);			
			$updateArray = array('trips'=>$this->data);
			
			$ds = MongoConnect::getInstance()->services->update($sweetQuery,array('$push'=>$updateArray));
		}
		//var_dump($data);
		$data = iterator_to_array($trips);
		$json = json_encode($data);
		header('Content-type:application/json');*/
		$service = MongoConnect::getInstance()->services->findOne(array('_id'=>new MongoId('5276d15ee0006c8e058b4571')));
		var_dump($service);
		//echo $json;
		
?>