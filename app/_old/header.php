<?php
		$data = array(
			'status' => 'live',
			'now' => time()
			);
		$simplexml = simplexml_load_string('<?xml version="1.0" ?><data />');
		foreach($data as $key => $value) {
			$simplexml->addChild($key, $value);
		}
		header('Content-Type: text/xml');
		echo $simplexml->asXML();
?>
