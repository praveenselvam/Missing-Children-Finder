<?php
	foreach($_GET as $key => $value)
	{
		//echo "Key ".$key." = ".$value;
	}
	
	foreach($_POST as $key => $value)
	{
		echo "Key ".$key." = ".$value;
	}
	
	echo "Message from Root Controller. TODO:Implement";	
	
?>