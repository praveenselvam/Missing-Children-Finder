<?php
	require_once 'db.php';
	require_once 'model_manager.php';
	
	class ModelReportMissing {
		
		public static $ADD_CHILD = "INSERT INTO child(name,gender,dob,age,salt)
									 VALUES(:name,:gender,:dob,:age,:salt)";
		
		public static $ADD_REPORTER = "INSERT INTO reporter(email,name,contact_number,salt) 
										VALUES(:email,:name,:contact_number,:salt)";
		
		public static $ADD_ADDRESS = "INSERT INTO address(street,locality,city,state,country,salt)
									   VALUES (:street,:locality,:city,:state,:country,:salt)";
		
		public static $LINK_CHILD_ADDRESS_REPORTER = "INSERT INTO rel_reporter_child_address(rca_child_id, rca_address_id, rca_reporter_id) 
										VALUES (:rca_child_id, :rca_address_id, :rca_reporter_id)";
		
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
										   	
			try {							   	
				$DB =  DataBase::getInstance();
					  // todo check how this singelton object behaves.
				      //new PDO("mysql:host=localhost;dbname=mc_db",
				      //			"mc_db_user", "mc_db_user_admin@123#");

				// begintransaction, commit, rollback does not seem to work on my machine 
				// I am getting an undefined method exception.
				// - Sriram
				// $DB->beginTranscation();
				     
						
				$TRANSCATION_SALT = mt_rand(0, mt_getrandmax());
				
				$_info = $childInformation;
				$_info["salt"] = $TRANSCATION_SALT;
				$insert_child_status = ModelManager::transcationWriteRecord(self::$ADD_CHILD, $_info, $DB);
				
				// TODO: externalize this lookup. The map could change and we'd have no clue here.
				// move this to parameter_map.php preferably.
				if ( strtoupper($auxInformation["keep_my_contact"])  == "ON" ) {				
					$_info = $reporterInformation;
					$_info["salt"] = $TRANSCATION_SALT;
					$insert_reporter_status = ModelManager::transcationWriteRecord(self::$ADD_REPORTER, $_info, $DB);
				}
				
				$_info = $addressInformation;
				$_info["salt"] = $TRANSCATION_SALT;
				$insert_address_status = ModelManager::transcationWriteRecord(self::$ADD_ADDRESS, $_info, $DB);

				/* do the final mapping for link table, could be done more cleanly */
				$sql="select address_id from address where salt=:salt";
				$result=ModelManager::transcationReadRecord($sql, array("salt" => $TRANSCATION_SALT), $DB);
				$link_map['rca_address_id']=$result[0]['address_id'];
				
								
				$sql="select child_id from child where salt=:salt";
				$result=ModelManager::transcationReadRecord($sql, array("salt" => $TRANSCATION_SALT), $DB);
				$link_map['rca_child_id']=$result[0]['child_id'];
				
				$sql="select reporter_id from reporter where salt=:salt";
				$result=ModelManager::transcationReadRecord($sql, array("salt" => $TRANSCATION_SALT),$DB);
				$link_map['rca_reporter_id']=$result[0]['reporter_id'];
				
				// inserting into the link table 
				$insert_link_info = ModelManager::transcationWriteRecord(self::$LINK_CHILD_ADDRESS_REPORTER, $link_map, $DB);

				// $DB->commit();
				
			}catch(PDOException $pdo_e) {
				//$DB->rollback();
				// report error here
				echo "exception: ".$pdo_e;
			}						   				
		}				
	}
?>