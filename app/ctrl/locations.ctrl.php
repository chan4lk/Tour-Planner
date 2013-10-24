<?php
/**
 * @author Chandima Ranaweera
 */
	if(__ROUTER_PATH=='/locations/find')
	{		
		$form = array("Locations" => array("Colombo", "Mt.Lavinia", "NuwaraEliya", "Sigiriya", "Bandarawela", "Galle", "Jaffna", "Hikkaduwa", "Kandy"));
		echo json_encode($form);
	}

?>