<?php
	require_once "model/db.php";
	require_once "model/model_manager.php";
	require_once "util/log4php/Logger.php";
	
	
	 class ModelReportMissing {
		
		public static $ADD_CHILD = "INSERT INTO child(name,gender,dob,age,salt)
									 VALUES(:name,:gender,:dob,:age,:salt)";
		
		public static $ADD_REPORTER = "INSERT INTO reporter(email,name,contact_number,salt) 
										VALUES(:email,:name,:contact_number,:salt)";
		
		public static $ADD_ADDRESS = "INSERT INTO address(street,locality,city,state,country,salt)
									   VALUES (:street,:locality,:city,:state,:country,:salt)";
		

		public static $LINK_CHILD_ADDRESS_REPORTER = "INSERT INTO rel_reporter_child_address(rca_child_id, rca_address_id, rca_reporter_id) 
										VALUES (:rca_child_id, :rca_address_id, :rca_reporter_id)";

		public static $RELATE_REPORTER_CHILD_ADDRESS = 
					  "INSERT INTO rel_reporter_child_address (rca_child_id,rca_address_id,rca_reporter_id)
					  VALUES ((SELECT child_id from child where salt =:salt ),
					  		  (SELECT address_id from address where salt =:salt ),
					  		  (SELECT reporter_id from reporter where salt =:salt ) 	
					         )";
		
		public static $RELATE_EXISTING_REPORTER_CHILD_ADDRESS = 
					  "INSERT INTO rel_reporter_child_address (rca_child_id,rca_address_id,rca_reporter_id)
					  VALUES ((SELECT child_id from child where salt =:salt ),
					  		  (SELECT address_id from address where salt =:salt ),
					  		  (SELECT reporter_id from reporter where email =:email ) 	
					         )";
		
		
		public static $RELATE_CHILD_ADDRESS = 
					  "INSERT INTO rel_reporter_child_address (rca_child_id,rca_address_id,rca_reporter_id)
					  VALUES ((SELECT child_id from child where salt =:salt ),
					  		  (SELECT address_id from address where salt =:salt ),
					  		  (SELECT reporter_id from reporter where salt = 1 ) 	
					         )";
		
		public static $RELATE_CHILD_STATUS = 
							"INSERT INTO rel_child_status(rcs_child_id,rcs_status_id)
							 VALUES((SELECT child_id from child where salt =:salt ),
							 		(SELECT status_id from status_catalog where status_name =:child_status )
							 	   )";

 		private $logger;
 		
 		public function  __construct() {
 			$this->logger = Logger::getLogger(__CLASS__);
 		}
		
		
		public function process_photo($photo_id) {
			
			$fileperm = 0644;
			$dirperm = 0777;
									
			$target_path = $_SERVER['DOCUMENT_ROOT']."/missing-children/images/uploads/";
			
			if(!is_dir($target_path))
			{
				mkdir($target_path,$dirperm);
			}
			$destination = $target_path.$photo_id."_".basename($_FILES["child_photo"]["tmp_name"]);
			
			move_uploaded_file($_FILES["child_photo"]["tmp_name"], $destination);
			
		}
		
		public function reportMissingChild($childInformation,
										   $reporterInformation,
										   $addressInformation,
										   $auxInformation
										   ) {
										   	
										   	
			/*
			 * ..transcationBegin
			 * 1.Create Child,Address,
			 * 2.Create Reporter only if reporter pref is enabled
			 * 3.Associate, child <-> reporter <-> address
			 * 3.1 if reporter remember pref is disabled, associate to anomoyous reporter
			 * ..transcationEnd 
			 */
			$CALL_STATUS = FALSE;										   	

			$KEEP_REPORTER_CONTACT = 0;
			
			try {							   	
				$DB =  DataBase::getInstance();
					  // todo check how this singelton object behaves.
				      //new PDO("mysql:host=localhost;dbname=mc_db",
								     
						
				$TRANSCATION_SALT = mt_rand(0, mt_getrandmax());
				
				$this->process_photo($TRANSCATION_SALT);
				
				$_info = null;				
				$_info = $childInformation;
				$_info["salt"] = $TRANSCATION_SALT;
				$insert_child_status = ModelManager::transcationWriteRecord(self::$ADD_CHILD, $_info, $DB);
				
				// TODO: externalize this lookup. The map could change and we'd have no clue here.
				// move this to parameter_map.php preferably.
				if ( strtoupper($auxInformation["keep_my_contact"])  == "ON" ) {
					$_info = null;				
					$_info = $reporterInformation;
					$_info["salt"] = $TRANSCATION_SALT;
					try {
						$insert_reporter_status = ModelManager::transcationWriteRecord(self::$ADD_REPORTER, $_info, $DB);
					}catch(PDOException $pdoException)
					{
						if($pdoException->getCode() == "23000")
						{							
							$KEEP_REPORTER_CONTACT = $KEEP_REPORTER_CONTACT + 1;
							
						}else{
							throw $pdoException;
						}
					}
					$KEEP_REPORTER_CONTACT = $KEEP_REPORTER_CONTACT + 1;
				}
				
				$_info = null;
				$_info = $addressInformation;
				$_info["salt"] = $TRANSCATION_SALT;
				$insert_address_status = ModelManager::transcationWriteRecord(self::$ADD_ADDRESS, $_info, $DB);
					$salt_associate = null;
					$salt_associate = array("salt" => $TRANSCATION_SALT);
					if($KEEP_REPORTER_CONTACT == 1)
					{
						ModelManager::writeRecord(self::$RELATE_REPORTER_CHILD_ADDRESS, $salt_associate);
					}else if ($KEEP_REPORTER_CONTACT == 2) {
						try {
							$salt_associate = null;
							$salt_associate =  array("salt" => $TRANSCATION_SALT,"email"=>$reporterInformation["email"]);
							
							ModelManager::writeRecord(self::$RELATE_EXISTING_REPORTER_CHILD_ADDRESS, $salt_associate);
						}catch(PDOException $pe)
						{
							
						}
					}else{
						ModelManager::writeRecord(self::$RELATE_CHILD_ADDRESS, $salt_associate);
					}
				
				
				
				$salt_associate = null;
				$salt_associate = array("salt" => $TRANSCATION_SALT,"child_status"=>$auxInformation["child_status"]);
				
				ModelManager::writeRecord(self::$RELATE_CHILD_STATUS, $salt_associate);
				$CALL_STATUS = TRUE;
				
				$this->logger->info("Done reporting child...");
				
			}catch(PDOException $pdo_e) {
				$this->logger->error("Error reporting child : ".$pdo_e->getMessage());
			}catch(Exception $e)
			{
				$this->logger->error("Error reporting child : ".$e->getMessage());
			}
			return $CALL_STATUS;
		}
	}
?>