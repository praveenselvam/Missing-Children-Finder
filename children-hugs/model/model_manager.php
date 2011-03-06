<?php
	
	require_once '../model/db.php';		
	class ModelManager {

		public  static function writeRecord($sql,$params) {
			if ( 
				($sql != null && (gettype($sql) == "string") ) && 
				($params !=null && (gettype($params) == "array" ))
			   )
			{
				$stmt = DataBase::getInstance()->prepare($sql);
				
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
			if ( 
				($sql != null && (gettype($sql) == "string") ) && 
				($params !=null && (gettype($params) == "array" ))
			   )
			{
				 $stmt = DataBase::getInstance()->prepare($sql);
				 /*foreach($params as $key=>$value)
				 {
				 	switch (gettype($value)){
				 		case "integer":
				 			$stmt->bindParam(':'.$key, $value, PDO::PARAM_INT);
				 			break;
				 		case "double":
				 			$stmt->bindParam(':'.$key, $value, PDO::PARAM_INT);
				 			break;
				 		case "string":
				 			$stmt->bindParam(':'.$key, $value, PDO::PARAM_STR);
				 			break;
				 		case "boolean":
				 			$stmt->bindParam(':'.$key, $value, PDO::PARAM_BOOL);
				 			break;
				 		case "NULL":
				 			$stmt->bindParam(':'.$key, $value, PDO::PARAM_NULL);
				 			break;
				 	}	
				 }*/
				 $result = $stmt->execute($params);
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