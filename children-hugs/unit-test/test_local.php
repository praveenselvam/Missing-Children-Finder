<?php
$dt = new DateTime();

	if( gettype($dt) == "object" ) {
		if($dt instanceof DateTime)
		{
			echo $dt->format("Y-m-d");
		}	
	}
	

	//$strFormat = 'Y-m-d';
    //$strDate = new DateTime( $strFormat ) ;
    //echo $strDate; 
?>