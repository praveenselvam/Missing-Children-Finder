<?php
	require_once "model/model_manager.php";
	require_once "util/log4php/Logger.php";
	
	class ModelChildProfile {
		private static $CHILD_PROFILE = "select distinct c.name as name, c.age as age, c.gender as gender,a.locality as locality, a.city as city, a.state as state 
 										 from child c, address a, rel_reporter_child_address r  
 										where r.rca_child_id=c.child_id and r.rca_address_id=a.address_id
 										and c.salt =:salt and c.child_id =:child_id";
		
		private $logger;
	 		
	 	public function  __construct() 
	 	{
	 		$this->logger = Logger::getLogger(__CLASS__);
	 	}
	 	
	 	public function getProfile($get_array)
	 	{
	 		$DB=DataBase::getInstance();
	 		$RESULT = null;
			try 
			{				
				$RESULT = ModelManager::transcationReadRecord(self::$CHILD_PROFILE, $get_array, $DB);
				
			}catch(Exception $e)
			{
				echo $e;
				//$this->logger->error($e);
			}
			return $RESULT;
	 	}
	}
	
	/*$get_array = array ("salt"=>199334831,"child_id"=>1);
	
	$test = new ModelChildProfile();
	$RES = $test->getProfile($get_array);
	
	echo count($RES).PHP_EOL;
	
	foreach($RES as $row)
	{		
		foreach($row as $k=>$v)
		{
			echo $k."=".$v.PHP_EOL;
		}
	}*/
	
?>