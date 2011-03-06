<?php
	$dt = new DateTime();

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
	}

	//$strFormat = 'Y-m-d';
    //$strDate = new DateTime( $strFormat ) ;
    //echo $strDate; 
?>
