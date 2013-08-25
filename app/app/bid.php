<?php
	echo json_encode(array(
		'scrN' => 'screen_name',
        'tstm' => 'time_stamp',
        'tId' => 'trip_id',
        'pId' => 'partner_id',
        'bTx' => 'bid_text',
        'pCtg' => array(
        		'accomadation','guids','transport','dinning'
         )
	));
?>