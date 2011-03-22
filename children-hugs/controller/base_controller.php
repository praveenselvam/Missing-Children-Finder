<?php
	require_once "util/log4php/Logger.php";
	require_once "model/model_validator.php";
	
	abstract class ControllerBaseAction {
		
		public function configure() {
			
			date_default_timezone_set("Asia/Calcutta");			
			Logger::configure(preg_replace("/controller\/*/", "config/logging.properties", dirname(__FILE__)));			
					
		}
		
		public function captcha_is_valid()
		{
			$resp = ModelValidator::validate_captcha();
			if($resp -> is_valid)
			{
				return true;
			}else{
				$_REQUEST["user_request"] = $_POST;
			  	$_REQUEST["validation_errors"] = array("captcha"=>$resp->error);
			  	$_REQUEST["server_response"] = "ERROR";	
			  	return false;		  	
			}
		}
	}
?>