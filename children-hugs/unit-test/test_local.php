<?php
	require_once '../model/model_manager.php';	
	/*$dt = new DateTime();

	if( gettype($dt) == "object" ) {
		if($dt instanceof DateTime)
		{
			echo $dt->format("Y-m-d");
		}	
	}

	
	list($usec,$sec) = explode(" ",microtime());
	
	echo ( (int)$usec + (int)$sec )."\n";

	echo mt_rand(0, mt_getrandmax())."\n";

	$auxInformation = array("keep_my_contact"=>"on");
	if ( strtoupper($auxInformation["keep_my_contact"])  == "ON" ) {
		echo "Test keep contact\n";
	}else{
		echo "Test keep contact failed\n";
		echo strtoupper($auxInformation["keep_my_contact"]) ." ";
	}*/

	$RELATE_CHILD_ADDRESS = 
					  "INSERT INTO rel_reporter_child_address (rca_child_id,rca_address_id,rca_reporter_id)
					  VALUES ((SELECT child_id from child where salt =:salt ),
					  		  (SELECT address_id from address where salt =:salt ),
					  		  (SELECT reporter_id from reporter where salt = 1 ) 	
					         )";
	
	$params = array("salt" => 199334831);

	$result = ModelManager::writeRecord($RELATE_REPORTER_CHILD_ADDRESS, $params);

	//$strFormat = 'Y-m-d';
    //$strDate = new DateTime( $strFormat ) ;
    //echo $strDate; 
?>
