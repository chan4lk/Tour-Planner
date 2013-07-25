<?php
	echo json_encode(array(
		'name' => 'name',
		'scrN' => 'screen_name',
		'eml' => 'user@domain.com',
		'urTy' => array('tourist','service provider'),
		'dId' => 'device_id',
		'_id' => 'email',
		'ctg' => array(
				'accomadation','guids','transport','dinning'
		),
		'loc' => array(
			'cnty' => 'USA',
			'cty' => 'Denver'
		),
		'likes' => array(
		)
	));
?>