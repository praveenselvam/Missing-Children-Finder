<?php
	require_once 'db.php';		
	class ModelManager {

		
		public  static function writeRecord($sql,$params) {
			self::transcationWriteRecord($sql, $params,DataBase::getInstance());
		}
		
		public  static function transcationWriteRecord($sql,$params,$PDO) {
			if ( 
				($sql != null && (gettype($sql) == "string") ) && 
				($params !=null && (gettype($params) == "array" ))
			   )
			{
				$stmt = $PDO->prepare($sql);
				
				foreach($params as $key=>$value)
				 {
				 	//$obj = $value;
				 	switch (gettype($value)){
				 		case "integer":
				 			$stmt->bindValue(':'.$key, $value, PDO::PARAM_INT);
				 			break;
				 		case "double":
				 			$stmt->bindValue(':'.$key, $value, PDO::PARAM_INT);
				 			break;
				 		case "string":
				 			$stmt->bindValue(':'.$key, $value, PDO::PARAM_STR);
				 			break;
				 		case "boolean":
				 			$stmt->bindValue(':'.$key, $value, PDO::PARAM_BOOL);
				 			break;
			 			case "object":
			 				$stmt->bindValue(':'.$key,( ($value instanceof DateTime)?$value->format("Y-m-d"):null ), PDO::PARAM_STR);			 				
			 			break;
				 		case "NULL":
				 			$stmt->bindValue(':'.$key, $value, PDO::PARAM_NULL);
				 			break;
				 	}	
				 }
				
				$result = $stmt->execute();
				$stmt = null;
				return $result;
			}
			return 0;
		}
		
		public static function readRecord($sql,$params) {
			self::transcationReadRecord($sql,$params,DataBase::getInstance());
		}
		
		public static function transcationReadRecord($sql,$params,$PDO) {
			if ( 
				($sql != null && (gettype($sql) == "string") ) && 
				($params !=null && (gettype($params) == "array" ))
			   )
			{
				 $stmt = $PDO->prepare($sql);
				 $result = $stmt->execute($params);
				 $result_array = null;
				 if($result >= 1)
				 {
				 	$result_array = $stmt->fetchAll();
				 }				 
				 $stmt = null;
				 return $result_array;
				   
			}else if($sql != null && gettype($sql) == "string"){
				 $stmt = $PDO->prepare($sql);
				 				 
				 $result = $stmt->execute();
				 $result_array = null;
				 if($result >= 1)
				 {
				 	$result_array = $stmt->fetchAll();
				 }				 
				 $stmt = null;
				 return $result_array;
			}else{
				//echo "SQL test = ".($sql != null && (gettype($sql) == "string") );
				//echo "\n Pram test  =".((gettype($params)))."\n" ;
				
			}			
			return null;
		}
		
	}
?>