<?php
/**
 * @author Chandima Ranaweera
 */

	if(__ROUTER_PATH=='/preferances/find')
	{
		$form = array("preferances" => array("Wild Life","Traditional","Food & Dining","Adventure Tours","Beach Holidays","Shoping","Nigth Life"));
		echo json_encode($form);
	}

?>