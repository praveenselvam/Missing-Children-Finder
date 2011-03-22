<?php
	require_once "model/model_manager.php";
	require_once "util/log4php/Logger.php";
	
	class ModelChildProfile {
		private static $CHILD_PROFILE = "select distinct c.name as name, c.age as age,c.missing_since as missing_since, c.gender as gender,
										 a.locality as locality, a.city as city, a.state as state,cat.status_name as status 
 										 from child c, address a, rel_reporter_child_address r,rel_child_status rs,status_catalog cat   
 										 where r.rca_child_id=c.child_id and r.rca_address_id=a.address_id and rs.rcs_child_id = c.child_id
 										 and rs.rcs_status_id = cat.status_id 
 										 and c.salt =:salt and c.child_id =:child_id";
		
		private static  $CHILD_INFO = "select info_text,DATE_FORMAT(create_date,'%Y-%m-%d') as create_date from child_misc_info where info_child_id = :info_child_id 
									   order by create_date asc limit 0,5";
		
		private static $ADD_CHILD_INFO = "insert into child_misc_info(info_child_id,info_text) values 
										  ((select child_id from child where salt=:salt and child_id =:child_id),
										  :info_text)";
		
		private $logger;
	 		
	 	public function  __construct() 
	 	{
	 		$this->logger = Logger::getLogger(__CLASS__);
	 	}
	 	
	 	public function addChildInformation($post_array)
	 	{
	 		try {
	 			
	 			$RESULT = ModelManager::writeRecord(self::$ADD_CHILD_INFO,$post_array);
	 				 			
	 		}catch(Exception $e)
	 		{
	 			$this->logger->error($e);
	 		}
	 		return $RESULT;
	 		
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
	 	
		public function getAdditionalChildInfo($get_array)
	 	{
	 		$DB=DataBase::getInstance();
	 		$RESULT = null;
			try 
			{				
				$RESULT = ModelManager::transcationReadRecord(self::$CHILD_INFO, $get_array, $DB);
				
			}catch(Exception $e)
			{
				echo $e;
				//$this->logger->error($e);
			}
			return $RESULT;
	 	}
	}
	/*
	$get_array = array ("salt"=>696820843,"child_id"=>1);
	
	$test = new ModelChildProfile();
	$RES = $test->getProfile($get_array);
	
	echo count($RES).PHP_EOL;
	
	foreach($RES as $row)
	{		
		foreach($row as $k=>$v)
		{
			echo $k."=".$v.PHP_EOL;
		}
	}
	$ga = array("info_child_id" => 1);
	$RES = $test->getAdditionalChildInfo($ga);
	
	echo count($RES).PHP_EOL;
	
	foreach($RES as $row)
	{		
		foreach($row as $k=>$v)
		{
			echo $k."=".$v.PHP_EOL;
		}
	}
	*/
?>