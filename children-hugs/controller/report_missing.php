<?php
	require_once "controller/parameter_map.php";
	require_once "model/model_report_missing.php";	
	require_once "model/model_validator.php";
	require_once "rules/report_missing_child_validation_rules.php";
	require_once "controller/base_controller.php";
	
	class ControllerReportMissing  extends ControllerBaseAction  {

		public function __construct() {
			self::configure();
		}
		
		
		public function get($get_array)
		{
			$report_missing_model = new ModelReportMissing();
			$resp = $report_missing_model -> viewProfileForEdit($get_array);
			if($resp!=null){
				$_REQUEST["user_request"] = $resp[0];
				$_REQUEST["user_request"]["id1"] = $get_array["salt"];
				$_REQUEST["user_request"]["id2"] = $get_array["child_id"];
				$_REQUEST["user_request"]["FORM_ACTION"] = "UPDATE_CHILD_INFO";	
				
				
				/*foreach($_REQUEST["user_request"] as $key => $value)
				{
					echo "Key ".$key." = ".$value ."\n";		
				}*/
			}
			 
			
		}
		public function update($post_array)
		{
			$report_missing_model = new ModelReportMissing();
			
			$post_array["salt"] = $post_array["id1"];
			$post_array["child_id"] = $post_array["id2"];
			
			$validation_array = $post_array;
		  			  
		  
			  $post_array["missing_since"] = ("" == trim($post_array["missing_since"]))?null:trim($post_array["missing_since"]);
			  
			  
			  
			  if($post_array["missing_since"] == null)
			  {
			  	unset($validation_array["missing_since"]);
			  }
			  
		 		foreach ($validation_array as $k=>$v)
				 {
				 	if($v!=null && !empty($v))
				 	{	
				 		$validation_array[$k] = $v;
				 	}else{
				 		unset($validation_array[$k]);
				 	}
				 }
		  
		  	  $validation_results = ModelValidator::validate(
		  							$validation_array,
		  							MissingChildValidationRules::$REPORT_CHILD_MISSING_MAP			  							
		  							);  
		 	  if(count($validation_results) == 0 && count($validation_array) >0 )
			  {	
			  	
			  	unset($validation_array["form_action"]);
				unset($validation_array["id1"]);
				unset($validation_array["id2"]);
			  	unset($validation_array["recaptcha_challenge_field"]);
				unset($validation_array["recaptcha_response_field"]);
				if(!isset($validation_array['reporter_contact']))
				{
					$validation_array['reporter_contact'] = 0;
				}
				
			  	$action_result = $report_missing_model->updateInformation($validation_array);
				$_REQUEST["server_response"] = "SUCCESS";
				 											  
			  }else{			  	
			  	$_REQUEST["user_request"] = $post_array;
			  	
			  	$_REQUEST["user_request"]["id1"] = $post_array["salt"];
				$_REQUEST["user_request"]["id2"] = $post_array["child_id"];
				
				$_REQUEST["user_request"]["FORM_ACTION"] = "UPDATE_CHILD_INFO";	
			  	
			  	$_REQUEST["validation_errors"] = $validation_results;
			  	$_REQUEST["server_response"] = "ERROR";
			  		  	
			  	/*foreach($validation_results as $k=>$v){
			  		echo $k."=[".$post_array[$k]."]".$v.PHP_EOL;	
			  	}*/			  				  	
			  }
		}
		public function post($post_array)
		{
			  $report_missing_model = new ModelReportMissing();
			
			  $childInformation = $this->extractChildInformation($post_array);			  
			  $reporterInformation = $this->extractReporterInformation($post_array);
			  $addressInformation = $this->extractAddressInformation($post_array);
			  $preferenceInformation = $this->extractPreferenceInformation($post_array);
			
			  $validation_array = $post_array;
			  			  
			  
			  $post_array["missing_since"] = ("" == trim($post_array["missing_since"]))?null:trim($post_array["missing_since"]);
			  
			  if($post_array["missing_since"] == null)
			  {
			  	unset($validation_array["missing_since"]);
			  }
			  
	 		foreach ($validation_array as $k=>$v)
			 {
			 	if($v!=null && !empty($v))
			 	{	
			 		$validation_array[$k] = $v;
			 	}else{
			 		unset($validation_array[$k]);
			 	}
			 }
			  
			  $validation_results = ModelValidator::validate(
			  							$validation_array,
			  							MissingChildValidationRules::$REPORT_CHILD_MISSING_MAP			  							
			  							);
			  /**
			   * TODO : Validate status of uploaded file, 
			   * we need to turn back here in case the upload failed.
			   */							
			  							
			  if(count($validation_results) == 0 && count($validation_array) >0 )
			  {	
			  	$action_result = $report_missing_model->reportMissingChild($childInformation,
															  $reporterInformation,
															  $addressInformation,
															  $preferenceInformation);
				$_REQUEST["server_response"] = "SUCCESS";
				 											  
			  }else{			  	
			  	$_REQUEST["user_request"] = $post_array;
			  	$_REQUEST["validation_errors"] = $validation_results;
			  	$_REQUEST["server_response"] = "ERROR";
			  		  	
			  	/*foreach($validation_results as $k=>$v){
			  		echo $k."=[".$post_array[$k]."]".$v.PHP_EOL;	
			  	}*/			  				  	
			  }
			 															  	
		}
		
		private function extractChildInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$CHILD_INPUT_MAP,
															 $post_array);
		}
		private function extractReporterInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$REPORTER_INPUT_MAP,
																 $post_array);
		}
		private function extractAddressInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$ADDRESS_INPUT_MAP,
															 $post_array);
		}
		private function extractPreferenceInformation($post_array)
		{
			return ControllerParameterMap::extractionHelper(ControllerParameterMap::$PREFERENCE_INPUT_MAP,
															 $post_array);
		}		
	}
	
	//
	/*foreach($_GET as $key => $value)
	{
		//echo "Key ".$key." = ".$value;		
	}*/
	
	if( $_GET !=null ) 
	{
		
		$get_param["salt"] = $_GET["id1"];
		$get_param["child_id"] = $_GET["id2"];
		
		//echo $get_param["salt"] . PHP_EOL;
		//echo $get_param["child_id"];
		
		$controller = new ControllerReportMissing();
		$controller->get($get_param);
	}	
	
	if ( $_POST["form_action"] != null)
	{
		/*foreach ($_POST as $k=>$v){
			echo $k."=".$v."</br>";
		}*/
		//UPDATE_CHILD_INFO	
		$controller = new ControllerReportMissing();
		
		if($controller->captcha_is_valid())
		{
			
			if ("REPORT_MISSING" == strtoupper($_POST["form_action"]))
			{					 
				$controller->post($_POST);
			}else if("UPDATE_CHILD_INFO" == strtoupper($_POST["form_action"]) ) {
				$controller->update($_POST);
			}
		}
	}
?>